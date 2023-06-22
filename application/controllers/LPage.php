<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LPage extends CI_Controller
{

    public function index()
    {
        $data['judul'] = "Welcomes";
        $this->load->view('LPage/index', $data);
    }
}

/* End of file Controller_LPage.php */
