<?php
include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->session->userdata('status') == 'user_login') {
            redirect('Login?alert=belum_login');
        }
    }
    function index()
    {
        $data['admin'] = $this->M_admin->get_data('admin')->result();
        $data['judul'] = 'Admin Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_admin');
        $this->load->view('Templates/Footer');
    }
    function tambah()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $this->M_admin->insert($data, 'admin');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di tambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin');
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
            redirect('Admin');
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'id' => $id,
                'username' => $username,
                'password' => $password
            );
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <b>Berhasil</b> di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Admin');
        }
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_admin->delete($where, 'admin');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin');
    }
    function upload()
    {
        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data <b>Gagal</b> di unggah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Admin');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']);
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
            $data = array();
            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'username' => $row['A'],
                        'password'      => $row['B']
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('admin', $data);
            unlink(realpath('excel/' . $data_upload['file_name']));
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di unggah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Admin');
        }
    }
    function download()
    {
        $data = array(
            'title' => 'Tabel Admin',
            'unduh' => $this->M_admin->get_data('admin')->result()
        );
        $this->load->view('V_excel', $data);
    }
}
