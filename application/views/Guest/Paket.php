<style>
  .btn-primary {
    font-size: 12px;
    display: inline-block;
    padding: 5px 30px;
    background: #efba6c;
    border-radius: 30px;
    color: #fff;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: #212529;
    background-color: #efba6c;
    border-color: #efba6c;
}
p.keterangan{
  max-width: 300px;
  display : -webkit-box;
  -webkit-line-clamp: 5;
  -webkit-box-orient: vertical;
  overflow: hidden;

  
}

.listing-image {
  position: relative;
  width: 400px;
  max-height: 800px;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

  .post-entry-1 img {
    width: 400px; /* Set your desired width */
    height: 550px; /* Set your desired height */
    object-fit: cover; /* This ensures the image covers the entire space while maintaining its aspect ratio */
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
                  <li ><a href="<?= base_url('guest/objek/index')?>" class="nav-link">Objek</a></li>
                  <li class="active"><a href="<?= base_url('guest/paket/index')?>" class="nav-link">Paket</a></li>
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
              <h1 class="mb-3 text-white">Paket Wisata</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-10">
            <div class="heading-39101 mb-5"><br>
              <span class="backdrop text-center">Paket Wisata</span>
              <span class="subtitle-39191">Paket Wisata</span>
              <h3>Paket Yang Kami tawarkan</h3>
            </div>
          </div>
        </div>
        <div class="row">
        <?php foreach ($paket as $cs) :  
          
          ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">

                <img src=<?= base_url('assets/upload/'). $cs->foto ?> class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a><?php echo $cs->nama_paket ?></a></h2>
                <?php if($cs->diskon == null || $cs->diskon == 0) {?>
                <span class="meta d-inline-block mb-3" style="color: black;">Price <span class="mx-2">:</span> <a style="color : #efba6c;"><?php echo $cs->harga ?></a></span>
                <?php }else{  ?>
                  <span class="meta d-inline-block mb-3" >Price <span class="mx-2">:</span> <a style="text-decoration: line-through; color: #efba6c;"><?php echo $cs->harga ?></a> <span style="color: red;" class="meta d-inline-block mb-3"><?php $potongan = (($cs->diskon / $cs->harga)* 100); echo intval($potongan);?>% OFF!!</span><br>
                  <span style="color: black;" class="meta d-inline-block mb-3">Price<span class="mx-2">:</span> <a style="color: #efba6c;"><?php $harga = ($cs->harga-$cs->diskon);  echo $harga?></a></span>                  <?php } ?>


                <!-- <p style="color: black;" class="keterangan"><?php echo $cs->keterangan ?></p> -->
                <br>
                <a  class="mb-3 btn-primary"  href="<?php echo base_url('guest/paket/list/').$cs->id_paket_wisata ?>">Lihat Detail</a>
              </div>
            </div>
          </div>
        
        <?php endforeach ?>
        <br>

        
        <div class="col-12 mt-5 text-center">
        <?php echo $links ?>
        
          <!-- <a href="#" class="p-3"></a> -->
        </div>
        <!-- <div class="col-12 mt-5 text-center">
          <span class="p-3">1</span>
          <a href="#" class="p-3">2</a>
          <a href="#" class="p-3">3</a>
          <a href="#" class="p-3">4</a>
        </div> -->
        
      </div>
      <br>
    </div> <!-- END .site-section -->