<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisation extends CI_Controller
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
            'fk_idDemandeur' => $this->session->user->idDemandeur
            );
            try{
                $this->realisation_model->insert($data);
                $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                redirect('uprofile');
            }catch(Exception $e){
                $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                redirect('uprofile');
            }
        }
    }

    public function update($id) 
    {
        $row = $this->realisation_model->get_by_id($id);

        if ($row) {
            $data['realisation'] = array(
                'idRealisation' => set_value('idRealisation', $row->idRealisation),
                'nomRealisation' => set_value('nomRealisation', $row->nomRealisation),
                'dateRealisation' => set_value('dateRealisation', $row->dateRealisation),
                'lienRealisation' => set_value('lienRealisation', $row->lienRealisation),
                'descriptionRealisation' => set_value('descriptionRealisation', $row->descriptionRealisation),
                'fk_idDemandeur' => set_value('fk_idDemandeur', $row->fk_idDemandeur),
	        );
            $data['title'] ='modifier realisation';
            $this->load->view('_inc/header',$data);
            $this->load->view('modif_realisation');
            $this->load->view('_inc/footer');
        } else {
            $this->session->set_flashdata('message', '<p style="color:orange;"><i class="material-icons">cancel</i> Record Not Found</p>');
            redirect('uprofile');
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idRealisation', TRUE));
        } else {
            $data = array(
                'nomRealisation' => $this->input->post('nomRealisation',TRUE),
                'dateRealisation' => $this->input->post('dateRealisation',TRUE),
                'lienRealisation' => $this->input->post('lienRealisation',TRUE),
                'descriptionRealisation' => $this->input->post('descriptionRealisation',TRUE),
                'fk_idDemandeur' => $this->session->user->idDemandeur,
            );

            $this->realisation_model->update($this->input->post('idRealisation', TRUE), $data);
            $this->session->set_flashdata('message', '<p style="color:green;">Update Record Success</p?>');
            redirect('uprofile');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomRealisation', 'nomrealisation', 'trim|required');
	$this->form_validation->set_rules('dateRealisation', 'daterealisation', 'trim|required');
	$this->form_validation->set_rules('lienRealisation', 'lienrealisation', 'trim|required');
	$this->form_validation->set_rules('descriptionRealisation', 'descriptionrealisation', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger" style="color:red;">', '</span>');
    }

}