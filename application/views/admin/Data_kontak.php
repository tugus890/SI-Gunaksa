<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Data Kontak</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Kontak <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
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
        		                        <th>Alamat</th>
        		                        <th>NO TLP Pemilik</th>
        		                        <th>IG</th>
        		                        <th>Twitter</th>
        		                        <th>FB</th>
        		                        <th>Tiktok</th>
        		                        <th>Youtube</th>
        		                        <th>Link Web Promosi</th>
        		                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment(4) + 1;
                                        foreach ($kontak as $cs) :  ?>
                                            <tr>
                                              
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $cs->alamat ?></td>
                                            <td><?php echo $cs->no_tlp ?></td>
                                            <td><?php echo $cs->ig ?></td>
                                            <td><?php echo $cs->twitter ?></td>
                                            <td><?php echo $cs->fb ?></td>
                                            <td><?php echo $cs->tiktok ?></td>
                                            <td><?php echo $cs->yt ?></td>
                                            <td><?php echo $cs->link ?></td>
                                            
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editmodal<?php echo $cs->id_kontak?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/data_kontak/delete_kontak').$cs->id_kontak ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
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
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Kontak</h5>
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
                <form action="<?= base_url('admin/Data_kontak/tambah_kontak_aksi') ?>" method="POST" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <label for="nama" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4" cols="50" required></textarea><br><br>
                     <?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
                    </div>
                    
                    <div class="mb-3">
                        <label>No TLP *Gunakan 62</label>
                        <input type="text" name="no_tlp" class="form-control" placeholder="Contoh : 62895643111" required>
                        <?php echo form_error('no_tlp','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>IG</label>
                            <input type="text" name="ig" class="form-control">
                            <?php echo form_error('ig','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Twitter</label>
                            <input type="twitter" name="twitter" class="form-control">
                            <?php echo form_error('twitter','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>FB</label>
                            <input type="fb" name="fb" class="form-control">
                            <?php echo form_error('fb','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Tiktok</label>
                            <input type="tiktok" name="tiktok" class="form-control">
                            <?php echo form_error('tiktok','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Youtube</label>
                            <input type="yt" name="yt" class="form-control" >
                            <?php echo form_error('yt','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                    <div class="mb-3">
                            <label>Link Web Promosi</label>
                            <input type="link" name="link" class="form-control" >
                            <?php echo form_error('link','<span class="text-small text-danger">','</span>') ?>
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
      foreach ($kontak as $cs) : $no++;
?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $cs->id_kontak ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url('admin/Data_kontak/update_kontak_aksi') ?>" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                        <label for="nama" class="form-label">Alamat</label>
                        <input type="hidden" name="id_kontak" value="<?= $cs->id_kontak ?>" required>
                        <textarea id="alamat" name="alamat" rows="4" cols="50"><?= $cs->alamat?></textarea><br><br>
                     <?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
                        <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                    <div class="mb-3">
                        <label>No TLP</label>
                        <input type="text" name="no_tlp" class="form-control" value="<?= $cs->no_tlp?>" required >
                        <?php echo form_error('no_tlp','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>IG</label>
                            <input type="text" name="ig" class="form-control" value="<?= $cs->ig?>">
                            <?php echo form_error('ig','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Twitter</label>
                            <input type="twitter" name="twitter" class="form-control" value="<?= $cs->twitter?>">
                            <?php echo form_error('twitter','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>FB</label>
                            <input type="fb" name="fb" class="form-control" value="<?= $cs->fb?>">
                            <?php echo form_error('fb','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Tiktok</label>
                            <input type="tiktok" name="tiktok" class="form-control" value="<?= $cs->tiktok?>">
                            <?php echo form_error('tiktok','<span class="text-small text-danger">','</span>') ?>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label>Youtube</label>
                            <input type="yt" name="yt" class="form-control" value="<?= $cs->yt?>">
                            <?php echo form_error('yt','<span class="text-small text-danger">','</span>') ?>
                        </div>
                     </div>
                    <div class="col-6">
                    <div class="mb-3">
                            <label>Link Web Promosi</label>
                            <input type="link" name="link" class="form-control" value="<?= $cs->link?>">
                            <?php echo form_error('link','<span class="text-small text-danger">','</span>') ?>
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

