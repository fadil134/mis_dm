<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_m extends CI_Model
{
    public function ssirih()
    {
        $this->db->where('display_section', 'sekapur sirih');
        return $this->db->get('photos')->result_array();
    }

    public function page_ssirih()
    {
        $this->db->select('description, url, filename, url_video, video');
        $this->db->from('photos');
        $this->db->where('is_active', 1);
        $this->db->where('display_section', 'sekapur sirih');
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
