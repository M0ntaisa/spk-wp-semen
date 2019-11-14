<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi_model extends CI_Model {

    public function getEvalWhere($kd_material, $kd_suplier)
    {
        $this->db->select('kd_kriteria, nilai');
        $this->db->from('tb_evaluasi');
        $this->db->where('kd_suplier', $kd_suplier);
        $this->db->where('kd_material', $kd_material);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // fungsi update nilai pada tabel evaluasi
    public function updateNilaiHarga($data)
    {
        $harga = array(
            'nilai'     =>  $data['harga']
        );

        $this->db->where('kd_suplier', $data['kd_suplier']);
        $this->db->where('kd_material', $data['kd_material']);
        $this->db->where('kd_kriteria', 'krt-001');
        $this->db->update('tb_evaluasi', $harga);
    }
    public function updateNilaiKualitas($data)
    {
        $kualitas = array(
            'nilai'     =>  $data['kualitas']
        );

        $this->db->where('kd_suplier', $data['kd_suplier']);
        $this->db->where('kd_material', $data['kd_material']);
        $this->db->where('kd_kriteria', 'krt-002');
        $this->db->update('tb_evaluasi', $kualitas);
    }
    public function updateNilaiKuantitas($data)
    {
        $kuantitas = array(
            'nilai'     =>  $data['kuantitas']
        );

        $this->db->where('kd_suplier', $data['kd_suplier']);
        $this->db->where('kd_material', $data['kd_material']);
        $this->db->where('kd_kriteria', 'krt-003');
        $this->db->update('tb_evaluasi', $kuantitas);
    }

    // mengambil data evaluasi where kd_material
    public function getEvalHarga($kd_material,$kd_harga)
    {
        $query = $this->db->select('tb_evaluasi.kd_suplier,tb_suplier.nm_suplier, tb_evaluasi.nilai')->from('tb_evaluasi')->join('tb_suplier', 'tb_evaluasi.kd_suplier=tb_suplier.kd_suplier')->where('kd_material', $kd_material)->where('kd_kriteria', $kd_harga)->get();

        return $query->result_array();
        
    }
    public function getEvalKualitas($kd_material,$kd_kualitas)
    {
        $query = $this->db->select('tb_evaluasi.kd_suplier,tb_suplier.nm_suplier, tb_evaluasi.nilai')->from('tb_evaluasi')->join('tb_suplier', 'tb_evaluasi.kd_suplier=tb_suplier.kd_suplier')->where('kd_material', $kd_material)->where('kd_kriteria', $kd_kualitas)->get();

        return $query->result_array();
        
    }
    public function getEvalKuantitas($kd_material,$kd_kuantitas)
    {
        $query = $this->db->select('tb_evaluasi.kd_suplier,tb_suplier.nm_suplier, tb_evaluasi.nilai')->from('tb_evaluasi')->join('tb_suplier', 'tb_evaluasi.kd_suplier=tb_suplier.kd_suplier')->where('kd_material', $kd_material)->where('kd_kriteria', $kd_kuantitas)->get();

        return $query->result_array();
        
    }

}

/* End of file Evaluasi_model.php */
