<?php

namespace App\Controllers;

class Blast extends BaseController
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

		$this->email = \Config\Services::email();
		$this->email->setFrom('tracer@gmail.com', 'tracer');
		$this->email->setTo($to);

		if ($attachment != null) {
			$this->email->attach($attachment);
		}

		$this->email->setSubject($title);
		$this->email->setMessage($message);

		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}

	public function kirim_aksi()
	{
		// $email = $this->request->getPost('emai');
		// $subject = $this->request->getPost('subject');
		// $content = $this->request->getPost('content');
	
		if (true) {
			$hasil = $this->sendEmail('fauzi190198@gmail.com','test','cumantest');
			session()->setFlashData('success', 'Berhasil Mengirimkan Blast Email');
			if ($hasil){
				echo "berhasil";
			} else {
				$data = $this->email->printDebugger(['headers']);
            	print_r($data);
			}
		} else {
			session()->setFlashData('failed', 'Gagal Mengirimkan Blast Email ');
		}
		// return redirect(base_url('blast'));
	}
}
