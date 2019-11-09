<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fakultas_model');
	}

	public function index()
	{
		$nip = $this->session->userdata('nip');
		if (!empty($nip)) {
			redirect('Home');
		}
		$this->form_validation->set_rules('nip', 'NIP/NIK', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->template->load('template/login', 'Auth/login');
		} else {
			$this->_verify();
		}
	}

	private function _verify()
	{
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		$user = $this->db->get_where('akun', ['nip' => $nip])->row_array();
		// var_dump($user);
		// die;

		//jika usernya ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					//login berhasil
					$data = [
						'nip' => $user['nip'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					redirect('Home');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">
				<span><b>Maaf password anda salah</span></div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
				<span><b>NIP ini belum di aktifkan</span></div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
			<span><b>NIP tidak terdaftar</span></div>');
			redirect('Auth');
		}
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

			$this->template->load('template/register', 'Auth/register', $data);
		} else {
			$data = [
				'nip' => htmlspecialchars($this->input->post('nip'), true),
				'nama' => htmlspecialchars($this->input->post('nama'), true),
				'tempatlahir' => htmlspecialchars($this->input->post('tempat'), true),
				'tanggallahir' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
				'fakultas' => $this->input->post('fakultas'),
				'jurusan' => $this->input->post('jurusan'),
				'pangkat' => $this->input->post('pangkat'),
				'golongan' => $this->input->post('golongan'),
				'npwp' => htmlspecialchars($this->input->post('npwp', true)),
				'norekening' => htmlspecialchars($this->input->post('norek', true)),
				'namabank' => htmlspecialchars($this->input->post('namabank', true)),
				'namapemilik' => htmlspecialchars($this->input->post('pemilik', true)),
				'jabatan' => $this->input->post('jabatan'),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'nomorhp' => htmlspecialchars($this->input->post('nohp', true))
			];

			$data2 = [
				'nip' => $this->input->post('nip'),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level' => 1,
				'is_active' => 0
			];


			$this->db->insert('dosen', $data);
			$this->db->insert('akun', $data2);

			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Berhasil Mendaftar Silahkan Login</span>
		</div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Selamat anda berhasil logout</span>
		</div>');
		redirect('Auth');
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
