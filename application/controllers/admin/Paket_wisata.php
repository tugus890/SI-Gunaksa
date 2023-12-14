<?php 

	class Paket_wisata extends CI_Controller{


		public function index(){
			$this->sispar_model->admin_login();
			//mengeluarkan semua data tugus
			$data['paket'] = $this->db->query("SELECT *,alamat,no_tlp FROM tb_paket_wisata LEFT JOIN tb_kontak ON tb_paket_wisata.id_kontak = tb_kontak.id_kontak;")->result();
			$data['kontak'] = $this->db->query("SELECT * FROM tb_kontak")->result();

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
				$id_kontak = $this->input->post('kontak');
				$diskon = $this->input->post('diskon');
				$kesediaan = $this->input->post('kesediaan');
				$keterangan = $this->input->post('keterangan');
				$foto = $_FILES['foto']['name'];
				$id_user = $this->session->userdata('id_user');

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
						'keterangan' => $keterangan,
						'diskon' => $diskon,
						'kesediaan' => $kesediaan,
						'id_kontak' => $id_kontak,
						'id_user' => $id_user
						

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
		$id_kontak = $this->input->post('kontak');

		if ($id_kontak == null) {
			// If $id_kontak is null, fetch it from the database
			$result = $this->db->query("SELECT id_kontak FROM tb_paket_wisata WHERE id_paket_wisata = '$id_paket_wisata'")->row();
			
			// Check if the result is not empty
			if ($result) {
				$id_kontak = $result->id_kontak;
			
		}
	}

// Now $id_kontak contains the correct value either from the post or the database


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
			
			'keterangan' => $keterangan,
			'diskon' => $diskon,
			'kesediaan' => $kesediaan,
			'id_kontak' => $id_kontak
            
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
			
			$this->form_validation->set_rules('kesediaan',"Kesediaan",'required');
		
			
		}
	}
	
 ?>