<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sk_model extends CI_Model
{
	public function getSk()
	{
		return $this->db->from('sk')->join('kategori', 'kategori.id_kategori = sk.id_kategori')->get()->result_array();
	}

	public function getKategori()
	{
		return $this->db->from('kategori')->get()->result_array();
	}

	public function getSubKategori()
	{
		// return $this->db->from('sub_kategori')->get()->result_array();
		return $this->db->from('sub_kategori')->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori')->get()->result_array();
	}

	public function getOneSk($id)
	{
		return $this->db->from('sk')->where('id', $id)->get()->result_array();
	}

	public function getOneKategori($id)
	{
		return $this->db->from('kategori')->where('id_kategori', $id)->get()->result_array();
	}

	public function getOneSubKategori($id)
	{
		return $this->db->from('sub_kategori')->where('id_sub_kategori', $id)->get()->result_array();
	}

	public function save($data)
	{
		return $this->db->insert('sk', $data);
	}

	public function saveKategori($data)
	{
		return $this->db->insert('kategori', $data);
	}

	public function saveSubKategori($data)
	{
		return $this->db->insert('sub_kategori', $data);
	}

	public function edit($data, $id){
		$this->db->where('id', $id);
		$this->db->update('sk', $data);
	}

	public function editKategori($data, $id){
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}

	public function editSubKategori($data, $id){
		$this->db->where('id_sub_kategori', $id);
		$this->db->update('sub_kategori', $data);
	}

	public function delete($id){
		return $this->db->delete('sk', array("id" => $id));
	}

	public function deleteKategori($id){
		return $this->db->delete('kategori', array("id_kategori" => $id));
	}

	public function deleteSubKategori($id){
		return $this->db->delete('sub_kategori', array("id_sub_kategori" => $id));
	}
}
