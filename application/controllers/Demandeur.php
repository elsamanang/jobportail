<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demandeur extends CI_Controller
{
    public function __construct(){
        parent::__construct();
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
        $data['title']= "Liste des Demandeur";
        $this->load->view('list_demandeur', $data);
    }

    public function create(){
        $data['title'] = "Ajout Demandeur";
        $this->load->view('ajout_demandeur', $data);
    }
    public function create_action(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $pwd = $this->input->post('pwd');
            $pwdconf = $this->input->post('pwdconf');
            if ($pwd == $pwdconf){
                $data = array(
                    'nomDemandeur' => $this->input->post('nomDemandeur',TRUE),
                    'prenomDemandeur' => $this->input->post('prenomDemandeur',TRUE),
                    'titre' => $this->input->post('titre',TRUE),
                    'adresseDemandeur' => $this->input->post('adresseDemandeur',TRUE),
                    'emailDemandeur' => $this->input->post('emailDemandeur',TRUE),
                    'telephoneDemandeur' => $this->input->post('telephoneDemandeur',TRUE),
                    'genre' => $this->input->post('genre',TRUE),
                    'dateNaissance' => $this->input->post('dateNaissance',TRUE),
                    'nationalite' => $this->input->post('nationalite',TRUE),
                    'etatCivil' => $this->input->post('etatCivil',TRUE),
                    'imageProfile' => $this->input->post('imageProfile',TRUE),
                    'pseudo' => $this->input->post('pseudo',TRUE),
                    'pwd' => sha1($this->input->post('pwd',TRUE))
                );
                try{
                    $this->demandeur_model->insert($data);
                    $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                    redirect(site_url('demandeur/create'));
                }catch (Exception $e){
                    $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                    redirect(site_url('demandeur/create'));
                }
                
            }else{
                $this->session->set_flashdata('message', '<p style="color:red;">Password not much</p>');
                redirect(site_url('demandeur/create'));
            }  
        } 
    }

    public function _rules() {
        $this->form_validation->set_rules('nomDemandeur', 'nomdemandeur', 'trim|required');
        $this->form_validation->set_rules('prenomDemandeur', 'prenomdemandeur', 'trim|required');
        $this->form_validation->set_rules('titre', 'titre', 'trim|required');
        $this->form_validation->set_rules('adresseDemandeur', 'adressedemandeur', 'trim|required');
        $this->form_validation->set_rules('emailDemandeur', 'emaildemandeur', 'trim|required');
        $this->form_validation->set_rules('telephoneDemandeur', 'telephonedemandeur', 'trim|required');
        $this->form_validation->set_rules('genre', 'genre', 'trim|required');
        $this->form_validation->set_rules('dateNaissance', 'datenaissance', 'trim|required');
        $this->form_validation->set_rules('nationalite', 'nationalite', 'trim|required');
        $this->form_validation->set_rules('etatCivil', 'etatcivil', 'trim|required');
        $this->form_validation->set_rules('imageProfile', 'imageprofile', 'trim');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required');
        $this->form_validation->set_rules('pwdconf', 'pwdConfirmation', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}