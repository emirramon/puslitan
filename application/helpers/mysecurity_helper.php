<?php

function is_logged_in()
{

    $ci = get_instance();
    if (!$ci->session->userdata('nip')) {
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('level');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', ['level' => $role_id, 'menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('Home');
        }
    }
}
