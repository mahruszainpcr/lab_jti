<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Dosen_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('dosen/dosen_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Dosen_model->json();
    }

    public function read($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dosen' => $row->id_dosen,
		'nama_dosen' => $row->nama_dosen,
		'inisial' => $row->inisial,
		'email' => $row->email,
		'jabatan' => $row->jabatan,
	    );
            $this->load->view('dosen/dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
	    'id_dosen' => set_value('id_dosen'),
	    'nama_dosen' => set_value('nama_dosen'),
	    'inisial' => set_value('inisial'),
	    'email' => set_value('email'),
	    'jabatan' => set_value('jabatan'),
	);
        $this->load->view('dosen/dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'inisial' => $this->input->post('inisial',TRUE),
		'email' => $this->input->post('email',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'nama_dosen' => set_value('nama_dosen', $row->nama_dosen),
		'inisial' => set_value('inisial', $row->inisial),
		'email' => set_value('email', $row->email),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
            $this->load->view('dosen/dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen', TRUE));
        } else {
            $data = array(
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'inisial' => $this->input->post('inisial',TRUE),
		'email' => $this->input->post('email',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Dosen_model->update($this->input->post('id_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $this->Dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');
	$this->form_validation->set_rules('inisial', 'inisial', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id_dosen', 'id_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */