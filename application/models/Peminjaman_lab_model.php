<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman_lab_model extends CI_Model
{

    public $table = 'peminjaman_lab';
    public $id = 'id_peminjaman_lab';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $status=$this->session->userdata('status');
        if ($status=="ail") {
            $emailDosen=$this->session->userdata('email');
            $idDosen=$this->db->query("select id_dosen from dosen where email='".$emailDosen."'")->row();
            $this->datatables->select('id_peminjaman_lab,level,lab.nama_lab as id_lab,tanggal_peminjaman,tanggal_mulai,tanggal_akhir,keperluan,daftar_nama,keterangan,ketua_kegiatan,nim_ketua,id_prodi,kontak_ketua,created_at,updated_at,status');
            $this->datatables->from('peminjaman_lab');
            //add this line for join
            $this->datatables->join('dosen', 'peminjaman_lab.id_peminjam = dosen.id_dosen');
            $this->datatables->join('lab', 'peminjaman_lab.id_lab = lab.id_lab');
            $this->datatables->where('lab.pjs',$idDosen->id_dosen);
            $this->datatables->add_column('action', anchor(site_url('peminjaman_lab/read/$1'),'Read')." | ".anchor(site_url('peminjaman_lab/update_status/$1/Approve'),'Update')." | ".anchor(site_url('peminjaman_lab/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_peminjaman_lab');
            return $this->datatables->generate();
        }else if($status=="kalab"){
            $emailDosen=$this->session->userdata('email');
            $idDosen=$this->db->query("select id_dosen from dosen where email='".$emailDosen."'")->row();
            $this->datatables->select('id_peminjaman_lab,level,lab.nama_lab as id_lab,tanggal_peminjaman,tanggal_mulai,tanggal_akhir,keperluan,daftar_nama,keterangan,ketua_kegiatan,nim_ketua,id_prodi,kontak_ketua,created_at,updated_at,status');
            $this->datatables->from('peminjaman_lab');
            //add this line for join
            $this->datatables->join('dosen', 'peminjaman_lab.id_peminjam = dosen.id_dosen');
            $this->datatables->join('lab', 'peminjaman_lab.id_lab = lab.id_lab');
            $this->datatables->where('peminjaman_lab.status','Approve');
            $this->datatables->where('lab.kalab',$idDosen->id_dosen);
            $this->datatables->add_column('action', anchor(site_url('peminjaman_lab/read/$1'),'Read')." | ".anchor(site_url('peminjaman_lab/update_status/$1/Selesai'),'Update')." | ".anchor(site_url('peminjaman_lab/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_peminjaman_lab');
            return $this->datatables->generate();
        }else if ($status=="mahasiswa") {
            $this->datatables->select('id_peminjaman_lab,level,lab.nama_lab as id_lab,tanggal_peminjaman,tanggal_mulai,tanggal_akhir,keperluan,daftar_nama,keterangan,ketua_kegiatan,nim_ketua,id_prodi,kontak_ketua,created_at,updated_at,status');
            $this->datatables->from('peminjaman_lab');
            //add this line for join
            $this->datatables->join('dosen', 'peminjaman_lab.id_peminjam = dosen.id_dosen');
            $this->datatables->join('lab', 'peminjaman_lab.id_lab = lab.id_lab');
            $this->datatables->where('dosen.email',$this->session->userdata('email'));
            $this->datatables->add_column('action', anchor(site_url('peminjaman_lab/read/$1'),'Read')." | ".anchor(site_url('peminjaman_lab/update/$1'),'Update')." | ".anchor(site_url('peminjaman_lab/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_peminjaman_lab');
            return $this->datatables->generate();
        }
    }

    function peminjaman_aktif(){
        $this->db->select('id_peminjaman_lab,level,lab.nama_lab as id_lab,tanggal_peminjaman,tanggal_mulai,tanggal_akhir,keperluan,daftar_nama,keterangan,ketua_kegiatan,nim_ketua,id_prodi,kontak_ketua,created_at,updated_at,status');
            //add this line for join
            $this->db->join('dosen', 'peminjaman_lab.id_peminjam = dosen.id_dosen');
            $this->db->join('lab', 'peminjaman_lab.id_lab = lab.id_lab');
            $this->db->where('peminjaman_lab.status','Selesai');
            return $this->db->get($this->table)->result();
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
        $this->db->like('id_peminjaman_lab', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('id_lab', $q);
	$this->db->or_like('tanggal_peminjaman', $q);
	$this->db->or_like('tanggal_mulai', $q);
	$this->db->or_like('tanggal_akhir', $q);
	$this->db->or_like('keperluan', $q);
	$this->db->or_like('daftar_nama', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('ketua_kegiatan', $q);
	$this->db->or_like('nim_ketua', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('kontak_ketua', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_peminjaman_lab', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('id_lab', $q);
	$this->db->or_like('tanggal_peminjaman', $q);
	$this->db->or_like('tanggal_mulai', $q);
	$this->db->or_like('tanggal_akhir', $q);
	$this->db->or_like('keperluan', $q);
	$this->db->or_like('daftar_nama', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('ketua_kegiatan', $q);
	$this->db->or_like('nim_ketua', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('kontak_ketua', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('status', $q);
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
    // update status
    function update_status($id, $status)
    {
        $data = array('status' => $status );
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

/* End of file Peminjaman_lab_model.php */
/* Location: ./application/models/Peminjaman_lab_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */