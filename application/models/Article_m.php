<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_m extends CI_Model {

    public function get_articles() {
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');

        $query = $this->db->get();
        return $query->result();
    }

    public function pending(){
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Pending');

        $query = $this->db->get();
        return $query->result();
    }

    public function draft(){
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Draft');

        $query = $this->db->get();
        return $query->result();
    }

    public function trash(){
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Trash');

        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Article_m.php */
