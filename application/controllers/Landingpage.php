<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/LandingPage/header');
        $this->load->view('index');
        $this->load->view('templates/LandingPage/footer');
        
    }

}

/* End of file Landingpage.php */




?>