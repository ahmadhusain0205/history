<?php
class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    }
    function index()
    {
        if ($this->session->userdata('status') == 'admin_login') {
            $data['profile'] = $this->M_profile->get_data('admin')->result();
        } else {
            $data['profile'] = $this->M_profile->get_data('user')->result();
        }
        $data['judul'] = 'Profile Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_profile');
        $this->load->view('Templates/Footer');
    }
    function edit()
    {
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data <b>Gagal</b> di edit
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Profile');
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'id' => $id,
                'username' => $username,
                'password' => $password
            );
            if ($this->session->userdata('status') == 'admin_login') {
                $this->db->where('id', $id);
                $this->db->update('admin', $data);
            } else {
                $this->db->where('id', $id);
                $this->db->update('user', $data);
            }
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <b>Berhasil</b> di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Profile');
        }
    }
}
