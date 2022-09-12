<?php
class Invoicewebinar extends CI_Controller
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
        $x['data'] = $this->db->get('tbl_order')->result_array();
        $this->load->view('admin/template/v_header');
        $this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_invoicewebinar', $x);
			$this->load->view('admin/template/footer');
    }
    public function add_webinar()
    {
        $this->form_validation->set_rules('id', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('email', 'Email Pemesan', 'required');
        $this->form_validation->set_rules('nama_webinar', 'Nama Webinar', 'required');
        $this->form_validation->set_rules('tanggal ', 'Tanggal Pemesanan', 'required');
        $this->form_validation->set_rules('tanggal_pelaksanaan', 'Tanggal Pelaksanaan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('status', 'Status Pemesanan', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/invoicewebinar');
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'nama_webinar' => $this->input->post('nama_webinar'),
                'tanggal' => $this->input->post('tanggal'),
                'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
                'harga' => $this->input->post('harga'),
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
            $this->db->update('tbl_order');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan <?= $id ?> Telah Dikonfirmasi</div>');
            redirect('admin/invoicewebinar');
        
    }
    public function pending($id)
    {
        $status = 0;
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('tbl_order');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan <?= $id ?> Dipending</div>');
            redirect('admin/invoicewebinar');
        
    }
     public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_order');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('admin/invoicewebinar');
    }
}
