<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_m extends CI_Model
{
    public function ssirih()
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
        $zero = array(
            'is_active' => 0,
        );
        $existingdata = $this->ssirih();
        if (count($existingdata) > 0) {
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

    public function update_sir($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('photos', $data);
        return $this->db->affected_rows();
    }

}

/* End of file Page_m.php */
