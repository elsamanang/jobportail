<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formation_model extends CI_Model
{

    public $table = 'formation';
    public $id = 'idFormation';
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
    // get data by idUser
    function get_by_id_user($id)
    {
        $this->db->where('fk_idDemandeur', $id);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idFormation', $q);
	$this->db->or_like('nomFormation', $q);
	$this->db->or_like('nomInstitution', $q);
	$this->db->or_like('dateDebutFormation', $q);
	$this->db->or_like('dateFinFormation', $q);
	$this->db->or_like('diplomeFormation', $q);
	$this->db->or_like('resultatFormation', $q);
	$this->db->or_like('descriptionFormation', $q);
	$this->db->or_like('fk_idDemandeur', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idFormation', $q);
	$this->db->or_like('nomFormation', $q);
	$this->db->or_like('nomInstitution', $q);
	$this->db->or_like('dateDebutFormation', $q);
	$this->db->or_like('dateFinFormation', $q);
	$this->db->or_like('diplomeFormation', $q);
	$this->db->or_like('resultatFormation', $q);
	$this->db->or_like('descriptionFormation', $q);
	$this->db->or_like('fk_idDemandeur', $q);
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