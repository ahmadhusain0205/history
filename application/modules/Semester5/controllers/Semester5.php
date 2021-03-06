<?php
include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
class Semester5 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_semester5');
        $this->form_validation->set_rules('id_course', 'Course', 'required|trim');
        $this->form_validation->set_rules('id_score', 'Score', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
    }
    function index()
    {
        $data['semester5'] = $this->M_semester5->get_data('semester')->result();
        $data['course'] = $this->M_semester5->get('course')->result();
        $data['score'] = $this->M_semester5->get('score')->result();
        $data['judul'] = 'Semester Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_semester5');
        $this->load->view('Templates/Footer');
    }
    function tambah()
    {
        if ($this->form_validation->run() == true) {
            $id_course = $this->input->post('id_course');
            $id_score = $this->input->post('id_score');
            $semester = $this->input->post('semester');
            $data = array(
                'id_course' => $id_course,
                'id_score' => $id_score,
                'id_user' => $this->session->userdata('id'),
                'semester' => $semester
            );
            $this->M_semester5->insert($data, 'semester');
            $alert = $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di tambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            if ($this->input->post('semester') == '6') {
                $alert;
                redirect('Semester6');
            } else if ($this->input->post('semester') == '5') {
                $alert;
                redirect('Semester5');
            } else if ($this->input->post('semester') == '4') {
                $alert;
                redirect('Semester4');
            } else if ($this->input->post('semester') == '3') {
                $alert;
                redirect('Semester3');
            } else if ($this->input->post('semester') == '2') {
                $alert;
                redirect('Semester2');
            } else {
                $alert;
                redirect('Semester1');
            }
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data <b>Gagal</b> di tambah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Semester5');
        }
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
            redirect('Semester5');
        } else {
            $id = $this->input->post('id');
            $id_course = $this->input->post('id_course');
            $id_score = $this->input->post('id_score');
            $semester = $this->input->post('semester');
            $data = array(
                'id_course' => $id_course,
                'id_score' => $id_score,
                'id_user' => $this->session->userdata('id'),
                'semester' => $semester
            );
            $this->db->where('id', $id);
            $this->db->update('semester', $data);
            $alert = $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di ubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            if ($this->input->post('semester') == '6') {
                $alert;
                redirect('Semester6');
            } else if ($this->input->post('semester') == '5') {
                $alert;
                redirect('Semester5');
            } else if ($this->input->post('semester') == '4') {
                $alert;
                redirect('Semester4');
            } else if ($this->input->post('semester') == '3') {
                $alert;
                redirect('Semester3');
            } else if ($this->input->post('semester') == '2') {
                $alert;
                redirect('Semester2');
            } else {
                $alert;
                redirect('Semester1');
            }
        }
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_semester5->delete($where, 'semester');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Semester5');
    }
    function deleteAll()
    {
        $this->db->empty_table('semester');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus dari Sistem
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Semester5');
    }
    function download()
    {
        $data = array(
            'title' => 'Tabel Semester',
            'unduh' => $this->M_semester5->get_data()->result()
        );
        $this->load->view('V_excel', $data);
    }
    function downloadAll()
    {
        $data = array(
            'title' => 'Tabel Semester',
            'unduh' => $this->M_semester5->get_all()->result()
        );
        $this->load->view('V_excel', $data);
    }
}
