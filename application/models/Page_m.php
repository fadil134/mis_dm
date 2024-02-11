<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_m extends CI_Model
{
    public function ssirih()
    {
        $this->db->where('display_section', 'hero');
        $this->db->where('display_location', 'beranda');
        return $this->db->get('photos')->result();
    }

    public function page_ssirih()
    {
        $this->db->select('description, url, filename, url_video, video');
        $this->db->from('photos');
        $this->db->where('is_active', 1);
        $this->db->where('display_section', 'hero');
        $this->db->where('display_location', 'beranda');
        return $this->db->get()->result();
    }

    public function save_ss($s_sirih)
    {
        $this->db->insert('photos', $s_sirih);
        return $this->db->insert_id();
    }

    public function update_ss($id, $data)
    {
        $zero = array(
            'is_active' => 0,
        );
        $existingdata = $this->ssirih();
        if (count($existingdata) > 0) {
            $this->db->where('display_section', 'sekapur_sirih');
            $this->db->where('id !=', $id);
            $this->db->set($zero);
            $this->db->update('photos');

            $this->db->where('id', $id);
            $this->db->update('photos', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('photos', $data);
        }

        return $this->db->affected_rows();
    }

    public function delete_ss($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('photos');
        return $this->db->affected_rows();
    }

    public function update_sir($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);
        return $this->db->affected_rows();
    }

    public function eks()
    {
        $this->db->where('display_section', 'ekstra_kurikuler');
        return $this->db->get('photos')->result();
    }

    public function save_eks($data)
    {
        $this->db->insert('photos', $data);
        return $this->db->affected_rows();
    }

    public function update_eks($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);
        return $this->db->affected_rows();
    }

    public function update_eks_modal($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);

        return $this->db->affected_rows();
    }

    public function page_eks()
    {
        $this->db->where('is_active', 1);
        $this->db->where('display_section', 'ekstra_kurikuler');
        return $this->db->get('photos')->result();
    }

    public function icons()
    {
        return $this->db->get('icons')->result();
    }

    public function org()
    {
        $list = array("WAKA V BID. KEPRAMUKAAN", "WAKA IV BID. PERPUSTAKAAN", "WAKA III BID. SARPRAS", "WAKA II BID. KESISWAAN", "WAKA I BID. KURIKULUM", "KETUA YAYASAN", "KEPALA MADRASAH", "BENDAHARA", "KOMITE MADRASAH");
        $this->db->select('guru.jabatan AS jabatan_guru, guru.Nama AS nama_guru, atasan.Nama AS nama_atasan');
        $this->db->from('guru');
        $this->db->join('org', 'guru.ID_Guru = org.id_guru', 'left');
        $this->db->join('guru as atasan', 'org.id_atasan = atasan.ID_Guru', 'left');
        $this->db->where_in('guru.jabatan', $list);
        //$this->db->group_by('nama_guru');
        //$this->db->order_by('nama_atasan', 'ASC');
        $query = $this->db->get();

        if ($query) {
            $result = $query->result_array();
            return $result;
        } else {
            $error = $this->db->error();
            echo 'Database error - ' . $error['code'] . ': ' . $error['message'];
        }
    }

    public function dewan_guru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where("(jabatan LIKE 'WALI%' OR jabatan LIKE 'GURU%')");
        return $this->db->get()->result();
    }

    public function gal()
    {
        $this->db->where('display_location', 'galeri');
        return $this->db->get('photos')->result();
    }

    public function galeri_hero()
    {
        $this->db->where('display_location', 'galeri');
        $this->db->where('display_section', 'hero');
        $this->db->where('is_active', 1);
        return $this->db->get('photos')->result();
    }

    public function galeri()
    {
        $this->db->where('display_section !=', 'hero');
        $this->db->where('display_location', 'galeri');
        $this->db->where('is_active', 1);
        return $this->db->get('photos')->result();

    }

    public function save_galeri($data)
    {
        // Simpan data background galeri ke tabel tertentu
        $this->db->insert('photos', $data);
    }

    public function update_galeri($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);
        return $this->db->affected_rows();
    }

    public function article($limit, $offset)
    {
        $this->db->select('berita.updated,berita.ID_Berita,berita.Judul_Berita,berita.Isi_Berita,berita.url,pengguna.Nama_Pengguna AS penulis');
        $this->db->join('pengguna', 'berita.Penulis_ID = pengguna.ID_Pengguna', 'left');
        $this->db->where('Status_ID', 1);
        $this->db->limit($limit, $offset);
        return $this->db->get('berita')->result();
    }

    public function kategori_artikel()
    {
        $this->db->select('berita.ID_Berita, berita.Kategori_ID, berita_kategori.Nama_Kategori, berita_kategori.ID_Kategori');
        $this->db->from('berita');
        $this->db->join('berita_kategori', 'berita_kategori.ID_Kategori = berita.Kategori_ID', 'left');
        $this->db->where('berita.Status_ID', 1);
        return $this->db->get()->result();
    }

    public function tag_artikel()
    {
        $this->db->select('berita.ID_Berita, berita_tag.Nama_Tag, berita_tag.id');
        $this->db->from('berita');
        $this->db->join('berita_tag', 'berita_tag.ID_Berita = berita.ID_Berita', 'left');
        $this->db->where('berita.Status_ID', 1);
        return $this->db->get()->result();
    }

    public function count_article()
    {
        return $this->db->count_all('berita'); // Replace 'berita' with your actual table name
    }

    public function count_kategori($id)
    {
        $this->db->where('Kategori_ID', $id);
        $this->db->where('Status_ID', 1);
        return $this->db->count_all_results('berita'); // Replace 'berita' with your actual table name
    }

    public function count_tag($id)
    {
        $this->db->where('id', $id);
        return $this->db->count_all_results('berita_tag'); // Replace 'berita' with your actual table name
    }
    /**
     * unused_function
     */

    /*
public function get_bootstrap_icons()
{
$cssFilePath = APPPATH . 'third_party/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css';

$cssContent = file_get_contents($cssFilePath);

preg_match_all('/bi-[a-zA-Z0-9-]+(?=::before)/', $cssContent, $matches);

$iconClasses = $matches[0];

foreach ($iconClasses as $iconClass) {
$data = array(
'icon_class' => $iconClass,
// Kolom lain sesuai kebutuhan
);

// Gantilah 'nama_tabel' dengan nama tabel yang sesuai
$this->db->insert('icons', $data);
}
}
 */
}

/* End of file Page_m.php */
