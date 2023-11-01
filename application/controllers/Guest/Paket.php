<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Paket');
        $this->load->view('templates/LandingPage/footer');
        
    }

}

/* End of file Paket.php */

?>