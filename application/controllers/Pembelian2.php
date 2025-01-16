<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        // $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian/index.html';
            $config['first_url'] = base_url() . 'pembelian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_model->total_rows($q);
        $pembelian = $this->Pembelian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'pembelian/pembelian_list',
            'judul' => 'Pembelian Sampah',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pembelian' => $row->id_pembelian,
                // 'no_transaksi' => $row->no_transaksi,
                'id_sampah' => $row->id_sampah,
                'tanggal' => $row->tanggal,
                'id_anggota' => $row->id_anggota,
                'rekening_nasabah' => $row->rekening_nasabah,
                'berat' => $row->berat,
                'total' => $row->total,
                'ket' => $row->ket,
                'konten' => 'pembelian/pembelian_read',
                'judul' => 'Pembelian Sampah',
            );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => base_url('pembelian/create_action'),
            'id_pembelian' => set_value('id_pembelian'),
            // 'no_transaksi' => $this->No_urut->buat_kode_beli(),
            'id_sampah' => set_value('id_sampah'),
            'tanggal' => set_value('tanggal'),
            'id_anggota' => set_value('id_anggota'),
            'rekening_nasabah' => set_value('rekening_nasabah'),
            'berat' => set_value('berat'),
            'total' => set_value('total'),
            'ket' => set_value('ket'),
            'tabungan' => set_value('tabungan'),
            'konten' => 'pembelian/pembelian_form',
            'judul' => 'Pembelian Sampah',
        );
        $this->load->view('v_index', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                // 'no_transaksi' => $this->input->post('no_transaksi', TRUE),
                'id_sampah' => $this->input->post('id_sampah', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_anggota' => $this->input->post('id_anggota', TRUE),
                'rekening_nasabah' => $this->input->post('rekening_nasabah', TRUE),
                'berat' => $this->input->post('berat', TRUE),
                'total' => $this->input->post('total', TRUE),
                'ket' => $this->input->post('ket', TRUE),
                'tabungan' => $this->input->post('tabungan', TRUE),
            );

            $this->Pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            // if ($this->uri->segment(3) == 'tabungan') {
            //     redirect(base_url('app/tabungan'));
            // } else {
            //     redirect(base_url('pembelian'));
            // }
            // $this->Pembelian_model->create($this->input->post('id_pembelian', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }

    public function update($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
                'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),

                'id_sampah' => set_value('id_sampah', $row->id_sampah),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_anggota' => set_value('id_anggota', $row->id_anggota),
                'rekening_nasabah' => set_value('rekening_nasabah', $row->rekening_nasabah),
                'berat' => set_value('berat', $row->berat),
                'total' => set_value('total', $row->total),
                'ket' => set_value('ket', $row->ket),
                'tabungan' => set_value('tabungan', $row->tabungan),
                'konten' => 'pembelian/pembelian_form',
                'judul' => 'Pembelian Sampah',
            );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembelian', TRUE));
        } else {
            $data = array(
                // 'no_transaksi' => $this->input->post('no_transaksi', TRUE),
                'id_sampah' => $this->input->post('id_sampah', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_anggota' => $this->input->post('id_anggota', TRUE),
                'rekening_nasabah' => $this->input->post('rekening_nasabah', TRUE),
                'berat' => $this->input->post('berat', TRUE),
                'total' => $this->input->post('total', TRUE),
                'ket' => $this->input->post('ket', TRUE),
                'tabungan' => $this->input->post('tabungan', TRUE),
            );

            $this->Pembelian_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('no_transaksi', 'no transaksi', 'trim');
        $this->form_validation->set_rules('id_sampah', 'id sampah', 'trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('id_anggota', 'id anggota', 'trim');
        $this->form_validation->set_rules('rekening_nasabah', 'rekening nasabah', 'trim');
        $this->form_validation->set_rules('berat', 'berat', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('ket', 'ket', 'trim');

        $this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
