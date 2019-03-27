<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
		parent::__construct();
    }
    
    public function index(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'demandeur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'demandeur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'demandeur/index.html';
            $config['first_url'] = base_url() . 'demandeur/index.html';
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
        $data['title']= "Liste Demandeurs";
		$this->load->view('_inc/header_admin',$data);
        $this->load->view('admin/accueil');
        $this->load->view('_inc/footer');
    }
    
    public function listEmployeur(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employeur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employeur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employeur/index.html';
            $config['first_url'] = base_url() . 'employeur/index.html';
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
        $data['title']= "Liste Employeurs";
		$this->load->view('_inc/header_admin',$data);
        $this->load->view('admin/list_employeurs');
        $this->load->view('_inc/footer');
    }
    
    public function listOffres(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'offre/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'offre/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'offre/index.html';
            $config['first_url'] = base_url() . 'offre/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->offre_model->total_rows($q);
        $offre = $this->offre_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'offre_data' => $offre,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste Offres";
		$this->load->view('_inc/header_admin',$data);
        $this->load->view('admin/list_offres');
        $this->load->view('_inc/footer');
    }
    
    public function listPostulations(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url('postulations') . '?q=' . urlencode($q);
            $config['first_url'] = base_url('postulations') . '?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url('postulations');
            $config['first_url'] = base_url('postulations');
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->offredemande_model->total_rows($q);
        $offredemande = $this->offredemande_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'offredemande_data' => $offredemande,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste Postulations";
		$this->load->view('_inc/header_admin',$data);
        $this->load->view('admin/list_postulations');
        $this->load->view('_inc/footer');
    }
	
	public function login()
	{
		// if($this->session->user || $this->session->entreprise){
		// 	if($this->session->type == 'user'){
		// 		redirect('accueil_user');
		// 	}
		// 	else if($this->session->type == 'entreprise') {
		// 		redirect('accueil_entreprise');
		// 	}else{
		// 		$this->logout();
		// 	}
		// }
		$data['title']= "connexion admin";
		$this->load->view('_inc/header_admin',$data);
		$this->load->view('admin/login');
		// $this->load->view('_inc/footer');
	}

	public function login_action(){
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Remplissez les champs obligatoires</p>');
            redirect('login');
        } else {
            $pwd = $this->input->post('pwd');
            $email = $this->input->post('email',TRUE);
			$typePers = $this->input->post('typePers',TRUE);
			$typeEnt = $this->input->post('typeEnt',TRUE);
			
			if($typePers != NULL && $typeEnt != NULL){
				$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Veuillez Choisir un seul type</p>');
                redirect('login');
			}
			
			if ($typePers != NULL) {
				$user = $this->demandeur_model->get_by_email($email);
				if(!empty($user)){
					if(sha1($pwd) == $user->pwd){
						$data = array(
							'user' => $user,
							'type' => 'user'
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i>Bienvenue '.ucfirst($user->prenomDemandeur).'</p>');
						redirect('accueil_user');
					}
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}else{
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}
				
			}else if($typeEnt != NULL) {
				$entreprise = $this->employeur_model->get_by_email($email);
				if(!empty($entreprise)){
					if(sha1($pwd) == $entreprise->pwd){
						
						$data = array(
							'entreprise' => $entreprise,
							'type' => 'entreprise'
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i>Bienvenue</p>');
						redirect('accueil_entreprise');
					}
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}else{
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}
			}else{
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Il est important de preciser le type!</p>');
                redirect('login');
            }
              
        }
}
}