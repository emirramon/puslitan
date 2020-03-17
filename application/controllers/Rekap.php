<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
    }
    public function index()
    {
        $data['title'] = 'Rekap Acara';
        $data['subtitle'] = '';
        $data['artikel_model'] = $this->artikel_model->getArtikelAcara();
        $this->template->load('template/main', 'Rekap/index', $data);
    }

    public function dataabsen($id)
    {
        $data['id'] = $id;
        $data['title'] = 'Rekap Acara';
        $data['subtitle'] = '';
        $data['data_absen'] = $this->artikel_model->generateAbsen($id);
        $this->template->load('template/main', 'Rekap/dataabsen', $data);
    }
}
