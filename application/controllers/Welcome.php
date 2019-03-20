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
            $this->login();
        }
		$this->session->set_flashdata('message', '<span>Connexion etablie</span>');
        redirect(site_url('welcome/login'));
	}

	public function inscription()
	{
		$data['title']= "inscription";
		$this->load->view('_inc/header',$data);
		$this->load->view('inscription');
		$this->load->view('_inc/footer');
	}

	public function _rules() 
    {
        $this->form_validation->set_rules('email', 'Email obligatoire', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password Obligatoire', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="white-text center red" style="color:red;">', '</span>');
    }
}
