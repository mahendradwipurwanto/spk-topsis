<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penilaian extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_master');
    }

    public function getSettingsValue($key)
    {
        $query = $this->db->get_where('tb_settings', ['key' => $key]);
        return $query->row()->value;
    }

    function getNormalisasiALl(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getNormalisasiNilai($val->id);
        }
        $kategori = $this->M_master->getKategoriALl();
        
        $arr = [];
        foreach($models as $key => $val) {
            foreach($kategori as $k => $v){
                $arr[$v->id][] = round($models[$key]->kategori_siswa[$v->id]->nilai, 9);
            }
        }

        $arr_final = [];
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $arr_final[$key][] = round(pow($v, 2), 9);
            }
        }

        $arr_total = [];
        foreach ($arr_final as $key => $val) {
            $arr_total[$key] = round(sqrt(array_sum($val)), 9);
        }

        return [
            'data' => $models,
            'total' => $arr_total
        ];
    }

    function getMatrixR(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getNormalisasiNilai($val->id);
        }
        $kategori = $this->M_master->getKategoriALl();
        
        $arr = [];
        foreach($models as $key => $val) {
            foreach($kategori as $k => $v){
                $arr[$v->id][] = round($models[$key]->kategori_siswa[$v->id]->nilai, 9);
            }
        }

        $arr_final = [];
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $arr_final[$key][] = round(pow($v, 2), 9);
            }
        }

        $arr_total = [];
        foreach ($arr_final as $key => $val) {
            $arr_total[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->matrix_r = round($v->nilai/$arr_total[$k], 9);
            } 
        }

        return $models;
    }

    function getBobotMatrix(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getNormalisasiNilai($val->id);
        }
        $kategori = $this->M_master->getKategoriALl();
        
        $arr = [];
        foreach($models as $key => $val) {
            foreach($kategori as $k => $v){
                $arr[$v->id][] = round($models[$key]->kategori_siswa[$v->id]->nilai, 9);
            }
        }

        $arr_final = [];
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $arr_final[$key][] = round(pow($v, 2), 9);
            }
        }

        $arr_total = [];
        foreach ($arr_final as $key => $val) {
            $arr_total[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->matrix_r = round($v->nilai/$arr_total[$k], 9);
            } 
        }

        $arr_bobot = [];
        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->bobot_matrix = round($v->matrix_r*($v->bobot/100), 9);
                $arr_bobot[$v->kategori_id][] = $models[$key]->kategori_siswa[$k]->bobot_matrix;
            }
        }

        $arrMin = [];
        $arrMax = [];
        foreach($arr_bobot as $key => $val){
            $arrMin[$key] = round(min($val), 9);
            $arrMax[$key] = round(max($val), 9);
        }
        
        return [
            'data' => $models,
            'min' => $arrMin,
            'max' => $arrMax
        ];
    }

    function getDPlus(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getNormalisasiNilai($val->id);
        }
        $kategori = $this->M_master->getKategoriALl();
        
        $arr = [];
        foreach($models as $key => $val) {
            foreach($kategori as $k => $v){
                $arr[$v->id][] = round($models[$key]->kategori_siswa[$v->id]->nilai, 9);
            }
        }

        $arr_final = [];
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $arr_final[$key][] = round(pow($v, 2), 9);
            }
        }

        $arr_total = [];
        foreach ($arr_final as $key => $val) {
            $arr_total[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->matrix_r = round($v->nilai/$arr_total[$k], 9);
            } 
        }

        $arr_bobot = [];
        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->bobot_matrix = round($v->matrix_r*($v->bobot/100), 9);
                $arr_bobot[$v->kategori_id][] = $models[$key]->kategori_siswa[$k]->bobot_matrix;
            }
        }

        $arrMax = [];
        foreach($arr_bobot as $key => $val){
            $arrMax[$key] = round(max($val), 9);
        }
        
        $arr_total_d = [];
        foreach ($models as $key => $val) {
            foreach($val->kategori_siswa as $k => $v){
                $v->raw_d_plus = round(($arrMax[$k]-$v->bobot_matrix), 9);
                $v->nilai_d_plus = round(pow($v->raw_d_plus, 2), 9);
                $v->rumus = "({$arrMax[$k]}-{$v->bobot_matrix})^2)";
                $arr_total_d[$val->siswa_id][] = $v->nilai_d_plus;
            }
        }

        $arr_hitung_total_d = [];
        foreach($arr_total_d as $key => $val){
            $arr_hitung_total_d[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            $models[$key]->total_d_plus = $arr_hitung_total_d[$val->siswa_id];
        }
        // ej($models);
        return $models;
    }

    function getDMin(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getNormalisasiNilai($val->id);
        }
        $kategori = $this->M_master->getKategoriALl();
        
        $arr = [];
        foreach($models as $key => $val) {
            foreach($kategori as $k => $v){
                $arr[$v->id][] = round($models[$key]->kategori_siswa[$v->id]->nilai, 9);
            }
        }

        $arr_final = [];
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $arr_final[$key][] = round(pow($v, 2), 9);
            }
        }

        $arr_total = [];
        foreach ($arr_final as $key => $val) {
            $arr_total[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->matrix_r = round($v->nilai/$arr_total[$k], 9);
            } 
        }

        $arr_bobot = [];
        foreach($models as $key => $val){
            foreach($val->kategori_siswa as $k => $v){
                $models[$key]->kategori_siswa[$k]->bobot_matrix = round($v->matrix_r*($v->bobot/100), 9);
                $arr_bobot[$v->kategori_id][] = $models[$key]->kategori_siswa[$k]->bobot_matrix;
            }
        }

        $arMin = [];
        foreach($arr_bobot as $key => $val){
            $arMin[$key] = round(min($val), 9);
        }
        
        $arr_total_d = [];
        foreach ($models as $key => $val) {
            foreach($val->kategori_siswa as $k => $v){
                $v->raw_d_min = round(($arMin[$k]-$v->bobot_matrix), 9);
                $v->nilai_d_min = round(pow($v->raw_d_min, 2), 9);
                $v->rumus = "({$arMin[$k]}-{$v->bobot_matrix})^2)";
                $arr_total_d[$val->siswa_id][] = $v->nilai_d_min;
            }
        }

        $arr_hitung_total_d = [];
        foreach($arr_total_d as $key => $val){
            $arr_hitung_total_d[$key] = round(sqrt(array_sum($val)), 9);
        }

        foreach($models as $key => $val){
            $models[$key]->total_d_min = $arr_hitung_total_d[$val->siswa_id];
        }
        // ej($models);
        return $models;
    }
    
    function getNP(){
        $d_min = $this->getDMin();
        $d_plus = $this->getDPlus();
        foreach($d_min as $key => $val){
            $val->nilai_np = round(($d_min[$key]->total_d_min/($d_min[$key]->total_d_min+$d_plus[$key]->total_d_plus)), 9);
        }

        usort($d_min, function($a, $b) {
            return $b->nilai_np <=> $a->nilai_np;
        });

        return $d_min;
    }


    function getNormalisasiNilai($siswa_id){
        $this->db->select('a.id, a.siswa_id, a.kategori_id, b.kategori, b.bobot, b.jenis, a.nilai')
        ->from('tb_penilaian a')
        ->join('tb_kategori b', 'a.kategori_id = b.id')
        ->where(['a.siswa_id' => $siswa_id, 'a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->result();
        
        $arr = [];
        foreach($models as $key => $val){
            $arr[$val->kategori_id] = $val;

            // get min nilai by kategori
            $this->db->select('MIN(nilai) as min')
            ->from('tb_penilaian')
            ->where(['kategori_id' => $val->kategori_id, 'is_deleted' => 0])
            ;
            $min = $this->db->get()->row()->min;

            // get min nilai by kategori
            $this->db->select('MAX(nilai) as max')
            ->from('tb_penilaian')
            ->where(['kategori_id' => $val->kategori_id, 'is_deleted' => 0])
            ;
            $max = $this->db->get()->row()->max;

            $arr[$val->kategori_id]->max = $max;
            $arr[$val->kategori_id]->min = $min;

            if($val->jenis == 1){ #benefit
                $arr[$val->kategori_id]->nilai = round((($val->nilai-$min)/($max-$min)), 9);
            }else{ #cost
                $arr[$val->kategori_id]->nilai = round((-1*(($val->nilai-$min)/($max-$min))), 9);
            }
        }
        return $arr;
    }
}
