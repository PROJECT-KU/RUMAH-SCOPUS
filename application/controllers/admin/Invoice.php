<?php
class Invoice extends CI_Controller
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
        $x['data'] = $this->db->get('tbl_bukti_pembayaran')->result_array();
        $this->load->view('admin/template/v_header');
        $this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_invoice', $x);
			$this->load->view('admin/template/footer');
    }
    public function add_webinar()
    {
        $this->form_validation->set_rules('id_order', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('butkti_pembayaran', 'Bukti Pembayaran', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/invoice');
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'id_order' => $this->input->post('id_order'),
                'email' => $this->input->post('email'),
                'bukti_pembayaran' => $this->input->post('bukti_pembayaran'),
            ];
            //$this->db->insert('tbl_bukti_pembayaran', $data);
            //$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Barang Telah berhasil ditambah</div>');
            //redirect('admin/invoice');
        }
    }
    public function edit()
    {

        $this->form_validation->set_rules('id_order', 'ID Pemesanan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('bukti_pembayaran', 'Bukti Pembayaran', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/invoice');
        } else {
            $order = $this->input->post('id_order');
            $email = $this->input->post('email');
            $bukti = $this->input->post('bukti_pembayaran');
            //cek gambar yang akan diupload

            $this->db->set('email', $email);
            $this->db->set('bukti_pembayaran', $bukti);
            $this->db->where('id_order', $order);
            $this->db->update('tbl_bukti_pembayaran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Profile anda telah berhasil diubah.</div>');
            redirect('admin/invoice');
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_bukti_pembayaran');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('admin/invoice');
    }
}
