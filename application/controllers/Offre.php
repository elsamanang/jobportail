<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offre extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('offre_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
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
        $data['title']= "Liste des Offres";
        $this->load->view('list_offre', $data);
    }

    public function create() 
    {
        $data['title'] = "Ajout Offre";
        $this->load->view('ajout_offre', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'posteOffre' => $this->input->post('posteOffre',TRUE),
            'dateDebutOffre' => $this->input->post('dateDebutOffre',TRUE),
            'dateFinOffre' => $this->input->post('dateFinOffre',TRUE),
            'fk_idEmployeur' => $this->input->post('fk_idEmployeur',TRUE),
            );
            try{
                $this->offre_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect(site_url('offre/create'));
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect(site_url('offre/create'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('posteOffre', 'posteoffre', 'trim|required');
	$this->form_validation->set_rules('dateDebutOffre', 'datedebutoffre', 'trim|required');
	$this->form_validation->set_rules('dateFinOffre', 'datefinoffre', 'trim|required');
	$this->form_validation->set_rules('fk_idEmployeur', 'fk idemployeur', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }

}