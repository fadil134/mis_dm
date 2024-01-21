<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function index()
    {
        $namaTabel = 'tag';
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
}

/* End of file Master.php */
