<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{

	public function login()
	{
		$this->template->load('template/login', 'Formulir/login');
	}

	public function register()
	{
		$this->template->load('template/register', 'Formulir/register');
	}
}
