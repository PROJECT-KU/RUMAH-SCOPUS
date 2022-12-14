<?php
class Download extends CI_Controller
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
		$x['data'] = $this->m_files->get_all_files();
		$x['title'] = 'Rumah Scopus | Download Jurnal';
		$this->load->view('depan/template/navbar');
		$this->load->view('depan/template/head');
		$this->load->view('depan/v_download', $x);
		$this->load->view('depan/template/footer');
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
