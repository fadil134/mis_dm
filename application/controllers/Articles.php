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
        $berita_id = $this->input->post('berita_id');
        $statusOptions = $this->Article_m->getStatusOptions($berita_id);

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
        $config['upload_path'] = FCPATH . 'uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->upload->initialize($config);

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
        $this->form_validation->set_rules('tag[]', 'Tags', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $file_name = $this->input->post('namaFile');

        if ($this->form_validation->run() == true) {
            $data = array(
                'Judul_Berita' => $this->input->post('title'),
                'Kategori_ID' => $this->input->post('kategori'),
                'Isi_Berita' => $this->input->post('konten'),
                'Status_ID' => $this->input->post('status'),
                'url' => base_url('uploads/') . $file_name,
            );

            $insert_id = $this->Article_m->save_article($data);

            $tags = $this->input->post('tag');
            $this->Article_m->save_tag($tags, $insert_id);

            $response = array(
                'status' => 'success',
                'message' => 'Article created successfully',
                'article_id' => $insert_id,
            );

            echo json_encode($response);
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
        $this->form_validation->set_rules('kontenSm', 'Konten', 'required');
        $this->form_validation->set_rules('kat', 'Kategori', 'required');
        $this->form_validation->set_rules('stat', 'Status', 'required');
        $this->form_validation->set_rules('tAg[]', 'Tag', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data = array(
                'Judul_Berita' => $this->input->post('judul'),
                'Isi_Berita' => $this->input->post('kontenSm'),
                'Kategori_ID' => $this->input->post('kat'),
                'Status_ID' => $this->input->post('stat'),
            );
            $this->Article_m->update_berita($data, $id);

            $tag = $this->input->post('tAg');
            $dataTag = array();
            foreach ($tag as $tags) {
                $dataTag[] = array(
                    'ID_Berita' => $id,
                    'Nama_Tag' => $tags,
                );
            }
            $this->Article_m->update_tag($dataTag, $id);
            redirect('dist/features_post_create', 'refresh');
        }
        $validation_errors = validation_errors();

        if (!empty($validation_errors)) {
            $error_messages = explode("\n", trim($validation_errors));

            $error_html = '';
            foreach ($error_messages as $error_message) {
                if (!empty($error_message)) {
                    $error_html .= '<div class="alert alert-danger" role="alert"><strong>Error:</strong> ' . $error_message . '</div>';
                }
            }

            $this->session->set_flashdata('errors', $error_html);
        }
        redirect('dist/features_post_create', 'refresh');
    }

    public function pengumuman()
    {
        $this->Article_m->get_pengumuman();   
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
