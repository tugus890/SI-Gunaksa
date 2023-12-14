<?php
	
	class Dashboard extends CI_Controller{

		

		public function index(){
			$this->sispar_model->pimpinan_login();

			$data['objek'] = $this->db->query("SELECT COUNT(id_objek_wisata) as total_objek FROM tb_objek_wisata")->result();
			$data['paket'] = $this->db->query("SELECT COUNT(id_paket_wisata) as total_paket_wisata FROM tb_paket_wisata")->result();
			$data['review'] = $this->db->query("SELECT COUNT(idtb_review) as total_review FROM tb_review")->result();

			// yg dibawah user_data google
			
			$data['judul'] = "Dashboard Pimpinan";
			$this->load->view('templates/pimpinan/header', $data);
			$this->load->view('pimpinan/Dashboard');
			$this->load->view('templates/pimpinan/footer');

		} 
		public function index_google(){
			$this->sispar_model->pimpinan_login_google();

			$data['objek'] = $this->db->query("SELECT COUNT(id_objek_wisata) as total_objek FROM tb_objek_wisata")->result();
			$data['paket'] = $this->db->query("SELECT COUNT(id_paket_wisata) as total_paket_wisata FROM tb_paket_wisata")->result();
			$data['review'] = $this->db->query("SELECT COUNT(idtb_review) as total_review FROM tb_review")->result();

			// yg dibawah user_data google
			$user_data = $this->session->userdata('user_data');
			$data['user_data'] = $user_data;
			$data['judul'] = "Dashboard Pimpinan";
			$this->load->view('templates/pimpinan/header', $data);
			$this->load->view('pimpinan/Dashboard');
			$this->load->view('templates/pimpinan/footer');

		} 
		public function test(){
			
			$data['judul'] = "Dashboard Pimpinan";
			$this->load->view('pimpinan/test');

		} 
		public function getChartData() {
			// Query untuk mendapatkan data
			$this->load->model('Chart_model');
			
			$data = $this->Chart_model->getData();
	
	
			// Mengirim data dalam format JSON
			echo json_encode($data);
		}
		
	}
?>