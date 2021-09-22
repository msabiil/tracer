<?php

namespace App\Controllers;

//php mailer

use App\Models\ModelHasilSurvei;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Blast extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		helper('form');
		$this->email = \Config\Services::email();
	}

	public function index()
	{

		return view('blast/get');
	}


	//mail blast
	public function send()
	{
		$to                 = $this->request->getPost('to');
		$subject            = $this->request->getPost('subject');
		$message            = $this->request->getPost('message');

		$mail = new PHPMailer(true);

		try {
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'tracerftuhamka@gmail.com'; // silahkan ganti dengan alamat email Anda
			$mail->Password   = 'teknikgood123'; // silahkan ganti dengan password email Anda
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;

			$mail->setFrom('tracerftuhamka@gmail.com', 'ftuhamka'); // silahkan ganti dengan alamat email Anda
			$mail->addAddress($to);
			$mail->addReplyTo('tracerftuhamka@gmail.com', 'ftuhamka'); // silahkan ganti dengan alamat email Anda
			// Content
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body    = $message;

			$mail->send();
			session()->setFlashdata('success', 'Send Email successfully');
			return redirect()->to('/blast');
		} catch (Exception $e) {
			session()->setFlashdata('error', "Send Email failed. Error: " . $mail->ErrorInfo);
			return redirect()->to('/blast');
		}
	}
}
