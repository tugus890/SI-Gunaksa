<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Produk</h4>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <a href="<?php echo base_url('admin/transaksi') ?>" class="btn btn-primary mb-4"><i class="ti-arrow-left"> Kembali</i></a>

                            <?php foreach ($sewa as $tr) : ?>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>NIK</label>
                                        <input type="text" name="nik" class="form-control" value="<?php echo $tr->nik ?>" disabled>
                                        <?php echo form_error('nik', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="col-md-1 offset-md-2">
                                        <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Tanggal Selesai</label>
                                        <input type="text" name="tgl_selesai" class="form-control" value="<?php echo $tr->tgl_selesai ?>" disabled>
                                        <?php echo form_error('tgl_selesai', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $tr->nama_lengkap ?>" disabled>
                                        <?php echo form_error('nama_lengkap', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="col-md-1 offset-md-2">
                                        <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control" value="<?php echo $tr->nama_produk ?>" disabled>
                                        <?php echo form_error('nama_produk', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>No Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control" value="<?php echo $tr->no_telepon ?>" disabled>
                                        <?php echo form_error('no_telepon', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="col-md-1 offset-md-2">
                                        <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Catatan</label>
                                        <input type="text" name="catatan" class="form-control" value="<?php echo $tr->catatan ?>" disabled>
                                        <?php echo form_error('catatan', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Jenis Kegiatan</label>
                                        <input type="text" name="jenis_kegiatan" class="form-control" value="<?php echo $tr->jenis_kegiatan ?>" disabled>
                                        <?php echo form_error('jenis_kegiatan', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="col-md-1 offset-md-2">
                                        <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                    </div>
                                    <div class="col-md-4 mb-3">
            
                                    <label>Bukti Pembayaran</label>
                                        <p>DP : <?php if ($tr->harga_dp !== null) {
                                                        if($tr->harga_lunas == null) {
                                                            $harga_dp_ = number_format($tr->harga_dp, 3, '.', ',');
                                                            echo $harga_dp_;}
                                                            else {echo"-";
                                                            }
                                                        } else {
                                                            echo "-";
                                                        }?> </p> 
                                        <p>Lunas : <?php if ($tr->harga_lunas !== null) {
                                                            $harga_lunas_ = number_format($tr->harga_lunas, 3, '.', ',');
                                                            echo $harga_lunas_;
                                                        } else {
                                                            echo "-";}?> </p> 
                                    <?php echo form_error('jawaban','<span class="text-small text-danger">','</span>') ?>
                                  </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Tanggal Penyewaan</label>
                                        <input type="text" name="tgl_sewa" class="form-control" value="<?php echo $tr->tgl_sewa ?>" disabled>
                                        <?php echo form_error('tgl_sewa', '<span class="text-small text-danger">', '</span>') ?>
                                    </div>
                                    <div class="col-md-1 offset-md-2">
                                        <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#buktimodal">Upload SK</button>
                                        <?php if ($tr->dok_sk != null) { ?>
                                        <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#SKmodal">Lihat File</button> <br><br>
                                        <?php }else{?>
                                        <button type="button" class="btn btn-secondary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#SKmodal" disabled>Lihat File</button> <br><br>
                                        <?php ;} ?>


                                        <?php if ($tr->is_verif == null) : ?>
                                            <a href="<?php echo base_url('admin/transaksi/approved/' . $tr->id_sewa) ?>" class="btn btn-sm btn-success text-white">Approved</a>
                                            <a onclick="return confirm('Anda yakin membatalkan transaksi ini?')" href="<?php echo base_url('admin/transaksi/deny/' . $tr->id_sewa) ?>" class="btn btn-sm btn-danger text-white">Deny</a>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary text-white" Disabled>Approved</a>
                                            <a class="btn btn-sm btn-secondary text-white" Disabled>Deny</a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                Modal
                                <div class="modal fade" id="buktimodal" tabindex="-1" role="dialog" aria-labelledby="buktimodalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data FAQ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url('admin/transaksi/upload_SK') ?>" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Upload Bukti Pembayaran (PDF) *Max 2 MB</label>
                                                        <input type="hidden" name="id_sewa" value="<?php echo $tr->id_sewa ?>">
                                                        <input type="file" name="dok_sk" class="form-control" accept="application/pdf">
                                                    </div>
                                            </div>
                                            <div class="modal-footer mx-auto">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Lihat SK -->
                                <div class="modal fade" id="SKmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data FAQ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                                <embed src="<?= base_url() . 'assets/sk/' . $tr->dok_sk ?>" type="application/pdf" width="100%" height="500px">
                                            </div>
                                            <div class="modal-footer mx-auto">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" data-bs-toggle="modal" data-dismiss="modal" id="uploadUlangBtn" data-bs-target="#buktimodal" class="btn btn-success">Upload Ulang</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
