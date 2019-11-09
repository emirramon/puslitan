<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function materi()
    {
        $data['title'] = 'Download';
        $data['subtitle'] = 'Materi';
        $this->template->load('template/main', 'Download/materi', $data);
    }

    public function sk()
    {
        $data['title'] = 'Download';
        $data['subtitle'] = 'SK';
        $this->template->load('template/main', 'Download/sk', $data);
    }
}
