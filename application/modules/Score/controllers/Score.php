<?php
class Score extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_score');
        $this->form_validation->set_rules('grade', 'Grade', 'required|trim');
    }
    function index()
    {
        $data['score'] = $this->M_score->get_data('score')->result();
        $data['judul'] = 'Score Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_score');
        $this->load->view('Templates/Footer');
    }
    function tambah()
    {
        $grade = $this->input->post('grade');
        $data = array(
            'grade' => $grade
        );
        $this->M_score->insert($data, 'score');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di tambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Score');
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
            redirect('Score');
        } else {
            $id = $this->input->post('id');
            $grade = $this->input->post('grade');
            $data = array(
                'id' => $id,
                'grade' => $grade
            );
            $this->db->where('id', $id);
            $this->db->update('score', $data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <b>Berhasil</b> di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Score');
        }
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_score->delete($where, 'score');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Score');
    }
    function deleteAll()
    {
        $this->db->empty_table('score');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <b>Berhasil</b> di hapus dari Sistem
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Score');
    }
}
