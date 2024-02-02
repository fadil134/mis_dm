<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function home()
    {
        $limit = 4;
        $date_now = date('Y-m-d');
        $data = array(
            'title' => 'Home',
            'attention' => $this->Pengumuman_m->pengumuman($date_now),
            'artikel' => $this->Article_m->publish_beranda($limit),
            'sekapur_s' => $this->Page_m->page_ssirih(),
            'ekskul' => $this->Page_m->page_eks()
        );
        $this->template->load('page/home', $data);
    }

    public function about()
    {
        $data = array(
            'title' => 'About',
            //'guru' => $this->guru_model->guru(),
        );
        $this->template->load('page/about',$data);
    }

    public function blog()
    {
        $data = array(
            'title' => 'Blog',
            //'artikel' => $this->Article_m->publish(),
        );
        $this->template->load('page/blog', $data);
    }

    public function porto()
    {
        $data = array(
            'title' => 'Portofolio',
        );
        $this->template->load('page/portofolio', $data);
    }

    public function contact(){
        $data = array(
            'title' => 'Kontak'
        );
        $this->template->load('page/contact',$data);
    }

    public function blog_detail($berita_id)
    {
        $data = array(
            'title' => 'Blog',
            'artikel' => $this->Article_m->get_publish($berita_id),
        );
        //print_r($data);
        /*
        if (empty($data['artikel'])) {
            show_404();
        }
        */
        $this->template->load('page/blog_detail', $data);
    }
}

/* End of file Page.php */
