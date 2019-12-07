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
		if($this->session->admin){
			redirect('accueil_admin');
		}
		$data['title']= "connexion admin";
		$this->load->view('_inc/header',$data);
		$this->load->view('admin/login');
		$this->load->view('_inc/footer');
	}

	public function login_action(){
		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Remplissez les champs obligatoires</p>');
            redirect('admin');
        } else {
            $pwd = $this->input->post('pwd');
            $pseudo = $this->input->post('pseudo',TRUE);
            $admin = array(
                "pseudo"=> "admin",
                "pwd" => "admin",
                "email" => "admin@gmail.com"
            );
            if($admin['pseudo'] == $pseudo){
                if($pwd == $admin['pwd']){
                    $data = array(
                        'admin' => $admin,
                        'type' => 'admin'
                    );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i>Bienvenue '.ucfirst($admin['pseudo']).'</p>');
                    redirect('accueil_admin');
                }
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                redirect('admin');
            }else{
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                redirect('admin');
            }
        }
    }
    public function _rules() 
    {
        $this->form_validation->set_rules('pseudo', 'Pseudo obligatoire', 'trim|required');
		$this->form_validation->set_rules('pwd', 'Password Obligatoire', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="white-text center red" style="color:red;">', '</span>');
    }

	public function smsVue()
	{
		if($this->session->admin){
			redirect('accueil_admin');
		}
		$data['title']= "sms admin";
		$this->load->view('_inc/header',$data);
		$this->load->view('admin/sms');
		$this->load->view('_inc/footer');
    }
}
