<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kmberanda extends CI_Controller
{

    public function index()
    {

    }

    public function s_sirih()
    {
        $s_sirih = array(
            $this->input->post('sekapur_sirih'));
        $config['upload_path']      = './uploads/beranda/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data['photo_data'] = $this->upload->data();
        }

        // Konfigurasi upload untuk video
        $config['upload_path']      = './uploads/beranda/';
        $config['allowed_types']    = 'mp4|avi|mov';
        $config['max_size']         = 5000; // 5000 KB
        $config['max_width']        = 1920;
        $config['max_height']       = 1080;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('video')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data['video_data'] = $this->upload->data();
            // Tambahkan logika atau pemrosesan tambahan untuk video di sini
        }

        // Tampilkan halaman sukses dengan data upload
        $this->load->view('upload_success', $data);
    }

}

/* End of file Kmberanda.php */
