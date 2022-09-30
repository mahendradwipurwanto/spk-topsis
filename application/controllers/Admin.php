<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin', 'M_kategori', 'M_kriteria']);
    }

    public function index()
    {
        $data['statistik'] = $this->M_admin->getStatistik();
        $data['kategori'] = $this->M_kategori->getKategori(['limit' => 5]);
        $data['kriteria'] = $this->M_kriteria->getKriteria(['limit' => 5]);
        $this->templateback->view('admin/dashboard', $data);
    }
}
