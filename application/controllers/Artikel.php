<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
	}

	public function index()
	{
		$data['title'] = 'Artikel';
		$data['subtitle'] = "";
		$data['data_artikel'] = $this->artikel_model->getArtikel();
		if (isset($_POST['tanggal'])) {
			$data['data_form'] = $_POST;
		}
		$this->form_validation->set_rules('judul_artikel', 'Judul', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Artikel/index', $data);
		} else{
			$data = [
				'judul_artikel' => $this->input->post('judul_artikel'),
				'tanggal' => $this->input->post('tanggal'),
				'isi' => $this->input->post('isi')
			];
			$this->artikel_model->save($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span><b>Berhasil Menambahkan Artikel</b></span>
			</div>');
			redirect('Artikel/index');
		}
	}

	public function getArtikel($id)
	{
		$data = $this->artikel_model->getOneArtikel($id);
		echo json_encode($data);
	}

	public function edit($id = null)
	{
		if(isset($id)){
			$data['title'] = 'Artikel';
			$data['subtitle'] = "";
			$data['data_artikel'] = $this->artikel_model->getArtikel();
			$data['id_edit'] = $id;
			// $artikel = $this->artikel_model->getOneArtikel($id);
			$this->form_validation->set_rules('edit_judul_artikel', 'Judul', 'required');
			$this->form_validation->set_rules('edit_tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('edit_isi', 'Isi', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template/main', 'Artikel/index', $data);
			} else{
				$data = [
					'judul_artikel' => $this->input->post('edit_judul_artikel'),
					'tanggal' => $this->input->post('edit_tanggal'),
					'isi' => $this->input->post('edit_isi')
				];
				$this->artikel_model->edit($data, $id);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Mengubah Artikel</b></span>
				</div>');
				redirect('Artikel');
			}
		} else{
			redirect('Artikel');
		}
	}

	public function delete($id = null)
	{
		if (isset($id)) {
			$this->artikel_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Artikel</b></span>
				</div>');
		}
		redirect(site_url('Artikel'));
	}
}
