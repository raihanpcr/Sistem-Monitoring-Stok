<?php

class C_hapus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('username') != 'admin')
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
                redirect('auth/login');
        }

        $this->load->model('M_laporan');
    }

    public function index()
    {
        $data['jenislaporan'] = $this->M_laporan->get_jenislaporan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_hapus',$data);
        $this->load->view('templates/footer');
    }

    public function hapus()
    {
        $tgl = $this->input->post('tgl');
        $id = $this->input->post('id');
        $this->M_laporan->hapus($id, $tgl);
        redirect(base_url());
    }
}

?>