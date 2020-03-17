<?php

class Dosen_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->db->get('dosen')->result_array();
        }
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('fakultas', 'fakultas.idfakultas = dosen.fakultas');
        $this->db->join('jurusan', 'jurusan.idjurusan = dosen.jurusan');
        $this->db->join('pangkat', 'pangkat.idpangkat = dosen.pangkat');
        $this->db->join('golongan', 'golongan.idgolongan = dosen.golongan');
        $this->db->join('akun', 'akun.nip = dosen.nip');
        $this->db->where('dosen.nip', $id);
        return $this->db->get()->row_array();
        //return $this->db->get_where('dosen', ['nip' => $id])->join()->row_array();
    }

    public function getNip($nip)
    {
        return $this->db->get_where('dosen', ['nip' => $nip])->row_array();
    }

    public function getAkun()
    {
        return $this->db->from('dosen')->join('akun', 'akun.nip = dosen.nip')->join('fakultas', 'dosen.fakultas = fakultas.idfakultas')->get()->result_array();
    }
    public function edit($id)
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'tempatlahir' => $this->input->post('tempatlahir'),
            'tanggallahir' => $this->input->post('tanggallahir'),
            'fakultas' => $this->input->post('fakultas'),
            'jurusan' => $this->input->post('jurusan'),
            'pangkat' => $this->input->post('pangkat'),
            'golongan' => $this->input->post('golongan'),
            'npwp' => $this->input->post('npwp'),
            'norekening' => $this->input->post('norekening'),
            'namabank' => $this->input->post('namabank'),
            'namapemilik' => $this->input->post('namapemilik'),
            'jabatan' => $this->input->post('jabatan'),
            'email' => $this->input->post('email'),
            'nomorhp' => $this->input->post('nohp')
        ];

        $data2 = [
            'is_active' => $this->input->post('status')
        ];

        $this->db->update('akun', $data2, ['nip' => $id]);
        return $this->db->update('dosen', $data, ['nip' => $id]);
    }
}
