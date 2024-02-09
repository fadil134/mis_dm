<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function home()
    {
        set_custom_cookie();
        $limit = 4;
        $date_now = date('Y-m-d');
        $data = array(
            'title' => 'Home',
            'sekapur_s' => $this->Page_m->page_ssirih(),
            'ekskul' => $this->Page_m->page_eks(),
            'attention' => $this->Pengumuman_m->pengumuman($date_now),
            'artikel' => $this->Article_m->publish_beranda($limit),
        );
        $this->template->load('page/home', $data);
        //$result = $data['sekapur_s'] === array() ? 'null' : 'test';
        //echo $result;
    }

    public function about()
    {
        set_custom_cookie();
        $data = array(
            'title' => 'About',
            //'guru' => $this->guru_model->guru(),
             'org' => $this->Page_m->org(),
            'guru' => $this->Page_m->dewan_guru(),
        );
        $this->template->load('page/about', $data);
        //print_r($data['org']);
    }

    public function blog()
    {
        set_custom_cookie();
        $data = array(
            'title' => 'Blog',
            //'artikel' => $this->Article_m->publish(),
        );
        $this->template->load('page/blog', $data);
    }

    public function porto()
    {
        set_custom_cookie();
        $data = array(
            'title' => 'Portofolio',
            'hero' => $this->Page_m->galeri_hero(),
            'galeri' => $this->Page_m->galeri(),
        );
        $this->template->load('page/portofolio', $data);
    }

    public function contact()
    {
        set_custom_cookie();
        $data = array(
            'title' => 'Kontak',
        );
        $this->template->load('page/contact', $data);
    }

    public function blog_detail($berita_id)
    {
        set_custom_cookie();
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
