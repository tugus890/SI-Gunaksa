<?php
	
	class Dashboard extends CI_Controller{

		public function index(){
			
			$data['judul'] = "Dashboard Admin";
			$this->load->view('templates/Admin/header',$data);

			$this->load->view('admin/Dashboard');
			
			$this->load->view('templates/Admin/footer');
			
		}
	}
?>