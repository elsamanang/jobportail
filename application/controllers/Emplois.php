<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emplois extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'emplois/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'emplois/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'emplois/index.html';
            $config['first_url'] = base_url() . 'emplois/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->emplois_model->total_rows($q);
        $emplois = $this->emplois_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'emplois_data' => $emplois,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste d'Emplois";
        $this->load->view('list_emplois', $data);
    }

    public function create() 
    {
        $data['title'] = "Ajout Emplois";
        $this->load->view('ajout_emplois', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'fk_idDemandeur' => $this->input->post('fk_idDemandeur',TRUE),
            'nomEntreprise' => $this->input->post('nomEntreprise',TRUE),
            'posteEmplois' => $this->input->post('posteEmplois',TRUE),
            'dateDebutEmplois' => $this->input->post('dateDebutEmplois',TRUE),
            'dateFinEmplois' => $this->input->post('dateFinEmplois',TRUE),
            );
            try{
                $this->emplois_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect(site_url('emplois/create'));
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect(site_url('emplois/create'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fk_idDemandeur', 'fk iddemandeur', 'trim|required');
	$this->form_validation->set_rules('nomEntreprise', 'nomentreprise', 'trim|required');
	$this->form_validation->set_rules('posteEmplois', 'posteemplois', 'trim|required');
	$this->form_validation->set_rules('dateDebutEmplois', 'datedebutemplois', 'trim|required');
	$this->form_validation->set_rules('dateFinEmplois', 'datefinemplois', 'trim');

	$this->form_validation->set_rules('idEmplois', 'idEmplois', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}