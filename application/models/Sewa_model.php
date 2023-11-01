<?php

	class Sewa_model extends CI_Model{
		public function get_data($table){
			return $this->db->get($table);
		}

		public function get_where($where, $table){
			return $this->db->get_where($table, $where);
		}

		public function insert_data($data, $table){
			$this->db->insert($table, $data);
		}

		public function update_data($table, $data, $where){
			$this->db->update($table, $data, $where);
		}		

		public function delete_data($where, $table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function ambil_id_mobil($id){
			$hasil = $this->db->where('id_',$id)->get('mobil');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			}else{
				return false;
			}
		}


		public function insert_sewa($data,$where)
		{
			$this->db->set($data);
			
			$this->db->from('tb_sewa');
			$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
	
			
			$this->db->where($where);
			
			$insert = $insert;
			return $insert;
		}

		public function approved_model($data,$where)
		{
			$this->db->set($data);
			
			$this->db->from('tb_sewa');
			$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
			$this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
			$this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk', 'inner');
			
			$this->db->where($where);
			
			$approved =$this->db->update('tb_sewa');
			return $approved;
		}

		public function getProdukStats() {
			$this->db->select('tb_produk.nama_produk, COUNT(tb_produk.nama_produk) as banyak_disewa, CONCAT("Rp", FORMAT(SUM(tb_transaksi.nominal), 3)) as nominal_per_produk');
			$this->db->from('tb_transaksi');
			$this->db->join('tb_sewa', 'tb_transaksi.id_sewa = tb_sewa.id_sewa');
			$this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa');
			$this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk');
			$this->db->group_by('tb_produk.nama_produk');
			$this->db->where('is_valid = 1');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		


		public function deny_model($data,$where)
		{
			$this->db->set($data);
			
			$this->db->from('tb_sewa');
			$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
			$this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
			$this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk', 'inner');
			
			$this->db->where($where);
			
			$deny =$this->db->update('tb_sewa');
			return $deny;
		}
 
		function changeActiveState($key)
		{
		$this->load->database();
		$data = array(
		'active' => 1
		);
 
		$this->db->where('md5(id)', $key);
		$this->db->update('login', $data);
 
		return true;
		}
		

		public function cek_login(){
			$email = set_value('email');
			$password = set_value('password');
		
			// Validasi password tidak boleh kosong
			if(empty($password)){
				return FALSE;
			}
		
			$result = $this->db
							->where('email', $email)
							->where('password', md5($password))
							->limit(1)
							->get('tb_user');
		
			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return FALSE;
			}
		}

		public function update_password($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table,$data);
		
		}

		public function downloadPembayaran($id){
			$query = $this->db->get_where('transaksi',array('id_rental' => $id));
			return $query->row_array();
		}

		public function total_data(){
			$this->db->select('count(nama_produk) as total_produk');
			$this->db->from('tb_produk');
			
			$query = $this->db->get();
			
			return $query->result();
		
		}


		public function total_data_admin(){
			$tb_user			= $this->db->get_where('tb_user', array('role' => '2'))->num_rows();
			$transaksi			= $this->db->count_all_results('transaksi');
			$transaksi_selesai	= $this->db->get_where('transaksi', array('status_rental' => 'Selesai'))->num_rows();
			$mobil 				= $this->db->count_all_results('mobil');
			$this->db->select_sum('harga');
			$this->db->from('transaksi');
			$this->db->where('status_pembayaran', 1);
			$query = $this->db->get();
			$result = $query->row();
			$sum_harga = number_format($result->harga, 0, '.', '.');
			
			$data = array(

				'total_customer' => $customer,
				'total_transaksi'	=> $transaksi,
				'total_transaksi_selesai' => $transaksi_selesai,
				'total_harga'	=>$sum_harga
			);	

			return $data;
		}

		public function pimpinan(){
			if (!empty($this->session->userdata('role_id'))) {
				if ($this->session->userdata('role_id') == '3') {
					return;
				}elseif($this->session->userdata('role_id') == '2'){
					redirect('customer/dashboard');
				}else{
					redirect('admin/dashboard');
				}
			}else{
				redirect('Lpage/index');
			}
		}

		public function admin_login(){
			if (!empty($this->session->userdata('role'))) {
				if ($this->session->userdata('role') == '1') {
					return;
				}elseif($this->session->userdata('role') == '2'){
					redirect('customer/dashboard');
				}else{
					redirect('rental/dashboard');
				}
			}else{
				redirect('LPage/index');
			}
		}

		public function customer_login(){
			if (!empty($this->session->userdata('role_id'))) {
				if ($this->session->userdata('role_id') == '2') {
					return;
				}elseif($this->session->userdata('role_id') == '1'){
					redirect('admin/dashboard');
				}else{
					redirect('rental/dashboard');
				}
			}else{
				redirect('LPage/index');
			}
		}
	}

?>