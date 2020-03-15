<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Dompdf\Dompdf;
class Peminjaman_lab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Peminjaman_lab_model');
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
        $this->load->view('peminjaman_lab/peminjaman_lab_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Peminjaman_lab_model->json();
    }

    public function read($id) 
    {
        $row = $this->Peminjaman_lab_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peminjaman_lab' => $row->id_peminjaman_lab,
		'level' => $row->level,
		'id_lab' => $row->id_lab,
		'tanggal_peminjaman' => $row->tanggal_peminjaman,
		'tanggal_mulai' => $row->tanggal_mulai,
		'tanggal_akhir' => $row->tanggal_akhir,
		'keperluan' => $row->keperluan,
		'daftar_nama' => $row->daftar_nama,
		'keterangan' => $row->keterangan,
		'ketua_kegiatan' => $row->ketua_kegiatan,
		'nim_ketua' => $row->nim_ketua,
		'id_prodi' => $row->id_prodi,
		'kontak_ketua' => $row->kontak_ketua,
		'created_at' => array('type' => 'timestamp'),
		'updated_at' => $row->updated_at,
		'status' => $row->status,
	    );
            $this->load->view('peminjaman_lab/peminjaman_lab_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman_lab'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peminjaman_lab/create_action'),
	    'id_peminjaman_lab' => set_value('id_peminjaman_lab'),
	    'level' => set_value('level'),
	    'id_lab' => set_value('id_lab'),
	    'tanggal_peminjaman' => set_value('tanggal_peminjaman'),
	    'tanggal_mulai' => set_value('tanggal_mulai'),
	    'tanggal_akhir' => set_value('tanggal_akhir'),
	    'keperluan' => set_value('keperluan'),
	    'daftar_nama' => set_value('daftar_nama'),
	    'keterangan' => set_value('keterangan'),
	    'ketua_kegiatan' => set_value('ketua_kegiatan'),
	    'nim_ketua' => set_value('nim_ketua'),
	    'id_prodi' => set_value('id_prodi'),
	    'kontak_ketua' => set_value('kontak_ketua'),
	    'status' => set_value('status'),
	);
        $this->load->view('peminjaman_lab/peminjaman_lab_form', $data);
    }
    
    public function create_action() 
    {
		// require('Email.php');
		// $emailLib=new Email();
		$email=$this->session->userdata('email');
		$dosen=$this->Dosen_model->get_by_email($email);
		$tanggal_mulai_akhir=explode(" sampai ",$_POST['tanggal_mulai_akhir']);
		$mulai=date("Y-m-d",strtotime($tanggal_mulai_akhir[0]));
		$akhir=date("Y-m-d",strtotime($tanggal_mulai_akhir[1]));
		$tglPinjam=date("Y-m-d",strtotime($this->input->post('tanggal_peminjaman',TRUE)));
		
            $data = array(
		'level' => $this->input->post('level',TRUE),
		'id_lab' => $this->input->post('id_lab',TRUE),
		'tanggal_peminjaman' => $tglPinjam,
		'tanggal_mulai' => $mulai,
		'tanggal_akhir' => $akhir,
		'keperluan' => $this->input->post('keperluan',TRUE),
		'daftar_nama' => $this->input->post('daftar_nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'ketua_kegiatan' => $this->input->post('ketua_kegiatan',TRUE),
		'nim_ketua' => $this->input->post('nim_ketua',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'kontak_ketua' => $this->input->post('kontak_ketua',TRUE),
		'status' => 'Request',
		'jam_mulai'=> $this->input->post('jam_mulai',TRUE),
		'jam_akhir'=> $this->input->post('jam_akhir',TRUE),
		'id_peminjam'=> $dosen->id_dosen
		);
			$this->Peminjaman_lab_model->insert($data);
			$id_peminjaman=$this->db->query("select max(id_peminjaman_lab) as id_peminjaman_lab FROM peminjaman_lab")->row();
			$id_peminjaman->id_peminjaman_lab;
			$this->kirim_email_request($id_peminjaman->id_peminjaman_lab);
			$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peminjaman_lab'));
    
    }
    
    public function update($id) 
    {
        $row = $this->Peminjaman_lab_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peminjaman_lab/update_action'),
		'id_peminjaman_lab' => set_value('id_peminjaman_lab', $row->id_peminjaman_lab),
		'level' => set_value('level', $row->level),
		'id_lab' => set_value('id_lab', $row->id_lab),
		'tanggal_peminjaman' => set_value('tanggal_peminjaman', $row->tanggal_peminjaman),
		'tanggal_mulai' => set_value('tanggal_mulai', date("d/m/Y",strtotime($row->tanggal_mulai))),
		'tanggal_akhir' => set_value('tanggal_akhir', date("d/m/Y",strtotime($row->tanggal_akhir))),
		'keperluan' => set_value('keperluan', $row->keperluan),
		'daftar_nama' => set_value('daftar_nama', $row->daftar_nama),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'ketua_kegiatan' => set_value('ketua_kegiatan', $row->ketua_kegiatan),
		'nim_ketua' => set_value('nim_ketua', $row->nim_ketua),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'kontak_ketua' => set_value('kontak_ketua', $row->kontak_ketua),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('peminjaman_lab/peminjaman_lab_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman_lab'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		date_default_timezone_set('Asia/Jakarta'); 
		$email=$this->session->userdata('email');
		$dosen=$this->Dosen_model->get_by_email($email);
		$tanggal_mulai_akhir=explode(" sampai ",$_POST['tanggal_mulai_akhir']);
		$mulai=date("Y-m-d",strtotime(str_replace("/","-",$tanggal_mulai_akhir[0])));
		$akhir=date("Y-m-d",strtotime(str_replace("/","-",$tanggal_mulai_akhir[1])));
		$tglPinjam=date("Y-m-d",strtotime(str_replace("/","-",$this->input->post('tanggal_peminjaman',TRUE))));
            $data = array(
		'level' => $this->input->post('level',TRUE),
		'id_lab' => $this->input->post('id_lab',TRUE),
		'tanggal_peminjaman' => $tglPinjam,
		'tanggal_mulai' => $mulai,
		'tanggal_akhir' => $akhir,
		'keperluan' => $this->input->post('keperluan',TRUE),
		'daftar_nama' => $this->input->post('daftar_nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'ketua_kegiatan' => $this->input->post('ketua_kegiatan',TRUE),
		'nim_ketua' => $this->input->post('nim_ketua',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'kontak_ketua' => $this->input->post('kontak_ketua',TRUE),
		'status' => 'Request',
		'jam_mulai'=> $this->input->post('jam_mulai',TRUE),
		'jam_akhir'=> $this->input->post('jam_akhir',TRUE),
		'updated_at' => date('Y-m-d H:i:s'),
		'id_peminjam'=> $dosen->id_dosen
		);
           

            $this->Peminjaman_lab_model->update($this->input->post('id_peminjaman_lab', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peminjaman_lab'));
    
	}
	
	function update_status($id,$status){
		$data = array(
			'status' => $status,
			);
		$this->Peminjaman_lab_model->update_status($id, $status);
			$this->session->set_flashdata('message', 'Update Record Success');
			if($status=="Approve"){
				$this->kirim_email_approve($id);
			}else if($status=="Selesai"){
				$this->kirim_email_selesai($id);
			}
            redirect(site_url('peminjaman_lab'));
   
	}
    
    public function delete($id) 
    {
        $row = $this->Peminjaman_lab_model->get_by_id($id);

        if ($row) {
            $this->Peminjaman_lab_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peminjaman_lab'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman_lab'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('id_lab', 'id lab', 'trim|required');
	$this->form_validation->set_rules('tanggal_peminjaman', 'tanggal peminjaman', 'trim|required');
	$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
	$this->form_validation->set_rules('tanggal_akhir', 'tanggal akhir', 'trim|required');
	$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
	$this->form_validation->set_rules('daftar_nama', 'daftar nama', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('ketua_kegiatan', 'ketua kegiatan', 'trim|required');
	$this->form_validation->set_rules('nim_ketua', 'nim ketua', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('kontak_ketua', 'kontak ketua', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_peminjaman_lab', 'id_peminjaman_lab', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	public function kirim_email_request($id_peminjaman="")
    {
        date_default_timezone_set('Asia/Jakarta');
        $data=$this->db->query('select * from vw_peminjaman_fix where id_peminjaman_lab='.$id_peminjaman)->row();
        require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "lab-jti@pcr.ac.id";
        $mail->Password = "labjtipcr2020";
        $mail->setFrom('lab-jti@pcr.ac.id', 'Sistem Informasi Lab JTI(Si-JuTekIn)');
        $mail->addAddress($data->email, 'Asisten Instruktur Laboratorium');
        $mail->Subject = 'Pengajuan Peminjaman '.$data->nama_lab.' - Sistem Informasi Laboratorium JTI ['.date('d-m-Y h:m:s').']';
		$mail->msgHTML('<!doctype html>
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		
		<head>
		  <title> </title>
		  <!--[if !mso]><!-- -->
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <!--<![endif]-->
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <style type="text/css">
			#outlook a {
			  padding: 0;
			}
		
			body {
			  margin: 0;
			  padding: 0;
			  -webkit-text-size-adjust: 100%;
			  -ms-text-size-adjust: 100%;
			}
		
			table,
			td {
			  border-collapse: collapse;
			  mso-table-lspace: 0pt;
			  mso-table-rspace: 0pt;
			}
		
			img {
			  border: 0;
			  height: auto;
			  line-height: 100%;
			  outline: none;
			  text-decoration: none;
			  -ms-interpolation-mode: bicubic;
			}
		
			p {
			  display: block;
			  margin: 13px 0;
			}
		  </style>
		  <!--[if mso]>
				<xml>
				<o:OfficeDocumentSettings>
				  <o:AllowPNG/>
				  <o:PixelsPerInch>96</o:PixelsPerInch>
				</o:OfficeDocumentSettings>
				</xml>
				<![endif]-->
		  <!--[if lte mso 11]>
				<style type="text/css">
				  .mj-outlook-group-fix { width:100% !important; }
				</style>
				<![endif]-->
		  <!--[if !mso]><!-->
		  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
		  <style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
		  </style>
		  <!--<![endif]-->
		  <style type="text/css">
			@media only screen and (min-width:480px) {
			  .mj-column-per-30 {
				width: 30% !important;
				max-width: 30%;
			  }
			  .mj-column-per-100 {
				width: 100% !important;
				max-width: 100%;
			  }
			  .mj-column-per-33-333333333333336 {
				width: 33.333333333333336% !important;
				max-width: 33.333333333333336%;
			  }
			  .mj-column-per-50 {
				width: 50% !important;
				max-width: 50%;
			  }
			}
		  </style>
		  <style type="text/css">
			@media only screen and (max-width:480px) {
			  table.mj-full-width-mobile {
				width: 100% !important;
			  }
			  td.mj-full-width-mobile {
				width: auto !important;
			  }
			}
		  </style>
		</head>
		
		<body style="background-color:#ccd3e0;">
		  <div style="background-color:#ccd3e0;">
			<!--[if mso | IE]>
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-top:20px;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:180px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-30 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;">
							  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
								<tbody>
								  <tr>
									<td style="width:100px;"> <img alt="" height="auto" src="http://localhost:8888/labjti/app/assets/images/header_email.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
									  /> </td>
								  </tr>
								</tbody>
							  </table>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
					
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#356cc7;background-color:#356cc7;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#356cc7;background-color:#356cc7;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:18px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:center;color:#ABCDEA;">Dear Bapak/Ibu Asisten Instruktur Laboratorium
								<p style="font-size:16px; color:white">'.$data->nama_peminjam.'</p>
							  </div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#356cc7;background-color:#356cc7;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#356cc7;background-color:#356cc7;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
							  <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
							  <!--[if mso | IE]>
				<table
				   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
				>
				  <tr>
					<td style="height:0;line-height:0;">
					  &nbsp;
					</td>
				  </tr>
				</table>
			  <![endif]-->
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:28px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Mengajukan Peminjaman '.$data->nama_lab.'</span> <br/> <span style="font-size:15px">Untuk keperluan '.$data->keperluan.'</span> <br/> <br/> <span style="font-size:15px">Detail Informasi Peminjaman Sebagai Berikut</span></div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#568feb;background-color:#568feb;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#568feb;background-color:#568feb;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:15px;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:200px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-33-333333333333336 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-right:25px;padding-bottom:0px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;"><strong>Tanggal Pengajuan Peminajaman</strong></div>
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:10px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.date("d-m-Y",strtotime($data->tanggal_peminjaman)).'</div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
					<td
					   class="" style="vertical-align:top;width:200px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-33-333333333333336 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-right:25px;padding-bottom:0px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;"><strong>Tanggal Pemakaian Laboratorium</strong></div>
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:10px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.date("d-m-Y",strtotime($data->tanggal_mulai)).'</div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
					<td
					   class="" style="vertical-align:top;width:200px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-33-333333333333336 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-right:25px;padding-bottom:0px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;"><strong>Tanggal Akhir Pemakaian Laboratorium</strong></div>
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:10px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.date("d-m-Y",strtotime($data->tanggal_akhir)).'</div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#356CC7;background-color:#356CC7;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#356CC7;background-color:#356CC7;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-top:20px;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:300px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-50 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" vertical-align="middle" style="font-size:0px;padding:15px 30px;padding-right:25px;padding-bottom:10px;padding-left:25px;word-break:break-word;">
							  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
								<tr>
								  <td align="center" bgcolor="#3fc1c9" role="presentation" style="border:none;border-radius:10px;cursor:auto;mso-padding-alt:10px 25px;background:#3fc1c9;" valign="middle"> 
								  <a href="" style="display:inline-block;background:#3fc1c9;color:#FFFFFF;font-family:Helvetica;font-size:14px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:10px;" href="'.site_url('peminjaman_lab/update_status/'.$id_peminjaman.'/Approve').'"
									  target="_blank">
					  Terima
					</a> </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
					<td
					   class="" style="vertical-align:top;width:300px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-50 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" vertical-align="middle" style="font-size:0px;padding:15px 30px;padding-right:25px;padding-bottom:10px;padding-left:25px;word-break:break-word;">
							  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
								<tr>
								  <td align="center" bgcolor="#fc5185" role="presentation" style="border:none;border-radius:10px;cursor:auto;mso-padding-alt:10px 25px;background:#fc5185;" valign="middle"> <a href="" style="display:inline-block;background:#fc5185;color:#FFFFFF;font-family:Helvetica;font-size:14px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:10px;"
								  href="'.site_url('peminjaman_lab/update_status/'.$id_peminjaman.'/Tolak').'"
									  target="_blank">
					  Tolak
					</a> </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
					<td
					   class="" style="vertical-align:top;width:300px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-50 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" vertical-align="middle" style="font-size:0px;padding:15px 30px;padding-right:25px;padding-bottom:12px;padding-left:25px;word-break:break-word;">
							  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
								<tr>
								  <td align="center" bgcolor="#ffae00" role="presentation" style="border:none;border-radius:10px;cursor:auto;mso-padding-alt:10px 25px;background:#ffae00;" valign="middle"> <a href="" style="display:inline-block;background:#ffae00;color:#FFFFFF;font-family:Helvetica;font-size:14px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:10px;"
								href="'.site_url('home').'"	  
								  target="_blank">
					  Kunjungi Sistem
					</a> </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#356cc7;background-color:#356cc7;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#356cc7;background-color:#356cc7;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
							  <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
							  <!--[if mso | IE]>
				<table
				   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
				>
				  <tr>
					<td style="height:0;line-height:0;">
					  &nbsp;
					</td>
				  </tr>
				</table>
			  <![endif]-->
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:20px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;">Sistem Informasi Laboratorium JTI by MMZ <br/> <span style="font-size:15px">Politeknik Caltex Riau</span></div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  <![endif]-->
		  </div>
		</body>
		
		</html>');  
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
    public function kirim_email_approve($id_peminjaman="")
    {
		require_once 'vendor/autoload.php';
		date_default_timezone_set('Asia/Jakarta');
        $data=$this->db->query('select * from vw_peminjaman_fix where id_peminjaman_lab='.$id_peminjaman)->row();
		$dataPeminjaman=$this->db->query('select * from peminjaman_lab where id_peminjaman_lab='.$id_peminjaman)->row();
		$dompdf = new Dompdf();

        $dompdf->set_option('isRemoteEnabled', true);
		$dompdf->loadHtml('<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>Document</title>
			<style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 0.5cm;
                margin-left: 0.5cm;
                margin-right:0.5cm;
                margin-bottom: 0.5cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
        </style>
		</head>
		<body>
		<header>
			<img src="http://localhost:8888/labjti/app/assets/images/header_email.png" alt="" width="100%" height="100%" align="center" />
        </header>

        <footer>
            Copyright &copy; <?php echo date("Y");?> by MMZ labjti.pcr.ac.id
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
		<div class="pinjamlab-view"><br /> <!--  <h1>Peminjaman Lab - Politeknik Caltex Riau</h1> -->
		<h4 align="center">Peminjaman Laboratorium</h4>
		<p><!--    <a class="btn btn-primary" href="/pinjamlab/update?id=3854">Update</a><!--    <a class="btn btn-danger" href="/pinjamlab/delete?id=3854" data-confirm="Are you sure you want to delete this item?" data-method="post">Delete</a> --></p>
		<table class="table table-striped table-bordered detail-view">
		<tbody>
		<tr>
		<th style="width: 331px;text-align: left;">Keperluan Peminjaman/Level Peminjaman</th>
		<td style="width: 905px;">'.$dataPeminjaman->keperluan.'/'.$dataPeminjaman->level.'</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Tanggal Peminjaman</th>
		<td style="width: 905px;">'.date("d-m-Y",strtotime($dataPeminjaman->tanggal_peminjaman)).'</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Ruang Lab</th>
		<td style="width: 905px;">'.$data->nama_lab.'</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Tanggal Pemakaian Lab</th>
		<td style="width: 905px;">'.date("d-m-Y",strtotime($dataPeminjaman->tanggal_mulai)).' - '.date("d-m-Y",strtotime($dataPeminjaman->tanggal_akhir)).'</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Jam Peminjaman Lab</th>
		<td style="width: 905px;">'.$dataPeminjaman->jam_mulai.' - '.$dataPeminjaman->jam_akhir.'</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Daftar Nama</th>
		<td style="width: 905px;">
		'.$dataPeminjaman->daftar_nama.'
		</td>
		</tr>
		<tr>
		<th style="width: 331px;text-align: left;">Informasi Penanggung Jawab</th>
		<td style="width: 905px;">Nama :'.$dataPeminjaman->ketua_kegiatan.'<br>NIM/NIP:'.$dataPeminjaman->nim_ketua.'<br>No HP :'.$dataPeminjaman->kontak_ketua.'</td>
		</tr>
		</tbody>
		</table>
		<table style="width: 100%;">
		<tbody>
		<tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
		<td align="center">Pekanbaru, '.date('d-m-Y').' </td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td align="center">Ketua Kegiatan</td>
		<td align="center">Laboran</td>
		<td align="center">Kepala Laboratorium</td>
		</tr>
		<tr>
		<td align="center"><br /><br /><br /><br />('.$data->nama_peminjam.')</td>
		<td align="center"><br /><br /><br /><br />('.$data->nama_dosen.')</td>
		<td align="center"><br /><br /><br /><br />('.$data->nama_kalab.')</td>
		</tr>
		<tr>
		<td align="center">&nbsp;</td>
		<td align="center"><br /><br /> Mengetahui,</td>
		</tr>
		<tr>
		<td align="center">&nbsp;</td>
		</tr>
		<tr>
		<td align="center">Ketua Program Studi/Pembina</td>
		<td align="center">Ketua Jurusan</td>
		<td align="center">Pembantu Direktur I</td>
		</tr>
		<tr>
		<td align="center"><br /><br /><br /><br />(____________________)</td>
		<td align="center"><br /><br /><br /><br />(____________________)</td>
		<td align="center"><br /><br /><br /><br />(____________________)</td>
		</tr>
		</tbody>
		</table>
		</div>
        </main>
		
		</body>
		</html>');
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$pdfString = $dompdf->output();
		require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "lab-jti@pcr.ac.id";
        $mail->Password = "labjtipcr2020";
        $mail->setFrom('lab-jti@pcr.ac.id', 'Sistem Informasi Lab JTI(Si-JuTekIn)');
		$mail->addAddress($data->email_peminjam, $data->nama_peminjam);
		$mail->addStringAttachment($pdfString, 'Form Peminjaman Laboratorium - Sistem Informasi Laboratorium JTI.pdf');
        $mail->Subject = 'Persetujuan Pengajuan Peminjaman dari AIL '.$data->nama_lab.' - Sistem Informasi Laboratorium JTI ['.date('d-m-Y h:m:s').']';
		$mail->msgHTML('<!doctype html>
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		
		<head>
		  <title> </title>
		  <!--[if !mso]><!-- -->
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <!--<![endif]-->
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <style type="text/css">
			#outlook a {
			  padding: 0;
			}
		
			body {
			  margin: 0;
			  padding: 0;
			  -webkit-text-size-adjust: 100%;
			  -ms-text-size-adjust: 100%;
			}
		
			table,
			td {
			  border-collapse: collapse;
			  mso-table-lspace: 0pt;
			  mso-table-rspace: 0pt;
			}
		
			img {
			  border: 0;
			  height: auto;
			  line-height: 100%;
			  outline: none;
			  text-decoration: none;
			  -ms-interpolation-mode: bicubic;
			}
		
			p {
			  display: block;
			  margin: 13px 0;
			}
		  </style>
		  <!--[if mso]>
				<xml>
				<o:OfficeDocumentSettings>
				  <o:AllowPNG/>
				  <o:PixelsPerInch>96</o:PixelsPerInch>
				</o:OfficeDocumentSettings>
				</xml>
				<![endif]-->
		  <!--[if lte mso 11]>
				<style type="text/css">
				  .mj-outlook-group-fix { width:100% !important; }
				</style>
				<![endif]-->
		  <!--[if !mso]><!-->
		  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
		  <style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
		  </style>
		  <!--<![endif]-->
		  <style type="text/css">
			@media only screen and (min-width:480px) {
			  .mj-column-per-30 {
				width: 30% !important;
				max-width: 30%;
			  }
			  .mj-column-per-100 {
				width: 100% !important;
				max-width: 100%;
			  }
			}
		  </style>
		  <style type="text/css">
			@media only screen and (max-width:480px) {
			  table.mj-full-width-mobile {
				width: 100% !important;
			  }
			  td.mj-full-width-mobile {
				width: auto !important;
			  }
			}
		  </style>
		</head>
		
		<body style="background-color:#ccd3e0;">
		  <div style="background-color:#ccd3e0;">
			<!--[if mso | IE]>
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
			  <tbody>
			  <tr>
				<td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
				  <!--[if mso | IE]>
					  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
					
			<tr>
		  
				<td
				   class="" style="vertical-align:top;width:600px;"
				>
			  <![endif]-->
				  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
					<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
					  <tr>
						<td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;">
						  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
							<tbody>
							  <tr>
								<td style="width:600px;"> <img alt="" height="auto" src="http://localhost:8888/labjti/app/assets/images/header_email.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="600" /> </td>
							  </tr>
							</tbody>
						  </table>
						</td>
					  </tr>
					</table>
				  </div>
				  <!--[if mso | IE]>
				</td>
			  
			</tr>
		  
					  </table>
					<![endif]-->
				</td>
			  </tr>
			</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#3d84a8;background-color:#3d84a8;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#3d84a8;background-color:#3d84a8;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:18px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:center;color:#ABCDEA;">Dear,
								<p style="font-size:16px; color:white">'.$data->nama_peminjam.'</p>
							  </div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#46cdcf;background-color:#46cdcf;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#46cdcf;background-color:#46cdcf;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
							  <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
							  <!--[if mso | IE]>
				<table
				   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
				>
				  <tr>
					<td style="height:0;line-height:0;">
					  &nbsp;
					</td>
				  </tr>
				</table>
			  <![endif]-->
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:28px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Pengajuan Peminjaman '.$data->nama_lab.' Anda Diterima</span> <br/><br/> <br/> <span style="font-size:15px">Silahkan Cetak Form Peminjaman yang Terlampir Pada Email ini dan silahkan minta tanda tangan sesuai dengan level peminjaman.</span></div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#3d84a8;background-color:#3d84a8;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#3d84a8;background-color:#3d84a8;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:15px;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  
			  <table
				 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
			  >
				<tr>
				  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
			  <![endif]-->
			<div style="background:#3d84a8;background-color:#3d84a8;margin:0px auto;max-width:600px;">
			  <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#3d84a8;background-color:#3d84a8;width:100%;">
				<tbody>
				  <tr>
					<td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
					  <!--[if mso | IE]>
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
						
				<tr>
			  
					<td
					   class="" style="vertical-align:top;width:600px;"
					>
				  <![endif]-->
					  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
						<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
						  <tr>
							<td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
							  <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
							  <!--[if mso | IE]>
				<table
				   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
				>
				  <tr>
					<td style="height:0;line-height:0;">
					  &nbsp;
					</td>
				  </tr>
				</table>
			  <![endif]-->
							</td>
						  </tr>
						  <tr>
							<td align="center" style="font-size:0px;padding:10px 25px;padding-top:20px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
							  <div style="font-family:Helvetica;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;">Sistem Informasi Laboratorium JTI by MMZ <br/> <span style="font-size:15px">Politeknik Caltex Riau</span></div>
							</td>
						  </tr>
						</table>
					  </div>
					  <!--[if mso | IE]>
					</td>
				  
				</tr>
			  
						  </table>
						<![endif]-->
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<!--[if mso | IE]>
				  </td>
				</tr>
			  </table>
			  <![endif]-->
		  </div>
		</body>
		
		</html>');  
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
    public function kirim_email_selesai()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data=$this->db->query('select * from vw_peminjaman_fix where id_peminjaman_lab='.$id_peminjaman)->row();
       require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "lab-jti@pcr.ac.id";
        $mail->Password = "labjtipcr2020";
        $mail->setFrom('lab-jti@pcr.ac.id', 'Sistem Informasi Lab JTI(Si-JuTekIn)');
        $mail->addAddress($data->email_peminjam, $data->nama_peminjam);
        $mail->Subject = 'Sistem Informasi Laboratorium JTI';
		$mail->msgHTML('<!doctype html>
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
          <title> </title>
          <!--[if !mso]><!-- -->
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <!--<![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <style type="text/css">
            #outlook a {
              padding: 0;
            }
        
            body {
              margin: 0;
              padding: 0;
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
            }
        
            table,
            td {
              border-collapse: collapse;
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }
        
            img {
              border: 0;
              height: auto;
              line-height: 100%;
              outline: none;
              text-decoration: none;
              -ms-interpolation-mode: bicubic;
            }
        
            p {
              display: block;
              margin: 13px 0;
            }
          </style>
          <!--[if mso]>
                <xml>
                <o:OfficeDocumentSettings>
                  <o:AllowPNG/>
                  <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
          <!--[if lte mso 11]>
                <style type="text/css">
                  .mj-outlook-group-fix { width:100% !important; }
                </style>
                <![endif]-->
          <!--[if !mso]><!-->
          <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
          <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
          </style>
          <!--<![endif]-->
          <style type="text/css">
            @media only screen and (min-width:480px) {
              .mj-column-per-30 {
                width: 30% !important;
                max-width: 30%;
              }
              .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
              }
            }
          </style>
          <style type="text/css">
            @media only screen and (max-width:480px) {
              table.mj-full-width-mobile {
                width: 100% !important;
              }
              td.mj-full-width-mobile {
                width: auto !important;
              }
            }
          </style>
        </head>
        
        <body style="background-color:#ccd3e0;">
          <div style="background-color:#ccd3e0;">
            <!--[if mso | IE]>
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
            <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-top:20px;text-align:center;">
                      <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       class="" style="vertical-align:top;width:180px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-30 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                <tbody>
                                  <tr>
                                    <td style="width:100px;"> <img alt="" height="auto" src="http://localhost:8888/labjti/app/assets/images/header_email.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
                                      /> </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                    <td
                       class="" style="vertical-align:top;width:180px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-30 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                <tbody>
                                  <tr>
                                    <td style="width:180px;"> <img alt="" height="auto" src="https://upload.wikimedia.org/wikipedia/commons/7/70/Politeknik_Caltex_Riau.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="180"
                                      /> </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                    <td
                       class="" style="vertical-align:top;width:180px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-30 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                <tbody>
                                  <tr>
                                    <td style="width:100px;"> <img alt="" height="auto" src="http://localhost:8888/labjti/app/assets/images/header_email.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
                                      /> </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
            <div style="background:#216353;background-color:#216353;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#216353;background-color:#216353;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0;text-align:center;">
                      <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       class="" style="vertical-align:top;width:600px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:18px;padding-left:25px;word-break:break-word;">
                              <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:center;color:#ABCDEA;">Dear,
                                <p style="font-size:16px; color:white">'.$data->nama_peminjam.'</p>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
            <div style="background:#21bf73;background-color:#21bf73;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#21bf73;background-color:#21bf73;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
                      <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       class="" style="vertical-align:top;width:600px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
                              <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
                              <!--[if mso | IE]>
                <table
                   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
                >
                  <tr>
                    <td style="height:0;line-height:0;">
                      &nbsp;
                    </td>
                  </tr>
                </table>
              <![endif]-->
                            </td>
                          </tr>
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:28px;padding-right:25px;padding-bottom:28px;padding-left:25px;word-break:break-word;">
                              <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Pengajuan Peminjaman '.$data->nama_lab.' Anda Selesai</span> <br/><br/> <br/> <span style="font-size:15px">Silahkan foto copy form peminjaman dan serahkan form peminjaman asli ke AIL serta form foto copy serahkan ke security.</span>                        <br/> <br/> <span style="font-size:15px">Catatan : Tanggung jawab laboratorium ada pada ketua kegiatan. Silahkan bersihkan lab dan rapikan lab setelah di pakai dan jangan lupa patuhi aturan SOP Lab seperti larangan makan, main game dll.</span></div>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
            <div style="background:#216353;background-color:#216353;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#216353;background-color:#216353;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:15px;text-align:center;">
                      <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                </tr>
              
                          </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
            <div style="background:#216353;background-color:#216353;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#216353;background-color:#216353;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:5px;padding-top:0;text-align:center;">
                      <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       class="" style="vertical-align:top;width:600px;"
                    >
                  <![endif]-->
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td style="font-size:0px;padding:10px 25px;padding-top:0;padding-right:20px;padding-bottom:0px;padding-left:20px;word-break:break-word;">
                              <p style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:100%;"> </p>
                              <!--[if mso | IE]>
                <table
                   align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #ffffff;font-size:1;margin:0px auto;width:560px;" role="presentation" width="560px"
                >
                  <tr>
                    <td style="height:0;line-height:0;">
                      &nbsp;
                    </td>
                  </tr>
                </table>
              <![endif]-->
                            </td>
                          </tr>
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:20px;padding-right:25px;padding-bottom:20px;padding-left:25px;word-break:break-word;">
                              <div style="font-family:Helvetica;font-size:15px;line-height:1;text-align:center;color:#FFFFFF;">Sistem Informasi Laboratorium JTI by MMZ <br/> <span style="font-size:15px">Politeknik Caltex Riau</span></div>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              <![endif]-->
          </div>
        </body>
        
        </html>');  
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
	function form_peminjaman_lab(){
        
include('fpdf181/fpdf.php');
        $dompdf = new DOMPDF();
$dompdf->load_html("tes");
    }
}

/* End of file Peminjaman_lab.php */
/* Location: ./application/controllers/Peminjaman_lab.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-29 11:03:23 */
/* http://harviacode.com */