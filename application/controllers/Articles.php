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
    public function upload()
    {
        $config['upload_path'] = 'uploads/'; // Folder untuk menyimpan file
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // Maksimal ukuran file dalam kilobita

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('thumbnail')) {
            // File berhasil diunggah
            $fileData = $this->upload->data();

            // Dapatkan data dari form lainnya
            $title = $this->input->post('title');
            $kategori = $this->input->post('kategori');
            $content = $this->input->post('summernote'); // Pastikan ini sesuai dengan nama field summernote
            $tags = $this->input->post('tag');
            $status = $this->input->post('status');

            // Lakukan penyimpanan data ke dalam database sesuai kebutuhan proyek Anda

            $data = array(
                'Judul_Berita' => $title,
                'Kategori_ID' => $kategori,
                'Isi_Berita' => $content,
                'url' => base_url() . 'uploads/' . $fileData['file_name'],
                'Tag_ID' => json_encode($tags), // Simpan array tags dalam bentuk JSON
                'Status_ID' => $status,
                // Sesuaikan dengan struktur tabel Anda
            );

            $this->Articles_m->save_article($data);

            echo "File dan data berhasil diunggah.";
        } else {
            echo "Terjadi kesalahan saat mengunggah file: " . $this->upload->display_errors();
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
