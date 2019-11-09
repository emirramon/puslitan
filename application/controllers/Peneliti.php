<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peneliti extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profil Peneliti';
        $data['subtitle'] = '';
        $this->template->load('template/main', 'Peneliti/index', $data);
    }
}
