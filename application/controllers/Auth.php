<?php

ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('sewa_model'); // tambahkan model yang diperlukan
    }

    public function login()
    {
		
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/auth_header');
            $this->load->view('login');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));


            
            $cek = $this->sewa_model->cek_login($email, $password);

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
                        redirect('customer/dashboard');
                        break;
                    case 3:
                        redirect('rental/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
  
    public function loginGoogle()
    {
        // ini load model
        $this->load->model('M_Auth');
        require_once APPPATH . "../vendor/autoload.php";
        $google_client = new Google_Client();
        $google_client->setClientId('198551423388-g1m51qrmp7qlkp73t80nfrra12ri5ee9.apps.googleusercontent.com'); //masukkan ClientID anda 
        $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        $google_client->setRedirectUri('http://localhost/E-Catalogue/auth/loginGoogle'); //Masukkan Redirect Uri anda
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if (isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if (!isset($token["error"])) {
                $google_client->setAccessToken($token['access_token']);

                $this->session->set_userdata('access_token', $token['access_token']);

                $google_service = new Google_Service_Oauth2($google_client);

                $data = $google_service->userinfo->get();
                if ($this->M_Auth->Is_already_register($data['id'], $data['email'])) {
                    // $this->session->set_userdata('login', $data['email']);
                    return redirect('Home');
                } else {
                    //insert data
                    $user_data = array(
                        'google' => $data['id'],
                        'nama'  => $data['given_name'] . ' ' . $data['family_name'],
                        'email'  => $data['email'],
                        'password' => '0',
                        'role' => 'klien'
                    );
                    $loginCreate = $this->M_Auth->Insert_user_data($user_data);
                    if ($loginCreate) {
                        // $this->session->set_userdata('login', $data['email']);
                        return redirect('Home');
                    }
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
	

    //ini codingan tambahan dari surya

    public function ganti_password()
    {
        $this->load->view('auth_header');
        $this->load->view('ganti_password');
        $this->load->view('templates_admin/footer');
    }

    public function ganti_password_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required|matches[pass_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth_header');
            $this->load->view('ganti_password');
            $this->load->view('templates_admin/footer');
        } else {
            $data = array('password' => md5($pass_baru));
            $id_user = array('id_user' => $this->session->userdata('id_user'));

            $this->sewa_model->update_password($id_user, $data, 'tb_user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/ganti_password');
        }
    }

    
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

/* End of file Controllername.php */
