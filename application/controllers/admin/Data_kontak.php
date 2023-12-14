<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kontak extends CI_Controller {

    public function index()
    {
        $data['kontak'] = $this->db->query("SELECT * FROM tb_kontak")->result();

        $data['judul'] = "Table Data Kontak";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('admin/Data_kontak', $data);
			$this->load->view('templates/admin/footer');
    }
    public function tambah_kontak_aksi()
		{
			$this->sispar_model->admin_login();
			$this->_rules2();
		
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data kontak Wisata Gagal Ditambah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('admin/kontak_wisata');
			} else {
				$alamat = $this->input->post('alamat');
				$no_tlp = $this->input->post('no_tlp');
				$ig = $this->input->post('ig');
				$twitter = $this->input->post('twitter');
				$fb = $this->input->post('fb');
				$tiktok = $this->input->post('tiktok');
				$yt = $this->input->post('yt');
				$link = $this->input->post('link');
				
                $data = array(
						'alamat' => $alamat,
						'no_tlp' => $no_tlp,
						'ig' => $ig,
						'twitter' => $twitter,
					
						'fb' => $fb,
						'tiktok' => $tiktok,
						'yt' => $yt,
						'link' => $link,


					);
		
					$this->sispar_model->insert_data($data, 'tb_kontak');
		
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data kontak Berhasil Ditambah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
		
					redirect('admin/data_kontak');
				}
			}


    public function update_kontak_aksi()
	{
    $this->sispar_model->admin_login();
    $this->_rules2();
    if ($this->form_validation->run() == FALSE) {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Kontak Gagal Diupdate
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/Data_kontak');
        // $this->update_produk($this->input->post('id_produk'));
    } else {
		$id_kontak = $this->input->post('id_kontak');
		$alamat = $this->input->post('alamat');
				$no_tlp = $this->input->post('no_tlp');
				$ig = $this->input->post('ig');
				$twitter = $this->input->post('twitter');
				$fb = $this->input->post('fb');
				$tiktok = $this->input->post('tiktok');
				$yt = $this->input->post('yt');
				$link = $this->input->post('link');

        


                $data = array(
                    'alamat' => $alamat,
                    'no_tlp' => $no_tlp,
                    'ig' => $ig,
                    'twitter' => $twitter,
                
                    'fb' => $fb,
                    'tiktok' => $tiktok,
                    'yt' => $yt,
                    'link' => $link,

            
        );


        
        

        $where = array(
            'id_kontak' => $this->input->post('id_kontak')
        );

        $this->sispar_model->update_data('tb_kontak', $data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kontak Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/Data_kontak');
	}
}

public function delete_kontak($id_kontak){
	$this->sispar_model->admin_login();
	$where = array('id_kontak' => $id_kontak);
	$this->sispar_model->delete_data($where, 'tb_kontak');

	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	Data Kontak Berhasil Dihapus
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>');
	redirect('admin/data_kontak');
}
    function _rules2()  {
        $this->form_validation->set_rules('alamat',"alamat",'required');
        $this->form_validation->set_rules('no_tlp',"no tlp",'required');
    }
		

}
		
    



/* End of file Data_kontak.php */
 ?>