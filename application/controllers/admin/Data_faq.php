<?php 

	class Data_faq extends CI_Controller{


		public function index(){
			$this->sewa_model->admin_login();
			$data['faq'] = $this->sewa_model->get_data('tb_faq')->result();

			$this->load->view('template_admin/header');
			$this->load->view('admin/Data_faq',$data);
			$this->load->view('template_admin/footer');
		}

		public function tambah_faq(){
			$this->sewa_model->admin_login();
			$this->load->view('template_admin/header');
			$this->load->view('admin/form_tambah_faq');
			$this->load->view('template_admin/footer');
		}

		public function tambah_faq_aksi(){
			$this->sewa_model->admin_login();
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->tambah_faq();
			}else{
				$pertanyaan			= $this->input->post('pertanyaan');
				$jawaban			= $this->input->post('jawaban');
				
				$data = array(
					'pertanyaan'      	=> $pertanyaan,
					'jawaban'			=> $jawaban,
					
				);

				$this->sewa_model->insert_data($data, 'tb_faq');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data faq Berhasil Ditambahkan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/data_faq');

			}
		}

		public function update_faq($id_faq){
			$this->sewa_model->admin_login();
			$where = array('id_faq' => $id_faq);
			$data['faq'] = $this->db->query("SELECT * FROM tb_faq WHERE id_faq = '$id_faq'")->result();

			$this->load->view('template_admin/header');
			$this->load->view('admin/form_update_faq',$data);
			$this->load->view('template_admin/footer');

		}

		public function update_faq_aksi(){
			$this->sewa_model->admin_login();
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->update_faq($this->input->post('id_faq'));
			}else{
				$id_faq 		= $this->input->post('id_faq');
				$pertanyaan			= $this->input->post('pertanyaan');
				$jawaban			= $this->input->post('jawaban');
			

				$data = array(
					'pertanyaan'      	=> $pertanyaan,
					'jawaban'			=> $jawaban,
		
				);

				$where = array(
					'id_faq' => $id_faq
				);

				$this->sewa_model->update_data('tb_faq',$data,$where);

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data faq Berhasil Diupdate
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/data_faq');

			}
		}

		public function delete_faq($id_faq){
			$this->sewa_model->admin_login();
			$where = array('id_faq' => $id_faq);
			$this->sewa_model->delete_data($where, 'tb_faq');


			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data faq Berhasil Dihapus
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_faq');
		}

		public function _rules(){
			$this->form_validation->set_rules('pertanyaan',"Pertanyaan",'required');
			$this->form_validation->set_rules('jawaban',"Jawaban",'required');
			
		}
		
	}
	
 ?>