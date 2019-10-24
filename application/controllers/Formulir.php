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
		$fakultas['fakultas'] = $this->fakultas_model->get_fakultas();
		$this->template->load('template/register', 'Formulir/register', $fakultas);
	}

	public function get_jurusan()
	{
		$id = $this->input->post('id');
		$data = $this->fakultas_model->get_jurusan($id);
		echo json_encode($data);
	}
}
