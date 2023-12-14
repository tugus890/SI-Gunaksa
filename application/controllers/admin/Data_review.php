<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_review extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sispar_model');
        
        $this->Sispar_model->admin_login();
    }
    

    public function index()
    {
        $data['review'] = $this->db->query("SELECT * FROM tb_review order by idtb_review desc")->result();

        $data['judul'] = "Table Data Review";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('admin/Data_review', $data);
			$this->load->view('templates/admin/footer');
    }

    function disetujui_review($idtb_review) 
    {
        $acc = 'y';
        $data = array(
            'acc' => $acc,
        );
    
        $where = array(
            'idtb_review' => $idtb_review,
        );
    
        $this->sispar_model->approved_model_transaksi( $data, $where);
    
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Disetujui
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        redirect('admin/Data_review');		
    }

    function ditolak_review($idtb_review) 
    {
        $acc = 't';
        $data = array(
            'acc' => $acc,
        );
    
        $where = array(
            'idtb_review' => $idtb_review,
        );
    
        $this->sispar_model->approved_model_transaksi( $data, $where);
    
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Ditolak
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        redirect('admin/Data_review');		
    }
}

/* End of file Data_review.php */
 ?>