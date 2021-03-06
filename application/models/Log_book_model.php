<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_book_model extends CI_Model
{

    public $table = 'log_book';
    public $id = 'id_log_book';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_log_book,penjadwalan,mahasiswa,keterangan,kondisi');
        $this->datatables->from('log_book');
        //add this line for join
        //$this->datatables->join('table2', 'log_book.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('log_book/read/$1'),'Read')." | ".anchor(site_url('log_book/update/$1'),'Update')." | ".anchor(site_url('log_book/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_log_book');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_log_book', $q);
	$this->db->or_like('penjadwalan', $q);
	$this->db->or_like('mahasiswa', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('kondisi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_log_book', $q);
	$this->db->or_like('penjadwalan', $q);
	$this->db->or_like('mahasiswa', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('kondisi', $q);
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

/* End of file Log_book_model.php */
/* Location: ./application/models/Log_book_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */