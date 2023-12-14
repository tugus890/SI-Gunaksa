<style>
/* CSS untuk latar belakang putih */
        /* CSS untuk latar belakang putih */
        body.loader {
            background-color: white;
        }

        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .listing-item {
  background-color: transparent;
  
  perspective: 1000px;
}

.listing-image {
  position: relative;
  width: 400px;
  height: 400px;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.listing-item:hover .listing-image {
  transform: rotateY(180deg);
}

.listing-image-front, .flip-card-back {

  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  
}

.listing-image-front {
  width: 100%;
  height: 100%;
  position: absolute;
  background-color: #bbb;
  color: black;
}

.flip-card-back {
    background-color: #2980b9;
    color: white;
    width: 100%;
    height: 100%;
    transform: rotateY(180deg);
  }

  .flip-card-back iframe {
    width: 100%;
    height: 100%;
  }
</style>

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


            <div class="col-7  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li ><a href="<?= base_url('Landingpage/index')?>" class="nav-link">Home</a></li>
                  <li class="active"><a href="<?= base_url('guest/objek/index')?>" class="nav-link">Objek</a></li>
                  <li><a href="<?= base_url('guest/paket/index')?>" class="nav-link">Paket</a></li>
                  <li><a href="http://localhost/newsgunaksa/news" target="_blank"class="nav-link">News</a></li>
                  <li><a href="<?= base_url('auth/login')  ?>" class="nav-link">Log In Admin</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
<div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-5" data-aos="fade-up">
            <?php foreach ($kategori as $car ) : ?>
              <h1 class="mb-3 text-white">Objek Wisata Desa Gunaksa Kategori <?= $car->isi?></h1>
              

              <p>List Objek Wisata Desa Gunaksa Kategori <?= $car->isi ?></p>

              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->session->flashdata('pesan');
      ?>

    <div class="site-section">

      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-7">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Objek Kami</span>
              <span class="subtitle-39191">Objek Kami</span>
              <h3>Wisata Anda Prioritas Kami</h3>

               <form action="<?= base_url('guest/objek/cari_kategori') ?>" class="d-flex" class="subscribe" method="post" ectype="multipart/form-data">
                <select id="kategori" name="kategori" class=" ml-4 mr-3 mt-3" style="width: 600px;">
                <option value="">Pilih</option> 
                <option value="all">All</option> 
                <?php foreach ($cari as $car ) : ?>
                  <option value="<?= $car->id_kategori ?>">Wisata <?= ucwords($car->isi) ?></option> 
                  <?php endforeach;  ?>
                </select>
                <input type="submit" value="Cari" class="btn btn-primary mt-3">
                </form>
            </div>
          </div>
        </div>
        
         
        <div class="row">
        <?php foreach ($objek as $ob ) : ?>

          <div class="col-lg-4 col-md-6 mb-4 mt-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <div class="listing-image-front">
                <img  src="<?php echo base_url() . 'assets/upload/' . $ob->foto ?>" alt="Image" class="img-fluid">      
 
                </div>
                   <div class="flip-card-back">
             
                      <h4 class="title" style="text-align:center"><a href="<?= $ob->maps  ?>">Wisata Bukit Belong</a></h4>
                      <iframe src="https://www.google.com/maps/d/embed?<?=$ob->link_maps ?>">Wisata Bukit Belong</a></iframe>
         
                   </div>
              </div>
              <div class="listing-item-content" >
                <h2 class="mt-2"><?= ucwords($ob->nama_wisata) ?></h2>
                <a class="px-3 mt-2 category bg-primary"  href="<?= base_url('Guest/Objek/detail_objek/').$ob->id_objek_wisata ?>">Lihat Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$390.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Consectetur adipisicing</a></h2>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$180.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Temporibus aperiam</a></h2>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/img_4.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$600.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Expedita fugiat</a></h2>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/img_5.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$330.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Consectetur adipisicing</a></h2>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/img_6.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$450.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Consectetur Amet</a></h2>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>




    
