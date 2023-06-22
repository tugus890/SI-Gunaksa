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

                            <!-- Button trigger modal -->
                            <div class="button_tambah" style="float: right;">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalfaq">
                                    Tambah
                                </button>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($faq as $item) :  ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $item->pertanyaan ?></td>
                                                <td><?php echo $item->jawaban ?></td>
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 60px; font-size: 12px;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $item->id_faq ?>"  >
                                                            EDIT
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 60px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/data_faq/delete_faq/').$item->id_faq ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                            DELETE
                                                        </a>
                                                    </div>
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
<div class="modal fade" id="modalfaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data FAQ</h1>
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
                <form action="<?= base_url('admin/data_faq/tambah_faq_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" required>
                        <?php echo form_error('pertanyaan','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="mb-3">
                        <label for="jawaban" class="form-label">Jawaban</label>
                        <input type="text" name="jawaban" class="form-control" id="jawaban" required>
                        <?php echo form_error('jawaban','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php foreach ($faq as $item) : ?>
<!-- Modal Edit-->
<div class="modal fade" id="editmodal<?php echo $item->id_faq ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data FAQ</h1>
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
                <form action="<?= base_url('admin/data_faq/update_faq_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="hidden" name="id_faq" value="<?php echo $item->id_faq; ?>">
                        <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" value="<?php echo $item->pertanyaan ?>">
                        <?php echo form_error('pertanyaan','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="mb-3">
                        <label for="jawaban" class="form-label">Jawaban</label>
                        <input type="text" name="jawaban" class="form-control" id="jawaban" value="<?php echo $item->jawaban ?>">
                        <?php echo form_error('jawaban','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</div>
</div>
