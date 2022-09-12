<?php 
 
class Member extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pengguna');
			$this->load->model('m_member');
		$this->load->library('upload');
	}


	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['user'] = $this->m_pengguna->get_pengguna_login($kode);
		$x['data'] = $this->m_member->get_all_member();
		$this->load->view('admin/template/v_header');
		$this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_member', $x);
			$this->load->view('admin/template/footer');
	}
}