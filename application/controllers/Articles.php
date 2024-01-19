<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
{

    public function index()
    {
        $data = $this->Article_m->get_articles();
        echo json_encode($data);
    }

    public function publish()
    {
        $data = $this->Article_m->publish();
        echo json_encode($data);
    }

    public function draft()
    {
        $data = $this->Article_m->draft();
        echo json_encode($data);
    }

    public function pending()
    {
        $data = $this->Article_m->pending();
        echo json_encode($data);
    }

    public function get_status() {
        $berita_id = $this->input->post('berita_id'); // Using POST method to match AJAX request

        // Assuming you have a model named Article_model, adjust it accordingly
        $statusOptions = $this->Article_m->getStatusOptions($berita_id);

        // Send a JSON response back to the client
        $response = array(
            'success' => true,
            'statusOptions' => $statusOptions,
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function save_article() {
        
    }
}

/* End of file Articles.php */
