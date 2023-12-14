<?php

class Sispar_model extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function get_where($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function get_data_limit($table, $limit, $offset)
	{
		return $this->db->get($table, $limit, $offset);
	}

	//get data objek wisata
	public function get_objek_wisata($table)
      {
		$this->db->select('tb_objek_wisata.*, kategori.isi');
        $this->db->from('tb_objek_wisata');
        $this->db->join('kategori', 'kategori.id_kategori = tb_objek_wisata.id_kategori', 'inner');
        
        $query = $this->db->get();
        return $query->result();
     }

	 //ini untuk get data obej wisata di landing page
	 public function get_objek_wisata_lp($table, $limit)
	 {
		 $this->db->select('tb_objek_wisata.*, kategori.isi');
		 $this->db->from('tb_objek_wisata');
		 $this->db->join('kategori', 'kategori.id_kategori = tb_objek_wisata.id_kategori', 'inner');
		 $this->db->limit($limit); // Menambahkan batasan data
	 
		 $query = $this->db->get();
		 return $query->result();
	 }
	 


	//insert data objek wisata
	function insert_data_objek_wisata($data) {
		$this->db->set($data);

		$this->db->from('tb_objek_wisata');
		$this->db->join('tb_user', 'tb_objek_wisata.id_user = tb_user.id_user', 'inner');

		$insert = $this->db->insert('tb_objek_wisata', $data);
		
		return $insert;
	}

	//update data objek wisata
	function update_data_objek_wisata($data,$where) {
		$this->db->set($data);

		$this->db->from('tb_objek_wisata');
		$this->db->where($where); 
		$update = $this->db->update('tb_objek_wisata', $data);
		
		return $update;
	}

	function cari_objek($id_kategori) {
		$this->db->select('*');
		$this->db->from('tb_objek_wisata');
		$this->db->join('kategori', 'tb_objek_wisata.id_kategori = kategori.id_kategori', 'inner');
		
		$this->db->where('kategori.id_kategori', $id_kategori);
		
		$query = $this->db->get();

		return $query->result();
	}

	function cari_objek_all($id_kategori) {
		$this->db->select('tb_objek_wisata.*','isi');
		$this->db->from('tb_objek_wisata');
		$this->db->join('kategori', 'tb_objek_wisata.id_kategori = kategori.id_kategori', 'inner');		
		$query = $this->db->get();

		return $query->result();
	}


	public function insert_data_sewa($data_penyewaan)
	{
		// $this->db->trans_start();

		$this->db->insert('tb_penyewaan', $data_penyewaan);

		// $this->db->trans_complete();		
	}



	public function ambil_id_user($id_user)
	{
		$hasil = $this->db->where('id_user', $id_user)->get('tb_user');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}


	public function insert_sewa($data, $where)
	{
		$this->db->set($data);

		$this->db->from('tb_sewa');
		$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');


		$this->db->where($where);

		$insert = $insert;
		return $insert;
	}

	public function approved_model($data, $where)
	{
		$this->db->set($data);

		$this->db->from('tb_sewa');
		$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
		$this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
		$this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk', 'inner');

		$this->db->where($where);

		$approved = $this->db->update('tb_sewa');
		return $approved;
	}

	public function approved_model_transaksi( $data, $where)
	{
		$this->db->set($data);

        // Kondisi WHERE
		$this->db->where($where);  // $where sudah berupa array

        // Lakukan update
        $this->db->update('tb_review', $data);

        // Mengembalikan status update
        return $this->db->affected_rows() > 0;
	}

	public function getProdukStats()
	{
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



	public function deny_model($data, $where)
	{
		$this->db->set($data);

		$this->db->from('tb_sewa');
		$this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
		$this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
		$this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk', 'inner');

		$this->db->where($where);

		$deny = $this->db->update('tb_sewa');
		return $deny;
	}

	public function deny_model_transaksi($data, $where)
	{
		$this->db->set($data);

		$this->db->from('tb_transaksi t');
		$this->db->join('tb_penyewaan pw', 't.id_sewa = pw.id_sewa', 'inner');
		$this->db->join('tb_produk p', 'pw.id_produk = p.id_produk', 'inner');
		$this->db->join('tb_client c', 't.id_client = c.id_client', 'inner');
		$this->db->join('tb_sewa s', 'pw.id_sewa = s.id_sewa', 'inner');

		$this->db->where($where);

		$deny = $this->db->update('tb_transaksi');
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




	public function cek_login()
	{
		$email = set_value('email');
		$password = set_value('password');

		// Validasi password tidak boleh kosong
		if (empty($password)) {
			return FALSE;
		}

		$result = $this->db
			->where('email', $email)
			->where('password', md5($password))
			->limit(1)
			->get('tb_user');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			$this->session->unset_userdata('access_token');
			$this->session->unset_userdata('user_data');
			return FALSE;
		}
	}
	public function cek_login_admin($email)
{
    $result = $this->db
        ->where('email', $email)
        // ->where('role', 1)
        ->limit(1)
        ->get('tb_user');

    if ($result->num_rows() > 0) {
        return $result->row();
    } else {
        return FALSE;
    }
}



	public function get_password($id_user)
	{
		$this->db->select('password');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('tb_user');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->password;
		} else {
			return false;
		}
	}


	public function update_password($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function downloadPembayaran($id)
	{
		$query = $this->db->get_where('transaksi', array('id_rental' => $id));
		return $query->row_array();
	}

	public function total_data()
	{
		$this->db->select('count(nama_produk) as total_produk');
		$this->db->from('tb_produk');

		$query = $this->db->get();

		return $query->result();
	}


	public function total_data_admin()
	{
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
			'total_harga'	=> $sum_harga
		);

		return $data;
	}
	public function email_ada($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_user');

        return $query->num_rows() > 0;
    }

	public function get_email($email) {
        $this->db->select('nama');
        $this->db->from('tb_user');
        $this->db->where('email', $email);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->nama;
        } else {
            return null; // atau nilai default sesuai kebutuhan Anda
        }
    }

	public function pimpinan_login()
	{
		if (!empty($this->session->userdata('role'))) {
			if ($this->session->userdata('role') == '2') {
				return;
			}else {
				redirect('admin/dashboard');
			}
		} else {
			redirect('Landingpage/index');
		}
	}

	public function admin_login()
	{
		if (!empty($this->session->userdata('role'))) {
			if ($this->session->userdata('role') == '1') {
				return;
			} elseif ($this->session->userdata('role') == '2') {
				redirect('customer/dashboard');
			}
		} else {
			$this->session->unset_userdata('access_token');
			$this->session->unset_userdata('user_data');
			redirect('Landingpage');
		}
	}

	public function admin_login_google()
	{
		if (!empty($this->session->userdata('role'))) {
			if ($this->session->userdata('role') == '1') {
				return;
			} elseif ($this->session->userdata('role') == '2') {
				redirect('pimpinan/dashboard');
			}
		} else {
			$this->session->unset_userdata('access_token');
			$this->session->unset_userdata('user_data');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda tidak memiliki izin untuk mengakses halaman ini!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('auth/login');
		}
	}
	public function pimpinan_login_google()
	{
		if (!empty($this->session->userdata('role'))) {
			if ($this->session->userdata('role') == '2') {
				return;
			} elseif ($this->session->userdata('role') == '1') {
				redirect('admin/dashboard');
			}
		} else {
			$this->session->unset_userdata('access_token');
			$this->session->unset_userdata('user_data');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda tidak memiliki izin untuk mengakses halaman ini!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('auth/login');
		}
	}

	public function customer_login()
	{
		if (!empty($this->session->userdata('role_id'))) {
			if ($this->session->userdata('role_id') == '2') {
				return;
			} elseif ($this->session->userdata('role_id') == '1') {
				redirect('admin/dashboard');
			} else {
				redirect('rental/dashboard');
			}
		} else {
			redirect('LPage/index');
		}
	}
	public function getLaporanBulanan()
	{
		$this->load->database();
		$this->db->select('p.nama_produk, SUM(t.nominal) as total_pendapatan');
		$this->db->from('tb_transaksi t');
		$this->db->join('tb_penyewaan pw', 't.id_sewa = pw.id_sewa');
		$this->db->join('tb_produk p', 'pw.id_produk = p.id_produk');
		$this->db->join('tb_client c', 't.id_client = c.id_client');
		$this->db->join('tb_sewa s', 'pw.id_sewa = s.id_sewa');
		$this->db->where('MONTH(t.tgl_transaksi)', date('m'));
		$this->db->where('t.is_valid', '1');
		$this->db->group_by('p.nama_produk');

		$query = $this->db->get();
		return $query->result();
	}

	public function getLaporanDay()
	{
		$this->load->database();
		$this->db->select('p.nama_produk, SUM(nominal) as total_pendapatan')
			->from('tb_transaksi t')
			->join('tb_penyewaan pw', 't.id_sewa = pw.id_sewa')
			->join('tb_produk p', 'pw.id_produk = p.id_produk')
			->join('tb_client c', 't.id_client = c.id_client')
			->join('tb_sewa s', 'pw.id_sewa = s.id_sewa')
			->where('DATE(t.tgl_transaksi)', date('Y-m-d'))
			->where('t.is_valid', '1')
			->group_by('p.nama_produk');


		$query = $this->db->get();
		return $query->result();
	}
}
