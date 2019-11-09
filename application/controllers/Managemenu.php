<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('nip') != 'Administrator') {
        //     redirect('Home');
        // }
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Menu';
        $data['subtitle'] = 'Main Menu';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/main', 'Menu/index', $data);
        } else {

            $data = [
                'title' => $this->input->post('menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];

            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Berhasil Menambahkan Menu</span>
            </div>');
            redirect('Managemenu');
        }
    }

    public function useraccess()
    {
        $data['title'] = 'Manajemen Menu';
        $data['subtitle'] = 'User Access';
        $this->load->model('menu_model', 'menu');
        $data['level'] = $this->menu->getuseraccess();
        $data['menu'] = $this->menu->getMenu();
        $data['akses'] = $this->db->get('user_role')->result_array();

        if ($this->form_validation->run() == false) {
            $this->template->load('template/main', 'Menu/useraccess', $data);
        } else {

            // $data = [
            //     'title' => $this->input->post('menu'),
            //     'url' => $this->input->post('url'),
            //     'icon' => $this->input->post('icon')
            // ];

            // $this->db->insert('user_menu', $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success">
            // <span>
            // 	<b>Berhasil Menambahkan Menu</span>
            // </div>');
            // redirect('Managemenu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Manajemen Menu';
        $data['subtitle'] = 'Sub Menu';

        $this->load->model('menu_model', 'menu');
        $data['submenu'] = $this->menu->getSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu_id', 'Main Menu', 'required');
        $this->form_validation->set_rules('sub_title', 'Judul Sub Menu', 'required');
        $this->form_validation->set_rules('url', 'Controller', 'required');
        $this->form_validation->set_rules('icon', 'Initial', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/main', 'Menu/submenu', $data);
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id'),
                'sub_title' => $this->input->post('sub_title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
			<span>
				<b>Berhasil Menambahkan Sub Menu</span>
            </div>');
            redirect('Managemenu/submenu');
        }
    }

    public function icons()
    {
        $data['title'] = 'Manajemen Menu';
        $data['subtitle'] = 'Icons';

        $this->template->load('template/main', 'Menu/icons', $data);
    }
}
