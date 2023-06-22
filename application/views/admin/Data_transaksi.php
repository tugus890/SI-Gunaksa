<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Transaksi</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Transaksi <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
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
                                            Data Transaksi <strong>Gagal </strong><?= $this->session->flashdata('error'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?> -->
                            <!-- Button trigger modal -->
                            <div class="button_tambah" style="float: right;">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalsewa">
                                    Tambah
                                </button>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="table-responsive">
                                <table class="table table-hover">
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
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-success btn-xs" href ="<?php echo base_url('admin/transaksi/approved/' . $tr->id_sewa ) ?>"  >
                                                           Approved
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')" href ="<?php echo base_url('admin/transaksi/deny/' . $tr->id_sewa ) ?>">
                                                           Deny
                                                        </a>
                                                    <!-- </div> -->
                                                    <!-- <div class="button_detail"> -->
                                                       
                                                    
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs mt-1"  href= "<?php echo base_url('admin/transaksi/detail/' . $tr->id_sewa ) ?>">
                                                          
                                                    Detail
                                                        </a>

                                                    </div>


                                                   
                                                  


                                                    <?php }else{ ?>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-secondary btn-xs" disabled >
                                                           Approved
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-secondary btn-xs mt-1" disabled>
                                                           Deny
                                                        </a>
                                                    <!-- </div> -->
                                                    <!-- <div class="button_detail"> -->
                                                       
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs mt-1"  href= "<?php echo base_url('admin/transaksi/detail/' . $tr->id_sewa ) ?>">
                                                           Detail
                                                        </a>
                                                    </div>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="modalsewa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url('admin/data_transaksi/tambah_sewa_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                        <?php echo form_error('nama_lengkap','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
                                <?php echo form_error('nama_produk','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="tgl_sewa" class="form-label">Tanggal Sewa</label >
                                <input type="text" name="tgl_sewa" class="form-control" id="tgl_sewa" required>
                                <?php echo form_error('tgl_sewa','<div class="text-small text-danger">','</div>') ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai" required>
                                <?php echo form_error('tgl_selesai','<div class="text-small text-danger">','</div>') ?>

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <input type="text" name="jenis_kegiatan" class="form-control" id="jenis_kegiatan" required>
                                <?php echo form_error('jenis_kegiatan','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


