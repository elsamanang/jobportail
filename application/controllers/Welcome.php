<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$data['title']= "accueil";
		$this->load->view('_inc/header',$data);
		$this->load->view('welcome_message');
		$this->load->view('_inc/footer');
	}
	
	public function login()
	{
		$data['title']= "connexion";
		$this->load->view('_inc/header',$data);
		$this->load->view('login');
		$this->load->view('_inc/footer');
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
							'user' => $user
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i>Bienvenue '.$user->prenomDemandeur.'</p>');
						redirect('user/welcome');
					}
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}else{
					$this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Email or Password Incorrect</p>');
                	redirect('login');
				}
				
			}else if($typeEnt != NULL) {
				$user = $this->employeur_model->get_by_email($email);
				var_dump($user);die();
				$this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i>Bienvenue</p>');
				redirect('welcome');
			}else{
                $this->session->set_flashdata('message', '<p style="color:red;"><i class="material-icons">cancel</i> Il est important de preciser le type!</p>');
                redirect('login');
            }
              
        }
}

	public function inscription()
	{
		$data['title']= "inscription";
		$this->load->view('_inc/header',$data);
		$this->load->view('inscription');
		$this->load->view('_inc/footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<p style="color:green;"><i class="material-icons">check</i> Aurevoir!</p>');
		redirect('login');
	}

	public function _rules() 
    {
        $this->form_validation->set_rules('email', 'Email obligatoire', 'trim|required');
		$this->form_validation->set_rules('pwd', 'Password Obligatoire', 'trim|required');
		$this->form_validation->set_rules('typePers', 'Type Obligatoire', 'trim');
		$this->form_validation->set_rules('typeEnt', 'Type Obligatoire', 'trim');

        $this->form_validation->set_error_delimiters('<span class="white-text center red" style="color:red;">', '</span>');
    }
}
