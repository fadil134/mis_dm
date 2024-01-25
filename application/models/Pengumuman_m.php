<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_m extends CI_Model
{

    public function pengumuman($date_now)
    {
        $this->db->where('Ditampilkan_di_Beranda', '1');
        $this->db->where('Tanggal_Mulai >=', $date_now);
        $this->db->where('Tanggal_Selesai >=', $date_now, false);
        return $this->db->get('pengumuman')->result();
    }

}

/* End of file Pengumuman_m.php */
