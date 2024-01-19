<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article_m extends CI_Model
{

    public function get_articles()
    {
        $this->db->select('berita.ID_Berita,berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');

        $query = $this->db->get();
        return $query->result();
    }

    public function publish()
    {
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Publish');

        $query = $this->db->get();
        return $query->result();
    }

    public function pending()
    {
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Pending');

        $query = $this->db->get();
        return $query->result();
    }

    public function draft()
    {
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Draf');

        $query = $this->db->get();
        return $query->result();
    }

    public function trash()
    {
        $this->db->select('berita.Judul_Berita, berita.Isi_Berita, berita.Tanggal_Publikasi, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('statusberita.Nama_Status', 'Trash');

        $query = $this->db->get();
        return $query->result();
    }

    public function getStatusOptions($berita_id)
    {
        $this->db->select('berita.Status_ID,statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('berita.ID_Berita', $berita_id);
        return $this->db->get()->result();
    }

    public function status()
    {
        return $this->db->get('statusberita')->result();
    }

    public function kategori()
    {
        return $this->db->get('berita_kategori')->result();
    }

    public function tag()
    {
        return $this->db->get('tag')->result();
    }

    public function save_article($data)
    {
        $this->db->insert('berita', $data);
    }

    public function update_stat($data, $id)
    {
        $this->db->where('ID_Berita', $id);
        $result = $this->db->update('berita', $data);

        return $result;
    }

}

/* End of file Article_m.php */
