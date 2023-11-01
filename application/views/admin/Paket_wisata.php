<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Data Paket Wisata</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Produk <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
                                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('validate')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= $this->session->flashdata('validate'); ?>
                                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            
                            <!-- Button trigger modal -->
                            <div class="button_tambah" style="float: right;">
                                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modaluser">
                                    Tambah
                                </button>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
        		                        <th>Nama Paket Wisata</th>
        		                        <th>Foto Paket Wisata</th>
        		                        <th>Harga Paket Wisata</th>
        		                        <th>Nama Pemilik Paket Wisata</th>
        		                        <th>Alamat Pemilik</th>
        		                        <th>No TLP</th>
        		                        <th>No WA</th>
        		                        <th>Keterangan</th>
        		                        <th>Diskon</th>
        		                        <th>Kesediaan</th>
        		                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment(4) + 1;
                                        foreach ($paket as $cs) :  ?>
                                            <tr>
                                              
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $cs->nama_paket ?></td>
                                            <td><?php if($cs->foto != null) {
                                                        echo "<img src='" . base_url('assets/upload/') . $cs->foto . "'width='200'''>";
                                            }else echo "<img src='" . base_url('assets/images/') . 'logo.png' . "'width=200''>";
                                                
                                            ?> </td>
                                            <td><?php echo $cs->harga ?></td>
                                            <td><?php echo $cs->nama_pemilik ?></td>
                                            <td><?php echo $cs->alamat ?></td>
                                            <td><?php echo $cs->no_tlp ?></td>
                                            <td><?php echo $cs->no_wa ?></td>
                                            <td><?php echo $cs->keterangan ?></td>
                                            <td><?php echo $cs->diskon ?></td>
                                            <td><?php echo $cs->kesediaan ?></td>
                                            
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editmodal<?php echo $cs->id_paket_wisata ?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/paket_wisata/delete_wisata').$cs->id_paket_wisata  ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                            DELETE
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- <div class="row mt-4">
                                    <div class="col-md-12">
                                        <?php echo $links ?>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Paket Wisata</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('validate')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('validate'); ?>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/paket_wisata/tambah_paket_aksi') ?>" method="POST" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paket Wisata</label>
                        <input type="text" name="nama_paket" class="form-control" id="nama_paket" required>
                        <?php echo form_error('nama_paket','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="mb-3">
                        <label>Foto *maks 2MB</label>
                        <input type="file" name="foto" class="form-control" required>
                        <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Harga Paket Wisata</label>
                            <input type="text" name="harga" class="form-control" required>
                            <?php echo form_error('harga','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Nama Pemilik Paket Wisata</label>
                            <input type="nama_pemilik" name="nama_pemilik" class="form-control" required>
                            <?php echo form_error('nama_pemilik','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alamat Pemilik</label>
                    <textarea id="komentar" name="alamat" rows="4" cols="50"></textarea><br><br>
                     <?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
                </div>
                    
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>No TLP</label>
                            <input type="no_tlp" name="no_tlp" class="form-control" required>
                            <?php echo form_error('no_tlp','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>No WA</label>
                            <input type="no_wa" name="no_wa" class="form-control" required>
                            <?php echo form_error('no_wa','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="keterangan" name="keterangan" class="form-control" required>
                    <?php echo form_error('keterangan','<span class="text-small text-danger">','</span>') ?>

                    </div>
                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Diskon</label>
                            <input type="diskon" name="diskon" class="form-control" >
                            <?php echo form_error('diskon','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Pilih Kesediaan</label>
                            <select name="kesediaan" id="kesediaan">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                            </option>
                            <?php echo form_error('kesediaan','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>
                  
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $no = 0 ;
      foreach ($paket as $cs) : $no++;
?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $cs->id_paket_wisata ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Update Data Wisata</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('validate')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('validate'); ?>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/paket_wisata/update_paket_aksi') ?>" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paket Wisata</label>
                        <input type="hidden" name="id_paket_wisata" value="<?= $cs->id_paket_wisata ?>">
                        <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="<?= $cs->nama_paket ?>" >
                        <?php echo form_error('nama_paket','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="mb-3">
                        <label>Foto *maks 2MB</label>
                        <input type="file" name="foto" class="form-control" value="<?= $cs->foto ?>">
                        <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Harga Paket Wisata</label>
                            <input type="text" name="harga" class="form-control" value="<?= $cs->harga ?>" >
                            <?php echo form_error('harga','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Nama Pemilik Paket Wisata</label>
                            <input type="nama_pemilik" name="nama_pemilik" class="form-control" value="<?= $cs->nama_pemilik ?>">
                            <?php echo form_error('nama_pemilik','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alamat Pemilik</label>
                    <textarea id="komentar" name="alamat" rows="4" cols="50" ><?= $cs->alamat ?></textarea><br><br>
                     <?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
                </div>
                    
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>No TLP</label>
                            <input type="no_tlp" name="no_tlp" class="form-control" value="<?= $cs->no_tlp ?>">
                            <?php echo form_error('no_tlp','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>No WA</label>
                            <input type="no_wa" name="no_wa" class="form-control" value="<?= $cs->no_wa ?>">
                            <?php echo form_error('no_wa','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="keterangan" name="keterangan" class="form-control" value="<?= $cs->keterangan ?>" >
                    <?php echo form_error('keterangan','<span class="text-small text-danger">','</span>') ?>

                    </div>
                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Diskon</label>
                            <input type="diskon" name="diskon" class="form-control" value="<?= $cs->diskon ?>">
                            <?php echo form_error('diskon','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Pilih Kesediaan</label>
                            <select name="kesediaan" id="kesediaan" >
                            <option value="Tersedia" <?php if ($cs->kesediaan == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                            <option value="Tidak Tersedia" <?php if ($cs->kesediaan == 'Tidak Tersedia') echo 'selected'; ?>>Tidak Tersedia</option>
                            </select>
                            </option>
                            <?php echo form_error('kesediaan','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>
                
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php endforeach   ?>

