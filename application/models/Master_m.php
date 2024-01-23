<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_m extends CI_Model
{
    public function trunc($namaTabel)
    {
        // Hitung jumlah baris dalam tabel
        $jumlahBaris = $this->db->count_all($namaTabel);

        // Pemeriksaan jika tabel kosong
        if ($jumlahBaris === 0) {
            // Lakukan operasi truncate jika tabel kosong
            $this->db->truncate($namaTabel);
            return true; // Indikasi bahwa tabel telah di-truncate
        } else {
            return false; // Indikasi bahwa tabel tidak kosong
        }
    }

    public function truncate_tabel($namaTabel)
    {
        $response = array();
        if ($this->trunc($namaTabel)) {
            $response = array(
                'status' => 'Success',
                'message' => 'Berhasil dilakukan truncate',
            );
        } else {
            $response = array(
                'status' => 'Error',
                'message' => 'Tabel tidak kosong, tidak di-truncate.',
            );
        }
        return $response;
    }

    public function tag_tambah($data)
    {
        $this->db->insert('tag', $data);
    }

    public function tag_update($id, $new_tag)
    {
        $this->db->where('ID_Tag', $id);
        $this->db->update('tag', $new_tag);
    }

    public function tag_hapus($id)
    {
        $this->db->where('ID_Tag', $id);
        $this->db->delete('tag');
        return $this->db->affected_rows();
    }

    public function kategori_tambah($data)
    {
        $this->db->insert('berita_kategori', $data);
    }

    public function kategori_update($id, $new_tag)
    {
        $this->db->where('ID_Kategori', $id);
        $this->db->update('berita_kategori', $new_tag);
    }

    public function kategori_hapus($id)
    {
        $this->db->where('ID_Kategori', $id);
        $this->db->delete('berita_kategori');
        return $this->db->affected_rows();
    }
}

/* End of file Master_m.php */
