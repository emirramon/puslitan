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
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Akun';
        $data['subtitle'] = '';
        $data['akun'] = $this->db->get('dosen')->result_array();
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
}
