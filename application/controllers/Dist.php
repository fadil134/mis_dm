<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dist extends CI_Controller
{

    public function pengumuman()
    {
        $data = array(
            'title' => "Pengumuman",
        );
        $this->load->view('dist/pengumuman', $data);
    }

    public function master_tag()
    {
        $data = array(
            'title' => "Master Tag",
        );
        $this->load->view('dist/master-tag', $data);
    }

    public function master_kategori()
    {
        $data = array(
            'title' => "Master Kategori",
        );
        $this->load->view('dist/master-kategori', $data);
    }

    public function data_guru()
    {
        $data = array(
            'title' => "Data Guru",
        );
        $this->load->view('dist/data-guru', $data);
    }

    public function data_siswa()
    {
        $data = array(
            'title' => "Data Siswa",
        );
        $this->load->view('dist/data-siswa', $data);
    }

    public function data_pelajaran()
    {
        $data = array(
            'title' => "Data Pelajaran",
        );
        $this->load->view('dist/data-pelajaran', $data);
    }

    public function assign_role()
    {
        $data = array(
            'title' => "Assign Role",
        );
        $this->load->view('dist/assign_role', $data);
    }

    public function index()
    {
        $data = array(
            'title' => "General Dashboard",
        );
        $this->load->view('dist/index-0', $data);
    }

    public function layout_default()
    {
        $data = array(
            'title' => "Layout &rsaquo; Default",
        );
        $this->load->view('dist/layout-default', $data);
    }

    public function layout_transparent()
    {
        $data = array(
            'title' => "Layout &rsaquo; Transparent Sidebar",
        );
        $this->load->view('dist/layout-transparent', $data);
    }

    public function layout_top_navigation()
    {
        $data = array(
            'title' => "Layout &rsaquo; Top Navigation",
        );
        $this->load->view('dist/layout-top-navigation', $data);
    }

    public function auth_forgot_password()
    {
        $data = array(
            'title' => "Forgot Password",
        );
        $this->load->view('dist/auth-forgot-password', $data);
    }

    public function auth_login()
    {
        $data = array(
            'title' => "Login",
        );
        $this->load->view('dist/auth-login', $data);
    }

    public function auth_register()
    {
        $data = array(
            'title' => "Register",
        );
        $this->load->view('dist/auth-register', $data);
    }

    public function auth_reset_password()
    {
        $data = array(
            'title' => "Reset Password",
        );
        $this->load->view('dist/auth-reset-password', $data);
    }

    public function errors_503()
    {
        $data = array(
            'title' => "503",
        );
        $this->load->view('dist/errors-503', $data);
    }

    public function errors_403()
    {
        $data = array(
            'title' => "403",
        );
        $this->load->view('dist/errors-403', $data);
    }

    public function errors_404()
    {
        $data = array(
            'title' => "404",
        );
        $this->load->view('dist/errors-404', $data);
    }

    public function errors_500()
    {
        $data = array(
            'title' => "500",
        );
        $this->load->view('dist/errors-500', $data);
    }

    public function features_activities()
    {
        $data = array(
            'title' => "Activities",
        );
        $this->load->view('dist/features-activities', $data);
    }

    public function features_post_create()
    {
        $data = array(
            'title' => "Post Create",
            'article' => $this->Article_m->get_articles(),
            'publish' => $this->Article_m->publish(),
            'pending' => $this->Article_m->pending(),
            'draft' => $this->Article_m->draft(),
            'status' => $this->Article_m->status(),
            'kategori' => $this->Article_m->kategori(),
        );
        //print_r($data['publish']);
        $this->load->view('dist/features-post-create', $data);
    }

    public function features_posts()
    {
        $data = array(
            'title' => "Posts",
        );
        $this->load->view('dist/features-posts', $data);
    }

    public function features_profile()
    {
        $data = array(
            'title' => "Profile",
        );
        $this->load->view('dist/features-profile', $data);
    }

    public function features_settings()
    {
        $data = array(
            'title' => "Settings",
        );
        $this->load->view('dist/features-settings', $data);
    }

    public function features_setting_detail()
    {
        $data = array(
            'title' => "Setting Detail",
        );
        $this->load->view('dist/features-setting-detail', $data);
    }

    public function features_tickets()
    {
        $data = array(
            'title' => "Tickets",
        );
        $this->load->view('dist/features-tickets', $data);
    }

    public function beranda()
    {
        $data = array(
            'title' => 'Manajemen Beranda'
        );
        $this->load->view('dist/page-beranda', $data);
    }

}
