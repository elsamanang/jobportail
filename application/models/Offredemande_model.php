<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offredemande_model extends CI_Model
{

    public $table = 'offredemande';
    public $id = 'idoffredemande';
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
    function get_by_id_ent($id)
    {
        $this->db->where('offre.fk_idEmployeur', $id);
        $this->db->join('offre', 'offre.idOffre = offredemande.fk_idoffre');
        $this->db->join('demandeur', 'demandeur.idDemandeur = offredemande.fk_idDemandeur');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idoffredemande', $q);
	$this->db->or_like('fk_idOffre', $q);
	$this->db->or_like('fk_idDemandeur', $q);
	$this->db->or_like('dateSoumission', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idoffredemande', $q);
	$this->db->or_like('fk_idOffre', $q);
	$this->db->or_like('fk_idDemandeur', $q);
	$this->db->or_like('dateSoumission', $q);
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