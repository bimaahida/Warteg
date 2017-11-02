<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parameter_model extends CI_Model
{

    public $table = 'parameter';
    public $id = 'id';
    public $id_jenis = 'id_jenis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('parameter.id,jenis_parameter.parameter as jenis,parameter.parameter');
        $this->datatables->from('parameter');
        //add this line for join
        $this->datatables->join('jenis_parameter', 'parameter.id_jenis = jenis_parameter.id');
        $this->datatables->add_column('action', anchor(site_url('parameter/update/$1'),'Update')." | ".anchor(site_url('parameter/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
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
    // get data by id jenis parameter
    function get_by_id_jenis($id)
    {
        $this->db->where($this->id_jenis, $id);
        return $this->db->get($this->table)->result();
    }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_jenis', $q);
	$this->db->or_like('parameter', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_jenis', $q);
	$this->db->or_like('parameter', $q);
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

/* End of file Parameter_model.php */
/* Location: ./application/models/Parameter_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-20 03:05:47 */
/* http://harviacode.com */