<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getGuru($params = [])
    {
        $this->db->select('a.*, b.nama, b.email')
        ->from('tb_guru a')
        ->join('tb_auth b', 'a.user_id = b.user_id')
        ->where(['a.is_deleted' => 0, 'b.role' => 2])
        ->order_by('b.nama ASC')
        ;

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahGuru(){

        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        $nip = $this->input->post('nip');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        

        $auth = [
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 2,
            'created_at' => time(),
        ];

        $this->db->insert('tb_auth', $auth);

        $data = [
            'user_id' => $this->db->insert_id(),
            'nip' => $nip,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_guru', $data);
        return $this->db->affected_rows() == true;
    }

    function editGuru(){

        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        $auth = [
            'nama' => $nama,
        ];

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_auth', $auth);


        $data = [
            'nip' => $nip,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_guru', $data);
        return $this->db->affected_rows() == true;
    }

    function hapusGuru(){

        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_guru', $data);

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_auth', $data);
        return $this->db->affected_rows() == true;
    }

    public function getSiswa($params = [])
    {
        $this->db->select('a.*, b.nama, b.email')
        ->from('tb_siswa a')
        ->join('tb_auth b', 'a.user_id = b.user_id')
        ->where(['a.is_deleted' => 0, 'b.role' => 3])
        ->order_by('b.nama ASC')
        ;

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahSiswa(){

        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        $nip = $this->input->post('nip');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        $auth = [
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 3,
            'created_at' => time(),
        ];

        $this->db->insert('tb_auth', $auth);

        $data = [
            'user_id' => $this->db->insert_id(),
            'nip' => $nip,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_siswa', $data);
        return $this->db->affected_rows() == true;
    }

    function editSiswa(){

        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');

        $auth = [
            'nama' => $nama,
        ];

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_auth', $auth);


        $data = [
            'nip' => $nip,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_siswa', $data);
        return $this->db->affected_rows() == true;
    }

    function hapusSiswa(){

        $id = $this->input->post('id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_siswa', $data);
        return $this->db->affected_rows() == true;
    }

    public function getKategori($params = [])
    {
        $this->db->select('*')
        ->from('tb_kategori')
        ->where(['is_deleted' => 0])
        ->order_by('id ASC')
        ;

        return $this->db->get()->result();
    }

    function tambahKategori(){

        $kode = $this->generate_code($this->input->post('kategori'), 'tb_kategori', 'C');
        $kategori = $this->input->post('kategori');
        $jenis = $this->input->post('jenis');
        $bobot = $this->input->post('bobot');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kode' => $kode,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'bobot' => $bobot,
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
        $jenis = $this->input->post('jenis');
        $bobot = $this->input->post('bobot');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kategori' => $kategori,
            'jenis' => $jenis,
            'bobot' => $bobot,
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

    public function getKategoriALl($params = [])
    {
        $this->db->select('a.*')
        ->from('tb_kategori a')
        ->where(['a.is_deleted' => 0])
        ->order_by('a.id ASC');

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        $models = $this->db->get()->result();
        return $models;
    }

    public function getKriteriaByKategori($kategori_id)
    {
        $this->db->select('a.*, b.kategori')
        ->from('tb_kriteria a')
        ->join('tb_kategori b', 'a.kategori_id = b.id')
        ->where(['a.is_deleted' => 0, 'kategori_id' => $kategori_id])
        ->order_by('a.created_at DESC');

        if (!empty($params) && isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        return $this->db->get()->result();
    }

    function tambahKriteria(){

        $kode = $this->generate_code($this->input->post('kriteria'), 'tb_kriteria', 'S');
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

    function generate_code($string = '', $table = '', $code = ''){
        
        $number = $this->db->get($table)->num_rows();
        $code = strtoupper($code . "".($number+1));

        return $code;
    }

    function getPenilaian(){
        $this->db->select('a.*, b.id, c.nama, b.nip')
        ->from('tb_penilaian a')
        ->join('tb_siswa b', 'a.siswa_id = b.id')
        ->join('tb_auth c', 'b.user_id = c.user_id')
        ->where(['a.is_deleted' => 0])
        ->order_by('c.nama ASC');
        ;
        
        $models = $this->db->get()->result();
        
        $models = array_reverse(array_values(array_column(
            array_reverse($models),
            null,
            'siswa_id'
        )));

        foreach($models as $key => $val){
            $models[$key]->kategori_siswa = $this->getKategoriBySiswa($val->id);
        }
        // ej($models);
        return $models;
    }

    function getKategoriBySiswa($siswa_id){
        $this->db->select('a.*, b.kategori, b.jenis')
        ->from('tb_penilaian a')
        ->join('tb_kategori b', 'a.kategori_id = b.id')
        ->where(['a.siswa_id' => $siswa_id, 'a.is_deleted' => 0])
        ->order_by('b.id ASC')
        ;
        
        $models = $this->db->get()->result();

        $arr = [];
        foreach($models as $key => $val){
            $arr[$val->kategori_id] = $val;
        }

        return $arr;
    }

    function getKriteriaById($kriteria_id){
        $this->db->select('a.*')
        ->from('tb_kriteria a')
        ->where(['a.id' => $kriteria_id, 'a.is_deleted' => 0])
        ;
        
        $models = $this->db->get()->row();
        return $models;
    }

    function tambahPenilaian(){

        $siswa_id = $this->input->post('siswa_id');
        $kategori_id = $this->input->post('kategori_id');
        $nilai = $this->input->post('nilai');
        
        $this->db->trans_begin();
        foreach($kategori_id as $key => $val){
            $data = [
                'siswa_id' => $siswa_id,
                'kategori_id' => $kategori_id[$key],
                'nilai' => $nilai[$key],
                'created_at' => time(),
                'created_by' => $this->session->userdata('user_id')
            ];
            $this->db->insert('tb_penilaian', $data);
        }
        $this->db->trans_complete();

       if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return [
                'status' => false,
                'data' => $this->db->error()

            ];
        } else {
            $this->db->trans_commit();
            return [
                'status' => true,
                'data' => 'Berhasil'
            ];
        }
    }

    function editPenilaian(){
        $siswa_id = $this->input->post('id');
        $kategori_id = $this->input->post('kategori_id');
        $nilai = $this->input->post('nilai');
        $this->db->trans_begin();
        foreach($kategori_id as $key => $val){
            $data = [
                'siswa_id' => $siswa_id,
                'kategori_id' => $kategori_id[$key],
                'nilai' => $nilai[$key],
                'modified_at' => time(),
                'modified_by' => $this->session->userdata('user_id')
            ];
            $this->db->where(['siswa_id' => $siswa_id, 'kategori_id' => $kategori_id[$key]]);
            $this->db->update('tb_penilaian', $data);
        }
        $this->db->trans_complete();

       if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return [
                'status' => false,
                'data' => $this->db->error()

            ];
        } else {
            $this->db->trans_commit();
            return [
                'status' => true,
                'data' => 'Berhasil'
            ];
        }
    }

    function hapusPenilaian(){

        $id = $this->input->post('id');

        $data = [
            'is_deleted' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('siswa_id', $id);
        $this->db->update('tb_penilaian', $data);
        return $this->db->affected_rows() == true;
    }
}
