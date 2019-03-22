<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demandeur extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
        //Session verification
		if(!$this->session->user){
			$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Veuillez vous connecter</p>');
			redirect('login');
		}
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'demandeur/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'demandeur/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'demandeur/index.php';
            $config['first_url'] = base_url() . 'demandeur/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->demandeur_model->total_rows($q);
        $demandeur = $this->demandeur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'demandeur_data' => $demandeur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste des Demandeur";
        $this->load->view('list_demandeur', $data);
    }

    public function create(){
        $data['title'] = "Ajout Demandeur";
        $this->load->view('ajout_demandeur', $data);
    }
    public function create_action(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Remplissez les champs obligatoires</p>');
            redirect('inscription');
        } else {
            $pwd = $this->input->post('pwd');
            $pwdconf = $this->input->post('pwdconf');
            $email = $this->input->post('emailDemandeur',TRUE);
            $pseudo = $this->input->post('pseudo',TRUE);
            $verifEmail = $this->demandeur_model->get_by_email($email);
            $verifPseudo = $this->demandeur_model->get_by_pseudo($pseudo);
            if(empty($verifEmail)){
                if(empty($verifPseudo)){
                    if ($pwd == $pwdconf){
                        $profile = NULL;
                        if($_FILES['imageProfile']['name'] != '')  
                            $profile = $this->upload_image();
                        $data = array(
                            'nomDemandeur' => $this->input->post('nomDemandeur',TRUE),
                            'prenomDemandeur' => $this->input->post('prenomDemandeur',TRUE),
                            'titre' => $this->input->post('titre',TRUE),
                            'adresseDemandeur' => $this->input->post('adresseDemandeur',TRUE),
                            'emailDemandeur' => $this->input->post('emailDemandeur',TRUE),
                            'telephoneDemandeur' => $this->input->post('telephoneDemandeur',TRUE),
                            'genre' => $this->input->post('genre',TRUE),
                            'dateNaissance' => $this->input->post('dateNaissance',TRUE),
                            'nationalite' => $this->input->post('nationalite',TRUE),
                            'etatCivil' => $this->input->post('etatCivil',TRUE),
                            'imageProfile' => $profile,
                            'pseudo' => $this->input->post('pseudo',TRUE),
                            'pwd' => sha1($this->input->post('pwd',TRUE))
                        );
                        try{
                            $this->demandeur_model->insert($data);
                            $this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i> Create Record Success</p>');
                            redirect('login');
                        }catch (Exception $e){
                            $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Create Record Failed >>'.$e.'</p>');
                            redirect('inscription');
                        }
                        
                    }else{
                        $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Password not much</p>');
                        redirect('inscription');
                    }
                }else{
                    $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Ce Pseudo est deja attribué</p>');
                    redirect('inscription');
                }
            }else{
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Cet Email existe deja</p>');
                redirect('inscription');
            }
              
        } 
    }

    public function upload_image(){
        if ($_FILES['imageProfile']['size'] <= 10240000){

            $url="/uploads/demandeur";
            $image=basename($_FILES['imageProfile']['name']);
            $image=str_replace(' ','|',$image);
            $type=explode(".",$image);
            $type=$type[count($type)-1];

            if(in_array($type,array('jpg','jpeg','png','JPG','JPEG','PNG')))
            {
                $tmppath="uploads/demandeur/".$this->input->post('nomDemandeur',TRUE).".".$type;
                if(is_uploaded_file($_FILES["imageProfile"]["tmp_name"]))
                {
                    move_uploaded_file($_FILES['imageProfile']['tmp_name'],$tmppath);
                    return $tmppath;
                }
            }
            else{
                
                $error = '<p style="color:red;"><i class="material-icons">cancel</i> Format invalide, seul les formats: JPEG, PNG sont autorisés</p>';
                $this->session->set_flashdata('message', $error);
                redirect('inscription'); 
            }
        }
        else{
            $error = '<p style="color:red;"><i class="material-icons">cancel</i> Taille invalide, importez un fichier de taille inférieur à 100ko</p>';
            $this->session->set_flashdata('message', $error);
            redirect('inscription');
        }
    }

    public function profile(){
        $data['title']= "profile";
        $data['formations'] = $this->formation_model->get_by_id_user($this->session->user->idDemandeur);
        $data['competences'] = $this->competences_model->get_by_id_user($this->session->user->idDemandeur);
        $data['realisations'] = $this->realisation_model->get_by_id_user($this->session->user->idDemandeur);
        $data['emplois'] = $this->emplois_model->get_by_id_user($this->session->user->idDemandeur);
		$this->load->view('_inc/header',$data);
		$this->load->view('profile_user');
		$this->load->view('_inc/footer');
    }

    public function update($id) 
    {
        $row = $this->demandeur_model->get_by_id($id);

        if ($row) {
            $data['user'] = array(
                'idDemandeur' => set_value('idDemandeur', $row->idDemandeur),
                'nomDemandeur' => set_value('nomDemandeur', $row->nomDemandeur),
                'prenomDemandeur' => set_value('prenomDemandeur', $row->prenomDemandeur),
                'titre' => set_value('titre', $row->titre),
                'adresseDemandeur' => set_value('adresseDemandeur', $row->adresseDemandeur),
                'emailDemandeur' => set_value('emailDemandeur', $row->emailDemandeur),
                'telephoneDemandeur' => set_value('telephoneDemandeur', $row->telephoneDemandeur),
                'genre' => set_value('genre', $row->genre),
                'dateNaissance' => set_value('dateNaissance', $row->dateNaissance),
                'nationalite' => set_value('nationalite', $row->nationalite),
                'etatCivil' => set_value('etatCivil', $row->etatCivil),
                'imageProfile' => set_value('imageProfile', $row->imageProfile),
                'pseudo' => set_value('pseudo', $row->pseudo),
                'pwd' => set_value('pwd', $row->pwd),
                );
            $data['formations'] = $this->formation_model->get_by_id_user($id);
            $data['competences'] = $this->competences_model->get_by_id_user($id);
            $data['realisations'] = $this->realisation_model->get_by_id_user($id);
            $data['emplois'] = $this->emplois_model->get_by_id_user($id);
            $data['title'] ='modifier profile';
            $this->load->view('_inc/header',$data);
            $this->load->view('modif_uprofile');
            $this->load->view('_inc/footer');
        } else {
            $this->session->set_flashdata('message', '<p style="color:orange;"><i class="material-icons">cancel</i> Record Not Found</p>');
            redirect('uprofile');
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p style="color:orange;"><i class="material-icons">cancel</i> Aucune modification faite!</p>');
            $this->update($this->session->user->idDemandeur);
        } else {      
            $pwd = $this->input->post('pwd',TRUE);
            $activePwd = $this->session->user->pwd;
            if($activePwd != $pwd)
                $pwd = sha1($pwd);
            $profile = $this->input->post('imageProfile',TRUE);      
            if($_FILES['imageProfile']['name'] != '')  
                $profile = $this->upload_image();
            $user = array(
                'nomDemandeur' => $this->input->post('nomDemandeur',TRUE),
                'prenomDemandeur' => $this->input->post('prenomDemandeur',TRUE),
                'titre' => $this->input->post('titre',TRUE),
                'adresseDemandeur' => $this->input->post('adresseDemandeur',TRUE),
                'emailDemandeur' => $this->input->post('emailDemandeur',TRUE),
                'telephoneDemandeur' => $this->input->post('telephoneDemandeur',TRUE),
                'genre' => $this->input->post('genre',TRUE),
                'dateNaissance' => $this->input->post('dateNaissance',TRUE),
                'nationalite' => $this->input->post('nationalite',TRUE),
                'etatCivil' => $this->input->post('etatCivil',TRUE),
                'imageProfile' => $profile,
                'pseudo' => $this->input->post('pseudo',TRUE),
                'pwd' => $pwd,
            );
            try{
                $this->demandeur_model->update($this->session->user->idDemandeur, $user);
                // redifined session values
                $this->session->user->nomDemandeur = $user['nomDemandeur'];
                $this->session->user->prenomDemandeur = $user['prenomDemandeur'];
                $this->session->user->titre = $user['titre'];
                $this->session->user->adresseDemandeur = $user['adresseDemandeur'];
                $this->session->user->emailDemandeur = $user['emailDemandeur'];
                $this->session->user->telephoneDemandeur = $user['telephoneDemandeur'];
                $this->session->user->genre = $user['genre'];
                $this->session->user->dateNaissance = $user['dateNaissance'];
                $this->session->user->nationalite = $user['nationalite'];
                $this->session->user->etatCivil = $user['etatCivil'];
                $this->session->user->imageProfile = $user['imageProfile'];
                $this->session->user->pseudo = $user['pseudo'];
                $this->session->user->pwd = $user['pwd'];

                $this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i> Update Record Success</p>');
                redirect('uprofile');
            }catch (Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Update Record Failed >>'.$e.'</p>');
                redirect('uprofile');
            } 
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nomDemandeur', 'nomdemandeur', 'trim|required');
        $this->form_validation->set_rules('prenomDemandeur', 'prenomdemandeur', 'trim|required');
        $this->form_validation->set_rules('titre', 'titre', 'trim|required');
        $this->form_validation->set_rules('adresseDemandeur', 'adressedemandeur', 'trim|required');
        $this->form_validation->set_rules('emailDemandeur', 'emaildemandeur', 'trim|valid_email|required');
        $this->form_validation->set_rules('telephoneDemandeur', 'telephonedemandeur', 'trim|required');
        $this->form_validation->set_rules('genre', 'genre', 'trim|required');
        $this->form_validation->set_rules('dateNaissance', 'datenaissance', 'trim|required');
        $this->form_validation->set_rules('nationalite', 'nationalite', 'trim|required');
        $this->form_validation->set_rules('etatCivil', 'etatcivil', 'trim|required');
        $this->form_validation->set_rules('imageProfile', 'imageprofile', 'trim');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required');
        $this->form_validation->set_rules('pwdconf', 'pwdConfirmation', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }
}