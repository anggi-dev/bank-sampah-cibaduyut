<?php defined('BASEPATH') or die('No direct script access allowed');

class Export_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('anggota');

        return $this->db->get();
    }
}
