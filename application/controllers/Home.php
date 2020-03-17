<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('dosen_model');
	}
	public function index()
	{
		$data['title'] = 'Beranda';
		$data['subtitle'] = '';
		$data['artikel'] = $this->artikel_model->getArtikel();
		$this->template->load('template/main', 'Home/index', $data);
	}
	public function detail($id)
	{
		$data['title'] = 'Beranda';
		$data['subtitle'] = '';
		//echo $id;
		$nip = $this->session->userdata('nip');
		$data['kuotadaftar'] = $this->artikel_model->getTotalDaftar($id);
		$id_dosen = $this->dosen_model->getNip($nip);

		$data['isDaftar'] = $this->artikel_model->getUserDaftar($id, $id_dosen['id']);
		$data['artikel'] = $this->artikel_model->getOneArtikel($id);
		$this->template->load('template/main', 'Home/detailartikel', $data);
	}
	public function daftar($id)
	{
		if (!isset($_SERVER['HTTP_REFERER'])) {
			redirect('Home');
		}
		$a = $this->artikel_model->getOneArtikel($id);
		$n = $this->dosen_model->getnip($this->session->userdata('nip'));
		$data = [
			'artikel' => $id,
			'nip' => $n['id']
		];
		if ($this->artikel_model->daftar_kegiatan($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				<span><b>Selamat anda berhasil mendaftar kegiatan' . $a['judul_artikel'] . '</span></div>');
			redirect('Home');
		}
	}
}
