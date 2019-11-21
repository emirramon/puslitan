<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('materi_model');
		$this->load->model('sk_model');
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
				<span><b>Berhasil Menambahkan Materi</b></span>
				</div>');
				redirect('Download/materi');
			}
		}
	}

	public function editMateri($id = null)
	{
		if (isset($id)) {

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
						<span><b>Berhasil Mengubah Materi</b></span>
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
					<span><b>Berhasil Mengubah Materi</b></span>
					</div>');
					redirect('Download/materi');
				}
			}
		} else {
			redirect('Download/materi');
		}
	}

	public function downloadMateri($file = null)
	{
		$this->load->helper('download');
		if (isset($file)) {
			force_download('uploads/materi/' . $file, null);
		}
		redirect(site_url('Download/materi'));
	}

	public function deleteMateri($id = null)
	{
		if (isset($id)) {
			$this->materi_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Materi</b></span>
				</div>');
		}
		redirect(site_url('Download/materi'));
	}

	public function getMateri($id)
	{
		$data = $this->materi_model->getOneMateri($id);
		echo json_encode($data);
	}

	public function sk()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$data['data_kategori'] = $this->sk_model->getKategori();
		$data['data_sk'] = $this->sk_model->getSk();
		if (isset($_POST['tanggal'])) {
			$data['data_form'] = $_POST;
		}
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('no_sk', 'No SK', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('fileName', 'File', 'required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/sk', $data);
		} else {
			$config['upload_path'] = './uploads/sk/';
			$config['allowed_types'] = 'application/pdf|pdf|PDF';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error_file', '<div class="text-danger">' . $error . '</div>');
				$this->template->load('template/main', 'Download/sk', $data);
			} else {
				$result = $this->upload->data();
				$data = [
					'no_sk' => $this->input->post('no_sk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'judul' => $this->input->post('judul'),
					'tanggal' => $this->input->post('tanggal'),
					'file' => $this->upload->data('file_name')
				];
				$this->sk_model->saveSK($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menambahkan Materi</b></span>
				</div>');
				redirect('Download/sk');
			}
		}
	}

	public function editSK($id = null)
	{
		if (isset($id)) {

			$data['title'] = 'Download';
			$data['subtitle'] = 'SK';
			$data['data_kategori'] = $this->sk_model->getKategori();
			$data['data_sk'] = $this->sk_model->getSk();
			$data['id_edit'] = $id;
			$sk = $this->sk_model->getOneSK($id);
			$this->form_validation->set_rules('id_kategoriEdit', 'Kategori', 'required');
			$this->form_validation->set_rules('no_skEdit', 'No SK', 'required');
			$this->form_validation->set_rules('judulEdit', 'Judul', 'required');
			$this->form_validation->set_rules('tanggalEdit', 'Tanggal', 'required');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template/main', 'Download/sk', $data);
			} else {
				if ($_POST['fileNameEdit'] != '' && $_POST['fileNameEdit'] != $sk[0]['file']) {
					$config['upload_path'] = './uploads/sk/';
					$config['allowed_types'] = 'application/pdf|pdf|PDF';

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('file')) {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error_file_edit', '<div class="text-danger">' . $error . '</div>');
						$this->template->load('template/main', 'Download/sk', $data);
					} else {
						$result = $this->upload->data();
						$data = [
							'no_sk' => $this->input->post('no_skEdit'),
							'id_kategori' => $this->input->post('id_kategoriEdit'),
							'judul' => $this->input->post('judulEdit'),
							'tanggal' => $this->input->post('tanggalEdit'),
							'file' => $this->upload->data('file_name')
						];
						$this->sk_model->editSK($data, $id);
						$this->session->set_flashdata('message', '<div class="alert alert-success">
						<span><b>Berhasil Mengubah SK</b></span>
						</div>');
						redirect('Download/sk');
					}
				} else {
					$data = [
						'no_sk' => $this->input->post('no_skEdit'),
						'id_kategori' => $this->input->post('id_kategoriEdit'),
						'judul' => $this->input->post('judulEdit'),
						'tanggal' => $this->input->post('tanggalEdit')
					];
					$this->sk_model->editSK($data, $id);
					$this->session->set_flashdata('message', '<div class="alert alert-success">
					<span><b>Berhasil Mengubah SK</b></span>
					</div>');
					redirect('Download/sk');
				}
			}
		} else {
			redirect('Download/sk');
		}
	}


	public function getSK($id)
	{
		$data = $this->sk_model->getOneSK($id);
		echo json_encode($data);
	}

	public function downloadSK($file = null)
	{
		$this->load->helper('download');
		if (isset($file)) {
			force_download('uploads/sk/' . $file, null);
		}
		redirect(site_url('Download/sk'));
	}

	public function deleteSK($id = null)
	{
		if (isset($id)) {
			$this->sk_model->deleteSK($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus SK</b></span>
				</div>');
		}
		redirect(site_url('Download/sk'));
	}

	public function kategori()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$data['data_kategori'] = $this->sk_model->getKategori();
		$data['data_sub_kategori'] = $this->sk_model->getSubKategori();
		$this->template->load('template/main', 'Download/kategori', $data);
	}

	public function tambahKategori()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$data['data_kategori'] = $this->sk_model->getKategori();
		$data['data_sub_kategori'] = $this->sk_model->getSubKategori();
		$data['data_form_kategori'] = $_POST;
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/kategori', $data);
		} else {
			$data = [
				'nama_kategori' => $this->input->post('nama_kategori')
			];
			$this->sk_model->saveKategori($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span><b>Berhasil Menambah Kategori</b></span>
			</div>');
			redirect('Download/kategori');
		}
	}

	public function editKategori($id = null)
	{
		if (isset($id)) {
			$data['title'] = 'Download';
			$data['subtitle'] = 'SK';
			$data['data_kategori'] = $this->sk_model->getKategori();
			$data['data_sub_kategori'] = $this->sk_model->getSubKategori();
			$data['id_edit_kategori'] = $id;
			$this->form_validation->set_rules('nama_kategori_edit', 'Nama Kategori', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->template->load('template/main', 'Download/kategori', $data);
			} else {
				$data = [
					'nama_kategori' => $this->input->post('nama_kategori_edit')
				];
				$this->sk_model->editKategori($data, $id);
				$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Mengubah Kategori</b></span>
				</div>');
				redirect('Download/kategori');
			}
		} else {
			redirect('Download/kategori');
		}
	}

	public function getKategori($id)
	{
		$data = $this->sk_model->getOneKategori($id);
		echo json_encode($data);
	}

	public function tambahSubKategori()
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$data['data_kategori'] = $this->sk_model->getKategori();
		$data['data_sub_kategori'] = $this->sk_model->getSubKategori();
		$data['data_form_sub_kategori'] = $_POST;
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_sub_kategori', 'Sub Kategori', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/kategori', $data);
		} else {
			$data = [
				'id_kategori' => $this->input->post('id_kategori'),
				'nama_sub_kategori' => $this->input->post('nama_sub_kategori')
			];
			$this->sk_model->saveSubKategori($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span><b>Berhasil Menambah Sub Kategori</b></span>
			</div>');
			redirect('Download/kategori');
		}
	}

	public function editSubKategori($id = null)
	{
		$data['title'] = 'Download';
		$data['subtitle'] = 'SK';
		$data['data_kategori'] = $this->sk_model->getKategori();
		$data['data_sub_kategori'] = $this->sk_model->getSubKategori();
		$data['id_edit_sub_kategori'] = $id;
		$this->form_validation->set_rules('id_kategori_edit', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_sub_kategori_edit', 'Sub Kategori', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/main', 'Download/kategori', $data);
		} else {
			$data = [
				'id_kategori' => $this->input->post('id_kategori_edit'),
				'nama_sub_kategori' => $this->input->post('nama_sub_kategori_edit')
			];
			$this->sk_model->editSubKategori($data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
			<span><b>Berhasil Mengubah Sub Kategori</b></span>
			</div>');
			redirect('Download/kategori');
		}
	}


	public function getSubKategori($id)
	{
		$data = $this->sk_model->getOneSubKategori($id);
		echo json_encode($data);
	}

	public function deleteKategori($id = null)
	{
		if (isset($id)) {
			$this->sk_model->deleteKategori($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Kategori</b></span>
				</div>');
		}
		redirect(site_url('Download/kategori'));
	}

	public function deleteSubKategori($id = null)
	{
		if (isset($id)) {
			$this->sk_model->deleteSubKategori($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Berhasil Menghapus Sub Kategori</b></span>
				</div>');
		}
		redirect(site_url('Download/kategori'));
	}
}
