<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Client;
use Google\Service\Oauth2;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller {

    public function login2()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/Auth/auth_header');
            $this->load->view('Auth/auth');
            $this->load->view('templates/Auth/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $this->load->model('sispar_model'); // Load the sispar_model
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
                if ($cek->role == 1) { // Admin
                    if ($email === $cek->email) { // Email sesuai dengan yang ada di database
                        $this->session->set_userdata('email', $cek->email);
                        $this->session->set_userdata('id_user', $cek->id_user);
                        $this->session->set_userdata('role', $cek->role);
                        $this->session->set_userdata('nama', $cek->nama);
                        $this->session->set_userdata('foto', $cek->foto);
                        redirect('admin/dashboard');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Anda tidak memiliki izin untuk mengakses halaman admin!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('auth/login');
                    }
                    
                } elseif ($cek->role == 2) { // Pimpinan
                    if ($email === $cek->email) { // Email sesuai dengan yang ada di database
                        $this->session->set_userdata('email', $cek->email);
                        $this->session->set_userdata('id_user', $cek->id_user);
                        $this->session->set_userdata('role', $cek->role);
                        $this->session->set_userdata('nama', $cek->nama);
                        $this->session->set_userdata('foto', $cek->foto);
                        redirect('pimpinan/dashboard');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Anda tidak memiliki izin untuk mengakses halaman Pimpinan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('auth/login');
                    }
                } else {
                    // Lakukan penanganan untuk peran lainnya jika diperlukan
                    // ...
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

    public function login()
{
    include_once APPPATH . "../vendor/autoload.php";
    $google_client = new Client();
    $google_client->setClientId('742699224299-c2q97i9g18n4ilvhotkrigde7kgc0lq2.apps.googleusercontent.com');
    $google_client->setClientSecret('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');
    $google_client->setRedirectUri('http://localhost/gunaksa2/Auth/login');
    $google_client->addScope('email');
    $google_client->addScope('profile');

    if (isset($_GET["code"])) {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        if (!isset($token["error"])) {
            $google_client->setAccessToken($token['access_token']);
            $this->session->set_userdata('access_token', $token['access_token']);
            $google_service = new Oauth2($google_client);
            $data = $google_service->userinfo->get();
            $current_datetime = date('Y-m-d H:i:s');
            $user_data = array(
                'nama' => $data['given_name'],
                // 'last_name'  => $data['family_name'],
                'email' => $data['email'],
                'foto' => $data['picture'],
                // 'updated_at' => $current_datetime
            );

            // Periksa apakah email ada dalam database dan memiliki peran admin
            $this->load->model('sispar_model');
            $cek = $this->sispar_model->cek_login_admin($data['email']);

            if ($cek && $cek->role == 1) { // Admin
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('foto', $cek->foto);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('nama', $cek->nama);
                redirect('admin/dashboard/index_google');

            }elseif ($cek && $cek->role == 2) { // kepala desa
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('foto', $cek->foto);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('nama', $cek->nama);
                redirect('pimpinan/dashboard');
                
            } else {
                // Handle error when user is not an admin
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda tidak memiliki izin untuk mengakses halaman admin!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            }
        } else {
            // Handle error when unable to fetch access token
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal mendapatkan token akses dari Google!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }
    }

    $login_button = '';
    if (!$this->session->userdata('access_token')) {
        $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img width="50px" src="https://w7.pngwing.com/pngs/168/533/png-transparent-google-logo-google-logo-google-home-google-now-google-plus-company-text-trademark-thumbnail.png" /></a>';
        $data['login_button'] = $login_button;

        $this->load->view('templates/Auth/auth_header');
        $this->load->view('Auth/auth', $data);
        $this->load->view('templates/Auth/auth_footer');
    } else {
        // Redirect to admin dashboard after successful Google login
        // Set user data to session before redirecting to Admin/Dashboard/index
        $this->session->set_userdata('user_data', $user_data);
        redirect('Admin/Dashboard/index_google');
    }
}



    public function logout_google()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        redirect('auth/login');
    }



    public function ganti_pass()
    {
        $this->sispar_model->admin_login();
        $data['judul'] = "Ganti Password";


        $this->load->view('templates/Admin/header', $data);

        $this->load->view('admin/Ganti_password');
        
        $this->load->view('templates/Admin/footer');
    }

    public function ganti_password_aksi()
    {
    // Memanggil fungsi admin_login() dari model sispar_model()
    $this->sispar_model->admin_login();

    // Mengambil nilai password lama, password baru, dan ulangi password dari input
    $pass_lama = $this->input->post('pass_lama');
    $pass_baru = $this->input->post('pass_baru');
    $ulang_pass = $this->input->post('ulang_pass');

    // Mendapatkan ID pengguna yang sedang login
    $id_user = $this->session->userdata('id_user');

    // Mengambil password lama dari database berdasarkan ID pengguna
    $password_lama = $this->sispar_model->get_password($id_user);

    // Memeriksa apakah password lama yang diinput sesuai dengan yang ada di database
    if (md5($pass_lama) !== $password_lama) {
        // Jika password lama tidak sesuai, tampilkan pesan error
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Password lama yang anda masukkan salah!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');

        // Mengarahkan pengguna kembali ke halaman ganti_password
        redirect('auth/ganti_pass');
    }

    // Mengatur aturan validasi form
    $this->form_validation->set_rules('pass_baru', 'Password baru', 'required');
    $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required|matches[pass_baru]');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi form gagal, tampilkan halaman ganti_password
        $this->load->view('template_admin/header');
        $this->load->view('admin/Ganti_password');
        $this->load->view('template_admin/footer');
    } else {
        // Jika validasi form berhasil
        $data = array('password' => md5($pass_baru));
        $id_user = array('id_user' => $id_user);

        // Memanggil fungsi update_password() dari model sispar_model()
        $this->sispar_model->update_password($id_user, $data, 'tb_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Password Berhasil Diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        // Mengarahkan pengguna ke halaman ganti_password
        redirect('auth/ganti_pass');
    }
}

    function forgot() {
            $this->load->view('templates/Auth/auth_header');
            $this->load->view('Auth/forgot');
            $this->load->view('templates/Auth/auth_footer');
    }

    private function generate_random_code($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
    public function send_verification_code() {
        require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
        $response = false;
        $mail = new PHPMailer();
     

   // SMTP configuration
   $mail->isSMTP();
   $mail->Host     = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'tugus890@gmail.com'; // user email anda
   $mail->Password = 'clbkrtnplykcrqwl'; // diisi dengan App Password yang sudah di generate
   $mail->SMTPSecure = 'ssl';
   $mail->Port     = 465;

   $mail->setFrom('tugus890@gmail.com'); // user email anda
   $mail->addReplyTo('tugus890@gmail.com', ''); //user email anda

   // Email subject
   $mail->Subject = 'Kode Verifikasi Akun | Website Desa Gunaksa'; //subject email


   //mengecek apakah email ada di database atau tidak 
   $email = $this->input->post('email');
   $email_ada = $this->sispar_model->email_ada($email);
    if ($email_ada) {
        $mail->addAddress($email); //email tujuan pengiriman email
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Email Yang Diinput Tidak Terdaftar !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('Auth/forgot','refresh');  
    }

    $code = $this->generate_random_code();
    $this->load->model('auth_model');
    $this->auth_model->save_verification_code($email,$code);

    //get nama dari email
    $nama =  $this->sispar_model->get_email($email);


   // Add a recipient
   $mail->addAddress($email); //email tujuan pengiriman email

   // Set email format to HTML
   $mail->isHTML(true);

   //untuk tau tahun sekarang dipake di copyright di html dibawah untuk dikirim ke email
   $year = date('Y');

   // Email body content
  // Set isi pesan email dengan CSS
$mailContent = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #333;
        }
        
        p {
            color: #555;
            margin: 5px 0;
            /* Menambahkan margin agar lebih rapi */
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
        
        .logo {
            text-align: center;
            /* Tambahkan properti ini untuk mengatur logo dan judul di tengah */
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <p><img src="https://1.bp.blogspot.com/-sLNj8IAIC_A/TV4iiY1o4vI/AAAAAAAAAAw/4SVNkn8F9RU/w1200-h630-p-k-no-nu/157959_113377242063147_895904_n.jpg" width="150" alt="Descriptive Text" /></p>
            <!-- Ganti path/to/your/logo.png dengan path logo Anda -->

        </div>
        <br>
        <h3>Kode Verifikasi Forgot Password!</h3>
        <p>Dear <b>'.$nama.'</b>,</p>
        <p>Berikut adalah kode forgot password anda : </p><br>
        <p>Kode Verifikasi: <b>'.$code.'</b>
        </p><br>
        <p>Terima kasih, </p><br>
        <b><p>Hormat Kami</p>
        <p>Admin Desa Gunaksa</p></b>
    </div>
    <div class="footer">
        &copy; '.$year.' Desa Gunaksa. All rights reserved.
    </div>
</body>

</html>
';


   $mail->Body = $mailContent;

   // Send email
   if(!$mail->send()){
    // If sending fails, show an error message
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Password Gagal di Reset !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('Auth/forgot','refresh');
} else {
    // If sending is successful, show a success message
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Kode Berhasil Dikirim!! Silahkan Cek Email Anda 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    $this->session->set_userdata('verification_email', $email);

    redirect('Auth/kode_email');
}
}
    
    function kode_email(){
        $email = $this->session->userdata('verification_email');
    
        // Check if email is present
        if (!$email) {
            // Handle the case where email is not present in session
            echo 'Email tidak ditemukan';
            return;
        }
    
        $this->load->view('templates/Auth/auth_header');
        $this->load->view('Auth/kode_email', ['email' => $email]);
        $this->load->view('templates/Auth/auth_footer');
    }
    

    // controllers/Auth.php
public function reset_password() {
    $email = $this->input->post('email');
    $verification_code = $this->input->post('verification_code');
    $new_password = $this->input->post('new_password');

    // Check if verification code is valid
    $this->load->model('auth_model');
    if ($this->auth_model->check_verification_code($email, $verification_code)) {
        // Update user's password
        $this->auth_model->update_password('tb_user',$new_password,$verification_code);
        $this->auth_model->set_null_kode('tb_user', $verification_code); // Use verification_code as the second parameter

    
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Password Berhasil Di Reset! Silahkan Kembali Ke Halaman Login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>');

    redirect('Auth/forgot','refresh');   
} else {
        // Show error message
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Password Gagal di Reset Eror!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('Auth/forgot','refresh');   

    }
}

}

/* End of file Auth.php */
