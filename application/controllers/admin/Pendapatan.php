<?php
	
	class Pendapatan extends CI_Controller{

		public function index(){
			//total produk
			$this->sewa_model->admin_login();
			$query = $this->db->query("SELECT COUNT(nama_produk) AS banyak_disewa FROM tb_produk ");
			$data['total_produk']= $query->result();	
			
			//produk populer
			$query =$this->db->query("SELECT p.nama_produk, COUNT(*) as jumlah_disewa
			FROM tb_produk p
			JOIN tb_penyewaan pw ON p.id_produk = pw.id_produk
			JOIN tb_sewa s ON pw.id_sewa = s.id_sewa
			JOIN tb_transaksi t ON s.id_sewa = t.id_sewa
			WHERE t.is_valid = 1
			GROUP BY p.nama_produk
			ORDER BY jumlah_disewa DESC
			");
			$data['populer'] = $query->result();

			//total pendapatan hari ini
			$query = $this->db->query("SELECT format(sum(nominal),3) AS transaksi_day
			FROM tb_transaksi
			WHERE DATE(tgl_transaksi) = CURDATE() AND is_valid = 1 ");
            $data['pendapatan_hari_ini'] = $query->result();


			//table pendapatan
			$produkStats = $this->sewa_model->getProdukStats();
			
			$data['produkStats'] = $produkStats;

			$this->load->view('template_admin/header');
			$this->load->view('admin/Pendapatan',$data);
			$this->load->view('template_admin/footer');
		}
	}
?>