<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Server_processing extends CI_Controller {

    public function summ_upload() {
        $config['upload_path']   = './uploads/summernote/'; // Ganti dengan direktori tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100000; // Ukuran maksimum dalam kilobita (KB)
        $config['max_width']     = 1366; // Lebar maksimum dalam piksel
        $config['max_height']    = 768; // Tinggi maksimum dalam piksel

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(['status' => 'error', 'message' => $error['error']]);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode(['status' => 'success', 'url' => base_url('uploads/' . $data['upload_data']['file_name']), 'message' => 'File has been uploaded successfully.']);
        }
    }

}

/* End of file Server_processing.php */
