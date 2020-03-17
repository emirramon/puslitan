<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peneliti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peneliti_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Peneliti';
        $data['subtitle'] = '';
        $data['peneliti'] = $this->peneliti_model->getPeneliti();
        $this->template->load('template/main', 'Peneliti/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Profil Peneliti';
        $data['subtitle'] = '';
        $data['peneliti'] = $this->peneliti_model->getOnePeneliti($id);
        $this->template->load('template/main', 'Peneliti/detailpeneliti', $data);
    }
}
