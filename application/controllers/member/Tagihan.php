<?php
class Tagihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $data['tagihan'] = $this->db->get('tbl_order')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Invoice Webinar';
        $this->load->view('member/webinar/tagihan', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
    function submit()
    {
        $data['tagihan'] = $this->db->get('tbl_order')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submit Payment';
        $this->load->view('member/webinar/submit', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
    function submit_bengkel()
    {
        $data['tagihan'] = $this->db->get('tbl_order')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submit Payment';
        $this->load->view('member/bengkelpaper/submit_bengkel', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
    function submit_private()
    {
        $data['tagihan'] = $this->db->get('tbl_order')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submit Payment';
        $this->load->view('member/private/submit_private', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
    public function cancel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_order');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('member/tagihan');
    }
    public function cancel_bengkel($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('tbl_order_bengkel_scopus');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('member/tagihan/bengkel');
    }
    public function cancel_private($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_order_private');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('member/tagihan/private');
    }
    public function submit_payment()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '8048';
            $config['upload_path'] = './assets/images/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $new_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'email' => $this->session->userdata('email'),
            'kategori' => $this->input->post('kategori'),
            'id_order' => htmlspecialchars($this->input->post('id_order'), true),
            'bukti_pembayaran' => $new_image,

        ];
        $this->db->insert('tbl_bukti_pembayaran', $data);
        $this->session->set_flashdata('pembayaran', 'Pembayaran Sedang Diproses');
        redirect('member/tagihan');
    }
    public function submit_payment_bengkel()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $new_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'email' => $this->session->userdata('email'),
            'kategori' => $this->input->post('kategori'),
            'id_order' => htmlspecialchars($this->input->post('id_order'), true),
            'bukti_pembayaran' => $new_image,

        ];
        $this->db->insert('tbl_bukti_pembayaran', $data);
        $this->session->set_flashdata('bengkel', 'Pembayaran Sedang Diproses');
        redirect('member/tagihan/bengkel');
    }
     public function submit_payment_private()
    {
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $new_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'email' => $this->session->userdata('email'),
            'kategori' => $this->input->post('kategori'),
            'id_order' => htmlspecialchars($this->input->post('id_order'), true),
            'bukti_pembayaran' => $new_image,

        ];
        $this->db->insert('tbl_bukti_pembayaran', $data);
        $this->session->set_flashdata('private', 'Pembayaran Sedang Diproses');
        redirect('member/tagihan/private');
    }
     function bengkel()
    {
        $data['tagihan'] = $this->db->get('tbl_order_bengkel_scopus')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Invoice Paper';
        $this->load->view('member/bengkelpaper/tagihan_bengkel', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
    function private()
    {
        $data['tagihan'] = $this->db->get('tbl_order_private')->result_array();
        $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Invoice Private';
        $this->load->view('member/private/tagihan_private', $data);
        $this->load->view('member/template/navbar', $data);
        $this->load->view('member/template/head', $data);
        $this->load->view('member/template/footer', $data);
    }
}
