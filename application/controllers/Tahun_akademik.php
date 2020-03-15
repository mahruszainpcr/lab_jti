<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Tahun_akademik_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tahun_akademik/tahun_akademik_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tahun_akademik_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tahun_akademik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tahun_akademik' => $row->id_tahun_akademik,
		'nama_tahun_akademin' => $row->nama_tahun_akademin,
	    );
            $this->load->view('tahun_akademik/tahun_akademik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_akademik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tahun_akademik/create_action'),
	    'id_tahun_akademik' => set_value('id_tahun_akademik'),
	    'nama_tahun_akademin' => set_value('nama_tahun_akademin'),
	);
        $this->load->view('tahun_akademik/tahun_akademik_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_tahun_akademin' => $this->input->post('nama_tahun_akademin',TRUE),
	    );

            $this->Tahun_akademik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tahun_akademik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tahun_akademik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tahun_akademik/update_action'),
		'id_tahun_akademik' => set_value('id_tahun_akademik', $row->id_tahun_akademik),
		'nama_tahun_akademin' => set_value('nama_tahun_akademin', $row->nama_tahun_akademin),
	    );
            $this->load->view('tahun_akademik/tahun_akademik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_akademik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tahun_akademik', TRUE));
        } else {
            $data = array(
		'nama_tahun_akademin' => $this->input->post('nama_tahun_akademin',TRUE),
	    );

            $this->Tahun_akademik_model->update($this->input->post('id_tahun_akademik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tahun_akademik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tahun_akademik_model->get_by_id($id);

        if ($row) {
            $this->Tahun_akademik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tahun_akademik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_akademik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_tahun_akademin', 'nama tahun akademin', 'trim|required');

	$this->form_validation->set_rules('id_tahun_akademik', 'id_tahun_akademik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tahun_akademik.php */
/* Location: ./application/controllers/Tahun_akademik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */