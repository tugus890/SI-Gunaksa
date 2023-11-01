<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Objek extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Objek');
        $this->load->view('templates/LandingPage/footer');
        
    }

}

/* End of file Objek.php */

?>