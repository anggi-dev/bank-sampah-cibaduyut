<?php defined('BASEPATH') or die('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Ejual extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('export_model');
    // }

    // public function index()
    // {
    //     $data['semua_pembelian'] = $this->exportbeli_model->getAll()->result();
    //     $this->load->view('export_beli', $data);
    // }
    public function exceljual()
    {
        $this->load->model('ejual_model');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No Transaksi');
        $sheet->setCellValue('C1', 'Kode Sampah');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Berat');
        $sheet->setCellValue('F1', 'Total');
        $sheet->setCellValue('G1', 'Petugas');

        $penjualan = $this->ejual_model->getAll();
        $no = 1;
        $x = 2;
        foreach ($penjualan as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->no_trans);
            $sheet->setCellValue('C' . $x, $row->id_sampah);
            $sheet->setCellValue('D' . $x, $row->tanggal);
            $sheet->setCellValue('E' . $x, $row->berat);
            $sheet->setCellValue('F' . $x, $row->total);
            $sheet->setCellValue('G' . $x, $row->petugas);
            $x++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan data penjualan sampah';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
