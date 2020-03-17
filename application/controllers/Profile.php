<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('fakultas_model');
        $this->load->model('pangkat_model');
    }
    public function index()
    {
        $sess_id = $this->session->userdata('nip');
        $data['dosen'] = $this->Dosen_model->get($sess_id);
        $data['fakultas'] = $this->fakultas_model->get_fakultas()->result();
        $data['pangkat'] = $this->pangkat_model->get_pangkat()->result();
        $data['title'] = 'Profil';
        $data['subtitle'] = '';
        $this->template->load('template/main', 'Profile/index', $data);
    }

    public function edit()
    {
        $sess_id = $this->session->userdata('nip');
        if ($this->Dosen_model->edit($sess_id)) {
            redirect('profile');
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
