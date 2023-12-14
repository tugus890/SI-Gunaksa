<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-10 grid-margin">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-primary"> Change Password</h2>
                            <hr>
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

                            <!-- Button trigger modal -->
                            
                            <?php echo $this->session->flashdata('pesan') ?>

                          <form action="<?= base_url('auth/ganti_password_aksi') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-8 mb-3">
                                    <label for="pass_lama" class="form-label">Password Lama</label>
                                    <input type="hidden" name="id_user" class= "form-control" value="<?= $this->session->userdata('id_user') ?>">  </input>
                                    <input type="password" name="pass_lama" class="form-control" id="pass_lama" >
                                    <?php echo form_error('pass_lama','<div class="text-small text-danger">','</div>') ?>
                                </div>

                                <div class="col-8 mb-3">
                                    <label for="pass_baru" class="form-label">Password Baru</label>
                                    <input type="hidden" name="id_user" class= "form-control" >  </input>
                                    <input type="password" name="pass_baru" class="form-control" id="pass_baru" >
                                    <?php echo form_error('pass_baru','<div class="text-small text-danger">','</div>') ?>
                                </div>

                                <div class="col-8 mb-3">
                                    <label for="ulang_pass" class="form-label">Konfirmasi Password</label>
                                    <input type="hidden" name="id_user" class= "form-control" >  </input>
                                    <input type="password" name="ulang_pass" class="form-control" id="ulang_pass" >
                                    <?php echo form_error('ulang_pass','<div class="text-small text-danger">','</div>') ?>
                                </div>

                                <br>
                                
                                <a class="btn btn-danger mt-1 " href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                                <button type="submit" name="edit" class="btn btn-primary mt-3">Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

