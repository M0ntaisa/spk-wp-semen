<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth->cek_login();
        // load model
        $this->load->model('Suplier_model');
    }

    public function index()
    {   
        // get data suplier
        $data['suplier'] = $this->Suplier_model->getSuplier();

        // mengambil data transmat dan memasukkan ke array
        $trans = array();
        for ($i=0; $i < count($data['suplier']) ; $i++) { 
            $kd_suplier = $data['suplier'][$i]['kd_suplier'];
            $x = $this->Suplier_model->getTransmat($kd_suplier);

            $trans[$i] = $x;
        }

        // meminimalkan array
        $g = array();
        for ($i=0; $i < count($trans) ; $i++) { 
            $row = count($trans[$i]);
            for ($j=0; $j < $row ; $j++) { 
                $g[$i]['kd_material'][$j] = $trans[$i][$j]['kd_material'];
            }
        }
        
        // menjadikan value array kode material sebagai key
        $transmat = array();
        for ($i=0; $i < count($g) ; $i++) { 
            $transmat[$i]['kd_material'] = array_combine($g[$i]['kd_material'], $g[$i]['kd_material']);
        }
        // print_r($transmat);

        // explode data menjadi array
        $material = array();
        for ($i=0; $i < count($data['suplier']) ; $i++) { 
            $material[] = explode("," , $data['suplier'][$i]['material']);
            
        }

        // mengambil nama material berdasarkan kd_material dlm database
        $nm_mat = array();
        for ($i=0; $i < count($material); $i++) { 
            for ($j=0; $j < count($material[$i]) ; $j++) { 
                $nama = json_encode($this->Suplier_model->getMaterial($material[$i][$j]));
                $nm_mat[$i][] = preg_replace('/"/','', $nama);
            }
        }
        
        // mengubah array material menjadi string dan memasukkan ke array data suplier
        for ($i=0; $i < count($nm_mat) ; $i++) { 
            $data['suplier'][$i]['material'] = implode(" ,", $nm_mat[$i]);
        }

        // menggabung array hasil dengan array subkriteria
        $suplier = array();
        for ($i=0; $i < count($data['suplier']) ; $i++) { 
            $x = array_merge($data['suplier'][$i], $transmat[$i]);
            $suplier[$i][] = $x;
        }
        // echo "<pre>";
        // print_r($suplier);exit;
        
        $data = array(  
            'title'     =>      'Suplier | Administrator',
            'subtitle'  =>      'Suplier',
            'suplier'   =>      $suplier,
            'isi'       =>      'admin/suplier/list' 
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // fungsi tambah data suplier
    public function tambah_suplier()
    {

        if ($this->input->post('material[]') == null) {
            // set flashdata
            $this->session->set_flashdata('gagal', 'Anda Belum Memilih Jenis Material.');
            redirect(base_url('admin/suplier'), 'refresh');
        } else {
            $arr_mat = $this->input->post('material[]');
            // gabung jenis material
            $material = implode(" ,", $arr_mat);
            
            $data = array (
                'kd_suplier'    =>  $this->input->post('kd_suplier'),
                'nm_suplier'    =>  $this->input->post('suplier'),
                'email'         =>  $this->input->post('email'),
                'Telepon'       =>  $this->input->post('telepon'),
                'material'      =>  $material,
                'alamat'        =>  $this->input->post('alamat')
            );
            
            // tambah data ke table suplier
            $this->Suplier_model->tambahSuplier($data);

            // tambah data ke table transmat
            for ($i=0; $i < count($arr_mat) ; $i++) { 

                $this->Suplier_model->tambahTransmat($data['kd_suplier'],$arr_mat[$i]);
                
            }

            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Suplier telah ditambahkan.');
            redirect(base_url('admin/suplier'), 'refresh');
        }
        
        
    }

    // fungsi edit data suplier
    public function edit_suplier()
    {
        if ($this->input->post('material[]') == null) {
            // set flashdata
            $this->session->set_flashdata('gagal', 'Anda Belum Memilih Jenis Material.');
            redirect(base_url('admin/suplier'), 'refresh');
        } else {
            $arr_mat = $this->input->post('material[]');
            // gabung jenis material
            $material = implode(" ,", $this->input->post('material[]'));
            $data = array (
                'kd_suplier'    =>  $this->input->post('kd_suplier'),
                'nm_suplier'    =>  $this->input->post('suplier'),
                'email'         =>  $this->input->post('email'),
                'Telepon'       =>  $this->input->post('telepon'),
                'material'      =>  $material,
                'alamat'        =>  $this->input->post('alamat')
            );
            
            $this->Suplier_model->editSuplier($data);

            // hapus transmat
            $this->Suplier_model->hapusTransmat($data['kd_suplier']);
            // edit data ke table transmat
            for ($i=0; $i < count($arr_mat) ; $i++) { 

                $this->Suplier_model->tambahTransmat($data['kd_suplier'],$arr_mat[$i]);
                
            }
            // echo "keluar pak eko";exit;
            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Suplier Telah Diedit');
            redirect(base_url('admin/suplier'));
        }

    }

    // fungsi hapus suplier
    public function hapus_suplier($kd_suplier)
    {
        $this->Suplier_model->hapusSuplier($kd_suplier);
        $this->session->set_flashdata('sukses', 'Data Suplier Telah Dihapus');
        redirect(base_url('admin/suplier'), 'refresh');
    }

}

/* End of file Suplier.php */
