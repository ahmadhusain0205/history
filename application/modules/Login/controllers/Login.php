<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    function index()
    {
        $data['judul'] = 'Login Page';
        $this->load->view('Templates/Header_login', $data);
        $this->load->view('V_login');
        $this->load->view('Templates/Footer_login');
    }
    function login_aksi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sebagai = $this->input->post('sebagai');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() != false) {
            $where = array(
                'username' => $username,
                'password' => $password
            );
            if ($sebagai == 'admin') {
                $cek = $this->M_login->cek_login('admin', $where)->num_rows();
                $data = $this->M_login->cek_login('admin', $where)->row();
                if ($cek > 0) {
                    $data_session = array(
                        'id' => $data->id,
                        'username' => $data->username,
                        'status' => 'admin_login'
                    );
                    $this->session->set_userdata($data_session);
                    redirect('Dashboard');
                } else {
                    redirect('Login?alert=gagal');
                }
            } elseif ($sebagai == 'user') {
                $cek = $this->M_login->cek_login('user', $where)->num_rows();
                $data = $this->M_login->cek_login('user', $where)->row();
                if ($cek > 0) {
                    $data_session = array(
                        'id' => $data->id,
                        'username' => $data->username,
                        'status' => 'user_login'
                    );
                    $this->session->set_userdata($data_session);
                    redirect('Dashboard');
                } else {
                    redirect('Login?alert=gagal');
                }
            }
        } else {
            $data['judul'] = 'Login Page';
            $this->load->view('Templates/Header_login', $data);
            $this->load->view('V_login');
            $this->load->view('Templates/Footer_login');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Login?alert=logout');
    }
}
