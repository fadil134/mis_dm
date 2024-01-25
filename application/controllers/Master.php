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
}

/* End of file Master.php */