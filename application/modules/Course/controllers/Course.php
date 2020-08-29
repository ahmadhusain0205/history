<?php
include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_course');
        $this->form_validation->set_rules('course', 'Course', 'required|trim');
        $this->form_validation->set_rules('sks', 'SKS', 'required|trim');
    }
    function index()
    {
        $data['course'] = $this->M_course->get_data('course')->result();
        $data['judul'] = 'Course Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_course');
        $this->load->view('Templates/Footer');
    }
    function tambah()
    {
        $course = $this->input->post('course');
        $sks = $this->input->post('sks');
        $data = array(
            'id_user' => $this->session->userdata('id'),
            'course' => $course,
            'sks' => $sks
        );
        $this->M_course->insert($data, 'course');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di tambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Course');
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
            redirect('Course');
        } else {
            $id = $this->input->post('id');
            $course = $this->input->post('course');
            $sks = $this->input->post('sks');
            $data = array(
                'id' => $id,
                'id_user' => $this->session->userdata('id'),
                'course' => $course,
                'sks' => $sks
            );
            $this->db->where('id', $id);
            $this->db->update('course', $data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <b>Berhasil</b> di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Course');
        }
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_course->delete($where, 'course');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Course');
    }
    function deleteAll()
    {
        $this->db->empty_table('course');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus dari Sistem
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Course');
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
            redirect('Course');
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
                        'course' => $row['A'],
                        'sks'      => $row['B']
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('course', $data);
            unlink(realpath('excel/' . $data_upload['file_name']));
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di unggah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Course');
        }
    }
    function download()
    {
        $data = array(
            'title' => 'Tabel Course',
            'unduh' => $this->M_course->get_data('course')->result()
        );
        $this->load->view('V_excel', $data);
    }
}
