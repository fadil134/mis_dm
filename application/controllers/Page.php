<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function home()
    {
        $data = array(
            'title' => 'Home',
            'mahfudzat' => $this->model_home->mahfudzat(),
            'artikel' => $this->model_home->artikel(),
        );
        $this->template->load('home', $data);
    }

    public function about()
    {
        $data = array(
            'title' => 'About',
            'guru' => $this->guru_model->guru(),
        );
        $this->template->load('about', $data);
    }

    public function blog()
    {
        $config = array();
        $config["base_url"] = base_url() . "page/blog";
        $config["total_rows"] = $this->artikel_model->hitung_pub();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = true;

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$data['artikel'] = $this->artikel_model->artikel($config["per_page"], $page);
        $data = array(
            'title' => 'Blog',
            'artikel' => $this->artikel_model->artikel($config["per_page"], $page),
            //'links' => $this->pagination->create_links(),
        );
        /*
        if ($config["total_rows"] > $config["per_page"]) {
        $data['links'] = $this->pagination->create_links();
        } else {
        $data['links'] = "1";
        }
         */
        //echo json_encode
        //print_r($data);
        $this->template->load('blog', $data);
    }

    public function porto()
    {
        $data = array(
            'title' => 'Portofolio',
        );
        $this->template->load('portofolio', $data);
    }

    public function blog_detail($slug)
    {
        $data = array(
            'title' => 'Blog',
            'artikel' => $this->artikel_model->get_post_by_slug($slug),
        );
        //print_r($data);

        if (empty($data['artikel'])) {
            show_404();
        }
        $this->template->load('blog_detail', $data);
    }
}

/* End of file Page.php */
