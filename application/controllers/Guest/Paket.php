<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function index()
    {
        //pagination tugus :)
        $config['base_url'] = base_url('guest/paket/index');
        $config["total_rows"] = $this->db->count_all('tb_paket_wisata');
        $config["per_page"] = 2;
        $config["uri_segment"] = 4; // Adjusted to 3
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['paket'] = $this->Pagination->get_projects('tb_paket_wisata', $config["per_page"], $page);
        



		// $data['paket'] = $this->sispar_model->get_data('tb_paket_wisata')->result();
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Paket',$data);
        $this->load->view('templates/LandingPage/footer');
        
    }

    public function list($id_paket_wisata)
    {
        $data['paket'] = $this->db->query("SELECT * FROM tb_paket_wisata LEFT JOIN tb_kontak ON tb_kontak.id_kontak = tb_paket_wisata.id_kontak where id_paket_wisata = '$id_paket_wisata'")->result();
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Detail_Paket_wisata',$data);
        $this->load->view('templates/LandingPage/footer');
            
    }

  

}

/* End of file Paket.php */

?>