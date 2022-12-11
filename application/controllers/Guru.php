<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap login, untuk melanjutkan");
            redirect('login');
        }

        $this->load->model(['M_admin', 'M_kategori', 'M_kriteria']);
    }

    public function index()
    {
        $data['statistik'] = $this->M_admin->getStatistik();
        $data['kategori'] = $this->M_kategori->getKategori(['limit' => 5]);
        // $data['kriteria'] = $this->M_kriteria->getKriteria(['limit' => 5]);
        $this->templateback->view('guru/dashboard', $data);
    }
}
