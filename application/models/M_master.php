<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPenduduk($params = [])
    {
        $this->db->select('*')
        ->from('tb_penduduk')
        ->where(['is_deleted' => 0])
        ->order_by('created_at DESC')
        ;

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahPenduduk(){

        $kode = 1;
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        $data = [
            'kode' => $kode,
            'nama' => $nama,
            'nik' => $nik,
            'kk' => $kk,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_penduduk', $data);
        return $this->db->affected_rows() == true;
    }

    function editPenduduk(){

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        $data = [
            'nama' => $nama,
            'nik' => $nik,
            'kk' => $kk,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_penduduk', $data);
        return $this->db->affected_rows() == true;
    }

    function hapusPenduduk(){

        $id = $this->input->post('id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_penduduk', $data);
        return $this->db->affected_rows() == true;
    }

    public function getKategori($params = [])
    {
        $this->db->select('*')
        ->from('tb_kategori')
        ->where(['is_deleted' => 0])
        ->order_by('created_at DESC')
        ;

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahKategori(){

        $kode = 1;
        $kategori = $this->input->post('kategori');
        $bobot = $this->input->post('bobot');
        $jenis = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kode' => $kode,
            'kategori' => $kategori,
            'bobot' => $bobot,
            'jenis' => $jenis,
            'keterangan' => $keterangan,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_kategori', $data);
        return $this->db->affected_rows() == true;
    }

    function editKategori(){

        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $bobot = $this->input->post('bobot');
        $jenis = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kategori' => $kategori,
            'bobot' => $bobot,
            'jenis' => $jenis,
            'keterangan' => $keterangan,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_kategori', $data);
        return $this->db->affected_rows() == true;
    }

    function hapusKategori(){

        $id = $this->input->post('id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_kategori', $data);
        return $this->db->affected_rows() == true;
    }

    public function getKriteria($params = [])
    {
        $this->db->select('a.*, b.kategori')
        ->from('tb_kriteria a')
        ->join('tb_kategori b', 'a.kategori_id = b.id')
        ->where(['a.is_deleted' => 0])
        ->order_by('a.created_at DESC');

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahKriteria(){

        $kode = 1;
        $kriteria = $this->input->post('kriteria');
        $kategori_id = $this->input->post('kategori_id');
        $nilai = $this->input->post('nilai');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kode' => $kode,
            'kriteria' => $kriteria,
            'kategori_id' => $kategori_id,
            'nilai' => $nilai,
            'keterangan' => $keterangan,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_kriteria', $data);
        return $this->db->affected_rows() == true;
    }

    function editKriteria(){

        $id = $this->input->post('id');
        $kriteria = $this->input->post('kriteria');
        $kategori_id = $this->input->post('kategori_id');
        $nilai = $this->input->post('nilai');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kriteria' => $kriteria,
            'kategori_id' => $kategori_id,
            'nilai' => $nilai,
            'keterangan' => $keterangan,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_kriteria', $data);
        return $this->db->affected_rows() == true;
    }

    function hapusKriteria(){

        $id = $this->input->post('id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_kriteria', $data);
        return $this->db->affected_rows() == true;
    }
}
