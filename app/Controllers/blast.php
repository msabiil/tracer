<?php

namespace App\Controllers;

class blast extends BaseController
{
	public function index()
	{
		return view('blast/get');
	}

	private function sendEmail($attachment, $to, $title, $message){

		$this->email->setFrom('deavenditama@gmail.com','deavenditama');
		$this->email->setTo($to);

		$this->email->attach($attachment);

		$this->email->setSubject($title);
		$this->email->setMessage($message);

		if(! $this->email->send()){
			return false;
		}else{
			return true;
		}
	}

	public function send_action(){
		$email = $this->request->getPost('emai');
		$subject = $this->request->getPost('subject');
		$content = $this->request->getPost('content');

		if(true){
			session()->setFlashData('success', 'Berhasil Mengirimkan Blast Email');
		} else {
			session()->setFlashData('failed', 'Gagal Mengirimkan Blast Email ');
		}
		// return redirect(base_url('blast'));
	}
}
