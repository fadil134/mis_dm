<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
    public function load($view, $data = [])
    {
        $CI = get_instance();

        $CI->load->model('model_home');

        $footer_data = $CI->model_home->identitas();
        $merged_data = array_merge($data, ['footer_data' => $footer_data]);

        $CI->load->view('_component/header', $merged_data);
        $CI->load->view('_component/navbar', $merged_data);
        $CI->load->view($view, $merged_data);
        $CI->load->view('_component/footer', $merged_data);
    }
}

/* End of file Template.php */
