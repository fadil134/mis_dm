<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_m extends CI_Model
{
    public function ss()
    {
        return $this->db->get('photos')->result_array();
    }

    public function save_ss($s_sirih)
    {
        $this->db->insert('photos', $s_sirih);
        return $this->db->insert_id();
    }

    public function update_ss($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);
    }

}

/* End of file Page_m.php */
