<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fakultas_model');
	}

	public function login()
	{
		$this->template->load('template/login', 'Formulir/login');
	}

	public function register()
	{
		$data['fakultas'] = $this->db->get('fakultas')->result();

		$this->template->load('template/register', 'Formulir/register', $data);
	}

	public function getjurusan()
	{
		$idFakultas = $this->input->post('id', TRUE);
		$data = $this->fakultas_model->get_jurusan($idFakultas);
		// $data = $this->db->get('jurusan')->result();
		echo json_encode($data);
	}
}
