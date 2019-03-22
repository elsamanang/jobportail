<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offre extends CI_Controller
{
    function __construct()
    {
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
            $config['base_url'] = base_url('offres') . '?q=' . urlencode($q);
            $config['first_url'] = base_url('offres') . '?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url('offres');
            $config['first_url'] = base_url('offres');
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->offre_model->total_rows_id($q,$this->session->entreprise->idEmployeur);
        $offre = $this->offre_model->get_limit_data_id($config['per_page'], $start, $q,$this->session->entreprise->idEmployeur);

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
        $this->load->view('_inc/header',$data);
        $this->load->view('list_offre');
		$this->load->view('_inc/footer');
    }

    public function create() 
    {
        $data['title'] = "Ajout Offre";
		$this->load->view('_inc/header',$data);
		$this->load->view('add_offre');
		$this->load->view('_inc/footer');
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
            'fk_idEmployeur' => $this->session->entreprise->idEmployeur,
            );
            try{
                $this->offre_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect('offres');
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect('offres');
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('posteOffre', 'posteoffre', 'trim|required');
	$this->form_validation->set_rules('dateDebutOffre', 'datedebutoffre', 'trim|required');
	$this->form_validation->set_rules('dateFinOffre', 'datefinoffre', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }

}