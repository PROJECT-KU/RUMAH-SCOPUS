<?php
class Ambil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_files');
        $this->load->helper('download');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }
    function index()
    {
        $x['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $x['data'] = $this->m_files->get_all_files();
        $x['title'] = 'Download';
        $this->load->view('member/ambil', $x);
        $this->load->view('member/template/navbar', $x);
        $this->load->view('member/template/footer', $x);
        $this->load->view('member/template/head', $x);
        $this->load->view('member/template/print', $x);
    }

    function get_file()
    {
        $id = $this->uri->segment(3);
        $get_db = $this->m_files->get_file_byid($id);
        $q = $get_db->row_array();
        $file = $q['file_data'];
        $path = './assets/files/' . $file;
        $data = file_get_contents($path);
        $name = $file;
        force_download($name, $data);
    }
}
