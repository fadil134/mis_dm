<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function trunc_tag()
    {
        $namaTabel = 'berita_tag';
        $response = $this->Master_m->truncate_tabel($namaTabel);

        // Mengirim respons JSON
        echo json_encode($response);

        // Menghentikan eksekusi agar tidak ada output tambahan
        exit;
    }

    public function trunc_kategori()
    {
        $namaTabel = 'berita_kategori';
        $response = $this->Master_m->truncate_tabel($namaTabel);

        // Mengirim respons JSON
        echo json_encode($response);

        // Menghentikan eksekusi agar tidak ada output tambahan
        exit;
    }

    public function add_tag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'Nama_Tag' => $this->input->post('tag'),
            );
            $this->Master_m->tag_tambah($data);

            redirect('dist/master_tag', 'refresh');
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function master_tag()
    {
        $data = $this->Article_m->tag();
        echo json_encode($data);
    }

    public function edit_tag()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $this->input->post('id');
            $new_tag = array(
                'Nama_Tag' => $this->input->post('new_tag'),
            );
            $this->Master_m->tag_update($id, $new_tag);

            redirect('dist/master_tag', 'refresh');

        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function hapus_tag()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $this->input->post('id');
            $affected_rows = $this->Master_m->tag_hapus($id);
            $response = array();
            if ($affected_rows > 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Berhasil di Hapus',
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Data tidak berhasil di Hapus!!',
                );
            }
    
            echo json_encode($response);
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function add_kategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $data = array(
                'Nama_Kategori' => $this->input->post('berita_kategori'),
            );
            $this->Master_m->kategori_tambah($data);
    
            redirect('dist/master_kategori', 'refresh');
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function master_kategori()
    {
        $data = $this->Article_m->kategori();
        echo json_encode($data);
    }

    public function edit_kategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $this->input->post('id');
            $new_kategori = array(
                'Nama_Kategori' => $this->input->post('new_kategori'),
            );
            $this->Master_m->kategori_update($id, $new_kategori);
    
            redirect('dist/master_kategori', 'refresh');
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function hapus_kategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $this->input->post('id');
            $affected_rows = $this->Master_m->kategori_hapus($id);
            $response = array();
            if ($affected_rows > 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Berhasil di Hapus',
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Data tidak berhasil di Hapus!!',
                );
            }
    
            echo json_encode($response);
        }
        else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function pengumuman()
    {
        $data = $this->Pengumuman_m->m_pengumuman();
        echo json_encode($data);
    }

    public function s_pengumuman()
    {
        if ($_SERVER['REQUEST_METHOD']) {
            $config['upload_path'] = FCPATH . 'uploads/lampiranPengumuman/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|docx|doc|xlsx|xls';
            $config['max_size'] = '3000';
            $config['overwrite'] = true;
    
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('lampiranPengumuman')) {
                $error = array('error' => $this->upload->display_errors());
                foreach ($error as $fail) {
                    $this->session->set_flashdata('pesan', $fail . 'Pengumuman tidak berhasil di simpan!!');
                }
    
                redirect('dist/beranda', 'refresh');
    
            } else {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
    
                $data = array(
                    'Judul_Pengumuman' => $this->input->post('judulPengumuman'),
                    'Isi_Pengumuman' => $this->input->post('isiPengumuman'),
                    'Tanggal_Pembuatan' => date("Y-m-d"),
                    'Tanggal_Mulai' => $this->input->post('tanggalMulai'),
                    'Tanggal_Selesai' => $this->input->post('tanggalSelesai'),
                    'Ditampilkan_di_Beranda' => $this->input->post('beranda'),
                    'Ditampilkan_di_Halaman_Pengumuman' => $this->input->post('halaman'),
                    'Kategori_Pengumuman' => $this->input->post('kategoriPengumuman'),
                    'Status_Pengumuman' => $this->input->post('status'),
                    'Lampiran_Pengumuman' => base_url('uploads/lampiranPengumuman/' . $filename),
                );
                $id = $this->Pengumuman_m->save_p($data);
                $this->session->set_flashdata('pesan', 'Pengumuman berhasil di simpan dengan id=' . $id);
    
                redirect('dist/beranda', 'refresh');
            }
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }

    public function u_pengumuman()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $this->input->post('id');
            $statH = $this->input->post('statH');
            $statB = $this->input->post('statB');
            $statP = $this->input->post('statP');
    
            $data = array();
            if (isset($statB)) {
                $data['Ditampilkan_di_Beranda'] = $statB;
            } elseif (isset($statP)) {
                $data['Status_Pengumuman'] = $statP;
            } else {
                $data['Ditampilkan_di_Halaman_Pengumuman'] = $statH;
            }
    
            $rows = $this->Pengumuman_m->update_p($id, $data);
            if ($rows > 0) {
                $response = array(
                    'success' => 'Data berhasil di update',
                );
            } else {
                $response = array(
                    'error' => 'Data tidak berhasil di update',
                );
            }
            echo json_encode($response);
        } else {
            $data = array(
                'title' => 'Restricted Area',
            );
            $this->load->view('dist/errors-404', $data);
        }
    }
}

/* End of file Master.php */
