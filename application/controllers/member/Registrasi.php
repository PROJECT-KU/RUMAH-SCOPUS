<?php
class Registrasi extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('member/dasboard');
        }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Lengkap Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_member.email]', ['required' => 'Email Tidak Boleh Kosong', 'is_unique' => 'Email Sudah Terdaftar']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password Anda Kosong',
            'matches' => 'Password Tidak Cocok',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $email = $this->input->post('email', true);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';
            $this->load->view('member/registrasi', $data);
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'alamat' => '',
                'gender' => '',
                'no_hp' => '',
                'status' => '',
                'email' => htmlspecialchars($email),
                'foto' => 'blank.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'user_active' => 0,
                'date_created' => time()                           

            ];
             // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $this->db->insert('tbl_member', $data);
            $this->db->insert('tbl_user_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Akun Anda Telah Terdaftar, Silahkan Login.</div>');
            redirect('member/registrasi');
        }
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smpt',
            'smtp_host' => 'mail.rumahscopus.com ',
            'smtp_user' => 'admin@rumahscopus.com',
            'smtp_pass' => 'adminrumahscopus',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('admin@rumahscopus.com', 'Rumah Scopus Indonesia');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'member/registrasi/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br><br><br> <br>Alamat: Bangunsari, Bangunkerto, Turi, Sleman, Yogyakarta 55551 <br> Email : info@rumahscopus.com
<br>Phone : (+62) 812-2688-3280');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'member/registrasi/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a><br><br><br><br>Alamat: Bangunsari, Bangunkerto, Turi, Sleman, Yogyakarta 55551<br> Email : info@rumahscopus.com
<br>Phone : (+62) 812-2688-3280');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_member', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('user_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_member');

                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('member/login');
                } else {
                    $this->db->delete('tbl_member', ['email' => $email]);
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('member/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('member/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('member/login');
        }
    }
    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('member/reset', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tbl_member', ['email' => $email, 'user_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('tbl_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('member/registrasi/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('member/registrasi/forgotpassword');
            }
        }
    }
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_member', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('member/registrasi/forgotpassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('member/registrasi/forgotpassword');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('member/login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('member/change_reset', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tbl_member');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('tbl_user_token', ['email' => $email]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah, silahkan login</div>');
            redirect('member/login');
        }
    }
}
