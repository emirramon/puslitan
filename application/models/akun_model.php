<?php
defined('BASEPATH') or exit('No direct script access allowed');

class akun_model extends CI_Model
{
    public function getFakultas()
    {
        $query = "SELECT `dosen`.*, `fakultas`.`namafakultas`
                  FROM `dosen` JOIN `fakultas`
                  ON `dosen`.`fakultas` = `fakultas`.`idfakultas`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getJurusan()
    {
        $query = "SELECT * FROM jurusan";
        // $query = "SELECT `dosen`.*, `jurusan`.`idjurusan`
        //           FROM `dosen` JOIN `jurusan`
        //           ON `dosen`.`jurusan` = `jurusan`.`idjurusan`
        // ";
        return $this->db->query($query)->result_array();
    }
}
