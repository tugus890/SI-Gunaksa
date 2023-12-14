<?php 

	class Data_user extends CI_Controller{


		public function index(){
			$this->sispar_model->admin_login();
			//mengeluarkan semua data tugus
			$data['user'] = $this->sispar_model->get_data('tb_user')->result();

			//pagination tugus :)
			// $config['base_url'] = base_url('admin/data_user/index'); // Perbaiki base_url
			// $config["total_rows"] = $this->pagination_model->get_count_all('tb_user');
			// $config["per_page"] = 5;
			// $config["uri_segment"] = 4;
			
			// $this->pagination->initialize($config);
			// $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			// $data["links"] = $this->pagination->create_links();
			// $data['user'] = $this->pagination_model->get_projects('tb_user',$config["per_page"], $page);   

			$data['judul'] = "Table User";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('admin/Data_user', $data);
			$this->load->view('templates/admin/footer');
		}

		public function tambah_user(){
			$this->sispar_model->admin_login();
			$this->load->view('templates/admin/header');
			$this->load->view('templates/admin/sidebar');
			$this->load->view('admin/form_tambah_user');
			$this->load->view('templates/admin/footer');
		}

		public function tambah_user_aksi(){
			$this->sispar_model->admin_login();
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data User Gagal Diupdate
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		  redirect('admin/data_user');
			}else{
				$nama			= $this->input->post('nama');
				$email			= $this->input->post('email');
				$role			= $this->input->post('role');
				$password		= md5($this->input->post('password'));
				$foto 			= $_FILES['foto']['name'];

		
				// File Upload Configuration
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
				$config['max_size'] = '2048';
		
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					// $error = $this->upload->display_errors();
					// echo "Foto Paket Wisata gagal diunggah! Error: " . $error;
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Foto Paket Wisata gagal diunggah! Error
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				} else {
					$foto = $this->upload->data('file_name');
				$data = array(
					'nama'      	=> $nama,
					'email'			=> $email,
					'role'			=> $role,
					'password'		=> $password,
					'foto'     => $foto

				);
			}

				$this->sispar_model->insert_data($data, 'tb_user');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data User Berhasil Ditambah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('admin/data_user');

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

		public function update_user_aksi() {
			$this->sispar_model->admin_login();
			$this->_rules2();
		
			// Check if form validation fails
			if ($this->form_validation->run() == FALSE) {
				// Set flashdata for error message
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Form validation failed
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				// Redirect to the appropriate page
				redirect('admin/data_user');
			} else {
				// Form validation passed
		
				$id_user  = $this->input->post('id_user');
				$nama     = $this->input->post('nama');
				$role     = $this->input->post('role');
				$password		= md5($this->input->post('password'));

				// Use a stronger hashing algorithm for password
				$foto     = $_FILES['foto']['name'];
		
				$config['upload_path']   = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']      = 2048;
		
				$this->load->library('upload', $config);
		
				if (!empty($foto)) {
					// Upload the file
					if (!$this->upload->do_upload('foto')) {
						// Set flashdata for error message on file upload failure
						// $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						// 	File upload failed: ' . $this->upload->display_errors() . '
						// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						// 		<span aria-hidden="true">&times;</span>
						// 	</button>
						// </div>');
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							File upload failed
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
						// Redirect to the appropriate page
						redirect('admin/data_users');
					} else {
						// File upload successful
						$foto = $this->upload->data('file_name');
					}
				}
		
				$data = array(
					'nama'     => $nama,
					'role'     => $role,
					'password' => $password,
					'foto'     => $foto
				);
		
				$where = array(
					'id_user' => $id_user
				);
		
				// Update data in the database
				$this->sispar_model->update_data('tb_user', $data, $where);
		
				// Set flashdata for success message
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data User Berhasil Diupdate
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				// Redirect to the appropriate page
				redirect('admin/data_user');
			}
		}
		
		public function delete_user($id_user){
			$this->sispar_model->admin_login();
			$where = array('id_user' => $id_user);
			$this->sispar_model->delete_data($where, 'tb_user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data User Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
			redirect('admin/data_user');
		}

		public function _rules(){
			$this->form_validation->set_rules('nama',"Nama",'required');
			$this->form_validation->set_rules('email',"Email",'required');
			$this->form_validation->set_rules('role',"Role",'required');
			$this->form_validation->set_rules('password','Password','required');
			// $this->form_validation->set_rules('foto','Foto','required');
		}
		public function _rules2(){
			$this->form_validation->set_rules('nama',"Nama",'required');
		
			
		}
	}
	
 ?>