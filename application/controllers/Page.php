<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function index()
    {
        
        redirect('page/home','refresh');
        
    }

    public function home()
    {
        //set_custom_cookie();
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
        //set_custom_cookie();
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
        $this->load->library('pagination');
        $config['base_url'] = base_url('page/blog');
        $config['total_rows'] = $this->Page_m->count_article();
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $config['first_link'] = false;
        $config['prev_link'] = false;
        $config['next_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = '<ul class="justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        //set_custom_cookie();
        $data = array(
            'title' => 'Blog',
            'artikel' => $this->Page_m->article($config['per_page'], $this->uri->segment(3)),
            'kategori' => $this->Page_m->kategori_artikel(),
            'terbaru' => $this->Article_m->recent_article(),
            'tag' => $this->Page_m->tag_artikel(),
        );
        $this->template->load('page/blog', $data);
        //echo $this->db->last_query();
    }

    public function porto()
    {
        //set_custom_cookie();
        $data = array(
            'title' => 'Portofolio',
            'hero' => $this->Page_m->galeri_hero(),
            'galeri' => $this->Page_m->galeri(),
        );
        $this->template->load('page/portofolio', $data);
    }

    public function contact()
    {
        //set_custom_cookie();
        $data = array(
            'title' => 'Kontak',
        );
        $this->template->load('page/contact', $data);
    }

    public function blog_detail($berita_id)
    {
        //set_custom_cookie();
        $data = array(
            'title' => 'Blog',
            'artikel' => $this->Article_m->get_publish($berita_id),
            'kategori' => $this->Page_m->kategori_artikel(),
            'tagg' => $this->Page_m->tag_artikel(),
            'terbaru' => $this->Article_m->recent_article()
        );
        //print_r($data);
        /*
        if (empty($data['artikel'])) {
        show_404();
        }
         */
        $this->template->load('page/blog_detail', $data);
        //print_r($data['tag']);
    }

    public function kategori_blog($id)
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('page/kategori_blog/').$id.'/';
        $config['total_rows'] = $this->Page_m->count_kategori($id);
        $config['per_page'] = 6;
        $config['uri_segment'] = 4;
        $config['first_link'] = false;
        $config['prev_link'] = false;
        $config['next_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = '<ul class="justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        //set_custom_cookie();
        $data = array(
            'title' => 'Blog Kategori',
            'artikel' => $this->Article_m->get_kategori($id, $config['per_page'], $this->uri->segment(4)),
            'tag' => $this->Page_m->tag_artikel(),
            'kategori' => $this->Page_m->kategori_artikel(),
            'terbaru' => $this->Article_m->recent_article()
        );
        //print_r($config['total_rows']);
        $this->template->load('page/blog', $data);
    }

    public function tag_blog($id)
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('page/tag_blog/').$id.'/';
        $config['total_rows'] = $this->Page_m->count_tag($id);
        $config['per_page'] = 6;
        $config['uri_segment'] = 4;
        $config['first_link'] = false;
        $config['prev_link'] = false;
        $config['next_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = '<ul class="justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        //set_custom_cookie();
        $data = array(
            'title' => 'Blog Kategori',
            'artikel' => $this->Article_m->get_tag($id, $config['per_page'], $this->uri->segment(4)),
            'tag' => $this->Page_m->tag_artikel(),
            'kategori' => $this->Page_m->kategori_artikel(),
            'terbaru' => $this->Article_m->recent_article()
        );
        //print_r($data['artikel']);
        $this->template->load('page/blog', $data);
    }
}

/* End of file Page.php */
