<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisation extends CI_Controller
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
            $config['base_url'] = base_url() . 'realisation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'realisation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'realisation/index.html';
            $config['first_url'] = base_url() . 'realisation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->realisation_model->total_rows($q);
        $realisation = $this->realisation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'realisation_data' => $realisation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste des Realisations";
        $this->load->view('list_realisation', $data);
    }

    public function create() 
    {
        $data['title'] = "Ajout Realisation";
        $this->load->view('ajout_realisation', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nomRealisation' => $this->input->post('nomRealisation',TRUE),
            'dateRealisation' => $this->input->post('dateRealisation',TRUE),
            'lienRealisation' => $this->input->post('lienRealisation',TRUE),
            'descriptionRealisation' => $this->input->post('descriptionRealisation',TRUE),
            'fk_idDemandeur' => $this->input->post('fk_idDemandeur',TRUE),
            );
            try{
                $this->realisation_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect(site_url('realisation/create'));
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect(site_url('realisation/create'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomRealisation', 'nomrealisation', 'trim|required');
	$this->form_validation->set_rules('dateRealisation', 'daterealisation', 'trim|required');
	$this->form_validation->set_rules('lienRealisation', 'lienrealisation', 'trim|required');
	$this->form_validation->set_rules('descriptionRealisation', 'descriptionrealisation', 'trim|required');
	$this->form_validation->set_rules('fk_idDemandeur', 'fk iddemandeur', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }

}