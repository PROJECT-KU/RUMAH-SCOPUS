<?php
class Bulan extends CI_Controller
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
        $x['data'] = $this->db->get('tbl_bulan')->result_array();
        $this->load->view('admin/template/v_header');
        $this->load->view('admin/template/navbar');
			$this->load->view('admin/template/head');
			$this->load->view('admin/v_bulan', $x);
			$this->load->view('admin/template/footer');
    }
    public function add_bulan()
    {
        $this->form_validation->set_rules('nama', 'Nama Bulan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
       

        if ($this->form_validation->run() == false) {
            redirect('admin/bulan');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                
            ];
            $this->db->insert('tbl_bulan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Bulan Telah berhasil ditambah</div>');
            redirect('admin/bulan');
        }
    }
    public function edit()
    {
        
        $this->form_validation->set_rules('nama', 'Nama Bulan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        

        if ($this->form_validation->run() == false) {
            redirect('admin/bulan');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $status = $this->input->post('status');
            
            //cek gambar yang akan diupload

            $this->db->set('nama', $nama);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('tbl_bulan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Bulan telah berhasil diubah.</div>');
            redirect('admin/bulan');
        }
    }
     public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_bulan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu Telah Dihapus</div>');
        redirect('admin/bulan');
    }
}
