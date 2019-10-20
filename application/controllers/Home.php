<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->template->load('template/main', 'Content/index');
	}

	public function tentang()
	{
		$this->template->load('template/main', 'Content/tentang');
	}
}
