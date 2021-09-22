<?php

namespace App\Controllers;

use App\Models\ModelAlumni; //work buat nampilin data
use App\Models\ModelPrint; // work buat nampilin data print

//buat pdf
use TCPDF; // work

//export excel
use App\Controllers\BaseController;
use App\Models\ModelExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//import excel
use PHPExcel;
use PHPExcel_IOFactory;
use App\Models\ModelImport;


class Alumni extends BaseController
{

	public function __construct()
	{
		// $this->pager = \config\Services::pager();
		$this->ModelAlumni = new ModelAlumni();
		$this->ModelPrint = new ModelPrint();



		helper('form');
	}

	public function index()
	{
		//cara 1 pake query builder
		// $builder = $this->db->table('alumni');
		// $query   = $builder->get()->get();


		//cara 2 pake manual
		$query = $this->db->query("SELECT * FROM alumni");

		$data['alumni'] = $query->getResult();
		return view('alumni/get', $data);
	}
	public function create()
	{
		return view('alumni/add');
	}

	public function store()
	{
		$data = [
			'nama_lengkap' 	=> $this->request->getVar('nama_lengkap'),
			'tempat_lahir' 	=> $this->request->getVar('tempat_lahir'),
			'tanggal_lahir'	=> $this->request->getVar('tanggal_lahir'),
			'no_telpon' 	=> $this->request->getVar('no_telpon'),
			'email' 		=> $this->request->getVar('email'),
			'alamat' 		=> $this->request->getVar('alamat'),
			'program_studi' => $this->request->getVar('program_studi'),
			'kelulusan' 	=> $this->request->getVar('kelulusan'),
		];
		$this->db->table('alumni')->insert($data);

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('alumni'))->with('success', 'data berhasil disimpan');
		}
	}

	public function edit($id = null)
	{
		if ($id != null) {
			$query = $this->db->table('alumni')->getWhere(['id_alumni => $id']);
			if ($query->resultID->num_rows > 0) {
				$data['alumni'] = $query->getRow();
				return view('alumni/edit', $data);
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function update($id)
	{
		$data = $this->request->getPost();
		unset($data['_method']); // _method cek di edit.php

		$this->db->table('alumni')->where(['id_alumni' => $id])->update($data);
		return redirect()->to(site_url('alumni'))->with('success', 'data berhasil diupdate');
	}

	public function destroy($id)
	{
		$this->db->table('alumni')->where(['id_alumni' => $id])->delete();
		return redirect()->to(site_url('alumni'))->with('success', 'data berhasil dihapus');
	}


	public function print()
	{
		$data = array(
			'alumni' => $this->ModelPrint->alldata(),
		);
		return view('alumni/printalumni', $data);
	}


	public function printpdf()
	{
		$data = array(
			'alumni' => $this->ModelAlumni->alldata(),
		);
		$html =  view('v_printpdf2', $data);

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
		$pdf->Output('data_alumni.pdf', 'I');
	}

	public function exportexcel()
	{
		$ModelExport = new ModelExport();
		$alumni = $ModelExport->findAll();

		$spreadsheet = new Spreadsheet();

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'nama lengkap')
			->setCellValue('B1', 'tempat lahir')
			->setCellValue('C1', 'tanggal lahir')
			->setCellValue('D1', 'alamat')
			->setCellValue('E1', 'no telpon')
			->setCellValue('F1', 'email')
			->setCellValue('G1', 'program studi')
			->setCellValue('H1', 'kelulusan');

		$column = 2;

		foreach ($alumni as $data) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $column, $data['nama_lengkap'])
				->setCellValue('B' . $column, $data['tempat_lahir'])
				->setCellValue('C' . $column, $data['tanggal_lahir'])
				->setCellValue('D' . $column, $data['alamat'])
				->setCellValue('E' . $column, $data['no_telpon'])
				->setCellValue('F' . $column, $data['email'])
				->setCellValue('G' . $column, $data['program_studi'])
				->setCellValue('H' . $column, $data['kelulusan']);

			$column++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = date('Y-m-d-His') . 'data-user';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
