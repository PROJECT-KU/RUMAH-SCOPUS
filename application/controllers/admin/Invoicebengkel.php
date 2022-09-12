<?php
class Invoicebengkel extends CI_Controller
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
        $x['data'] = $this->db->get('tbl_order_bengkel_scopus')->result_array();
        $this->load->view('admin/template/v_header');
        $this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_invoicebengkel', $x);
			$this->load->view('admin/template/footer');
    }
    public function add_webinar()
    {
        $this->form_validation->set_rules('id_pesanan', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('email', 'Email Pemesan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal_order', 'Tanggal Order', 'required');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status Pemesanan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('admin/invoiceprivate');
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'id_pesanan' => $this->input->post('id_pesanan'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'harga' => $this->input->post('harga'),
                'tanggal_order' => $this->input->post('tanggal_order'),
                'Kategori' => $this->input->post('Kategori'),
                'status' => $this->input->post('status'),
            ];
            //$this->db->insert('tbl_bukti_pembayaran', $data);
            //$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Barang Telah berhasil ditambah</div>');
            //redirect('admin/invoice');
        }
    }
    public function edit()
    {

        $this->form_validation->set_rules('id_pesanan', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal_order ', 'Tanggal Order', 'required');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status Pemesanan', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/invoiceprivate');
        } else {
            $order = $this->input->post('id_pesanan');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $harga = $this->input->post('harga');
            $tanggal_order = $this->input->post('tanggal_order');
            $kategori = $this->input->post('Kategori');
            $status = $this->input->post('status');
            //cek gambar yang akan diupload

           
            $this->db->set('nama', $nama, 'readonly');
            $this->db->set('email', $email, 'readonly');
            $this->db->set('harga', $harga, 'readonly');
            $this->db->set('tanggal_order', $tanggal_order, 'readonly');
            $this->db->set('Kategori', $Kategori, 'readonly');
            $this->db->set('status', $status);
            $this->db->where('id', $order, 'readonly');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Profile anda telah berhasil diubah.</div>');
            redirect('admin/invoicewprivate');
        }
    }
    public function konfir($id_pesanan)
    {
        $status = 1;
            $this->db->set('status', $status);
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->update('tbl_order_bengkel_scopus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><?= $id ?><?= $id ?>Pesanan  Telah Dikonfirmasi</div>');
            redirect('admin/invoicebengkel');
        
    }
    public function pending($id_pesanan)
    {
        $status = 0;
            $this->db->set('status', $status);
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->update('tbl_order_bengkel_scopus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan <?= $id ?> Dipending</div>');
            redirect('admin/invoicebengkel');
        
    }
    public function delete($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->delete('tbl_order_bengkel_scopus');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Order Telah Dihapus</div>');
        redirect('admin/invoicebengkel');
    }
}
