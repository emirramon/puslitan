<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profil';
        $data['subtitle'] = '';
        $this->template->load('template/main', 'Profile/index', $data);
    }
}
