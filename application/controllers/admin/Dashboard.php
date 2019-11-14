<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth->cek_login();

        // load model
        $this->load->model('Suplier_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Subkriteria_model');
        
    }

    // Halaman utama Dashboard
    public function index()
    {
        $jumlah_suplier = count($this->Suplier_model->getSuplier());
        $jumlah_kriteria = count($this->Kriteria_model->getKriteria());
        $jumlah_subkriteria = count($this->Subkriteria_model->getSubkrit());

        $data = array(  'title'             =>      'Dashboard | Administrator',
                        'subtitle'          =>      'Dashboard',
                        'jum_suplier'       =>       $jumlah_suplier,
                        'jum_kriteria'      =>       $jumlah_kriteria,
                        'jum_subkriteria'   =>       $jumlah_subkriteria,
                        'isi'               =>      'admin/dashboard/list' );
        
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

}