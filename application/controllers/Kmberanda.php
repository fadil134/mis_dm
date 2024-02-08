<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kmberanda extends CI_Controller
{
    public function index()
    {        
        $data = $this->Page_m->ssirih();
        echo json_encode($data);
    }

    public function save_ssirih()
    {
        //$allowed_referer = base_url('dist/beranda'); // Adjust to your specific value
        $config['upload_path'] = FCPATH . 'uploads/beranda/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mpeg';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;

        $error = array();

        $this->form_validation->set_rules('sekapur_sirih', 'Sekapur Sirih', 'required');

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->form_validation->run() === true) {
            // Handle picture upload
            $data = array();
            $error = array();
            $img_url = $this->input->post('img_url');
            $vid_url = $this->input->post('vid_url');
            
            if (isset($_FILES['ssgambar'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('ssgambar')) {
                    $data['picture_data'] = $this->upload->data();
                } else {
                    $error['ssgambar'] = $this->upload->display_errors();
                    $this->session->set_flashdata('pesan', $error['ssgambar']);
                }
            }

            // Handle video upload
            if (isset($_FILES['ssvideo'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('ssvideo')) {
                    $data['video_data'] = $this->upload->data();

                    // Process or save video data as needed
                } else {
                    $error['ssvideo'] = $this->upload->display_errors();
                    $this->session->set_flashdata('pesan', $error['ssvideo']);
                }
            }
            if (isset($_FILES['ssvideo']) && isset($_FILES['ssgambar'])) {
                $s_sirih = array(
                    'filename' => $data['picture_data']['file_name'],
                    'url' => 'uploads/beranda/' . $data['picture_data']['file_name'],
                    'display_location' => 'beranda',
                    'created_at' => date('Y-m-d'),
                    'description' => $this->input->post('sekapur_sirih'),
                    'is_active' => 0,
                    'url_video' => 'uploads/beranda/' . $data['video_data']['file_name'],
                    'video' => $data['video_data']['file_name'],
                    'display_section' => 'sekapur sirih',
                );
                $this->Page_m->save_ss($s_sirih);
                redirect('dist/beranda', 'refresh');
            } else if (isset($_FILES['ssvideo']) && !isset($_FILES['ssgambar'])) {
                $s_sirih = array(
                    'filename' => $this->input->post('imG_url'),
                    'url' => $this->input->post('img_url'),
                    'display_location' => 'beranda',
                    'created_at' => date('Y-m-d'),
                    'description' => $this->input->post('sekapur_sirih'),
                    'is_active' => 0,
                    'url_video' => 'uploads/beranda/' . $data['video_data']['file_name'],
                    'video' => $data['video_data']['file_name'],
                    'display_section' => 'sekapur sirih',
                );
                $this->Page_m->save_ss($s_sirih);
                redirect('dist/beranda', 'refresh');
            } else if (!isset($_FILES['ssvideo']) && isset($_FILES['ssgambar'])) {
                $s_sirih = array(
                    'filename' => $data['picture_data']['file_name'],
                    'url' => 'uploads/beranda/' . $data['picture_data']['file_name'],
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
            } else if (isset($vid_url) && isset($img_url)){
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
                print_r($s_sirih);
                redirect('dist/beranda', 'refresh');
            }
            //redirect('dist/beranda','refresh');
        } else {
            echo validation_errors();
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
        $data = array();
        $id = $this->input->post('ids');
        if (!empty($this->input->post('gambar')) && !empty($this->input->post('vid'))) {
            $data['url'] = $this->input->post('gambar');
            $data['url_video'] = $this->input->post('vid');
            $data['filename'] = $this->input->post('imgmss');
            $data['video'] = $this->input->post('vidmss');
            $data['description'] = $this->input->post('ssmodal');
        } else {
            $data['url'] = $this->input->post('img_x_m');
            $data['url_video'] = $this->input->post('vid_x_m');
            $data['filename'] = $this->input->post('img_x_m_n');
            $data['video'] = $this->input->post('vid_x_m_n');
            $data['description'] = $this->input->post('ssmodal');
        }
        $rows = $this->Page_m->update_sir($id, $data);
        if ($rows > 0) {
            $this->session->set_flashdata('pesan', 'Data berhasil di simpan');
            redirect('dist/beranda', 'refresh');
        } else {
            //print_r($data);
            $this->session->set_flashdata('pesan', 'Data tidak berhasil di simpan!!');
            redirect('dist/beranda', 'refresh');
        }

        redirect('dist/beranda', 'refresh');
    }

    public function ekskul()
    {
        return $this->Page_m->eks();
    }

    public function s_eks()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $rows = array();
        $data = array();
        //$icon = htmlspecialchars($this->input->post('iconEk'), ENT_QUOTES, 'UTF-8');
        if ($this->form_validation->run() === true) {
            $data = array(
                'filename' => $this->input->post('iconEk'),
                'display_location' => 'beranda',
                'display_section' => 'ekstra_kurikuler',
                'title' => $this->input->post('title'),
                'created_at' => date("Y-m-d"),
                'is_active' => 0,
                'description' => $this->input->post('deskripsi'),
            );
            $rows = $this->Page_m->save_eks($data);
            if ($rows > 0) {
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan');
                redirect('dist/beranda', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Data tidak berhasil di simpan!!');
                redirect('dist/beranda', 'refresh');
            }
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('dist/beranda', 'refresh');
        }
    }

    public function u_eks()
    {
        $id = $this->input->post('id');
        $data = array(
            'is_active' => $this->input->post('suit'),
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

    public function u_eks_modal()
    {
        $this->form_validation->set_rules('icon_modal', 'Ikon', 'required');
        $this->form_validation->set_rules('title_eks', 'Title Ekskul', 'required');
        $this->form_validation->set_rules('eks_des', 'Deskripsi Ekskul', 'required');
        $this->form_validation->set_rules('id_m_eks', 'ID', 'required');
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id_m_eks');
            $data = array(
                'filename' => $this->input->post('icon_modal'),
                'title' => $this->input->post('title_eks'),
                'description' => $this->input->post('eks_des'),
            );
            $rows = $this->Page_m->update_eks_modal($id, $data);
            if ($rows > 0) {
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan');

                redirect('dist/beranda', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Data tidak berhasil di simpan!!');

                redirect('dist/beranda', 'refresh');
            }
        } else {
            $errors = validation_error();
            foreach ($errors as $error) {
                $this->session->set_flashdata('pesan', ''. $error .'');
            }
            redirect('dist/beranda', 'refresh');
        }
    }
}

/* End of file Kmberanda.php */
