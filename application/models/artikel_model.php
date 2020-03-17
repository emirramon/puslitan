<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel_model extends CI_Model
{
	public function getArtikel()
	{
		return $this->db->from('artikel')->get()->result_array();
	}

	public function getArtikelAcara()
	{
		return $this->db->from('artikel')->where('jenis_artikel', '0')->get()->result_array();
	}

	public function getTotalDaftar($id)
	{
		return $this->db->from('absen_acara')->where('artikel', $id)->get()->num_rows();
	}

	public function getUserDaftar($id, $nip)
	{
		return $this->db->from('absen_acara')->where('artikel', $id)->where('nip', $nip)->get()->num_rows();
	}

	public function getOneArtikel($id)
	{
		return $this->db->from('artikel')->where('artikel_id', $id)->get()->row_array();
	}

	public function save($data)
	{
		return $this->db->insert('artikel', $data);
	}

	public function edit($id, $data)
	{
		$this->db->where('artikel_id', $id);
		$this->db->update('artikel', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('artikel', array("artikel_id" => $id));
	}

	public function daftar_kegiatan($data)
	{
		return $this->db->insert('absen_acara', $data);
	}

	public function generateAbsen($id)
	{
		$this->db->Select('absen_acara.id as id, fakultas.namafakultas, jurusan.namajurusan, dosen.nip, dosen.nama,  artikel.artikel_id, artikel.judul_artikel');
		$this->db->from('absen_acara');
		$this->db->join('artikel', 'artikel.artikel_id = absen_acara.artikel');
		$this->db->join('dosen', 'dosen.id = absen_acara.nip');
		$this->db->join('fakultas', 'dosen.fakultas = fakultas.idfakultas');
		$this->db->join('jurusan', 'fakultas.idfakultas = jurusan.idfakultas');
		$this->db->where('artikel.artikel_id', $id);
		$this->db->group_by('absen_acara.id');
		return $this->db->get()->result_array();
	}

	public function deleteabsen($id)
	{
		return $this->db->delete('absen_acara', array("id" => $id));
	}
}
