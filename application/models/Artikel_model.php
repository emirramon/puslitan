<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
	public function getArtikel()
	{
		return $this->db->from('artikel')->get()->result_array();
	}

	public function getOneArtikel($id)
	{
		return $this->db->from('artikel')->where('id', $id)->get()->result_array();
	}

	public function save($data)
	{
		return $this->db->insert('artikel', $data);
	}

	public function edit($data, $id){
		$this->db->where('id', $id);
		$this->db->update('artikel', $data);
	}

	public function delete($id){
		return $this->db->delete('artikel', array("id" => $id));
	}
}
