<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manageakun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('nip') != 'Administrator') {
        //     redirect('Home');
        // }
        $this->load->model('dosen_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Akun';
        $data['subtitle'] = '';
        $data['akun'] = $this->dosen_model->getAkun();
        $this->load->model('akun_model', 'akun');
        $data['fakultas'] = $this->akun->getFakultas();
        $data['jurusan'] = $this->akun->getJurusan();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/main', 'Akun/index', $data);
        } else {

            $data = [
                'title' => $this->input->post('menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];

            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Berhasil Menambahkan Menu</b></span>
            </div>');
            redirect('Managemenu');
        }
    }

    public function editakun($id){
        $data['title'] = 'Manage Akun';
		$data['subtitle'] = '';
		$data['dosen'] = $this->dosen_model->get($id);
		//$this->template->load('template/main', 'Download/sk', $data);
		if (isset($_POST['tanggal'])) {
			$data['data_form'] = $_POST;
		}
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|exact_length[18]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('npwp', 'NPWP', 'required');
		$this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric|min_length[11]');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Akun/editakun', $data);
		} else {
			
				// echo "<pre>";
				// print_r($result);
				// echo "</pre>";
				$this->dosen_model->edit($id);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Mengedit akun</b></span>
				</div>');
				redirect('Manageakun/index');
			
		}
    }
}
