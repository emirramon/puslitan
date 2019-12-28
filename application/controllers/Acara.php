<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('nip') != 'Administrator') {
        //     redirect('Home');
        // }
        is_logged_in();
    }

    function buat()
    {
        $data['title'] = 'Acara';
        $data['subtitle'] = 'Buat Acara';
        $this->template->load('template/main', 'Acara/buatacara', $data);
    }

    function read()
    {
        $data['title'] = 'Acara';
        $data['subtitle'] = 'Semua Acara';
        $this->template->load('template/main', 'Acara/readacara', $data);
    }
}
