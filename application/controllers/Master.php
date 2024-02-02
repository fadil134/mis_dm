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
        $data = array(
            'Nama_Tag' => $this->input->post('tag'),
        );
        $this->Master_m->tag_tambah($data);

        redirect('dist/master_tag', 'refresh');
    }

    public function master_tag()
    {
        $data = $this->Article_m->tag();
        echo json_encode($data);
    }

    public function edit_tag()
    {
        $id = $this->input->post('id');
        $new_tag = array(
            'Nama_Tag' => $this->input->post('new_tag'),
        );
        $this->Master_m->tag_update($id, $new_tag);

        redirect('dist/master_tag', 'refresh');
    }

    public function hapus_tag()
    {
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
    }

    public function add_kategori()
    {
        $data = array(
            'Nama_Kategori' => $this->input->post('berita_kategori'),
        );
        $this->Master_m->kategori_tambah($data);

        redirect('dist/master_kategori', 'refresh');
    }

    public function master_kategori()
    {
        $data = $this->Article_m->kategori();
        echo json_encode($data);
    }

    public function edit_kategori()
    {
        $id = $this->input->post('id');
        $new_kategori = array(
            'Nama_Kategori' => $this->input->post('new_kategori'),
        );
        $this->Master_m->kategori_update($id, $new_kategori);

        redirect('dist/master_kategori', 'refresh');
    }

    public function hapus_kategori()
    {
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

    public function pengumuman()
    {
        $data = $this->Pengumuman_m->m_pengumuman();
        echo json_encode($data);
    }

    public function s_pengumuman()
    {
        $config['upload_path'] = FCPATH . 'uploads/lampiranPengumuman/';
        $config['allowed_types'] = 'gif|jpg|png|docx|doc|xlsx|xls';
        $config['max_size'] = '3000';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('lampiranPengumuman')) {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $fail) {
                $this->session->set_flashdata('pesan', '<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                  <div class="toast-header">
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="toast-body">' . $fail .
                    'Pengumuman tidak berhasil di simpan!!
                  </div>
                </div>
              </div>');
            }

            redirect('dist/pengumuman', 'refresh');

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
            $this->session->set_flashdata('pesan', '<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                  <div class="toast-header">
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="toast-body">
                Pengumuman berhasil di simpan dengan id=' . $id .
                '</div>
                </div>
              </div>');

            redirect('dist/pengumuman', 'refresh');
        }
    }

    public function u_pengumuman()
    {
        $id = $this->input->post('id');
        $data = array(
            'Ditampilkan_di_Halaman_Pengumuman' => $this->input->post('stat'),
        );
        $rows = $this->Pengumuman_m->update_p($id,$data);
        if ($rows > 0) {
            $response = array(
                'success' => 'Data berhasil di update'
            );
        } else {
            $response = array(
                'error' => 'Data tidak berhasil di update'
            );
        }
        echo json_encode($response);
    }

}

/* End of file Master.php */
