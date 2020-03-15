<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// reference the Dompdf namespace
use Dompdf\Dompdf;
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_lab_model');
        $this->load->model('Dosen_model');
    }
	
    public function index()
    {
        require_once 'vendor/autoload.php';
        $gClient = new Google_Client();
        $gClient->setApplicationName('Sistem Infromasi Laboratorum JTI');
        $gClient->setClientId('848317518195-rs9k85m072lifq9e13bg5eccn2ui1n3p.apps.googleusercontent.com');
        $gClient->setClientSecret('BjxYgMdcAwxX0aQvXnZMNfGz');
        $gClient->setRedirectUri('http://localhost:8888/labjti/app');
        $gClient->addScope(array(
            "https://www.googleapis.com/auth/plus.login",
            "https://www.googleapis.com/auth/userinfo.email",
            "https://www.googleapis.com/auth/userinfo.profile",
            "https://www.googleapis.com/auth/plus.me",
        ));

        $google_oauthV2 = new Google_Service_Oauth2($gClient);
// var_dump($google_oauthV2);
        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            // print_r( $gClient->getAccessToken());
            $gpUserProfile = $google_oauthV2->userinfo->get();
            $this->session->set_userdata('logined', true);
            $this->session->set_userdata('name', $gpUserProfile['name']);
            $this->session->set_userdata('hd', $gpUserProfile['hd']);
            $this->session->set_userdata('email', $gpUserProfile['email']);
            $this->session->set_userdata('picture', $gpUserProfile['picture']);
            $this->session->set_userdata('token', $gClient->getAccessToken());
            // print_r($gpUserProfile);
            // print_r($this->session->userdata)
            if ($gpUserProfile['hd'] == "mahasiswa.pcr.ac.id") {
                $dataDosen = $this->Dosen_model->get_by_email($gpUserProfile['email']);
                if (empty($dataDosen)) {
                    $data = array(
                        'nama_dosen' => $gpUserProfile['name'],
                        'inisial' => '',
                        'email' => $gpUserProfile['email'],
                        'jabatan' => 'Mahasiswa',
                    );
                    $this->Dosen_model->insert($data);
                    $this->session->set_userdata('status', 'mahasiswa');
                    redirect("home");
                } else {
                    if ($dataDosen->jabatan == "Mahasiswa") {
                        $this->session->set_userdata('status', 'mahasiswa');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kalab") {
                        $this->session->set_userdata('status', 'kalab');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kajur") {
                        $this->session->set_userdata('status', 'kajur');
                        redirect("home");
                    } else {
                        $this->session->set_userdata('status', 'dosen');
                        redirect("home");
                    }
                }
            } else if ($gpUserProfile['hd'] == "alumni.pcr.ac.id") {
                $dataDosen = $this->Dosen_model->get_by_email($gpUserProfile['email']);
                if (empty($dataDosen)) {
                    $data = array(
                        'nama_dosen' => $gpUserProfile['name'],
                        'inisial' => '',
                        'email' => $gpUserProfile['email'],
                        'jabatan' => 'Mahasiswa',
                    );
                    $this->Dosen_model->insert($data);
                    $this->session->set_userdata('status', 'mahasiswa');
                    redirect("home");
                } else {
                    if ($dataDosen->jabatan == "Mahasiswa") {
                        $this->session->set_userdata('status', 'mahasiswa');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kalab") {
                        $this->session->set_userdata('status', 'kalab');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kajur") {
                        $this->session->set_userdata('status', 'kajur');
                        redirect("home");
                    } else {
                        $this->session->set_userdata('status', 'dosen');
                        redirect("home");
                    }
                }
            } else if ($gpUserProfile['hd'] == "pcr.ac.id") {
                $dataDosen = $this->Dosen_model->get_by_email($gpUserProfile['email']);
                if (empty($dataDosen)) {
                    $data = array(
                        'nama_dosen' => $gpUserProfile['name'],
                        'inisial' => '',
                        'email' => $gpUserProfile['email'],
                        'jabatan' => 'Dosen',
                    );
                    $this->Dosen_model->insert($data);
                } else {
                    if ($dataDosen->jabatan == "AIL") {
                        $this->session->set_userdata('status', 'ail');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kalab") {
                        $this->session->set_userdata('status', 'kalab');
                        redirect("home");
                    } else if ($dataDosen->jabatan == "Kajur") {
                        $this->session->set_userdata('status', 'kajur');
                        redirect("home");
                    } else {
                        $this->session->set_userdata('status', 'dosen');
                        redirect("home");
                    }
                }
            } else {
                redirect("/login/logout");
            }
        } else {
            // Get login url
            $authUrl = $gClient->createAuthUrl();
			$data['authUrl'] = $authUrl;
			$data['data_peminjaman']=$this->Peminjaman_lab_model->peminjaman_aktif();
            $this->load->view('login', $data);
        }

    }
    

    public function logout()
    {
        require_once 'vendor/autoload.php';
        $gClient = new Google_Client();
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('hd');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('picture');
        $this->session->unset_userdata('logined');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('status');
        $gClient->revokeToken();
        redirect("/");
    }
    public function tes()
    {
        
        
    }
}

/* End of file Workflows.php */
/* Location: ./application/controllers/Workflows.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 00:43:10 */
/* http://harviacode.com */
