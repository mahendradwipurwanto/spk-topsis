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

    function ubahInformasiWebsite(){
        // WEBSITE
        $this->db->where('key', 'web_title');
        $this->db->update('tb_settings', ['value' => $this->input->post('web_title')]);

        $this->db->where('key', 'web_desc');
        $this->db->update('tb_settings', ['value' => $this->input->post('web_desc')]);

        // $this->db->where('key', 'web_logo');
        // $this->db->update('tb_settings', ['web_logo' => $this->input->post('web_logo')]);

        // $this->db->where('key', 'web_icon');
        // $this->db->update('tb_settings', ['web_icon' => $this->input->post('web_icon')]);
   
        // MAILER
        $this->db->where('key', 'mailer_alias');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_alias')]);

        $this->db->where('key', 'mailer_connection');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_connection')]);

        $this->db->where('key', 'mailer_host');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_host')]);

        $this->db->where('key', 'mailer_port');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_port')]);

        $this->db->where('key', 'mailer_username');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_username')]);

        $this->db->where('key', 'mailer_password');
        $this->db->update('tb_settings', ['value' => $this->input->post('mailer_password')]);

        return true;
    }
}
