<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manageprofil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peneliti_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Profil Peneliti';
        $data['subtitle'] = '';
        $data['data_peneliti'] = $this->peneliti_model->getPeneliti();
        $this->template->load('template/main', 'Peneliti/peneliti', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Manajemen Profil Peneliti';
        $data['subtitle'] = '';
        $this->form_validation->set_rules('nama_peneliti', 'Nama Peneliti', 'required');
        $this->form_validation->set_rules('content_peneliti', 'Content Peneliti', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template/main', 'Peneliti/tambah', $data);
        } else {
            $config['upload_path'] = './uploads/fotopeneliti/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']    = '2048';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('Foto')) {
                $data = [
                    'nama_peneliti' => $this->input->post('nama_peneliti'),
                    'content_peneliti' => $this->input->post('content_peneliti'),
                    'foto' => $this->upload->data('file_name')
                ];
                $this->peneliti_model->save($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menambahkan Profil Peneliti</b></span>
				</div>');
                redirect('Manageprofil');
            } else {
                echo "aada";
                die;
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="text-danger">' . $error . '</div>');
                $this->template->load('template/main', 'Peneliti/tambah', $data);
            }
        }
    }

    public function deletepeneliti($id = null)
    {
        if (isset($id)) {
            $this->peneliti_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Profil Peneliti</b></span>
				</div>');
        }
        redirect('Manageprofil');
    }

    function edit($id)
    {

        $data['title'] = 'Manajemen Profil Peneliti';
        $data['subtitle'] = '';
        $data['peneliti'] = $this->peneliti_model->getOnePeneliti($id);

        $this->form_validation->set_rules('nama_peneliti', 'Nama Peneliti', 'required');
        $this->form_validation->set_rules('content_peneliti', 'Content Peneliti', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template/main', 'Peneliti/edit', $data);
        } else {
            //print_r($_FILES);
            //exit;
            if ($_FILES['cover_artikel']['tmp_name'] != '') {
                $config['upload_path'] = './uploads/fotopeneliti/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('File')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="text-danger">' . $error . '</div>');
                    $this->template->load('template/main', 'Artikel/buatartikel', $data);
                } else {
                    $result = $this->upload->data();

                    $data = [

                        'nama_peneliti' => $this->input->post('nama_peneliti'),
                        'content_peneliti' => $this->input->post('content_peneliti'),
                        'foto' => $this->upload->data('file_name')
                    ];
                    $this->peneliti_model->edit($id, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">
					<span><b>Berhasil Mengedit profil peneliti</b></span>
					</div>');
                    redirect('Peneliti/peneliti');
                }
            } else {
                $data = [

                    'nama_peneliti' => $this->input->post('nama_peneliti'),
                    'content_peneliti' => $this->input->post('content_peneliti')
                ];
                $this->peneliti_model->edit($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Mengedit Profil peneliti</b></span>
				</div>');
                redirect('Peneliti/peneliti');
            }
        }
    }
}
