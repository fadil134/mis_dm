<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kmberanda extends CI_Controller
{
    public function index()
    {
        $allowed_url = base_url('dist/beranda');
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == $allowed_url) {
            $data = $this->Page_m->ssirih();
            echo json_encode($data);
        }
    }

    public function save_ssirih()
    {
        //$allowed_referer = base_url('dist/beranda'); // Adjust to your specific value
        $config['upload_path'] = FCPATH . 'uploads/beranda/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mpeg';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;

        $this->upload->initialize($config);
        $error = array();

        $this->form_validation->set_rules('sekapur_sirih', 'Sekapur Sirih', 'required');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->form_validation->run()) {
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
            } elseif (empty($data['picture_data'])) {
                $s_sirih = array(
                    'filename' => $this->input->post('imG_url'),
                    'url' => $this->input->post('img_url'),
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
            } elseif (empty($data['video_data'])) {
                $s_sirih = array(
                    'filename' => $data['picture_data']['file_name'],
                    'url' => base_url() . 'uploads/beranda/' . $data['picture_data']['file_name'],
                    'display_location' => 'beranda',
                    'created_at' => date('Y-m-d'),
                    'description' => $this->input->post('sekapur_sirih'),
                    'is_active' => 0,
                    'url_video' => $this->input->post('vid_url'),
                    'video' => $this->input->post('fileVideo'),
                    'display_section' => 'sekapur sirih',
                );
                $this->Page_m->save_ss($s_sirih);
                redirect('dist/beranda', 'refresh');
            } else {
                $s_sirih = array(
                    'filename' => $this->input->post('imG_url'),
                    'url' => $this->input->post('img_url'),
                    'display_location' => 'beranda',
                    'created_at' => date('Y-m-d'),
                    'description' => $this->input->post('sekapur_sirih'),
                    'is_active' => 0,
                    'url_video' => $this->input->post('vid_url'),
                    'video' => $this->input->post('fileVideo'),
                    'display_section' => 'sekapur sirih',
                );
                $this->Page_m->save_ss($s_sirih);
                redirect('dist/beranda', 'refresh');
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
        $affected_rows = $this->Page_m->update_ss($id, $data);

        if ($affected_rows > 0) {
            $response = array(
                'success' => 'Record updated successfully.',
            );
        } else {
            $response = array(
                'error' => 'Failed to update record.',
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function delete_ssirih()
    {
        $id = $this->input->post('id');
        $affected_rows = $this->Page_m->delete_ss($id);

        if ($affected_rows > 0) {
            $response = array(
                'success' => 'Data telah berhasil di hapus',
            );
        } else {
            $response = array(
                'error' => 'Data tidak berhasil di hapus',
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update_ssir()
    {
        $id = $this->input->post('ids');
        if (!empty($this->input->post('gambar')) && !empty($this->input->post('fileV'))) {
            $data['url'] = $this->input->post('gambar');
            $data['url_video'] = $this->input->post('vid');
            $data['filename'] = $this->input->post('fileG');
            $data['video'] = $this->input->post('fileV');
        } else {
            $data['url'] = $this->input->post('gambarex');
            $data['url_video'] = $this->input->post('videoex');
            $data['filename'] = $this->input->post('gambarexname');
            $data['video'] = $this->input->post('videoexname');
        }
        $data = array(
            'description' => $this->input->post('ssmodal'),
        );
        $rows = $this->Page_m->update_sir($id, $data);
        if ($rows > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Horeee!</strong> Data berhasil di simpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        } else {
            //print_r($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Waduh!</strong> Data belum berhasil di simpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        }

        redirect('dist/beranda', 'refresh');
    }
}

/* End of file Kmberanda.php */
