<?php
class Galeri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$idalbum = $this->uri->segment(3);
		$x['alb'] = $this->m_album->get_all_album();
		$x['all_galeri'] = $this->m_galeri->get_all_galeri();
		$this->load->view('depan/template/navbar');
		$this->load->view('depan/template/head');
		$this->load->view('depan/v_galeri', $x);
		$this->load->view('depan/template/footer');
	}
	function album($idalbum)
	{
		$x['alb'] = $this->m_album->get_all_album();
		$x['data'] = $this->m_galeri->get_galeri_by_album_id($idalbum);

		$this->load->view('depan/template/navbar');
		$this->load->view('depan/template/head');
		$this->load->view('depan/v_galeri_per_album', $x);
		$this->load->view('depan/template/footer');
	}
}
