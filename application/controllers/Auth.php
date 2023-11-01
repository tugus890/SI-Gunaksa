<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
		
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/Auth/auth_header');
            $this->load->view('Auth/auth');
            $this->load->view('templates/Auth/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));


            
            $cek = $this->sispar_model->cek_login($email, $password);

            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    email atau password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('nama', $cek->nama);

            
                switch ($cek->role) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('pimpinan/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('captcha', 'Captcha', 'callback_check_captcha|required');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }

}

/* End of file Auth.php */

?>