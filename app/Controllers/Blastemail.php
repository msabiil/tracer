<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Blastemail extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	public function index()
	{
		return view('blast/get');
	}

	private function sendEmail($to, $title, $message, $attachment = null)
	{
		$mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.googlemail.com';   
            $mail->SMTPAuth   = true;
            $mail->Username   = 'user@gmail.com'; // silahkan ganti dengan alamat email Anda
            $mail->Password   = 'password'; // silahkan ganti dengan password email Anda
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
 
            $mail->setFrom('username_email_anda@gmail.com', 'Ilmu Coding'); // silahkan ganti dengan alamat email Anda
            $mail->addAddress($to);
            $mail->addReplyTo('username_email_anda@gmail.com', 'Ilmu Coding'); // silahkan ganti dengan alamat email Anda
            // Content
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $message;
 
            $mail->send();
            session()->setFlashdata('success', 'Send Email successfully');
        } catch (Exception $e) {
            session()->setFlashdata('error', "Send Email failed. Error: ".$mail->ErrorInfo);
        }
	}

	public function kirim_aksi()
	{
		$email = $this->request->getPost('emai');
		$subject = $this->request->getPost('subject');
		$content = $this->request->getPost('content');
		
		$hasil = $this->sendEmail($email, $subject, $content);
		
		return redirect(base_url('blast'));
	}
}
