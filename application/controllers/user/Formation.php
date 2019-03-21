<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formation extends CI_Controller
{
    function __construct()
    {
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
            $config['base_url'] = base_url() . 'formation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'formation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'formation/index.html';
            $config['first_url'] = base_url() . 'formation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->formation_model->total_rows($q);
        $formation = $this->formation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'formation_data' => $formation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste des Formations";
        $this->load->view('list_formation', $data);
    }

    public function create() 
    {
        $data['title'] = "Ajout Formation";
        $this->load->view('ajout_formation', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nomFormation' => $this->input->post('nomFormation',TRUE),
            'nomInstitution' => $this->input->post('nomInstitution',TRUE),
            'dateDebutFormation' => $this->input->post('dateDebutFormation',TRUE),
            'dateFinFormation' => $this->input->post('dateFinFormation',TRUE),
            'diplomeFormation' => $this->input->post('diplomeFormation',TRUE),
            'resultatFormation' => $this->input->post('resultatFormation',TRUE),
            'descriptionFormation' => $this->input->post('descriptionFormation',TRUE),
            'fk_idDemandeur' => $this->session->user->idDemandeur
            );
            try{
                $this->formation_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect('uprofile');
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect('uprofile');
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomFormation', 'nomformation', 'trim|required');
	$this->form_validation->set_rules('nomInstitution', 'nominstitution', 'trim|required');
	$this->form_validation->set_rules('dateDebutFormation', 'datedebutformation', 'trim|required');
	$this->form_validation->set_rules('dateFinFormation', 'datefinformation', 'trim');
	$this->form_validation->set_rules('diplomeFormation', 'diplomeformation', 'trim');
	$this->form_validation->set_rules('resultatFormation', 'resultatformation', 'trim|numeric');
	$this->form_validation->set_rules('descriptionFormation', 'descriptionformation', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }

}