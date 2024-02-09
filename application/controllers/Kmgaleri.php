<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmgaleri extends CI_Controller
{

    public function s_galeri()
    {
        $config['upload_path'] = './uploads/galeri/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['overwrite'] = true;

        $data = array();
        $error = array();

        // Upload background galeri
        if (isset($_FILES['bg_galeri'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bg_galeri')) {
                $galeri = array(
                    'filename' => $this->upload->data('file_name'),
                    'path' => $this->upload->data('full_path'),
                );

                $data = array(
                    'url' => 'uploads/galeri/' . $galeri['filename'],
                    'filename' => $galeri['filename'],
                    'display_location' => 'galeri',
                    'display_section' => 'hero',
                    'created_at' => date('Y-m-d'),
                    'description' => 'background_galeri',
                    'is_active' => 0,
                    'title' => 'background_galeri',
                );
                $this->Page_m->save_galeri($data);
                $this->session->set_flashdata('pesan', 'Data galeri berhasil disimpan');
            } else {
                $error['bg_galeri'] = $this->upload->display_errors();
            }
        }

        // Upload gambar kegiatan

        if (isset($_FILES['galeri_kegiatan'])) {

            $this->form_validation->set_rules('desk_kegiatan', 'Deskripsi', 'required');
            $this->form_validation->set_rules('title_kegiatan', 'Title', 'required');
            $data_kegiatan = array();
            if ($this->form_validation->run() == true) {
                $files = $_FILES['galeri_kegiatan'];
                $this->upload->initialize($config);
                $data_kegiatan = array(); // Initialize array outside the loop

                foreach ($files['name'] as $key => $filename) {
                    $_FILES['userfile']['name'] = $files['name'][$key];
                    $_FILES['userfile']['type'] = $files['type'][$key];
                    $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['userfile']['error'] = $files['error'][$key];
                    $_FILES['userfile']['size'] = $files['size'][$key];

                    if ($this->upload->do_upload('userfile')) {
                        $galeri_kegiatan = array(
                            'filename' => $this->upload->data('file_name'),
                            'path' => $this->upload->data('full_path'),
                        );

                        $data_kegiatan[] = array(
                            'url' => 'uploads/galeri/' . $galeri_kegiatan['filename'],
                            'filename' => $galeri_kegiatan['filename'],
                            'display_location' => 'galeri',
                            'display_section' => 'galeri',
                            'created_at' => date('Y-m-d'),
                            'description' => $this->input->post('desk_kegiatan'),
                            'is_active' => 0,
                            'title' => $this->input->post('title_kegiatan'),
                        );
                    } else {
                        $error['galeri_kegiatan'][$key] = $this->upload->display_errors();
                        foreach ($error as $eRR) {
                            $this->session->set_flashdata('pesan', $eRR);
                        }
                        redirect('dist/galeri', 'refresh');
                    }
                }
            } else {
                $this->session->set_flashdata('validasi_error', validation_errors());
                redirect('dist/galeri', 'refresh');
            }
            foreach ($data_kegiatan as $kegiatan) {
                $this->Page_m->save_galeri($kegiatan);
            }
            $this->session->set_flashdata('pesan', 'Data galeri berhasil disimpan');

            redirect('dist/galeri', 'refresh');

        } else {
            $error['bg_galeri'] = $this->upload->display_errors();
            $this->session->set_flashdata('pesan', $error);
            redirect('dist/galeri', 'refresh');
        }
    }

    public function u_galeri()
    {
        $id = $this->input->post('ID');
        $status = $this->input->post('stat');
        $data = array(
            'is_active' => $status,
        );
        $rows = $this->Page_m->update_galeri($id, $data);
        if ($rows > 0) {
            $response = array(
                'success' => 'sukses',
                'pesan' => 'Galeri aktivasi berhasil',
            );
        } else {
            $response = array(
                'error' => 'gagal',
                'pesan' => 'Galeri aktivasi tidak berhasil',
            );
        }
        echo json_encode($response);
    }

}

/* End of file Kmgaleri.php */
