<?php defined('BASEPATH') or die('No direct script access allowed');

class Ebeli_model extends CI_Model
{

    public function getAll()
    {
        $data_pembelian = $this->db->get('pembelian')->result();
        return $data_pembelian;
    }
}
