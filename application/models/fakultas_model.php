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

    public function get_pangkat()
    {
        $this->db->from('pangkat');
        $query = $this->db->get();
        return $query;
    }

    public function get_golongan($id)
    {
        $this->db->from('golongan');
        $this->db->where('idpangkat', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function ambil($id)
    {
        $this->db->Select('nip');
        $this->db->from('dosen');
        $this->db->where('email', $id);
        $query = $this->db->get();
        $row = $query->row();
        return  $row->nip;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ambil1($id)
    {
        $this->db->Select('email');
        $this->db->from('dosen');
        $this->db->where('nip', $id);
        $query = $this->db->get();
        $row = $query->row();
        return  $row->email;
    }
}
