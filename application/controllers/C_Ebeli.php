<?php defined('BASEPATH') or die('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Ebeli extends CI_Controller
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
    public function excelbeli()
    {
        $this->load->model('ebeli_model');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Pembelian');
        $sheet->setCellValue('C1', 'ID Sampah');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'ID Anggota');
        $sheet->setCellValue('F1', 'Berat');
        $sheet->setCellValue('G1', 'Total');
        $sheet->setCellValue('H1', 'Keterangan');
        $sheet->setCellValue('I1', 'Tabungan');
        $pembelian = $this->ebeli_model->getAll();
        $no = 1;
        $x = 2;
        foreach ($pembelian as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->no_trans);
            $sheet->setCellValue('C' . $x, $row->id_sampah);
            $sheet->setCellValue('D' . $x, $row->tanggal);
            $sheet->setCellValue('E' . $x, $row->id_anggota);
            $sheet->setCellValue('F' . $x, $row->berat);
            $sheet->setCellValue('G' . $x, $row->total);
            $sheet->setCellValue('H' . $x, $row->ket);
            $sheet->setCellValue('I' . $x, $row->tabungan);
            $x++;
            // $this->load->model('ebeli_model');
            // $spreadsheet = new Spreadsheet();
            // $spreadsheet->setActiveSheetIndex()
            // $sheet->setCellValue('A1', 'No'); 
            // $sheet->setCellValue('B1', 'ID Pembelian');
            // $sheet->setCellValue('C1', 'ID Sampah');
            // $sheet->setCellValue('D1', 'Tanggal');
            // $sheet->setCellValue('E1', 'No Anggota');
            // $sheet->setCellValue('F1', 'Berat');
            // $sheet->setCellValue('G1', 'Total');
            // $sheet->setCellValue('H1', 'Keterangan');
            // $sheet->setCellValue('I1', 'Tabungan');

            // $pembelian = $this->ebeli_model->getAll();


            // $no = 1;
            // $kolom = 2;
            // foreach ($pembelian as $pembelian) {

            //     $spreadsheet->setActiveSheetIndex(0)
            //         ->setCellValue('A' . $kolom, $no++)
            //         ->setCellValue('B' . $kolom, $pembelian->id_pembelian)
            //         ->setCellValue('C' . $kolom, $pembelian->id_sampah)
            //         ->setCellValue('D' . $kolom, date('j F Y', strtotime($pembelian->tanggal)))
            //         ->setCellValue('E' . $kolom, $pembelian->id_anggota)
            //         ->setCellValue('F' . $kolom, $pembelian->berat)
            //         ->setCellValue('G' . $kolom, $pembelian->total)
            //         ->setCellValue('H' . $kolom, $pembelian->ket)
            //         ->setCellValue('I' . $kolom, $pembelian->tabungan);

            //     $kolom++;
            //     $nomor++;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan data pembelian sampah';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
