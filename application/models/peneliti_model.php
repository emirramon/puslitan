<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peneliti_model extends CI_Model
{
    public function getPeneliti()
    {
        return $this->db->from('peneliti')->get()->result_array();
    }

    public function save($data)
    {
        return $this->db->insert('peneliti', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('peneliti', array("id" => $id));
    }

    public function getOnePeneliti($id)
    {
        return $this->db->from('peneliti')->where('id', $id)->get()->row_array();
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('peneliti', $data);
    }
}
