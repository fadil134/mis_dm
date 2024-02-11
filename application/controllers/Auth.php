<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function masuk()
    {
        $data = array(
            'title' => 'Login',
        );
        $this->load->view('dist/auth-login', $data, false);

    }

    public function daftar()
    {
        $data = array(
            'title' => 'Registrasi',
        );
        $this->load->view('dist/auth-register', $data, false);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('username', 'username', 'required|is_unique[pengguna.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->form_validation->run() === true) {
                // Insert user data into the database
                $data = [
                    'username' => $this->input->post('username'),
                    'Kata_Sandi' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'Nama_Pengguna' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                ];
                $this->db->insert('pengguna', $data);
                // Redirect to login page or perform other actions
                redirect('auth/masuk', 'refresh');
            }
        }
        redirect('auth/daftar', 'refresh');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === true) {
                // Check user credentials from the database
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->db->get_where('pengguna', ['username' => $username])->row();

                if ($user && password_verify($password, $user->Kata_Sandi) && $user->is_active === "1") {
                    $this->session->set_userdata('user', $user);
                    redirect('dist/features_post_create', 'refresh');
                    //print_r($user);
                } elseif (!isset($user->username)) {
                    $this->session->set_flashdata('message', 'Username tidak di temukan!');
                    redirect('auth/masuk', 'refresh');
                    //echo $this->session->flashdata('pesan');
                } elseif (!isset($user->Kata_Sandi)) {
                    session_start();
                    $this->session->set_flashdata('message', 'Password Salah!');
                    //echo $this->session->flashdata('pesan');
                    //var_dump($this->session->flashdata('pesan'));
                    redirect('auth/masuk', 'refresh');
                    //print_r($user);
                } elseif ($user->is_active !== 1) {
                    $this->session->set_flashdata('message', 'Mohon hubungi admin untuk aktivasi akun!');

                    //var_dump($this->session->flashdata('message'));
                    //echo $this->session->flashdata('pesan');
                    redirect('auth/masuk', 'refresh');
                    //print_r($user);
                }
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('auth/masuk', 'refresh');
            }
        }
        //redirect('dist/auth_login', 'refresh');
    }

    public function logout()
    {
        // Destroy user session and redirect to login page

        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('page', 'refresh');
    }

}
