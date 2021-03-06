<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function getSk($id = FALSE)
	{
		if($id == FALSE)
		{
			return $this->db->from('sk')->join('kategori', 'kategori.id_kategori = sk.id_kategori')->get()->result_array();	
		}
		$this->db->select('*');
		$this->db->from('sk');
		$this->db->join('kategori', 'kategori.id_kategori = sk.id_kategori');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
		//return $this->db->from('sk')->where('id', $id)->row_array();
	}

	public function getKategori()
	{
		return $this->db->from('kategori')->get()->result_array();
	}

	public function getSubKategori()
	{
		return $this->db->from('sub_kategori')->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori')->get()->result_array();
	}

	public function getOneSK($id)
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

	public function saveSK($data)
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

	public function editSK($data, $id){
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

	public function deleteSK($id){
		return $this->db->delete('sk', array("id" => $id));
	}

	public function deleteKategori($id){
		return $this->db->delete('kategori', array("id_kategori" => $id));
	}

	public function deleteSubKategori($id){
		return $this->db->delete('sub_kategori', array("id_sub_kategori" => $id));
	}
}
