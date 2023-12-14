
<style>

.rate {
    float: left;
    height: 50px;
    padding: 0 10px;
}

.rate>input {
    display: none;
}

.rate>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: default;
    font-size: 20px;
    color: #ccc;
}

.rate>label:before {
    content: '★ ';
}

.rate>input:checked~label {
    color: #ffc700;
}

.rate>label:hover,
.rate>label:hover~label {
    color: #deb217;
}

.rate>input:checked+label:hover,
.rate>input:checked+label:hover~label,
.rate>input:checked~label:hover,
.rate>input:checked~label:hover~label,
.rate>label:hover~input:checked~label {
    color: #c59b08;
} </style>

<div class="content-wrapper mt-4">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Data Review</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Review <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
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
                          
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
        		                        <th>Nama Reviewer</th>
        		                        <th>Tanggal</th>
        		                        <th>Isi</th>
                                        <th>Rating</th>
                                        <th>Kategori Berita</th>
                                        <th>Status</th>
        		                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment(4) + 1;
                                        foreach ($review as $cs) :  ?>
                                            <tr>
                                              
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $cs->nama ?></td>
                                            <td><?php echo $cs->tanggal ?></td>
                                            <td><?php echo $cs->isi ?></td>
                                            <td>  <div class="rate">
                                                    <input type="radio" id="star5_comment_<?= $cs->idtb_review ?>" name="rate_<?= $cs->idtb_review ?>" value="5" <?php if ($cs->rating == 5) echo 'checked' ?> disabled />
                                                    <label for="star5_comment_<?= $cs->idtb_review ?>" title="text">5 stars</label>
                                                    <input type="radio" id="star4_comment_<?= $cs->idtb_review ?>" name="rate_<?= $cs->idtb_review ?>" value="4" <?php if ($cs->rating == 4) echo 'checked' ?> disabled />
                                                    <label for="star4_comment_<?= $cs->idtb_review ?>" title="text">4 stars</label>
                                                    <input type="radio" id="star3_comment_<?= $cs->idtb_review ?>" name="rate_<?= $cs->idtb_review ?>" value="3" <?php if ($cs->rating == 3) echo 'checked' ?> disabled />
                                                    <label for="star3_comment_<?= $cs->idtb_review ?>" title="text">3 stars</label>
                                                    <input type="radio" id="star2_comment_<?= $cs->idtb_review ?>" name="rate_<?= $cs->idtb_review ?>" value="2" <?php if ($cs->rating == 2) echo 'checked' ?> disabled />
                                                    <label for="star2_comment_<?= $cs->idtb_review ?>" title="text">2 stars</label>
                                                    <input type="radio" id="star1_comment_<?= $cs->idtb_review ?>" name="rate_<?= $cs->idtb_review ?>" value="1" <?php if ($cs->rating == 1) echo 'checked' ?> disabled />
                                                    <label for="star1_comment_<?= $cs->idtb_review ?>" title="text">1 star</label>
                                                </div>

                                        
                                            </td>
                                            <td>
                                                    <?php
                                                    $id = $cs->id_objek_wisata;
                                                    $id_berita = $cs->id_berita;

                                                    $objek = $this->db->query("SELECT tb_objek_wisata.nama_wisata, tb_objek_wisata.id_objek_wisata FROM tb_review inner join tb_objek_wisata on tb_review.idtb_review = tb_review.idtb_review WHERE tb_review.id_objek_wisata='$id'")->row();
                                                    $berita = $this->db->query("SELECT judul, id_berita FROM berita WHERE id_berita='$id_berita'")->row();


                                                    if ($cs->id_objek_wisata != null) {
                                                        echo 'Kategori Objek Wisata ' . ucwords($objek->nama_wisata);
                                                    }else {
                                                        echo 'Kategori Berita Wisata ' . ucwords($berita->judul);
                                                    }?>
                                            </td>

                                            <td>
                                                <?php if ($cs->acc== null){
                                                    echo '<a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-warning btn-xs"  >Pending</a>';
                                    
                                                    }else if ($cs->acc=='y'){
                                                        echo '<a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-success btn-xs"  >Disetujui</a>';
                                
                                                } else{
                                                    echo '<a  type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs"  >Ditolak</a>';

                                                }?>
                                                </td>
                                                <td>
                                                    <div class="button_edits">
                                                        <a  type="button" style="width: 100px; font-size: 12px;" class="btn btn-success btn-xs" href="<?= base_url('admin/data_review/disetujui_review/').$cs->idtb_review ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menyetujui Review ?')"   >
                                                            Disetujui
                                                        </a>
                                                    </div>
                                                    <div class="button_delete">
                                                        <a type="button" style="width: 100px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/data_review/ditolak_review/').$cs->idtb_review ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menolak Review ?')">
                                                            Ditolak
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
