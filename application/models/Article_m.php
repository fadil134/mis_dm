<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article_m extends CI_Model
{
    public function publish()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori,berita.url');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Publish');
        $this->db->group_by('berita.ID_Berita');

        $query = $this->db->get();
        return $query->result();
    }

    public function publish_beranda($limit)
    {
        $this->db->select('berita.updated,berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori,berita.url');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Publish');
        $this->db->where('url !=', null);
        $this->db->group_by('berita.ID_Berita');
        $this->db->order_by('berita.ID_Berita', 'desc');

        if ($limit !== null) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function pending()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Pending');
        $this->db->group_by('berita.ID_Berita');

        $query = $this->db->get();
        return $query->result();
    }

    public function draft()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.id ORDER BY berita_tag.id SEPARATOR ", ") AS ID_Tag, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Draft');
        $this->db->group_by('berita.ID_Berita');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_publish($berita_id)
    {
        $this->db->select('berita.url, berita_kategori.Nama_Kategori, berita.updated, berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita.Kategori_ID, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id ASC SEPARATOR ", ") AS nama_tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('berita.ID_Berita', $berita_id);

        $query = $this->db->get();
        return $query->row();
    }

    public function get_draft($berita_id)
    {
        $this->db->select('berita.ID_Berita,berita.Judul_Berita, berita.Isi_Berita, berita_penulis.Nama_Penulis, berita_tag.Nama_Tag, statusberita.Nama_Status');
        $this->db->from('berita');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->where('berita.ID_Berita', $berita_id);

        $query = $this->db->get();
        return $query->result();
    }

    public function trash()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->where('statusberita.Nama_Status', 'Trash');
        $this->db->group_by('berita.ID_Berita');

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

    public function get_articles()
    {
        $this->db->select('berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita_penulis.ID_Penulis, berita_penulis.Nama_Penulis, GROUP_CONCAT(berita_tag.Nama_Tag ORDER BY berita_tag.id SEPARATOR ", ") AS Nama_Tag, statusberita.Nama_Status, statusberita.ID_Status, berita_kategori.ID_Kategori, berita_kategori.Nama_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita.ID_Berita = berita_tag.ID_Berita', 'left');
        $this->db->join('berita_penulis', 'berita.Penulis_ID = berita_penulis.ID_Penulis', 'left');
        $this->db->join('statusberita', 'berita.Status_ID = statusberita.ID_Status', 'left');
        $this->db->join('berita_kategori', 'berita.Kategori_ID = berita_kategori.ID_Kategori', 'left');
        $this->db->group_by('berita.ID_Berita');

        $query = $this->db->get();
        return $query->result();
    }

    public function update_berita($data, $id)
    {
        $this->db->where('ID_Berita', $id);
        $this->db->update('berita', $data);
    }

    public function pengumuman()
    {
        return $this->db->get('pengumuman')->result();
    }

    public function status()
    {
        return $this->db->get('statusberita')->result();
    }

    public function update_stat($data, $id)
    {
        $this->db->where('ID_Berita', $id);
        $result = $this->db->update('berita', $data);

        return $result;
    }

    public function kategori()
    {
        return $this->db->get('berita_kategori')->result();
    }

    public function tag()
    {
        return $this->db->get('berita_tag')->result();
    }

    public function save_tag($tags, $insert_id)
    {
        $berita_tag_data = array();
        foreach ($tags as $tag) {
            $berita_tag_data[] = array(
                'Nama_Tag' => $tag,
                'ID_Berita' => $insert_id,
            );
        }
        $this->db->insert_batch('berita_tag', $berita_tag_data);
    }

    public function update_tag($dataTag, $id)
    {
        $data = $this->db->select('ID_Berita')->from('berita_tag')->where('ID_Berita', $id)->get()->row();

        if (!empty($data)) {
            $this->db->where('ID_Berita', $id);
            $this->db->delete('berita_tag');
        }

        if (!empty($dataTag)) {
            $this->db->insert_batch('berita_tag', $dataTag);
        }
    }

    public function save_article($data)
    {
        $this->db->insert('berita', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_kategori($id, $limit, $offset)
    {
        $this->db->select('berita.updated, berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita.url, berita_kategori.Nama_Kategori AS kategori, pengguna.Nama_Pengguna as penulis');
        $this->db->from('berita');
        $this->db->limit($limit, $offset);
        $this->db->where('berita.Kategori_ID', $id);
        $this->db->where('berita.Status_ID', 1);
        $this->db->join('berita_kategori', 'berita_kategori.ID_Kategori = berita.Kategori_ID', 'left');
        $this->db->join('pengguna', 'berita.Penulis_ID = pengguna.ID_Pengguna', 'left');
        return $this->db->get()->result();
        
        //return $this->db->last_query();
    }

    public function get_tag($id, $limit, $offset)
    {
        $this->db->select('berita.updated, berita.url, berita.ID_Berita, berita.Judul_Berita, berita.Isi_Berita, berita.Status_ID, berita_tag.Nama_Tag, berita_tag.id AS tag_id, pengguna.Nama_Pengguna AS penulis');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita_tag.ID_Berita = berita.ID_Berita', 'left');
        $this->db->join('pengguna', 'berita.Penulis_ID = pengguna.ID_Pengguna', 'left');
        $this->db->where('berita_tag.id', $id);
        $this->db->where('berita.Status_ID', 1);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function recent_article()
    {
        $this->db->select('updated, Judul_berita, ID_Berita, url');
        $this->db->limit(6);
        $this->db->where('Status_ID', $this->db->escape(1));
        $this->db->order_by('ID_Berita', 'desc');
        return $this->db->get('berita')->result();
    }

    public function identitas()
    {
        return $this->db->get('identitas_sekolah')->result_array();
    }
}

/* End of file Article_m.php */
