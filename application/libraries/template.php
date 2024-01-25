<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
    public function load($view, $data = [])
    {
        $CI = &get_instance();

        $CI->load->model('Article_m');

        $footer_data = $CI->Article_m->identitas();
        $merged_data = array_merge($data, ['footer_data' => $footer_data]);

        $CI->load->view('page/_component/header', $merged_data);
        $CI->load->view('page/_component/navbar', $merged_data);
        $CI->load->view($view, $merged_data);
        $CI->load->view('page/_component/footer', $merged_data);
    }
}