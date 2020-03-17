<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function visimisi()
    {
        $data['title'] = 'Tentang Kami';
        $data['subtitle'] = 'Visi dan Misi';
        $this->template->load('template/main', 'About/visimisi', $data);
    }

    public function strukturorganisasi()
    {
        $data['title'] = 'Tentang Kami';
        $data['subtitle'] = 'Struktur Organisasi';
        $this->template->load('template/main', 'About/organisasi', $data);
    }

    public function deskripsipekerjaan()
    {
        $data['title'] = 'Tentang Kami';
        $data['subtitle'] = 'Deskripsi Pekerjaan';
        $this->template->load('template/main', 'About/pekerjaan', $data);
    }

    public function perkenalananggota()
    {
        $data['title'] = 'Tentang Kami';
        $data['subtitle'] = 'Perkenalan Anggota';
        $this->template->load('template/main', 'About/anggota', $data);
    }
}
