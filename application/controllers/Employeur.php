<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employeur extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employeur/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employeur/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employeur/index.php';
            $config['first_url'] = base_url() . 'employeur/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->employeur_model->total_rows($q);
        $employeur = $this->employeur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'employeur_data' => $employeur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste des Employeurs";
        $this->load->view('list_employeur', $data);
    }

    public function create(){
        $data['title'] = "Ajout Employeur";
        $this->load->view('ajout_employeur', $data);
    }
    public function create_action(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            redirect('inscription');
        } else {
            $pwd = $this->input->post('pwd');
            $pwdconf = $this->input->post('pwdconf');
            $email = $this->input->post('emailEmployeur',TRUE);
            $pseudo = $this->input->post('pseudo',TRUE);
            $verifEmail = $this->employeur_model->get_by_email($email);
            $verifPseudo = $this->employeur_model->get_by_pseudo($pseudo);
            if(empty($verifEmail)){
                if(empty($verifPseudo)){
                    if ($pwd == $pwdconf){
                        if($_FILES['logo']['name'] != '')  
                            $logo = $this->upload_image();
                        $data = array(
                            'nomEmployeur' => $this->input->post('nomEmployeur',TRUE),
                            'adresseEmployeur' => $this->input->post('adresseEmployeur',TRUE),
                            'emailEmployeur' => $this->input->post('emailEmployeur',TRUE),
                            'telephoneEmployeur' => $this->input->post('telephoneEmployeur',TRUE),
                            'siteEmployeur' => $this->input->post('siteEmployeur',TRUE),
                            'codePostal' => $this->input->post('codePostal',TRUE),
                            'fax' => $this->input->post('fax',TRUE),
                            'logo' => $logo,
                            'pseudo' => $this->input->post('pseudo',TRUE),
                            'pwd' => sha1($this->input->post('pwd',TRUE))
                        );
                        try{
                            $this->employeur_model->insert($data);
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
        if ($_FILES['logo']['size'] <= 10240000){

            $url="/uploads/employeur";
            $image=basename($_FILES['logo']['name']);
            $image=str_replace(' ','|',$image);
            $type=explode(".",$image);
            $type=$type[count($type)-1];

            if(in_array($type,array('jpg','jpeg','png','JPG','JPEG','PNG')))
            {
                $tmppath="uploads/employeur/".$this->input->post('nomEmployeur',TRUE).".".$type;
                if(is_uploaded_file($_FILES["logo"]["tmp_name"]))
                {
                    move_uploaded_file($_FILES['logo']['tmp_name'],$tmppath);
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
    
    public function _rules() {
        $this->form_validation->set_rules('nomEmployeur', 'nomemployeur', 'trim|required');
        $this->form_validation->set_rules('adresseEmployeur', 'adresseemployeur', 'trim|required');
        $this->form_validation->set_rules('emailEmployeur', 'emailemployeur', 'trim|required');
        $this->form_validation->set_rules('telephoneEmployeur', 'telephoneemployeur', 'trim|required');
        $this->form_validation->set_rules('siteEmployeur', 'siteemployeur', 'trim');
        $this->form_validation->set_rules('codePostal', 'codepostal', 'trim');
        $this->form_validation->set_rules('fax', 'fax', 'trim');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required');
        $this->form_validation->set_rules('pwdconf', 'pwdConfirmation', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="red-text" style="color:red;">', '</span>');
    }
}