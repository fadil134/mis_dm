<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function index() {
        $data = $this->Article_m->get_articles();
        echo json_encode($data);
    }

}

/* End of file Articles.php */