<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
    }
    function index()
    {
        $data['judul'] = 'Dashboard Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_dashboard');
        $this->load->view('Templates/Footer');
    }
}
