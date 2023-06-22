<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 grid-margin">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h2> Profil Saya</h2>
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

                          <form action="<?= base_url('admin/setting/update_setting_aksi') ?>" method="POST" enctype="multipart/form-data">

                                <div class="col-8 mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="hidden" name="id_user" class= "form-control" value="<?= $this->session->userdata('id_user') ?>">  </input>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?=  $this->session->userdata('nama');?>">
                                    <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                                </div>

                                <div class="col-8 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?=  $this->session->userdata('email');?>">
                                    <?php echo form_error('email','<div class="text-small text-danger">','</div>') ?>
                                </div>
                                <br>
                                <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

