<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKriteria($params = [])
    {
        $this->db->select('a.*, b.kategori')
        ->from('tb_kriteria a')
        ->join('tb_kategori b', 'a.kategori_id = b.id')
        ->where(['a.is_deleted' => 0])
        ->order_by('a.created_at DESC')
        ;

        if(!empty($params) && isset($params['limit'])){
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }
}
