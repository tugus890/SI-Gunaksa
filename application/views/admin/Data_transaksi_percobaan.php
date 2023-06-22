<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Penyewaan</h1>
		</div>
		
		<a href="<?php echo base_url('admin/data_produk/tambah_produk')?>" class="btn btn-primary mb-3">Tambah Data</a>
		 <?php echo $this->session->flashdata('pesan') ?>

		 <table class="table table-hover table-striper table-bordered">
        	<thead>
			<tr>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Nama Produk</th>
				<th>Tgl Sewa</th>
				<th>Tgl Selesai</th>
				<th>Jenis Kegiatan</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
        	<tbody>
			 <?php
				$no = 1;
				foreach ($sewa as $tr) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->nama_lengkap ?></td>
						<td><?php echo $tr->nama_produk?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tgl_sewa ))?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tgl_selesai ))?></td>
						<td><?php echo $tr->jenis_kegiatan?></td>
						<td>

						<?php 
								// ngasi status di kolom status apakah pending atau approved
								if ($tr->is_verif == null) {?>
									<a class="btn btn-sm btn-warning text-white" >Pending</a>
								
								<?php }else if ($tr->is_verif == "1") {?>
									<a class="btn btn-sm btn-success text-white" >Approved</a> 
									<?php }
									else if  ($tr->is_verif == "0"){?>
									<a class="btn btn-sm btn-danger text-white" >Deny</a>
									<?php }?>
								
						</td>
						<td>
								<?php 
								// ngasi aksi jika is veriv 1 atau approved maka otomatis disabled
								if($tr->is_verif == null){?>
								<a href ="<?php echo base_url('admin/transaksi/approved/' . $tr->id_sewa ) ?>" class="btn btn-sm btn-success text-white" >Approved</a>
								<a href= "<?php echo base_url('admin/transaksi/detail/' . $tr->id_sewa ) ?>" class="btn btn-sm btn-primary text-white" >Detail</a> <br>
								<a onclick="return confirm('Anda yakin membatalkan transaksi ini?')" href ="<?php echo base_url('admin/transaksi/deny/' . $tr->id_sewa ) ?>" class="btn btn-sm btn-danger text-white">Deny</a>
								
								<?php }else{?>
									<a class="btn btn-sm btn-secondary text-white" Disabled>Approved</a>
                                    <a href= "<?php echo base_url('admin/transaksi/detail/' . $tr->id_sewa ) ?>" class="btn btn-sm btn-primary text-white" >Detail</a> <br>
									<a class="btn btn-sm btn-secondary text-white" Disabled>Deny</a>

                                <?php }?>
								
						</td>





						<!-- <td>Rp. <?php echo number_format($tr->harga,0,',','.')?></td>
						<td>Rp. <?php echo number_format($tr->denda,0,',','.')?></td>
						<td>Rp. <?php echo number_format($tr->total_denda,0,',','.')?></td>
						<td>
							<?php 
								if($tr->tanggal_pengembalian=="0000-00-00"){
									echo "-";
								}else{
									echo date('d/m/Y', strtotime($tr->tanggal_pengembalian));
								}
							?>
						</td>

						<td>
							<?php if($tr->status_pengembalian == "Kembali") {
								echo "Kembali";
							}else{
								echo "Belum Kembali";
							}

							?>
						</td>

						<td>
							<?php if($tr->status_rental == "Selesai") {
								echo "Kembali";
							}else{
								echo "Belum Selesai";
							}

							?>
						</td>

						<td>
							
							<center>


								<?php if($tr->status_pembayaran == "1") { ?>
											<a class="btn btn-sm btn-primary text-white" ><i class="fas fa-check-circle"></i></a>
								<?php }else{ ?>
									<?php 
									if(empty($tr->bukti_pembayaran)) { ?>

										<button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>

									<?php } else { ?>

											<a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/transaksi/pembayaran/' . $tr->id_rental) ?>"><i class="fas fa-clock"></i></a>

									<?php } ?>
								<?php } ?>
								
								

							</center>

						</td>

						<td>
							
							<?php 

								if ($tr->status == "0") {
									echo anchor('#', 'Button Text', 'class="btn btn-sm btn-success mr-2"');?>
								
								// }else { ?>

								// 	<div class="row">
								// 		<a class="btn btn-sm btn-success mr-2" href="<?php echo base_url('admin/transaksi/transaksi_selesai/' . $tr->id_rental) ?>"><i class="fas fa-check"></i></a>
								// 		<a onclick="return confirm('Anda yakin membatalkan/menghapus transaksi ini?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/batal_transaksi/' . $tr->id_rental) ?>"><i class="fas fa-times"></i></a>
								// 	</div>

								// <?php } ?>

						</td>
					</tr> -->
								</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>