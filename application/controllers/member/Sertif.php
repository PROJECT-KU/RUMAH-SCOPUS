<?php
class Sertif extends CI_Controller
{

    function index()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->db->get_where('tbl_order', ['email' => $this->session->userdata('email')])->result_array();
        $data['title'] = 'Sertifikat';
        $this->load->view('member/sertif', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function cetak()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->db->get_where('tbl_order', ['email' => $this->session->userdata('email')])->result_array();
        $data['title'] = 'Cetak Sertifikat';
        $this->load->view('member/cetak_sertif', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
}
