<?php

namespace App\Controllers;

use App\Models\ModelAlumni;
use App\Models\ModelPrint;

//php mailer
use PHPMailer\PHPMailer\PHPMailer; //work
use PHPMailer\PHPMailer\SMTP; // work
use PHPMailer\PHPMailer\Exception; //work

//printpdf
use TCPDF; // work

class Blast extends BaseController
{
	public function __construct()
	{
		$this->ModelAlumni = new ModelAlumni();
		$this->ModelPrint = new ModelPrint();
		helper(['form']);
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

	//printpdf
	public function printpdf()
	{
		$data = array(
			'kuisioner' => $this->ModelAlumni->alldatakuisionerr(),
		);
		$html =  view('v_printpdf3', $data);

		//buat dokumen pdf
		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

		//remove header and footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->setFont('helvetica', '', 14);

		//add content
		$pdf->AddPage();
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		$this->response->setContentType('application/pdf');
		$pdf->Output('data-kuisioner.pdf', 'I');
	}

	public function print()
	{
		$data = array(
			'kuisioner' => $this->ModelPrint->alldatakuisioner(),
		);
		return view('surveii/printsurvei', $data);
	}
}
