<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class No_urut extends CI_Model
{
    function buat_kode_nasabah()
    {
        $this->db->select('RIGHT(anggota.id_anggota,3) as kode', FALSE);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = " RK " . date('ymd') . $kodemax;
        return $kodejadi;
    }

    function buat_kode_beli()
    {
        $this->db->select('RIGHT(pembelian.id_pembelian,3) as kode', FALSE);
        $this->db->order_by('id_pembelian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pembelian');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = " TR-B" . date('ymd') . $kodemax;
        return $kodejadi;
    }
    function buat_kode_jual()
    {
        $this->db->select('RIGHT(pembelian.id_pembelian,3) as kode', FALSE);
        $this->db->order_by('id_pembelian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pembelian');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = " TR-J " . date('ymd') . $kodemax;
        return $kodejadi;
    }
}
