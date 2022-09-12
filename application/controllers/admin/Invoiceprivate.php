<?php
class Invoiceprivate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }


    function index()
    {
        $kode = $this->session->userdata('idadmin');
        $x['user'] = $this->m_pengguna->get_pengguna_login($kode);
        $x['data'] = $this->db->get('tbl_order_private')->result_array();
        $this->load->view('admin/template/v_header');
        $this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_invoiceprivate', $x);
			$this->load->view('admin/template/footer');
    }
    public function add_webinar()
    {
        $this->form_validation->set_rules('id', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('email', 'Email Pemesan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal_order', 'Tanggal Order', 'required');
        $this->form_validation->set_rules('status', 'Status Pemesanan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('admin/invoiceprivate');
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'tanggal_order' => $this->input->post('tanggal_order'),
                'status' => $this->input->post('status'),
            ];
            //$this->db->insert('tbl_bukti_pembayaran', $data);
            //$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Barang Telah berhasil ditambah</div>');
            //redirect('admin/invoice');
        }
    }
    public function konfir($id)
    {
        $status = 1;
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('tbl_order_private');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><?= $id ?><?= $id ?>Pesanan  Telah Dikonfirmasi</div>');
            redirect('admin/invoiceprivate');
        
    }
    public function pending($id)
    {
        $status = 0;
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('tbl_order_private');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan <?= $id ?> Dipending</div>');
            redirect('admin/invoiceprivate');
        
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_order_private');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pesanan Telah Dihapus</div>');
        redirect('admin/invoiceprivate');
    }
}
