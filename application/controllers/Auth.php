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
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('is_login');

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
						'is_login' => 1,
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
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|exact_length[18]|is_unique[akun.nip]', [
			'is_unique' => 'NIP sudah digunakan',
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[dosen.email]', [
			'is_unique' => 'Email sudah digunakan',
		]);
		$this->form_validation->set_rules('npwp', 'NPWP', 'required');
		$this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric|min_length[11]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama.',
			'min_length' => 'Password terlalu pendek.'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		//kondisi form input
		$email = $this->input->post('email', true);

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
				'nomorhp' => htmlspecialchars($this->input->post('nohp', true)),
				'status' => 1
			];

			$data2 = [
				'nip' => $this->input->post('nip'),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level' => 1,
				'is_active' => 0
			];

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_create' => time()
			];

			$this->db->insert('dosen', $data);
			$this->db->insert('akun', $data2);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Berhasil Mendaftar Silahkan Aktivasi akun</span>
			</div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('is_login');

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

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'puslitanuinsuska@gmail.com',
			'smtp_pass' => 'puslitan123',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"

		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('puslitanuinsuska@gmail.com', 'Puslitan');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Klik link ini untuk aktivasi akun anda : <a href="' . base_url() . 'auth/verify?email='
				. $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktifkan </a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('dosen', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_create'] < (60 * 60 * 24)) {
					$data1 = $this->fakultas_model->ambil($user['email']);
					// $token1 = $this->input->get($data1);

					$this->db->set('is_active', 1);
					$this->db->where('nip', $data1);
					$this->db->update('akun');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success">
					<span>
						<b>Berhasil Melakukan Aktivasi dan Silahkan Login</span>
					</div>');
					redirect('Auth');
				} else {
					$this->db->delete('dosen', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger">
					<span>
						<b>Aktivasi Akun Gagal! Token Expired </span>
					</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
				<span>
					<b>Aktivasi Akun Gagal! Salah Token</span>
				</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
				<span>
					<b>Aktivasi Akun Gagal! wrong email</span>
				</div>');
			redirect('Auth');
		}
	}

	public function lupa()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|exact_length[18]');
		if ($this->form_validation->run() == false) {

			$this->template->load('template/login', 'Auth/lupa');
		} else {
			$email = $this->input->post('nip');
			$user = $this->db->get_where('akun', ['nip' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$data1 = $this->fakultas_model->ambil1($email);
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $data1,
					'token' => $token,
					'date_create' => time()
				];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail1($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success">
					<span>
						<b>Silahkan Periksa Email Anda Untuk Mereset </span>
				</div>');
				redirect('Auth/lupa');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
						<span>
							<b>Nip Tidak Ada atau Belum di aktivasis </span>
					</div>');
				redirect('Auth/lupa');
			}
		}
	}

	private function _sendEmail1($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'puslitanuinsuska@gmail.com',
			'smtp_pass' => 'puslitan123',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"

		];

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$email = $this->input->post('nip');
		$data1 = $this->fakultas_model->ambil1($email);

		$this->email->from('puslitanuinsuska@gmail.com', 'Puslitan');


		$this->email->to($data1);

		if ($type == 'forgot') {
			$this->email->subject('Account Verification');
			$this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'auth/forgot?email='
				. $data1 . '&token=' . urlencode($token) . '"> Reset Password </a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function forgot()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');


		$user = $this->db->get_where('dosen', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$data1 = $this->fakultas_model->ambil($user['email']);
				$this->session->set_userdata('reset_nip', $data1);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
				<span>
					<b>Reset  wrong token
					</span>
				</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
			<span>
				<b>Reset Password Fail dan wrong email</span>
			</div>');
			redirect('Auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_nip')) {
			redirect('Auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama.',
			'min_length' => 'Password terlalu pendek.'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			# code...

			$this->template->load('template/login', 'Auth/ubahPas');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$nip = $this->session->userdata('reset_nip');

			$this->db->set('password', $password);
			$this->db->where('nip', $nip);
			$this->db->update('akun');

			$this->session->unset_userdata('reset_nip');
			$data1 = $this->fakultas_model->ambil1($nip);
			$this->db->delete('user_token', ['email' => $data1]);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Password Berhasil Di Ubah! Silahkan Login</span>
			</div>');
			redirect('Auth');
		}
	}
}
