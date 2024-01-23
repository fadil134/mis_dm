<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article_m extends CI_Model
{

    public function get_articles()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, tag.ID_Tag, GROUP_CONCAT(tag.Nama_Tag ORDER BY tag.ID_Tag SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('tag', 'berita_tag.ID_Tag = tag.ID_Tag', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->group_by('berita.ID_Berita'); // Group by the primary key

        $query = $this->db->get();
        return $query->result();
    }

    public function publish()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, tag.ID_Tag, GROUP_CONCAT(tag.Nama_Tag ORDER BY tag.ID_Tag SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('tag', 'berita_tag.ID_Tag = tag.ID_Tag', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Publish');
        $this->db->group_by('berita.ID_Berita'); // Group by the primary key

        $query = $this->db->get();
        return $query->result();
    }

    public function pending()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, tag.ID_Tag, GROUP_CONCAT(tag.Nama_Tag ORDER BY tag.ID_Tag SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('tag', 'berita_tag.ID_Tag = tag.ID_Tag', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Pending');
        $this->db->group_by('berita.ID_Berita'); // Group by the primary key

        $query = $this->db->get();
        return $query->result();
    }

    public function draft()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, tag.ID_Tag, GROUP_CONCAT(tag.Nama_Tag ORDER BY tag.ID_Tag SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('tag', 'berita_tag.ID_Tag = tag.ID_Tag', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Draf');
        $this->db->group_by('berita.ID_Berita'); // Group by the primary key

        $query = $this->db->get();
        return $query->result();
    }

    public function trash()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, tag.ID_Tag, GROUP_CONCAT(tag.Nama_Tag ORDER BY tag.ID_Tag SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('tag', 'berita_tag.ID_Tag = tag.ID_Tag', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Trash');
        $this->db->group_by('berita.ID_Berita'); // Group by the primary key

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

    public function get_draft($berita_id)
    {
        $this->db->select('berita.ID_Berita,berita.Judul_Berita, berita.Isi_Berita, berita_penulis.Nama_Penulis, tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('tag', 'berita.Tag_ID = tag.ID_Tag', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('berita.ID_Berita', $berita_id);

        $query = $this->db->get();
        return $query->result();
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
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function save_tag($tags, $insert_id)
    {
        $berita_tag_data = array();
        foreach ($tags as $tag) {
            $berita_tag_data[] = array(
                'ID_Tag' => $tag,
                'ID_Berita' => $insert_id,
            );
        }
        $this->db->insert_batch('berita_tag', $berita_tag_data);
    }

    public function update_berita($data, $id)
    {
        $this->db->where('ID_Berita', $id);
        $this->db->update('berita', $data);
    }

    public function update_stat($data, $id)
    {
        $this->db->where('ID_Berita', $id);
        $result = $this->db->update('berita', $data);

        return $result;
    }

}

/* End of file Article_m.php */
