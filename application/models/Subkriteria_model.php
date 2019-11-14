<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria_model extends CI_Model {

    public function getSubkriteria($kd_kriteria, $kd_material)
    {
        $this->db->select('*');
        $this->db->from('tb_subkriteria');
        $this->db->where('kd_kriteria', $kd_kriteria);
        $this->db->where('kd_material', $kd_material);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // get subkriteria
    public function getSubkrit()
    {
        return $this->db->get('tb_subkriteria')->result_array();
    }

}

/* End of file Subkriteria_model.php */
