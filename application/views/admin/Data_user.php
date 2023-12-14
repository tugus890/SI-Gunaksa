<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Data User</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data User <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
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
        		                        <th>Nama</th>
        		                        <th>Email</th>
        		                        <th>Password</th>
                                        <th>Role</th>
        		                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment(4) + 1;
                                        foreach ($user as $cs) :  ?>
                                            <tr>
                                              
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $cs->nama ?></td>
                                            <td><?php echo $cs->email ?></td>
                                            <td><?php echo $cs->password ?></td>
                                            <td>
                                                <?php if ($cs->role==1){
                                                    echo 'Admin';
                                                   
                                                    }elseif ($cs->role==3){
                                                    echo 'Pimpinan';
                                
                                                } ?>
                                                </td>

                                                <td><?php if($cs->foto != null) {
                                                        echo "<img src='" . base_url('assets/upload/') . $cs->foto . "'width='200'''>";
                                            }else echo "<img src='" . base_url('assets/images/') . 'logo.png' . "'width=200''>";
                                                
                                            ?> </td>
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editmodal<?php echo $cs->id_user ?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/data_user/delete_user/').$cs->id_user ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
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
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</h5>
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
                <form action="<?= base_url('admin/data_user/tambah_user_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama User</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                        <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                    </div>
                   
                    <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <?php echo form_error('email','<span class="text-small text-danger">','</span>') ?>
                            
                    </div>
                    
                    <div class="mb-3">
                            <label>Level User</label>
                            <select class="form-control" name="role" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="1">Admin</option>
                                <option value="2">Pimpinan</option>
                            </select>
                            <?php echo form_error('role','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>

                    <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <?php echo form_error('password','<span class="text-small text-danger">','</span>') ?>

                    </div>

                    <div class="mb-3">
                        <label>Foto *maks 2MB(jpg,jpeg,png)</label>
                        <input type="file" name="foto" class="form-control" required>
                        <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                        
                    </div>
                  
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $no = 0 ;
      foreach ($user as $cs) : $no++;
?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $cs->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                <form action="<?= base_url('admin/data_user/update_user_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                            <label for="nama" class="form-label">Nama User</label>
                            <input type="hidden" name="id_user" value="<?php echo $cs->id_user; ?>">
                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $cs->nama ?>">
                            <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $cs->email ?>" disabled>
                                <?php echo form_error('email','<span class="text-small text-danger">','</span>') ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Level User</label>
                                <select class="form-control" name="role">
                                    <option value="1" <?php if($cs->role == '1') echo ' selected="selected"'; ?>>Admin</option>
                                    <option value="2" <?php if($cs->role == '2') echo ' selected="selected"'; ?>>Pimpinan</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $cs->email ?>" readonly>
                        <?php echo form_error('password','<span class="text-small text-danger">','</span>') ?>

                    </div>
                    <div class="mb-3">
                        <label>Foto *maks 2MB</label>
                        <input type="file" name="foto" class="form-control" value="<?= $cs->foto ?>">
                        <?php echo form_error('foto','<span class="text-small text-danger">','</span>') ?>
                        
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

