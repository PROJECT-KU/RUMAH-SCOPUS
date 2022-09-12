<?php
class Cetak extends CI_Controller
{

    function index()
    {
        $data['title'] = 'Print';
        $this->load->view('member/template/print');
    }
}
