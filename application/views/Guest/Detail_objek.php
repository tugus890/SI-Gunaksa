<style>
  
  
.img-fluid-jpg{
  width: 500px;
  height: 500px;

  
}

</style>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

          <div class="col-2 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">
                  <img src="<?= base_url('assets/') ?>images/logo.png" alt="Image" class="img-fluid" width="300">
                </a>
              </div>
              
            </div>


            <div class="col-3 ">
              <div class="site-logo">
                <h4>Sistem Informasi Wisata Desa Gunaksa </h4>
              </div>
              
            </div>


            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              
              <?php $this->session->flashdata('pesan');
      ?>

              
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <span class="d-block mb-3 text-white" data-aos="fade-up">Objek Wisata <span class="mx-2 text-primary">&bullet;</span> Desa Gunaksa</span>
                <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">
                  <?php foreach ($detail as $det ) : ?>
               Objek Wisata <br> <?=ucwords($det->nama_wisata); ?>
               <?php endforeach; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <!-- ini yg bawah bagian tambahan -->
         <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <span class="backdrop">Story</span>
              <span class="subtitle-39191">Discover Story</span>
              <h3> <?php foreach ($detail as $det ) : ?>
               Keterangan <?=ucwords($det->nama_wisata); ?>
             </h3>
            </div>
            <p><?= $det->keterangan;?> </p>
            <div class= "row ml-1">
            <a href="<?= $det->maps?>" target="_blank" class="btn btn-primary btn-md text-white" rel="noopener noreferrer">Lokasi Maps</a>
            <a href="<?= base_url('guest/objek');?>"  class="btn btn-primary btn-md text-white ml-2" rel="noopener noreferrer">Kembali</a>
          </div>
          </div>

          <div class="col-md-2">

          </div>

          <div class="col-md-4" data-aos="fade-right">
            <img src="<?php echo base_url() . 'assets/upload/' . $det->foto ?>" alt="Image" class="img-fluid-jpg">
          </div>
        </div>
      </div>
    </div>
    <div class="site-section">
    <?php endforeach; ?>

<!-- ini untuk bagian comment dibawah -->
            <div class="pt-5">
              <h3 class="mb-5"><?php foreach ($total_komen as $kom ) :
              ?>
              <?= $kom->total_acc_reviews ?> Comments</h3>  <?php endforeach; ?>

              <ul class="comment-list">
              <?php foreach ($komen as $talk ) : ?>
              <?php if ($talk->isi != null) : ?>
        <li class="comment">
            <div class="vcard bio">
                <img src="images/person_2.jpg" alt="Image">
            </div>
            <div class="comment-body">
                <h3><?= $talk->nama ?></h3>
                <div class="meta"><?= $talk->tanggal ?></div>
                <p><?= $talk->isi ?></p>
                <!-- <?php var_dump($talk) ?> -->

                <div class="rate reply mb-6">
                <input type="radio" id="star5_comment_<?= $talk->idtb_review ?>" name="rate_<?= $talk->idtb_review ?>" value="5" <?php if ($talk->rating == 5) echo 'checked' ?> disabled />
                <label for="star5_comment_<?= $talk->idtb_review ?>" title="text">5 stars</label>
                <input type="radio" id="star4_comment_<?= $talk->idtb_review ?>" name="rate_<?= $talk->idtb_review ?>" value="4" <?php if ($talk->rating == 4) echo 'checked' ?> disabled />
                <label for="star4_comment_<?= $talk->idtb_review ?>" title="text">4 stars</label>
                <input type="radio" id="star3_comment_<?= $talk->idtb_review ?>" name="rate_<?= $talk->idtb_review ?>" value="3" <?php if ($talk->rating == 3) echo 'checked' ?> disabled />
                <label for="star3_comment_<?= $talk->idtb_review ?>" title="text">3 stars</label>
                <input type="radio" id="star2_comment_<?= $talk->idtb_review ?>" name="rate_<?= $talk->idtb_review ?>" value="2" <?php if ($talk->rating == 2) echo 'checked' ?> disabled />
                <label for="star2_comment_<?= $talk->idtb_review ?>" title="text">2 stars</label>
                <input type="radio" id="star1_comment_<?= $talk->idtb_review ?>" name="rate_<?= $talk->idtb_review ?>" value="1" <?php if ($talk->rating == 1) echo 'checked' ?> disabled />
                <label for="star1_comment_<?= $talk->idtb_review ?>" title="text">1 star</label>
            </div>

        <?php endif; ?>

            </div>
            
        </li>


        <?php endforeach; ?>

              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="<?= base_url('Guest/objek/insert_review') ?>" method="post" class="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <?php foreach ($detail as $det ) : ?>
                    <input type="hidden" name="id_objek_wisata" value="<?= $det->id_objek_wisata ?>">
                    <?php endforeach; ?>
                    <input type="text" name="nama" class="form-control" id="name">
                  </div>
                  
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" class="form-control"></textarea>
                    
                  </div>
                 <div class="rate">
                 <header>How was your experience?</header>   
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
                 <br>

                  <div class="form-group">
                  </div>
                  <br>
                  <div class="form-group mt-3">
                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                  </div>
                  
                </form>
              </div>
            </div>

          </div>
            </div>
          </div>
        </div>
      </div>
    </div>