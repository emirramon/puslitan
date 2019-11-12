<?php
defined('BASEPATH') or exit('No direct script access allowed');

class materi_model extends CI_Model
{
	public function getMateri()
	{
		return $this->db->from('materi')->get()->result_array();
	}

	public function getOneMateri($id)
	{
		return $this->db->from('materi', array("id" => $id))->get()->result_array();
	}

	public function save($data)
	{
		return $this->db->insert('materi', $data);
	}

	public function delete($id){
		return $this->db->delete('materi', array("id" => $id));
	}
}
