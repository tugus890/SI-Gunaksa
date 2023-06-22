<?php  


	class Transaksi extends CI_Controller{
		
		public function index(){
			$this->sewa_model->admin_login();

			$data['sewa'] = $this->db->query("SELECT
			tb_sewa.id_sewa,
			tb_client.nama_lengkap,
			tb_produk.nama_produk,
			tb_sewa.tgl_sewa,
			tb_sewa.tgl_selesai,
			tb_sewa.jenis_kegiatan,
			tb_sewa.is_verif
		  FROM
			tb_sewa
			INNER JOIN tb_client ON tb_sewa.id_client = tb_client.id_client
			INNER JOIN tb_penyewaan ON tb_sewa.id_sewa = tb_penyewaan.id_sewa
			INNER JOIN tb_produk ON tb_penyewaan.id_produk = tb_produk.id_produk;")->result();


			$this->load->view('template_admin/header');
			$this->load->view('admin/Data_transaksi',$data);
			$this->load->view('template_admin/footer');
		}

		public function detail($id_sewa)
		{
			$data['sewa'] = $this->db->query("SELECT
			tb_sewa.id_sewa,
			tb_client.nama_lengkap,
			tb_produk.nama_produk,
			tb_sewa.tgl_sewa,
			tb_sewa.tgl_selesai,
			tb_sewa.jenis_kegiatan,
			tb_sewa.is_verif,
			tb_client.no_telepon,
			tb_sewa.catatan,
			tb_sewa.jenis_kegiatan,
			tb_sewa.harga_dp,
			tb_sewa.harga_lunas,
			tb_client.nik,
			tb_sewa.dok_sk
		  FROM
			tb_sewa
			INNER JOIN tb_client ON tb_sewa.id_client = tb_client.id_client
			INNER JOIN tb_penyewaan ON tb_sewa.id_sewa = tb_penyewaan.id_sewa
			INNER JOIN tb_produk ON tb_penyewaan.id_produk = tb_produk.id_produk
			WHERE tb_sewa.id_sewa = '$id_sewa';")->result();
			$this->sewa_model->admin_login();
			$this->load->view('template_admin/header');
			$this->load->view('admin/Detail_pengajuan_sewa',$data);
			$this->load->view('template_admin/footer');
				
			
		}
	

		public function tambah_sewa_aksi(){
			$this->sewa_model->admin_login();
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data sewa Gagal Ditambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
		  redirect('admin/data_sewa');
			}else{
				$nama_lengkap			= $this->input->post('lengkap');
				$nama_produk			= $this->input->post('nama_produk');
				$tgl_sewa				= $this->input->post('tgl_sewa');
				$tgl_selesai			= $this->input->post('tgl_selesai');
				$jenis_kegiatan			= $this->input->post('jenis_kegiatan');

				

				$data = array(
					'nama_lengkap'      	=> $nama_lengkap,
					'nama_produk'			=> $nama_produk,
					'tgl_sewa'				=> $tgl_sewa,
					'tgl_selesai'			=> $tgl_selesai,
					'jenis_kegiatan'		=> $jenis_kegiatan

				
				);
				

				$this->sewa_model->insert_sewa($data, 'tb_sewa');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data sewa Berhasil Ditambahkan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/data_sewa');

			}
		}

		public function upload_SK()
		{
			$this->sewa_model->admin_login();
		
			$id_sewa = $this->input->post('id_sewa');
			$dok_sk = $_FILES['dok_sk']['name'];
		
			if ($dok_sk) {
				$config['upload_path'] = './assets/sk';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 2048; // Maximum file size in kilobytes
		
				$this->load->library('upload', $config);
		
				if (!$this->upload->do_upload('dok_sk')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $error . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect(base_url('admin/transaksi/detail/' . $id_sewa));
				}
		
				$dok_sk = $this->upload->data('file_name');
			}
		
			$data = array(
				'dok_sk' => $dok_sk
			);
		
			$where = array(
				'id_sewa' => $id_sewa
			);
		
			$this->sewa_model->update_data('tb_sewa', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Upload SK Berhasil Ditambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			
			redirect(base_url('admin/transaksi/detail/' . $id_sewa));
		}
		
		public function approved($id_sewa)
		{
			$this->sewa_model->admin_login();
		
				$is_verif			= 1;

				$data = array(
					'is_verif'      	=> $is_verif,
					
				);

				$where = array(
					'id_sewa' => $id_sewa
				);

				$this->sewa_model->approved_model($data,$where);

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Approved
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/transaksi');		
			
		}

		public function deny($id_sewa)
		{
			$this->sewa_model->admin_login();
		
				$is_verif			= 0;

				$data = array(
					'is_verif'      	=> $is_verif,
					
				);

				$where = array(
					'id_sewa' => $id_sewa
				);

				$this->sewa_model->deny_model($data,$where);

				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Deny
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/transaksi');		
			
		}


		public function pembayaran($id){
			$this->sewa_model->admin_login();
			$where = array('id_rental' => $id);
			$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_pembayaran',$data);
			$this->load->view('templates_admin/footer');

		}

		public function cek_pembayaran(){
			$this->sewa_model->admin_login();
			$id 				= $this->input->post('id_rental');
			$status_pembayaran	= $this->input->post('status_pembayaran');

			$data = array(
				'status_pembayaran'	=> $status_pembayaran
			);

			$where = array(
				'id_rental'		=> $id
			);

			$this->sewa_model->update_data('transaksi',$data,$where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Pembayaran telah dikonfirmasi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/transaksi');
		}


		public function download_pembayaran($id){
			$this->sewa_model->admin_login();
			$this->load->helper('download');
			$filePembayaran = $this->sewa_model->downloadPembayaran($id);
			$file = 'assets/upload/' . $filePembayaran['bukti_pembayaran'];
			force_download($file, NULL);
		}

		public function transaksi_selesai($id){
			$this->sewa_model->admin_login();
			$where = array('id_rental' => $id);
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/transaksi_selesai',$data);
			$this->load->view('templates_admin/footer');
		}

		public function transaksi_selesai_aksi(){
			$this->sewa_model->admin_login();
			$id 					= $this->input->post('id_rental');
			$tanggal_pengembalian	= $this->input->post('tanggal_pengembalian');
			$status_rental 			= $this->input->post('status_rental');
			$status_pengembalian	= $this->input->post('status_pengembalian');
			$tanggal_kembali		= $this->input->post('tanggal_kembali');
			$denda					= $this->input->post('denda');

			$x						= strtotime($tanggal_pengembalian);
			$y						= strtotime($tanggal_kembali);
			$selisih				= abs($x - $y)/(60*60*24);
			$total_denda			= $selisih * $denda;
			

			$data = array(
				'tanggal_pengembalian'	=> $tanggal_pengembalian,
				'status_rental'			=> $status_rental,
				'status_pengembalian'	=> $status_pengembalian,
				'total_denda'			=> $total_denda
			);

			$where = array( 'id_rental' => $id);



			$this->sewa_model->update_data('transaksi', $data, $where);
			if($status_rental == 'Selesai'){
				$id_mobil = $this->input->post('id_mobil');
				$data2	= array('status'   => '1');
				$where2 = array('id_mobil'  => $id_mobil );
				$this->sewa_model->update_data('mobil', $data2, $where2);
			}else{
			}

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi selesai
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');

			redirect('admin/transaksi');
		}

		public function batal_transaksi($id){
			$this->sewa_model->admin_login();
			$where = array('id_rental' => $id);
			$data  = $this->sewa_model->get_where($where, 'transaksi')->row();

			$where2 = array('id_mobil' => $data->id_mobil);
			$data2	= array('status'   => '1');

			$this->sewa_model->update_data('mobil', $data2, $where2);
			$this->sewa_model->delete_data($where, 'transaksi');

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil dibatalkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/transaksi');

		}
	}

?>