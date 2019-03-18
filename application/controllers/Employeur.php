<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employeur extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employeur/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employeur/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employeur/index.php';
            $config['first_url'] = base_url() . 'employeur/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->employeur_model->total_rows($q);
        $employeur = $this->employeur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'employeur_data' => $employeur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title']= "Liste des Employeurs";
        $this->load->view('list_employeur', $data);
    }

    public function create(){
        $data['title'] = "Ajout Employeur";
        $this->load->view('ajout_employeur', $data);
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
                    'nomEmployeur' => $this->input->post('nomEmployeur',TRUE),
                    'adresseEmployeur' => $this->input->post('adresseEmployeur',TRUE),
                    'emailEmployeur' => $this->input->post('emailEmployeur',TRUE),
                    'telephoneEmployeur' => $this->input->post('telephoneEmployeur',TRUE),
                    'siteEmployeur' => $this->input->post('siteEmployeur',TRUE),
                    'codePostal' => $this->input->post('codePostal',TRUE),
                    'fax' => $this->input->post('fax',TRUE),
                    'logo' => $this->input->post('imageProfile',TRUE),
                    'pseudo' => $this->input->post('pseudo',TRUE),
                    'pwd' => sha1($this->input->post('pwd',TRUE))
                );
                try{
                    $this->employeur_model->insert($data);
                    $this->session->set_flashdata('message', '<p style="color:green;">Create Record Success</p?>');
                    redirect(site_url('employeur/create'));
                }catch (Exception $e){
                    $this->session->set_flashdata('message', '<p style="color:red;">Create Record Failed >>'.$e.'</p>');
                    redirect(site_url('employeur/create'));
                }
                
            }else{
                $this->session->set_flashdata('message', '<p style="color:red;">Password not much</p>');
                redirect(site_url('employeur/create'));
            }  
        } 
    }

    public function _rules() {
        $this->form_validation->set_rules('nomEmployeur', 'nomemployeur', 'trim|required');
        $this->form_validation->set_rules('adresseEmployeur', 'adresseemployeur', 'trim|required');
        $this->form_validation->set_rules('emailEmployeur', 'emailemployeur', 'trim|required');
        $this->form_validation->set_rules('telephoneEmployeur', 'telephoneemployeur', 'trim|required');
        $this->form_validation->set_rules('siteEmployeur', 'siteemployeur', 'trim');
        $this->form_validation->set_rules('codePostal', 'codepostal', 'trim');
        $this->form_validation->set_rules('fax', 'fax', 'trim');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim');
        $this->form_validation->set_rules('pwd', 'pwd', 'trim|required');
        $this->form_validation->set_rules('pwdconf', 'pwdConfirmation', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}