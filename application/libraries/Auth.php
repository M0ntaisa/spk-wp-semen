<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Auth {
        protected $CI;

        public function __construct()
        {
            $this->CI =& get_instance();
            // Load data model user
            $this->CI->load->model('user_model');
        }

        // fungsi logn
        public function login($username, $password)
        {
            $check = $this->CI->user_model->login($username, $password);

            // jika ada data user, maka create session login
            if( $check ) {
                $id_user = $check['id_user'];
                $nama = $check['nama'];
                $akses_level = $check['akses_level'];

                // create session
                $this->CI->session->set_userdata('id_user', $id_user);
                $this->CI->session->set_userdata('nama', $nama);
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('akses_level', $akses_level);

                // redirect ke halaman admin yg diproteksi
                if( $akses_level == 'Admin' ){
                    redirect(base_url('admin/dashboard'), 'refresh');
                    // echo "berhasil login sebagai admin";
                } else {
                    redirect(base_url('peternak/dashboard'),'refresh');
                    // echo "berhasil login sebagai apapun yg anda inginkan";
                }

            } else {
                // kalau tidak ada username/password salah, maka kembali login
                $this->CI->session->set_flashdata('warning', 'Username atau password salah.');
                redirect(base_url('login'), 'refrest');
            }
            
        }

        // fungsi cek login
        public function cek_login()
        {
            // memeriksa apakah session sudah ada atau belum, jika belum redirect ke halaman login
            if( $this->CI->session->userdata('username') == "" ) {
                $this->CI->session->set_flashdata('warning', 'Anda belum login');
                redirect(base_url('login'), 'refresh');
            }
        }

        // fungsi logout
        public function logout()
        {
            // membuang semua session yang telah diset saat login
            $this->CI->session->unset_userdata('id_user');
            $this->CI->session->unset_userdata('nama');
            $this->CI->session->unset_userdata('username');
            $this->CI->session->unset_userdata('akses_level');
            // setelah session dibuang, redirect ke halaman login
            $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
            redirect(base_url('login'), 'refresh');
        }
    }