<?php
class Story extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Story';
        $this->load->view('member/story', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
}
