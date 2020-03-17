<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('nip') != 'Administrator') {
		//     redirect('Home');
		// }
		is_logged_in();
		$this->load->model('artikel_model');
	}

	function buat()
	{
		$data['title'] = 'Artikel';
		$data['subtitle'] = 'Buat Artikel';
		//$this->template->load('template/main', 'Acara/buatacara', $data);

		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
		$this->form_validation->set_rules('content_artikel', 'Content Artikel', 'required');
		$this->form_validation->set_rules('jenis_artikel', 'Jenis Artikel', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Artikel/buatartikel', $data);
		} else {
			//print_r($_FILES);
			//exit;
			$config['upload_path'] = './uploads/coverartikel/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('cover_artikel')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="text-danger">' . $error . '</div>');
				$this->template->load('template/main', 'Artikel/buatartikel', $data);
			} else {
				$result = $this->upload->data();
				// echo "<pre>";
				// print_r($result);
				// echo "</pre>";
				$data = [
					//'artikel_id' => $this->input->post('artikel_id'),
					'judul_artikel' => $this->input->post('judul_artikel'),
					'batas_daftar' => $this->input->post('batas_daftar'),
					'kuotadaftar' => $this->input->post('kuotadaftar'),
					'content_artikel' => $this->input->post('content_artikel'),
					'jenis_artikel' => $this->input->post('jenis_artikel'),
					'cover_artikel' => $this->upload->data('file_name')
				];
				$this->artikel_model->save($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menambahkan Artikel</b></span>
				</div>');
				redirect('Artikel/read');
			}
		}
	}

	function read()
	{
		$data['title'] = 'Artikel';
		$data['subtitle'] = 'Semua Artikel';
		$data['artikel_model'] = $this->artikel_model->getArtikel();
		$this->template->load('template/main', 'Artikel/readartikel', $data);
	}

	function edit($id)
	{

		$data['title'] = 'Artikel';
		$data['subtitle'] = 'Buat Artikel';
		$data['artikel'] = $this->artikel_model->getOneArtikel($id);
		//$this->template->load('template/main', 'Acara/buatacara', $data);

		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
		$this->form_validation->set_rules('content_artikel', 'Content Artikel', 'required');
		$this->form_validation->set_rules('jenis_artikel', 'Jenis Artikel', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Artikel/editartikel', $data);
		} else {
			//print_r($_FILES);
			//exit;
			if ($_FILES['cover_artikel']['tmp_name'] != '') {
				$config['upload_path'] = './uploads/coverartikel/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('cover_artikel')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="text-danger">' . $error . '</div>');
					$this->template->load('template/main', 'Artikel/buatartikel', $data);
				} else {
					$result = $this->upload->data();
					// echo "<pre>";
					// print_r($result);
					// echo "</pre>";
					$data = [
						//'artikel_id' => $this->input->post('artikel_id'),
						'judul_artikel' => $this->input->post('judul_artikel'),
						'batas_daftar' => $this->input->post('batas_daftar'),
						'content_artikel' => $this->input->post('content_artikel'),
						'jenis_artikel' => $this->input->post('jenis_artikel'),
						'cover_artikel' => $this->upload->data('file_name')
					];
					$this->artikel_model->edit($id, $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success">
					<span><b>Berhasil Mengedit Artikel</b></span>
					</div>');
					redirect('Artikel/read');
				}
			} else {
				$data = [
					//'artikel_id' => $this->input->post('artikel_id'),
					'judul_artikel' => $this->input->post('judul_artikel'),
					'batas_daftar' => $this->input->post('batas_daftar'),
					'content_artikel' => $this->input->post('content_artikel'),
					'jenis_artikel' => $this->input->post('jenis_artikel')
				];
				$this->artikel_model->edit($id, $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Mengedit Artikel</b></span>
				</div>');
				redirect('Artikel/read');
			}
		}
	}

	public function deleteartikel($id = null)
	{
		if (isset($id)) {
			$this->artikel_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Artikel</b></span>
				</div>');
		}
		redirect(site_url('Artikel/read'));
	}

	public function cetakAbsen($id)
	{
		$data['info'] = $this->artikel_model->getOneArtikel($id);
		$data['absen'] = $this->artikel_model->generateAbsen($id);
		//print_r($data);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'landscape');
		//$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('artikel/absensi', $data);
	}

	public function dataabsen($id)
	{
		$data['id'] = $id;
		$data['title'] = 'Artikel';
		$data['subtitle'] = 'Semua Artikel';
		$data['data_absen'] = $this->artikel_model->generateAbsen($id);
		$this->template->load('template/main', 'Artikel/dataabsen', $data);
	}

	public function deleteabsen($acara, $id)
	{
		if (isset($id)) {
			$this->artikel_model->deleteabsen($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Materi</b></span>
				</div>');
		}
		redirect(site_url('Artikel/dataabsen/' . $acara));
	}
}
