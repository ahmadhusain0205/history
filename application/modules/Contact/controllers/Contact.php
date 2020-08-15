<?php
class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['judul'] = 'Contact Page';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Topbar');
        $this->load->view('Templates/Sidebar');
        $this->load->view('V_contact');
        $this->load->view('Templates/Footer');
    }
}
