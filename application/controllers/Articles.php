<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
{
    public function article()
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

    public function get_draft()
    {
        $berita_id = $this->input->post('berita_id');
        $draft = $this->Article_m->get_draft($berita_id);
        $response = array(
            'success' => true,
            'draft' => $draft,
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function upload_image()
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            $this->file_name = $data['file_name'];

            $response = array('status' => 'success', 'file_name' => $this->file_name . ' berhasil di upload');
            echo json_encode($response);
        } else {
            // Error uploading file
            $error = array('status' => 'error', 'error' => $this->upload->display_errors());
            echo json_encode($error);
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

    public function save_article()
    {        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('kategori', 'Category', 'required');
        $this->form_validation->set_rules('konten', 'Content', 'required');
        $this->form_validation->set_rules('tag', 'Tags', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $file_name = $this->input->post('namaFile');
        $inserted_id = [];
        if ($this->form_validation->run() == true) {
            $data = array(
                'Judul_Berita' => $this->input->post('title'),
                'Kategori_ID' => $this->input->post('kategori'),
                'Isi_Berita' => $this->input->post('konten'),
                'Tag_ID' => $this->input->post('tag'),
                'Status_ID' => $this->input->post('status'),
                'url' => base_url('uploads/') . $file_name,
            );

            $inserted_id = $this->Article_m->save_article($data);
            echo json_encode(array('status' => 'success', 'message' => 'Article created successfully', 'article_id' => $inserted_id));
        } else {
            $errors = array(
                'status' => 'error',
                'message' => 'Failed to create article',
                'validation_errors' => validation_errors(),
            );
            echo json_encode($errors);
        }
        
    }

    public function update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('kat', 'Kategori', 'required');
        $this->form_validation->set_rules('stat', 'Status', 'required');
        $this->form_validation->set_rules('tAg', 'Tag', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data = array(
                'Judul_Berita' => $this->input->post('judul'),
                'Isi_Berita' => $this->input->post('konten'),
                'Tag_ID' => $this->input->post('tAg'),
                'Kategori_ID' => $this->input->post('kat'),
                'Status_ID' => $this->input->post('stat'),
            );
            $this->Article_m->update_berita($data, $id);

            redirect('dist/features_post_create', 'refresh');
            //print($id);
            //print_r($data);
        }
        echo validation_errors();
        //redirect('dist/features_post_create','refresh');

    }
}

/* End of file Articles.php */

/*
public function save_article()
{
// Form validation
$this->form_validation->set_rules('title', 'Title', 'required');
$this->form_validation->set_rules('kategori', 'Category', 'required');
$this->form_validation->set_rules('tag', 'Tag', 'required');

if ($this->form_validation->run() == false) {
// Form validation failed
$data = array(
'Judul_Berita' => $this->input->post('title'),
'Kategori_ID' => $this->input->post('kategori'),
'Tag_ID' => $this->input->post('tag'),
'url' => $file_url,
);
$article_id = $this->Article_m->save_article($data);
}

$this->db->trans_complete();

if ($this->db->trans_status() === false) {
// Transaction failed
echo json_encode(['success' => false, 'error' => 'Database error']);
}
// Transaction succeeded
echo json_encode(['success' => true, 'file_path' => $file_path, 'article_id' => $article_id]);

}
 */
