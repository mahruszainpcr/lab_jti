<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjadwalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Penjadwalan_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('penjadwalan/penjadwalan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Penjadwalan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Penjadwalan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penjadwalan' => $row->id_penjadwalan,
		'nama_matakuliah' => $row->nama_matakuliah,
		'hari' => $row->hari,
		'jam_mulai' => $row->jam_mulai,
		'jam_selesai' => $row->jam_selesai,
		'dosen' => $row->dosen,
		'ail' => $row->ail,
		'kelas' => $row->kelas,
	    );
            $this->load->view('penjadwalan/penjadwalan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjadwalan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjadwalan/create_action'),
	    'id_penjadwalan' => set_value('id_penjadwalan'),
	    'nama_matakuliah' => set_value('nama_matakuliah'),
	    'hari' => set_value('hari'),
	    'jam_mulai' => set_value('jam_mulai'),
	    'jam_selesai' => set_value('jam_selesai'),
	    'dosen' => set_value('dosen'),
	    'ail' => set_value('ail'),
	    'kelas' => set_value('kelas'),
	);
        $this->load->view('penjadwalan/penjadwalan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_matakuliah' => $this->input->post('nama_matakuliah',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
		'dosen' => $this->input->post('dosen',TRUE),
		'ail' => $this->input->post('ail',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
	    );

            $this->Penjadwalan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penjadwalan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjadwalan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjadwalan/update_action'),
		'id_penjadwalan' => set_value('id_penjadwalan', $row->id_penjadwalan),
		'nama_matakuliah' => set_value('nama_matakuliah', $row->nama_matakuliah),
		'hari' => set_value('hari', $row->hari),
		'jam_mulai' => set_value('jam_mulai', $row->jam_mulai),
		'jam_selesai' => set_value('jam_selesai', $row->jam_selesai),
		'dosen' => set_value('dosen', $row->dosen),
		'ail' => set_value('ail', $row->ail),
		'kelas' => set_value('kelas', $row->kelas),
	    );
            $this->load->view('penjadwalan/penjadwalan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjadwalan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penjadwalan', TRUE));
        } else {
            $data = array(
		'nama_matakuliah' => $this->input->post('nama_matakuliah',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
		'dosen' => $this->input->post('dosen',TRUE),
		'ail' => $this->input->post('ail',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
	    );

            $this->Penjadwalan_model->update($this->input->post('id_penjadwalan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjadwalan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjadwalan_model->get_by_id($id);

        if ($row) {
            $this->Penjadwalan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjadwalan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjadwalan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_matakuliah', 'nama matakuliah', 'trim|required');
	$this->form_validation->set_rules('hari', 'hari', 'trim|required');
	$this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
	$this->form_validation->set_rules('jam_selesai', 'jam selesai', 'trim|required');
	$this->form_validation->set_rules('dosen', 'dosen', 'trim|required');
	$this->form_validation->set_rules('ail', 'ail', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');

	$this->form_validation->set_rules('id_penjadwalan', 'id_penjadwalan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penjadwalan.php */
/* Location: ./application/controllers/Penjadwalan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */