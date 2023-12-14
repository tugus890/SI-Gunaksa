<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    public function index()
    {
        $data['review']  = $this->db->query("SELECT * from tb_review where acc = 'y' limit 6 ")->result();
        $data['objek'] = $this->sispar_model->get_objek_wisata_lp('tb_objek_wisata',6);
        $data['paket'] = $this->db->query("SELECT * from tb_paket_wisata  limit 3 ")->result();

        $this->load->view('templates/LandingPage/header');
        $this->load->view('index',$data);
        $this->load->view('templates/LandingPage/footer');
        
    }

}

/* End of file Landingpage.php */




?>