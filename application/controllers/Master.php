<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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

        $this->load->model(['M_master']);
    }

    public function siswa()
    {
        $data['siswa'] = $this->M_master->getSiswa();
        $this->templateback->view('master/siswa', $data);
    }

    function tambahSiswa(){
        if($this->M_master->tambahSiswa() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menambahkan data siswa!");
            redirect(site_url('master/siswa'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menambahkan data siswa, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function editSiswa(){
        if($this->M_master->editSiswa() == true){
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data siswa!");
            redirect(site_url('master/siswa'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat mengubah data siswa, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function hapusSiswa(){
        if($this->M_master->hapusSiswa() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menghapus data siswa!");
            redirect(site_url('master/siswa'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menghapus data siswa, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    public function kategori()
    {
        $data['kategori'] = $this->M_master->getKategori();
        $this->templateback->view('master/kategori', $data);
    }

    function tambahKategori(){
        if($this->M_master->tambahKategori() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menambahkan data kategori!");
            redirect(site_url('master/kategori'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menambahkan data kategori, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function editKategori(){
        if($this->M_master->editKategori() == true){
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data kategori!");
            redirect(site_url('master/kategori'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat mengubah data kategori, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function hapusKategori(){
        if($this->M_master->hapusKategori() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menghapus data kategori!");
            redirect(site_url('master/kategori'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menghapus data kategori, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    public function kriteria()
    {
        $data['kategori'] = $this->M_master->getkategori();
        $data['kriteria'] = $this->M_master->getKategoriALl();
        $this->templateback->view('master/kriteria', $data);
    }

    function tambahKriteria(){
        if($this->M_master->tambahKriteria() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menambahkan data kriteria!");
            redirect(site_url('master/kriteria'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menambahkan data kriteria, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function editKriteria(){
        if($this->M_master->editKriteria() == true){
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data kriteria!");
            redirect(site_url('master/kriteria'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat mengubah data kriteria, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function hapusKriteria(){
        if($this->M_master->hapusKriteria() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menghapus data kriteria!");
            redirect(site_url('master/kriteria'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menghapus data kriteria, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    public function penilaian()
    {
        $data['penilaian'] = $this->M_master->getPenilaian();
        $data['siswa'] = $this->M_master->getSiswa();
        $data['kategori'] = $this->M_master->getKategoriALl();
        // ej($data);
        $this->templateback->view('master/penilaian', $data);
    }

    function tambahPenilaian(){
        if($this->M_master->tambahPenilaian() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menambahkan data penilaian!");
            redirect(site_url('master/penilaian'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menambahkan data penilaian, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function editPenilaian(){
        if($this->M_master->editPenilaian() == true){
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data penilaian!");
            redirect(site_url('master/penilaian'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat mengubah data penilaian, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function hapusPenilaian(){
        if($this->M_master->hapusPenilaian() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menghapus data penilaian!");
            redirect(site_url('master/penilaian'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menghapus data penilaian, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }
}
