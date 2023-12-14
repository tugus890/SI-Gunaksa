<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Data Objek Wisata</h4>
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
        		                        <th>Nama Wisata</th>
        		                        <th>Foto Wisata</th>
        		                        <th>Link Maps</th>
        		                        <th>Maps</th>
                                        <th>Kategori</th>
        		                        <th>Keterangan</th>
        		                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment(4) + 1;
                                        foreach ($wisata as $cs) :  ?>
                                            <tr>
                                              
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $cs->nama_wisata ?></td>
                                            <td><?php if($cs->foto != null) {
                                                        echo "<img src='" . base_url('assets/upload/') . $cs->foto . "'width='200'''>";
                                            }else echo "<img src='" . base_url('assets/images/') . 'logo.png' . "'width=200''>";
                                                
                                            ?> </td>
                                            <td><?php echo $cs->link_maps ?></td>
                                            <td><?php echo $cs->maps ?></td>
                                            <td><?php echo $cs->isi ?></td>
                                            <td><?php echo $cs->keterangan ?></td>
                                            
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editmodal<?php echo $cs->id_objek_wisata ?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/tempatwisata/delete_wisata/').$cs->id_objek_wisata  ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
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

    # code...

<!-- Modal Tambah-->
<div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Wisata</h5>
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
                <form action="<?= base_url('admin/tempatwisata/tambah_wisata_aksi') ?>" method="POST" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Wisata</label>
                        <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" required>
                        <?php echo form_error('nama_wisata','<div class="text-small text-danger">','</div>') ?>
                    </div>
                   
                    <div class="mb-3">
                            <label>Foto *maks 2MB</label>
                            <input type="file" name="foto" class="form-control" required>
                            <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                            
                    </div>
                    
                    <div class="mb-3">
                    <label>Link Maps</label>
                    <input type="text" name="link_maps" class="form-control" required>
                    <?php echo form_error('link_maps','<span class="text-small text-danger">','</span>') ?>

                    </div>
                    <div class="mb-3">
                    <label>Maps</label>
                    <input type="maps" name="maps" class="form-control" required>
                    <?php echo form_error('maps','<span class="text-small text-danger">','</span>') ?>
                    </div>

                    <div class="mb-3">
                    <label>Kategori</label>

                    <select name="isi" id="isi" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $wis): ?>
                        <option value="<?= $wis->id_kategori; ?>"><?= $wis->isi; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <?php echo form_error('kategori','<span class="text-small text-danger">','</span>') ?>
                    </div>

                    <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="keterangan" name="keterangan" class="form-control" required>
                    <?php echo form_error('keterangan','<span class="text-small text-danger">','</span>') ?>

                    </div>
                  
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php $no = 0 ;
      foreach ($wisata as $cs) : $no++;
?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $cs->id_objek_wisata ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url('admin/tempatwisata/update_wisata_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                            <label for="nama_wisata" class="form-label">Nama Wisata</label>
                            <input type="hidden" name="id_objek_wisata" value="<?php echo $cs->id_objek_wisata ?>">
                            <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" value="<?php echo $cs->nama_wisata ?>">
                            <?php echo form_error('nama_wisata','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    
                            <div class="mb-3">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" value="<?php echo $cs->foto ?>" >
                                <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                            </div>
                        
                    <div class="mb-3">
                        <label>Link Maps</label>
                        <input type="link_maps" name="link_maps" class="form-control" value="<?php echo $cs->link_maps ?>" >
                        <?php echo form_error('link_maps','<span class="text-small text-danger">','</span>') ?>

                    </div>
                    <div class="mb-3">
                        <label>Maps</label>
                        <input type="maps" name="maps" class="form-control" value="<?php echo $cs->maps ?>" >
                        <?php echo form_error('maps','<span class="text-small text-danger">','</span>') ?>

                    </div>

                    <div class="mb-3">
                    <label>Kategori</label>

                    <select name="isi" id="isi" class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <?php foreach ($kategori as $kategoriItem): ?>
                            <option value="<?= $kategoriItem->id_kategori; ?>" <?php echo ($cs->id_kategori == $kategoriItem->id_kategori) ? 'selected' : ''; ?>>
                                <?= $kategoriItem->isi; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                    <?php echo form_error('kategori','<span class="text-small text-danger">','</span>') ?>
                </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="keterangan" name="keterangan" class="form-control" value="<?php echo $cs->keterangan ?>" >
                        <?php echo form_error('keterangan','<span class="text-small text-danger">','</span>') ?>

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

