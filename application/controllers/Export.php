<?php defined('BASEPATH') or die('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('export_model');
    }

    public function index()
    {
        $data['semua_anggota'] = $this->export_model->getAll()->result();
        $this->load->view('export', $data);
    }


    public function export()
    {
        $semua_anggota = $this->export_model->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Anggota')
            ->setCellValue('C1', 'Nama Anggota')
            ->setCellValue('D1', 'Umur')
            ->setCellValue('E1', 'Jenis Kelamin')
            ->setCellValue('F1', 'Alamat');


        $nomor = 1;
        $kolom = 2;
        foreach ($semua_anggota as $anggota) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $anggota->id_anggota)
                ->setCellValue('C' . $kolom, $anggota->nama_anggota)
                ->setCellValue('D' . $kolom, $anggota->umur)
                ->setCellValue('E' . $kolom, $anggota->jenis_kelamin)
                ->setCellValue('F' . $kolom, $anggota->alamat);

            $kolom++;
            $nomor++;
        }


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Nasabah.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
