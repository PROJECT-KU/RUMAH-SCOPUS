<?php
class Login extends CI_Controller
{

    function index()
    {
        if ($this->session->userdata('email')) {
            redirect('member/dasboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Tidak Boleh Kosong', 'valid_email', 'Masukan Email dengan Benar']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Anda Kosong',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('member/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbl_member', ['email' => $email])->row_array();
        //untuk mengetahui adanya user/tidak
        if ($user) {
            //mengecek user aktif atau tidak
            if ($user['user_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('member/dasboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Anda Salah</div>');
                    redirect('member/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User Anda Belum Aktif</div>');
                redirect('member/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun Anda Belum Terdaftar</div>');
            redirect('member/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Logout</div>');
        redirect('member/login');
    }
    
     function reset()
    {
    //     $this->load->model('Reset_m', 'reset');
    //   $reset_key = $this->uri->segment(3);
    //   if(!$reset_key){
    //       die('jangan dihapus');
    //   }
    //   if($this->reset->check_reset_key($reset_key)==1){
          
            $this->load->view('member/reset');
    //   }else{
    //       die("reset key salah");
    //   }
             
       
    }
//   public function reset_password_validation(){
//       $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matchhes[retype_password]');
//       $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|min_length[6]|matches[password]');
       
//       if($this->from_validation->run()){
           
//           $reset_key = $this->input->post('reset_key');
//           $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
           
//           if($this->reset->reset($email,$reset_key,$password)){
//               echo "password anda telah berhasil diubah";
               
//           }else{
//               echo "error";
//           }
//       }else{
           
//           $this->load->view('member/reset');
//       }
//   }
//   public function update_reset_key($email,$reset_key){
//       $this->db->where('email', $email);
//       $data = array('reset_password'=>$reset_key);
//       $this->db->update('member', $data);
//       if($this->db->affected_rows()>0){
//           return TRUE;
//       }else{
//           return FALSE;
//       }
//   }
//   public function email_reset_password_validation(){
// 		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
// 		if($this->form_validation->run()){
 
// 			$email = $this->input->post('email');
// 			$reset_key =  random_string('alnum', 50);
 
// 			if($this->reset_m->update_reset_key($email,$reset_key))
// 			{
				
// 		    	$this->load->library('email');
// 				$config = array();
// 				$config['charset'] = 'utf-8';
// 				$config['useragent'] = 'Codeigniter';
// 				$config['protocol']= "smtp";
// 				$config['mailtype']= "html";
// 				$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
// 				$config['smtp_port']= "465";
// 				$config['smtp_timeout']= "5";
// 				$config['smtp_user']= "xxx@gmail.com"; // isi dengan email kamu
// 				$config['smtp_pass']= "xxxx"; // isi dengan password kamu
// 				$config['crlf']="\r\n"; 
// 				$config['newline']="\r\n"; 
// 				$config['wordwrap'] = TRUE;
// 				//memanggil library email dan set konfigurasi untuk pengiriman email
					
// 				$this->email->initialize($config);
// 				//konfigurasi pengiriman
// 				$this->email->from($config['smtp_user']);
// 				$this->email->to($this->input->post('email'));
// 				$this->email->subject("Reset your password");
 
// 				$message = "<p>Anda melakukan permintaan reset password</p>";
// 				$message .= "<a href='".site_url('welcome/reset_password/'.$reset_key)."'>klik reset password</a>";
// 				$this->email->message($message);
				
// 				if($this->email->send())
// 				{
// 					echo "silahkan cek email <b>".$this->input->post('email').'</b> untuk melakukan reset password';
// 				}else
// 				{
// 					echo "Berhasil melakukan registrasi, gagal mengirim verifikasi email";
// 				}
				
// 				echo "<br><br><a href='".site_url("member-login")."'>Kembali ke Menu Login</a>";
 
// 			}else {
// 				die("Email yang anda masukan belum terdaftar");
// 			}
// 		} else{
// 			$this->load->view('reset_password_email');
// 		}
// 	}
}

