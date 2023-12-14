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
                  <li><a href="<?= base_url('')?>" class="nav-link">Home</a></li>
                  <li><a href="<?= base_url('guest/objek/index')?>" class="nav-link">Objek</a></li>
                  <li class="active"><a href="<?= base_url('guest/paket/index')?>" class="nav-link">Paket</a></li>
                  <li><a href="blog.html" class="nav-link">News</a></li>
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
              <h1 class="mb-3 text-white"><?php foreach ($paket as $det ) : ?>
               Paket Wisata <br> <?=ucwords($det->nama_paket); ?>
               <?php endforeach; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- 
    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <span class="backdrop">Story</span>
              <span class="subtitle-39191">Discover Story</span>
              <h3>Our Story</h3>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quae expedita fugiat quo incidunt, possimus temporibus aperiam eum, quaerat sapiente.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis enim a pariatur molestiae.</p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="images/traveler.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div> -->

   

    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5 order-2 ml-auto">
            <div class="heading-39101 mb-5">
              <span class="backdrop">Our Paket</span>
              <span class="subtitle-39191">Our Paket</span>
              <h3>Keterangan</h3>
            </div>
            <?php foreach ($paket as $det ) : ?>
              <span class="meta d-inline-block mb-3" style="color: black;">Nama Pemilik <span class="mx-2">:</span> <a style="color : #efba6c;"><?php echo $det->nama_pemilik ?></a></span>
              <span class="meta d-inline-block mb-3" style="color: black;">Nama Paket <span class="mx-2">:</span> <a style="color : #efba6c;"><?php echo $det->nama_paket ?></a></span><br>

            <?php if($det->diskon == null || $det->diskon == 0) {?>
                <span class="meta d-inline-block mb-3" style="color: black;">Price <span class="mx-2">:</span> <a style="color : #efba6c;">Rp. <?php echo $det->harga ?></a></span><br>
                <span class="meta d-inline-block mb-3" style="color: black;">Diskon <span class="mx-2">:</span> <a style="color : #efba6c;">- </a></span>
                <?php }else{  ?>
                  <span  class="meta d-inline-block mb-3" >Price <span class="mx-2">:</span> <a style="text-decoration: line-through; color: #efba6c;"><?php echo $det->harga ?></a> <a style="color: #efba6c;"><?php $harga = ($det->harga-$det->diskon);  echo $harga  ?> </a><span style="color: red;" class="meta d-inline-block mb-3"><?php $potongan = (($det->diskon / $det->harga)* 100); echo intval($potongan);?>% OFF!!</span><br>
                  <span style="color: black;" class="meta d-inline-block mb-3">Diskon<span class="mx-2">:</span> <a style="color: #efba6c;"><?= $det->diskon  ?></a></span>     <?php } ?>
                  
                  <br>
                  <span class="meta d-inline-block mb-3" style="color: black;">No Tlp <span class="mx-2">:</span> <a style="color : #efba6c;"><?php echo $det->no_tlp ?> </a></span>

                  <br>
                  <span class="meta d-inline-block mb-3" style="color: black;">Alamat <span class="mx-2">:</span> <a style="color : #efba6c;"><?php echo $det->alamat ?> </a></span>


            <p><?php echo $det->keterangan ?></p><br>

            <p style="color : #efba6c;">Social Media :</p>
            
            <div class="row">
            <?php if ( !$det->ig == null){   ?>
            <div class=" gal_col">
              <a href="<?= $det->ig  ?>"><img src="<?= base_url('assets/') ?>images/ig_logo.png" alt="Image" class="img-fluid" width="30"></a>
            </div>
            <?php } 
            if ( !$det->yt == null){?>
            <div class=" gal_col">
              <a href="<?= $det->yt ?>"><img src="<?= base_url('assets/') ?>images/ytb_logo.png" alt="Image" class="img-fluid" width="30"></a>
            </div>
            <?php } 

            if ( !$det->tiktok == null){?>

            <div class=" gal_col">
              <a href="<?= $det->tiktok ?>"><img src="<?= base_url('assets/') ?>images/tiktok_logo.png" alt="Image" class="img-fluid" width="30"></a>
            </div>
            <?php }
            

            if ( !$det->twitter == null){?>
            <div class=" gal_col">
              <a href="<?= $det->twitter ?>"><img src="<?= base_url('assets/') ?>images/x_logo.png" alt="Image" class="img-fluid" width="30"></a>
            </div>
            <?php  }            
           if ( !$det->no_tlp == null){?>
            <div class=" gal_col">
            <a target="_blank" href="https://wa.me/<?=$det->no_tlp ?>"><img src="<?= base_url('assets/t_a/') ?>img/whatsapp.png" alt="Image" class="img-fluid" width="30"></a>
            </div>
            <?php }?>
            

          </div>
          <br>
          <?php if (!$det->link == null){ ?>
          <p>Paket Terdapat Juga Di Website : <a target="_blank" href="<?= $det->link ?>" >Klik Di Sini!</a></p>
          <?php } ?>

          </div>
          <div class="col-md-6 order-1" data-aos="fade-left">
            <?php if(!$det->foto == null ){ ?>
            <img src="<?=base_url('assets/upload/').$det->foto  ?>" alt="Image" class="img-fluid">
            <?php } else { ?>
           <img src="<?=base_url('assets/upload/logo.png')  ?>" alt="Image" class="img-fluid">
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
<?php endforeach ?>
  
