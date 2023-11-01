<?php 

	class Paket_wisata extends CI_Controller{


		public function index(){
			$this->sispar_model->admin_login();
			//mengeluarkan semua data tugus
			$data['paket'] = $this->sispar_model->get_data('tb_paket_wisata')->result();

			//pagination tugus :)
			// $config['base_url'] = base_url('admin/data_user/index'); // Perbaiki base_url
			// $config["total_rows"] = $this->pagination_model->get_count_all('tb_user');
			// $config["per_page"] = 5;
			// $config["uri_segment"] = 4;
			
			// $this->pagination->initialize($config);
			// $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			// $data["links"] = $this->pagination->create_links();
			// $data['user'] = $this->pagination_model->get_projects('tb_user',$config["per_page"], $page);   

			$data['judul'] = "Table Paket Wisata";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('admin/paket_wisata', $data);
			$this->load->view('templates/admin/footer');
		}


		public function tambah_paket_aksi()
		{
			$this->sispar_model->admin_login();
			$this->_rules2();
		
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Paket Wisata Gagal Ditambah
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('admin/paket_wisata');
			} else {
				$nama_paket = $this->input->post('nama_paket');
				$harga = $this->input->post('harga');
				$nama_pemilik = $this->input->post('nama_pemilik');
				$alamat = $this->input->post('alamat');
				$no_tlp = $this->input->post('no_tlp');
				$no_wa = $this->input->post('no_wa');
				$diskon = $this->input->post('diskon');
				$kesediaan = $this->input->post('kesediaan');
				$keterangan = $this->input->post('keterangan');
				$foto = $_FILES['foto']['name'];

		
				// File Upload Configuration
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
				$config['max_size'] = '2048';
		
				$this->load->library('upload', $config);
		
				if (!$this->upload->do_upload('foto')) {
					$error = $this->upload->display_errors();
					echo "Foto Paket Wisata gagal diunggah! Error: " . $error;
				} else {
					$foto = $this->upload->data('file_name');
					$data = array(
						'nama_paket' => $nama_paket,
						'foto' => $foto,
						'harga' => $harga,
						'nama_pemilik' => $nama_pemilik,
						'alamat' => $alamat,
						'no_tlp' => $no_tlp,
						'keterangan' => $keterangan,
						'diskon' => $diskon,
						'kesediaan' => $kesediaan,
						'no_wa' => $no_wa,


					);
		
					$this->sispar_model->insert_data($data, 'tb_paket_wisata');
		
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Tempat Wisata Berhasil Ditambah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
		
					redirect('admin/paket_wisata');
				}
			}
		}
		
		

		public function update_user($id_user){
			$this->sispar_model->admin_login();
			$where = array('id_user' => $id_user);
			$data['user'] = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id_user'")->result();

			$this->load->view('templates/admin/header');
			$this->load->view('templates/admin/sidebar');
			$this->load->view('admin/form_update_user',$data);
			$this->load->view('templates/admin/footer');

		}

	public function update_paket_aksi()
	{
    $this->sispar_model->admin_login();
    $this->_rules2();
    if ($this->form_validation->run() == FALSE) {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Wisata Gagal Diupdate
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/paket_wisata');
        // $this->update_produk($this->input->post('id_produk'));
    } else {
		$id_paket_wisata = $this->input->post('id_paket_wisata');
		$nama_paket = $this->input->post('nama_paket');
		$harga = $this->input->post('harga');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
		$no_tlp = $this->input->post('no_tlp');
		$no_wa = $this->input->post('no_wa');
		$diskon = $this->input->post('diskon');
		$kesediaan = $this->input->post('kesediaan');
		$keterangan = $this->input->post('keterangan');
        $foto = $_FILES['foto']['name'];

        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
		$config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!empty($foto)) {
            if (!$this->upload->do_upload('foto')) {
                echo "Foto produk pertama gagal diunggah!";
            } else {
                $foto = $this->upload->data('file_name');
				$this->db->set('foto', $foto);
				
				
				
            }
        }


        $data = array(
			'nama_paket' => $nama_paket,
			'foto' => $foto,
			'harga' => $harga,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
			'no_tlp' => $no_tlp,
			'keterangan' => $keterangan,
			'diskon' => $diskon,
			'kesediaan' => $kesediaan,
			'no_wa' => $no_wa,
            
        );


        if (!empty($foto)) {
            $data['foto'] = $foto;
        }

        

        $where = array(
            'id_paket_wisata' => $this->input->post('id_paket_wisata')
        );

        $this->sispar_model->update_data('tb_paket_wisata', $data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Wisata Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/paket_wisata');
	}
}

		public function delete_wisata($id_tempat_wisata){
			$this->sispar_model->admin_login();
			$where = array('id_tempat_wisata' => $id_tempat_wisata);
			$this->sispar_model->delete_data($where, 'tb_tempat_wisata');

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data User Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
			redirect('admin/paket_wisata');
		}

		public function _rules(){
			$this->form_validation->set_rules('nama',"Nama",'required');
			$this->form_validation->set_rules('email',"Email",'required');
			$this->form_validation->set_rules('role',"Role",'required');
			$this->form_validation->set_rules('password','Password','required');
		}
		public function _rules2(){
			$this->form_validation->set_rules('nama_paket',"Nama Paket Wisata",'required');
			$this->form_validation->set_rules('harga',"harga",'required');
			$this->form_validation->set_rules('nama_pemilik',"nama pemilik",'required');
			$this->form_validation->set_rules('keterangan',"keterangan",'required');
			$this->form_validation->set_rules('alamat',"alamat",'required');
			$this->form_validation->set_rules('no_tlp',"no tlp",'required');
			$this->form_validation->set_rules('no_wa',"no wa",'required');
			$this->form_validation->set_rules('kesediaan',"Kesediaan",'required');
		
			
		}
	}
	
 ?>