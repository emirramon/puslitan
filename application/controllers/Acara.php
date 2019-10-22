<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{
    function buat()
    {
        $this->template->load('template/main', 'Formulir/buatacara');
    }
}
