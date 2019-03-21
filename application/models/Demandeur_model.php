<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demandeur_model extends CI_Model
{

    public $table = 'demandeur';
    public $id = 'idDemandeur';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    // get data by id
    function get_by_email($email)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('emailDemandeur',$email);
        return $this->db->get($this->table)->row();
    }
    // get data by pseudo
    function get_by_pseudo($pseudo)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('pseudo',$pseudo);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idDemandeur', $q);
	$this->db->or_like('nomDemandeur', $q);
	$this->db->or_like('prenomDemandeur', $q);
	$this->db->or_like('titre', $q);
	$this->db->or_like('adresseDemandeur', $q);
	$this->db->or_like('emailDemandeur', $q);
	$this->db->or_like('telephoneDemandeur', $q);
	$this->db->or_like('genre', $q);
	$this->db->or_like('dateNaissance', $q);
	$this->db->or_like('nationalite', $q);
	$this->db->or_like('etatCivil', $q);
	$this->db->or_like('imageProfile', $q);
	$this->db->or_like('pseudo', $q);
	$this->db->or_like('pwd', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idDemandeur', $q);
	$this->db->or_like('nomDemandeur', $q);
	$this->db->or_like('prenomDemandeur', $q);
	$this->db->or_like('titre', $q);
	$this->db->or_like('adresseDemandeur', $q);
	$this->db->or_like('emailDemandeur', $q);
	$this->db->or_like('telephoneDemandeur', $q);
	$this->db->or_like('genre', $q);
	$this->db->or_like('dateNaissance', $q);
	$this->db->or_like('nationalite', $q);
	$this->db->or_like('etatCivil', $q);
	$this->db->or_like('imageProfile', $q);
	$this->db->or_like('pseudo', $q);
	$this->db->or_like('pwd', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}