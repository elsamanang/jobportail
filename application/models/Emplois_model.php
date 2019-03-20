<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emplois_model extends CI_Model
{

    public $table = 'emplois';
    public $id = 'idEmplois';
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
        $this->db->like('idEmplois', $q);
	$this->db->or_like('fk_idDemandeur', $q);
	$this->db->or_like('nomEntreprise', $q);
	$this->db->or_like('posteEmplois', $q);
	$this->db->or_like('dateDebutEmplois', $q);
	$this->db->or_like('dateFinEmplois', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idEmplois', $q);
	$this->db->or_like('fk_idDemandeur', $q);
	$this->db->or_like('nomEntreprise', $q);
	$this->db->or_like('posteEmplois', $q);
	$this->db->or_like('dateDebutEmplois', $q);
	$this->db->or_like('dateFinEmplois', $q);
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