<?php
	
	class Setting extends CI_Controller{

		public function index(){
			$this->sispar_model->admin_login();
			// $data['user'] = $this->session->userdata('email','password');
            
			$data['judul'] = "Profile Admin";
			$this->load->view('templates/Admin/header', $data);

			$this->load->view('admin/Setting');
			
			$this->load->view('templates/Admin/footer');
			
		}

        public function update_setting_aksi(){
			$this->sispar_model->admin_login();
			$this->_rules();

				// 'required|valid_email'

			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Profil Gagal Diupdate
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');

				redirect('admin/setting','refresh');
				
			}else{
				$id_user 		= $this->session->userdata('id_user');
				$nama			= $this->input->post('nama');
				$email			= $this->input->post('email');
			

				$data = array(
					'nama'      	=> $nama,
					'email'			=> $email
		
				);
				$this->session->set_userdata('nama', $nama);
				$this->session->set_userdata('email', $email);


				$where = array(
					'id_user' => $id_user
				);

				$this->sispar_model->update_data('tb_user',$data,$where);

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Profil Berhasil Diupdate
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/setting');

			}
		}
		public function _rules(){
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
		}
	}
?>