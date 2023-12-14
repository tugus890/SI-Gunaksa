<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Objek extends CI_Controller {

    public function index()
    {
        $data['cari']  = $this->db->query("SELECT  id_kategori ,isi from kategori group by id_kategori ")->result();
        $data['objek'] = $this->db->query("SELECT id_objek_wisata, tb_objek_wisata.foto,nama_wisata,maps,link_maps,isi FROM tb_objek_wisata INNER JOIN tb_user on tb_objek_wisata.id_user = tb_user.id_user inner join kategori on tb_objek_wisata.id_kategori = kategori.id_kategori ")->result();
        $data['judul'] = "Objek Wisata";
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Objek',$data);
        $this->load->view('templates/LandingPage/footer');
        
    }
    function detail_objek($id_objek_wisata)  {
        $data['detail'] = $this->db->query("SELECT id_objek_wisata, tb_objek_wisata.foto,nama_wisata,maps,link_maps,isi,keterangan FROM tb_objek_wisata INNER JOIN tb_user on tb_objek_wisata.id_user = tb_user.id_user inner join kategori on tb_objek_wisata.id_kategori = kategori.id_kategori where id_objek_wisata = '$id_objek_wisata' ")->result();
        $data['total_komen'] = $this->db->query("SELECT COUNT(*) as total_acc_reviews
        FROM tb_review WHERE acc = 'y' AND id_objek_wisata = '$id_objek_wisata'; ")->result();

         $data['komen'] = $this->db->query("SELECT * FROM tb_review WHERE acc = 'y' AND id_objek_wisata = '$id_objek_wisata'; ")->result();


        $data['judul'] = " Detail Objek Wisata";
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/detail_Objek',$data);
        $this->load->view('templates/LandingPage/footer');
        
    }

    function cari_kategori() {
        $this->_cari();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Gagal Kembali
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Guest/objek');  // Ubah sesuai kebutuhan
        } else {
        $id_kategori = $this->input->post('kategori');
        if ($id_kategori == 'all') {
            $data['objek']= $this->sispar_model->cari_objek_all($id_kategori);

            $kategori = new stdClass();
            $kategori->isi = 'ALL';
            
            $data['kategori'] = [$kategori];

        }else {
        $data['objek']= $this->sispar_model->cari_objek($id_kategori);
        $data['kategori']  = $this->db->query("SELECT  id_kategori ,isi from kategori where id_kategori = '$id_kategori' group by id_kategori ")->result();

        }
        
        $data['cari']  = $this->db->query("SELECT  id_kategori ,isi from kategori group by id_kategori ")->result();
        

        $data['judul'] = "Objek Wisata";
        $this->load->view('templates/LandingPage/header');
        $this->load->view('Guest/Objek_cari_kategori',$data);
        $this->load->view('templates/LandingPage/footer');
                
}
}

    public function insert_review()
{
    $this->_rules2();

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Review Gagal Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Guest/objek');  // Ubah sesuai kebutuhan
    } else {
        $nama = $this->input->post('nama');
        $id_objek_wisata = $this->input->post('id_objek_wisata');
        $rate = $this->input->post('rate');
        $isi = $this->input->post('isi');

        $data = array(
            'nama' => $nama,
            'id_objek_wisata' => $id_objek_wisata,
            'rating' => $rate,
            'isi' => $isi,
            'tanggal' => date('Y-m-d'),  // Gunakan fungsi date untuk mendapatkan tanggal sekarang
        );

        $this->sispar_model->insert_data($data, 'tb_review');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Review Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('Guest/objek/detail_objek/'.$id_objek_wisata);  // Ubah sesuai kebutuhan
    }
}





public function _rules2(){
    $this->form_validation->set_rules('nama',"Nama Anda",'required');

    
}

public function _cari(){
    $this->form_validation->set_rules('kategori',"Kategori",'required');

    
}
}

/* End of file Objek.php */

?>
