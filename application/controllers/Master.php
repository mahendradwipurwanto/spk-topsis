<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_master']);
    }

    public function penduduk()
    {
        $data['penduduk'] = $this->M_master->getPenduduk();
        $this->templateback->view('master/penduduk', $data);
    }

    function tambahPenduduk(){
        if($this->M_master->tambahPenduduk() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menambahkan data penduduk!");
            redirect(site_url('master/penduduk'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menambahkan data penduduk, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function editPenduduk(){
        if($this->M_master->editPenduduk() == true){
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data penduduk!");
            redirect(site_url('master/penduduk'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat mengubah data penduduk, coba lagi nanti!");
			redirect($this->agent->referrer());
        }
    }

    function hapusPenduduk(){
        if($this->M_master->hapusPenduduk() == true){
            $this->session->set_flashdata('notif_success', "Berhasil menghapus data penduduk!");
            redirect(site_url('master/penduduk'));
        }else{
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahaan saat menghapus data penduduk, coba lagi nanti!");
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
        $data['kriteria'] = $this->M_master->getKriteria();
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
}
