<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_m extends CI_Model
{

    public function save_beranda($s_sirih)
    {
        $this->db->insert('Table', $s_sirih);
        
    }

}

/* End of file Page_m.php */
