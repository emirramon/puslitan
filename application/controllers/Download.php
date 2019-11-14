<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('materi_model');
	}

	public function materi()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'Materi';
		$data['data_materi'] = $this->materi_model->getMateri();
		if (isset($_POST['tanggal'])) {
			$data['data_form'] = $_POST;
		}
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('pemateri', 'Pemateri', 'required');
		$this->form_validation->set_rules('fileName', 'File', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/materi', $data);
		} else {
			$config['upload_path'] = './uploads/materi/';
			$config['allowed_types'] = 'application/pdf|pdf|PDF';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error_file', '<div class="text-danger">' . $error . '</div>');
				$this->template->load('template/main', 'Download/materi', $data);
			} else {
				$result = $this->upload->data();
				// echo "<pre>";
				// print_r($result);
				// echo "</pre>";
				$data = [
					'judul' => $this->input->post('judul'),
					'tanggal' => $this->input->post('tanggal'),
					'pemateri' => $this->input->post('pemateri'),
					'file' => $this->upload->data('file_name')
				];
				$this->materi_model->save($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span>
					<b>Berhasil Menambahkan Materi</b></span>
				</div>');
				redirect('Download/materi');
			}
		}
	}

	public function editMateri($id)
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'Materi';
		$data['data_materi'] = $this->materi_model->getMateri();
		$data['id_edit'] = $id;
		$materi = $this->materi_model->getOneMateri($id);
		$this->form_validation->set_rules('judulEdit', 'Judul', 'required');
		$this->form_validation->set_rules('tanggalEdit', 'Tanggal', 'required');
		$this->form_validation->set_rules('pemateriEdit', 'Pemateri', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/materi', $data);
		} else {
			if ($_POST['fileNameEdit'] != '' && $_POST['fileNameEdit'] != $materi[0]['file']) {
				$config['upload_path'] = './uploads/materi/';
				$config['allowed_types'] = 'application/pdf|pdf|PDF';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error_file_edit', '<div class="text-danger">' . $error . '</div>');
					$this->template->load('template/main', 'Download/materi', $data);
				} else {
					$result = $this->upload->data();
					$data = [
						'judul' => $this->input->post('judulEdit'),
						'tanggal' => $this->input->post('tanggalEdit'),
						'pemateri' => $this->input->post('pemateriEdit'),
						'file' => $this->upload->data('file_name')
					];
					$this->materi_model->edit($data, $id);
					$this->session->set_flashdata('message', '<div class="alert alert-success">
					<span>
						<b>Berhasil Mengubah Materi</b></span>
					</div>');
					redirect('Download/materi');
				}
			} else {
				$data = [
					'judul' => $this->input->post('judulEdit'),
					'tanggal' => $this->input->post('tanggalEdit'),
					'pemateri' => $this->input->post('pemateriEdit')
				];
				$this->materi_model->edit($data, $id);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span>
					<b>Berhasil Mengubah Materi</b></span>
				</div>');
				redirect('Download/materi');
			}
		}
	}

	public function downloadMateri($file = null)
	{
		$this->load->helper('download');
		if (isset($file)) {
			force_download('uploads/materi/'.$file, null);
		}
		redirect(site_url('Download/materi'));
	}

	public function deleteMateri($id = null)
	{
		if (isset($id)) {
			$this->materi_model->delete($id);
		}
		redirect(site_url('Download/materi'));
	}

	public function sk()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$this->template->load('template/main', 'Download/sk', $data);
	}

	public function getMateri($id)
	{
		$data = $this->materi_model->getOneMateri($id);
		echo json_encode($data);
	}
}
