<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKategori($params = [])
    {
        $this->db->select('*')
        ->from('tb_kategori')
        ->where(['is_deleted' => 0])
        ->order_by('created_at DESC')
        ;

        if(!empty($params) && isset($params['limit'])){
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }
}
