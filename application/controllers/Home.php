<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['subtitle'] = '';
		$data['data_artikel'] = $this->artikel_model->getArtikelDashboard();
		$this->template->load('template/main', 'Home/index', $data);
	}

	public function index2()
	{
		$data['title'] = 'Beranda';
		$data['subtitle'] = '';
		$data['data_artikel'] = $this->artikel_model->getArtikel();
		$this->template->load('template/main', 'Home/index2', $data);
	}
}
