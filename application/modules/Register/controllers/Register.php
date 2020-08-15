<?php
class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->load->model('M_register');
    }
    function index()
    {
        $data['judul'] = 'Register Page';
        $this->load->view('Templates/Header_login', $data);
        $this->load->view('V_register');
        $this->load->view('Templates/Footer_login');
    }
    function tambah()
    {
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data <b>Gagal</b> di tambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Register');
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'id' => $id,
                'username' => $username,
                'password' => $password
            );
            $this->M_register->insert($data, 'user');
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <b>Berhasil</b> di tambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Login');
        }
    }
}
