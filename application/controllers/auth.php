<?php

class Auth extends CI_Controller {

    public function login()
    {
        
        $this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi']);

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        }
        else
        {
            $auth = $this->model_auth->cek_login();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Salah
                </div>');
                redirect('auth/login');
            }
            else {
                $this->session->set_userdata('username',$auth->username);
                redirect(base_url());
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}