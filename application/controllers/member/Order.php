<?php
class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->db->get('tbl_webinar')->result_array();
        $data['bulan'] = $this->db->get('tbl_bulan')->result_array();
        $data['title'] = 'Order';
        $this->load->view('member/order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    public function konfir_order()
    {
        if ($this->uri->segment(4)) {
            $id = $this->uri->segment(4);
            $data['webinar'] = $this->db->get('tbl_webinar')->result_array();
            $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Order Confirmation';
            $this->load->view('member/konfir_order', $data);
            $this->load->view('member/template/navbar', $data);
            $this->load->view('member/template/footer', $data);
            $this->load->view('member/template/head', $data);
            $this->load->view('member/template/print', $data);
        } else {
            redirect('member/order');
        }
    }
    public function order_now()
    {
        $data['webinar'] = $this->db->get('tbl_webinar')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Order Confirmation';
        $this->load->view('member/konfir_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
        $data = [
            'id' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nama_webinar' => $this->input->post('nama_webinar'),
            'harga' => $this->input->post('harga'),
            'tanggal' => $this->input->post('tgl'),
            'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
            'status' => 0,
        ];
        $this->db->insert('tbl_order', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Barang Telah berhasil ditambah</div>');
        redirect('member/tagihan');
    }
    public function bulan()
    {
        if ($this->uri->segment(4)) {
            $nama = $this->uri->segment(4);
            $data['bulan'] = $this->db->get('tbl_bulan')->result_array();
            $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Webinar';
            $this->load->view('member/webinar/webinar_bulan', $data);
            $this->load->view('member/template/navbar', $data);
            $this->load->view('member/template/footer', $data);
            $this->load->view('member/template/head', $data);
            $this->load->view('member/template/print', $data);
        } else {
            redirect('member/order');
        }
    }
    function bengkel_detail()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['bulan'] = $this->db->get('tbl_bulan')->result_array();
        $data['title'] = 'Bengkel Scopus Detail';
        $this->load->view('member/bengkelpaper/bengkel_detail', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function bengkel_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->db->get('tbl_webinar')->result_array();
        $data['bulan'] = $this->db->get('tbl_bulan')->result_array();
        $data['title'] = 'Bengkel Scopus Konfirmasi Pemesanan';
        $this->load->view('member/bengkelpaper/bengkel_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    public function bengkel_order_now()
    {
        
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'id_pesanan' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'harga' => $this->input->post('harga'),
            'tanggal_order' => $this->input->post('tgl'),
            'kategori' => $this->input->post('kategori'),
            'status' => 0,
        ];
        $this->db->insert('tbl_order_bengkel_scopus', $data);
        $this->session->set_flashdata('pesan', 'Order telah Berhasil');
        redirect('member/tagihan/bengkel');
    }
    function private_online_individu()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/online/private_individu', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function private_online_individu_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/online/private_individu_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
     function private_online_individu_order_now()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'id' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'harga' => $this->input->post('harga'),
            'tanggal_order' => $this->input->post('tgl'),
            'kategori' => $this->input->post('kategori'),
            'status' => 0,
        ];
        $this->db->insert('tbl_order_private', $data);
        $this->session->set_flashdata('pesan', 'Order telah Berhasil dipesan');
        redirect('member/tagihan/private');
    }
    function private_online_kelompok()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/online/private_kelompok', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function private_online_kelompok_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/online/private_kelompok_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    
     function private_offline_individu()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/offline/offline_individu', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function private_offline_individu_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/offline/offline_individu_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    
    function private_offline_kelompok()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/offline/offline_kelompok', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function private_offline_kelompok_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Private';
        $this->load->view('member/private/offline/offline_kelompok_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function manuscript()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Order';
        $this->load->view('member/manuscript/manuscript_detail', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function manuscript_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Order';
        $this->load->view('member/manuscript/manuscript_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    
    function submit_publish()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Order';
        $this->load->view('member/submit/submit_detail', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
    function submit_publish_order()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Order';
        $this->load->view('member/submit/submit_order', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/footer', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/print', $data);
    }
  
}
