<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class EmailLib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
									<td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1e2Kwv-ny_-vEruy2JaaaQA4Ul4yDV5jR" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
									<td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1UrIow2FYnXfCW6hw22YmQS_UFHaHVEvW" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Mengajukan Peminjaman Laboratorium 320</span> <br/> <span style="font-size:15px">Untuk keperluan '.$data->keperluan.'</span> <br/> <br/> <span style="font-size:15px">Detail Informasi Peminjaman Sebagai Berikut</span></div>
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
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.$data->tanggal_peminjaman.'</div>
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
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.$data->tanggal_mulai.'</div>
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
							  <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;">'.$data->tanggal_akhir.'</div>
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
								  <td align="center" bgcolor="#3fc1c9" role="presentation" style="border:none;border-radius:10px;cursor:auto;mso-padding-alt:10px 25px;background:#3fc1c9;" valign="middle"> <a href="" style="display:inline-block;background:#3fc1c9;color:#FFFFFF;font-family:Helvetica;font-size:14px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:10px;"
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
    public function kirim_email_approve()
    {
        date_default_timezone_set('Asia/Jakarta');
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
        $mail->addAddress('mahrus@pcr.ac.id', 'John Doe');
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
                                    <td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1e2Kwv-ny_-vEruy2JaaaQA4Ul4yDV5jR" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
                                    <td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1UrIow2FYnXfCW6hw22YmQS_UFHaHVEvW" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
                                <p style="font-size:16px; color:white">Muhammad Mahrus Zain</p>
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
                              <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Pengajuan Peminjaman Lab 320 Anda Diterima</span> <br/><br/> <br/> <span style="font-size:15px">Silahkan Cetak Form Peminjaman yang Terlampir Pada Email ini dan silahkan minta tanda tangan sesuai dengan level peminjaman.</span></div>
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
        $mail->addAddress('mahrus@pcr.ac.id', 'John Doe');
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
                                    <td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1e2Kwv-ny_-vEruy2JaaaQA4Ul4yDV5jR" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
                                    <td style="width:100px;"> <img alt="" height="auto" src="https://drive.google.com/thumbnail?id=1UrIow2FYnXfCW6hw22YmQS_UFHaHVEvW" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100"
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
                                <p style="font-size:16px; color:white">Muhammad Mahrus Zain</p>
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
                              <div style="font-family:Helvetica;font-size:13px;line-height:1;text-align:center;color:#FFFFFF;"><span style="font-size:20px; font-weight:bold">Pengajuan Peminjaman Lab 320 Anda Selesai</span> <br/><br/> <br/> <span style="font-size:15px">Silahkan foto copy form peminjaman dan serahkan form peminjaman asli ke AIL serta form foto copy serahkan ke security.</span>                        <br/> <br/> <span style="font-size:15px">Catatan : Tanggung jawab laboratorium ada pada ketua kegiatan. Silahkan bersihkan lab dan rapikan lab setelah di pakai dan jangan lupa patuhi aturan SOP Lab seperti larangan makan, main game dll.</span></div>
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
}