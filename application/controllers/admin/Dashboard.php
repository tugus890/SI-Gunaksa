<?php
	
	class Dashboard extends CI_Controller{

		public function index(){
			$this->sewa_model->admin_login();
			$data['judul'] = "Dashboard Admin";
			$this->load->view('template_admin/header',$data);

			$this->load->view('admin/Dashboard');
			
			$this->load->view('template_admin/footer');
			
		}
	}
?>