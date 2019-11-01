<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fakultas_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->template->load('template/login', 'Formulir/login');
	}

	public function register()
	{
		//validasi data input
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|exact_length[18]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('npwp', 'NPWP', 'required');
		$this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric|min_length[11]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama.',
			'min_length' => 'Password terlalu pendek.'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		//kondisi form input
		if ($this->form_validation->run() == false) {
			$data['fakultas'] = $this->db->get('fakultas')->result();

			$data['pangkat'] = $this->db->get('pangkat')->result();

			$this->template->load('template/register', 'Formulir/register', $data);
		} else {
			$data = [
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'tempatlahir' => $this->input->post('tempat'),
				'tanggallahir' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
				'fakultas' => $this->input->post('fakultas'),
				'jurusan' => $this->input->post('jurusan'),
				'pangkat' => $this->input->post('pangkat'),
				'golongan' => $this->input->post('golongan'),
				'npwp' => $this->input->post('npwp'),
				'norekening' => $this->input->post('norek'),
				'namabank' => $this->input->post('namabank'),
				'namapemilik' => $this->input->post('pemilik'),
				'jabatan' => $this->input->post('jabatan'),
				'email' => $this->input->post('email'),
				'nomorhp' => $this->input->post('nohp')
			];

			$data2 = [
				'akun' => $this->input->post('nip'),
				'password' => $this->input->post('password1'),
				'level' => 'dosen'
			];

			
			$this->db->insert('dosen', $data);
			$this->db->insert('akun', $data2);
			redirect('Formulir/login');
		}
	}

	public function getjurusan()
	{
		$idFakultas = $this->input->post('id', TRUE);
		$data = $this->fakultas_model->get_jurusan($idFakultas);
		echo json_encode($data);
	}

	public function getgolongan()
	{
		$idGolongan = $this->input->post('id', TRUE);
		$data = $this->fakultas_model->get_golongan($idGolongan);
		echo json_encode($data);
	}
}
