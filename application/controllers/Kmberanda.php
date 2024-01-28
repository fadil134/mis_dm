<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kmberanda extends CI_Controller
{

    public function index()
    {
        $data = $this->Page_m->ss();
        echo json_encode($data);
    }

    public function save_ssirih()
    {
        $allowed_referer = base_url('dist/beranda'); // Adjust to your specific value
        $config['upload_path'] = FCPATH . 'uploads/beranda/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mpeg';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;

        $this->upload->initialize($config);
        $error = array();

        $this->form_validation->set_rules('sekapur_sirih', 'Sekapur Sirih', 'required');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == $allowed_referer && $this->form_validation->run()) {
            // Handle picture upload
            $data = array();
            $error = array();
            if (isset($_FILES['ssgambar'])) {
                if ($this->upload->do_upload('ssgambar')) {
                    $data['picture_data'] = $this->upload->data();
                } else {
                    $error['ssgambar'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_ssgambar', $error['ssgambar']);
                }
            }

            // Handle video upload
            if (isset($_FILES['ssvideo'])) {
                $this->upload->initialize($config); // Reinitialize for video upload

                if ($this->upload->do_upload('ssvideo')) {
                    $data['video_data'] = $this->upload->data();

                    // Process or save video data as needed
                } else {
                    $error['ssvideo'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_ssvideo', $error['ssvideo']);
                }
            }

            if (!empty($data['picture_data']) && !empty($data['video_data'])) {
                $s_sirih = array(
                    'filename' => $data['picture_data']['file_name'],
                    'url' => base_url() . 'uploads/beranda/' . $data['picture_data']['file_name'],
                    'display_location' => 'beranda',
                    'created_at' => date('Y-m-d'),
                    'description' => $this->input->post('sekapur_sirih'),
                    'is_active' => 0,
                    'url_video' => base_url() . 'uploads/beranda/' . $data['video_data']['file_name'],
                    'video' => $data['video_data']['file_name'],
                    'display_section' => 'sekapur sirih',
                );
                $this->Page_m->save_ss($s_sirih);
                redirect('dist/beranda', 'refresh');
            } else {
                echo 'error';
            }
            //redirect('dist/beranda','refresh');
        } else {
            show_404();
        }
    }

    public function update_ssirih()
    {
        $id = $this->input->post('id');
        $data = array(
            'is_active' => $this->input->post('switch'),
        );
    }

}

/* End of file Kmberanda.php */
