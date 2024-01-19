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

    public function get_status()
    {
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

    public function upload()
    {
        // Form validation
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('kategori', 'Category', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');

        if ($this->form_validation->run() == false) {
            // Form validation failed
            echo json_encode(['success' => false, 'error' => validation_errors()]);
            return;
        }

        // Start a database transaction
        $this->db->trans_start();

        // File upload configuration
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            // File uploaded successfully
            $upload_data = $this->upload->data();
            $file_path = $upload_data['full_path'];

            // Insert data into the database
            $file_url = base_url('uploads/' . $upload_data['file_name']);
            $data = array(
                'Judul_Berita' => $this->input->post('title'),
                'Kategori_ID' => $this->input->post('kategori'),
                'Tag_ID' => $this->input->post('tag'),
                'url' => $file_url,
            );
            $article_id = $this->Article_m->save_article($data);

            // Commit the transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                // Transaction failed
                echo json_encode(['success' => false, 'error' => 'Database error']);
            } else {
                // Transaction succeeded
                echo json_encode(['success' => true, 'file_path' => $file_path, 'article_id' => $article_id]);
            }
        } else {
            // File upload failed
            echo json_encode(['success' => false, 'error' => $this->upload->display_errors()]);
        }
    }

    public function save_stat()
    {
        $id = $this->input->post('berita_id');
        
        $data = array(
            'Status_ID' => $this->input->post('new_status'),
        );
        $updated = $this->Article_m->update_stat($data, $id);
        if ($updated) {
            echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }
}

/* End of file Articles.php */
