<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fakultas_model extends CI_Model
{

    public function get_fakultas()
    {
        $this->db->from('fakultas');
        $query = $this->db->get();
        return $query;
    }

    public function get_jurusan($id)
    {
        $this->db->from('jurusan');
        $this->db->where('idfakultas', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
