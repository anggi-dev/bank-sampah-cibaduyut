<?php defined('BASEPATH') or die('No direct script access allowed');

class Ejual_model extends CI_Model
{

    public function getAll()
    {
        $data_penjualan = $this->db->get('penjualan')->result();
        return $data_penjualan;
    }
}
