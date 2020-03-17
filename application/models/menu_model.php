<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu_model extends CI_Model
{
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu` .*, `user_menu`.`title`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getuseraccess()
    {
        $query = "SELECT `user_access_menu`.*, `user_role`.`role`
                  FROM `user_access_menu` JOIN `user_role`
                  ON `user_access_menu`.`level` = `user_role`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getMenu()
    {
        $query = "SELECT * FROM `user_menu`";
        // $query = "SELECT `user_access_menu`.*, `user_menu`.`title`
        //           FROM `user_access_menu` JOIN `user_menu`
        //           ON `user_access_menu`.`menu_id` = `user_menu`.`id`
        //         ";
        return $this->db->query($query)->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete('user_access_menu', array("id" => $id));
    }
}
