<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Produk</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Produk <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('validate')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= $this->session->flashdata('validate'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- <?php if ($this->session->flashdata('error')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Produk <strong>Gagal </strong><?= $this->session->flashdata('error'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?> -->
                            <!-- Button trigger modal -->
                            <div class="button_tambah" style="float: right;">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalproduk">
                                    Tambah
                                </button>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga DP</th>
                                            <th>Harga Lunas</th>
                                            <th>Deskripsi</th>
                                            <th>Foto 1</th>
                                            <th>Foto 2</th>
                                            <th>Foto 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($produk as $prd) :  ?>
                                            <tr>
                                              
                                                <td><?php echo $no++ ?></td>
							                    <td><?php echo $prd->nama_produk ?></td>
            				                    <td><?php echo $prd-> harga_dp ?></td>
            				                    <td><?php echo $prd->harga_lunas ?></td>
							                    <td><?php echo $prd->deskripsi_produk ?></td>
                                                <td>
                                                    <!-- <?php if ($prd->foto_produk1 != null){?> -->
                                                    <img width="100px"height="50px" src="<?php echo base_url() . 'assets/upload/' . $prd->foto_produk1 ?>">      
                                                
                                                </td>
                                                <!-- </td><?php } else{  ?>

                                                    <td > </td>
                                                    <td></td><?php }  ?> -->

                                                <td>
                                                    <img width="100px"height="50px" src="<?php echo base_url() . 'assets/upload/' . $prd->foto_produk2 ?>">      
                                                          
                                                </td>

                                                <td>
                                                    <img width="100px"height="50px" src="<?php echo base_url() . 'assets/upload/' . $prd->foto_produk3 ?>">      
                                                          
                                                </td>

                                             

                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 60px; font-size: 12px;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $prd->id_produk ?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 60px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/data_produk/delete_produk/').$prd->id_produk ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                            DELETE
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('validate')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('validate'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/data_produk/tambah_produk_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="nama" required>
                        <?php echo form_error('nama_produk','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_dp" class="form-label">Harga DP</label>
                                <input type="text" name="harga_dp" class="form-control" id="harga_dp" required>
                                <?php echo form_error('harga_dp','<div class="text-small text-danger">','</div>') ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_lunas" class="form-label">Harga Lunas</label>
                                <input type="text" name="harga_lunas" class="form-control" id="harga_lunas"  required>
                                <?php echo form_error('harga_lunas','<div class="text-small text-danger">','</div>') ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_produk" class="form-label">Deskripsi</label >
                        <textarea type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" rows="3" required></textarea>
                        <?php echo form_error('deskripsi_produk','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk1" class="form-label">Pilih Gambar 1</label>
                        <input type="file" name="foto_produk1" class="form-control" id="foto_produk1" accept="image/png, image/jpeg, image/jpg">
                        <?php echo form_error('foto_produk1','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk2" class="form-label">Pilih Gambar 2</label>
                        <input type="file" name="foto_produk2" class="form-control" id="foto_produk2" accept="image/png, image/jpeg, image/jpg">
                        <?php echo form_error('foto_produk2','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk3" class="form-label">Pilih Gambar 3</label>
                        <input type="file" name="foto_produk3" class="form-control" id="foto_produk3" accept="image/png, image/jpeg, image/jpg">
                        <?php echo form_error('foto_produk3','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $no = 0 ;
      foreach ($produk as $prd) : $no++;
?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $prd->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('validate')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('validate'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/data_produk/update_produk_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="hidden" name="id_produk" value="<?php echo $prd->id_produk; ?>">
                        <input type="text" name="nama_produk" class="form-control" id="nama" value="<?php echo $prd->nama_produk ?>">
                        <?php echo form_error('nama_produk','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_dp" class="form-label">Harga DP</label>
                                <input type="text" name="harga_dp" class="form-control" id="harga_dp" value="<?= $prd->harga_dp ?>">
                                <?php echo form_error('harga_dp','<div class="text-small text-danger">','</div>') ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_lunas" class="form-label">Harga Lunas</label>
                                <input type="text" name="harga_lunas" class="form-control" id="harga_lunas" value="<?= $prd->harga_lunas ?>">
                                <?php echo form_error('harga_lunas','<div class="text-small text-danger">','</div>') ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_produk" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" rows="3" ><?= $prd->deskripsi_produk ?></textarea>
                        <?php echo form_error('deskripsi_produk','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk1" class="form-label">Pilih Gambar 1</label>
                        <input type="file" name="foto_produk1" class="form-control" id="foto_produk1" accept="image/png, image/jpeg, image/jpg, image/gif">
                        <?php echo form_error('foto_produk1','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk2" class="form-label">Pilih Gambar 2</label>
                        <input type="file" name="foto_produk2" class="form-control" id="foto_produk2" accept="image/png, image/jpeg, image/jpg, image/gif">
                        <?php echo form_error('foto_produk2','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="mb-3">
                        <label for="foto_produk3" class="form-label">Pilih Gambar 3</label>
                        <input type="file" name="foto_produk3" class="form-control" id="foto_produk3" accept="image/png, image/jpeg, image/jpg, image/gif">
                        <?php echo form_error('foto_produk3','<div class="text-small text-danger">','</div>') ?>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php endforeach   ?>

