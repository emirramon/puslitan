<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pangkat_model extends CI_Model
{

    public function get_pangkat()
    {
        $this->db->from('pangkat');
        $query = $this->db->get();
        return $query;
    }
}
