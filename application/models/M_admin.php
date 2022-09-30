<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getStatistik(){

        $penduduk = $this->db->get_where('tb_penduduk', ['is_deleted' => 0])->num_rows();
        $kategori = $this->db->get_where('tb_kategori', ['is_deleted' => 0])->num_rows();
        $kriteria = $this->db->get_where('tb_kriteria', ['is_deleted' => 0])->num_rows();

        return [
            'penduduk' => $penduduk,
            'kategori' => $kategori,
            'kriteria' => $kriteria
        ];
    }
}
