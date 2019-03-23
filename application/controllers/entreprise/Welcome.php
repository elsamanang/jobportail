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
		
		//Session verification
		if(!$this->session->entreprise){
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

		$data['title']= "accueil";
		$this->load->view('_inc/header',$data);
		$this->load->view('welcome_entreprise');
		$this->load->view('_inc/footer');
	}
}
