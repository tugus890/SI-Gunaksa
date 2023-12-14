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
  width: 100%;
  height: 100%;
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
  transform: rotateY(180deg);
}

#play-pause-button {
    width: 50px;
    height: 50px;
    position: fixed;
    bottom: 0%; /* Sesuaikan dengan posisi vertikal yang diinginkan */
    right: 10px; /* Sesuaikan dengan posisi horizontal yang diinginkan */
    transform: translateY(-50%); /* Untuk mengatur tombol ke tengah vertikal */
    z-index: 8888;
}

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
    font-size: 30px;
    color: #fff706; /* Warna kuning */
}

.rate>input:checked~label {
    color: #fff706; /* Warna kuning */
}

.rate>label:hover,
.rate>label:hover~label {
    color: #deb217; /* Warna kuning terang */
}

.rate>input:checked+label:hover,
.rate>input:checked+label:hover~label,
.rate>input:checked~label:hover,
.rate>input:checked~label:hover~label,
.rate>label:hover~input:checked~label {
    color: #fff706; /* Warna kuning gelap */
}



.post-entry-1 img {
    width: 400px; /* Set your desired width */
    height: 550px; /* Set your desired height */
    object-fit: cover; /* This ensures the image covers the entire space while maintaining its aspect ratio */
  }

    </style>
  <script>
       // Tampilkan konten dengan efek fade-in setelah loader berhenti
setTimeout(function () {
    loader.style.display = 'none'; // Sembunyikan loader
    body.classList.remove('loading'); // Hapus kelas 'loading' dari body

    // Dapatkan elemen konten yang ingin dimuat dengan efek fade-in

    // Set opacity ke 1 untuk memunculkan konten dengan efek fade-in
    content.style.opacity = '1';
}, 2000); // Ganti angka 2000 dengan durasi yang sesuai (dalam milidetik)



    </script>





<div id="loader">
        <img src="<?= base_url('assets/') ?>images/loader.gif" alt="Loading...">
    </div>


   

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">



 <audio id="music" autoplay loop>
  <source  src="<?= base_url('assets/') ?>audio/gusteja.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>


<!-- script untuk music dibawah -->

<script>
    const music = document.getElementById("music");
    document.addEventListener("DOMContentLoaded", function () {
        const playPauseButton = document.getElementById("play-pause-button");
        playPauseButton.addEventListener("click", () => {
            if (music.paused) {
                music.play();
                playPauseButton.src = "<?= base_url('assets/') ?>images/play.png"; // Ganti dengan path gambar pause
            } else {
                music.pause();
                playPauseButton.src = "<?= base_url('assets/') ?>images/pause.png"; // Ganti dengan path gambar play
            }
        });
    });
</script>

<!-- end script untuk music -->

<div id="music-controls">
    <img id="play-pause-button" src="<?= base_url('assets/') ?>images/play.png" alt="Play">
</div>


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
                  <li class="active"><a href="<?= base_url('Landingpage/index')?>" class="nav-link">Home</a></li>
                  <li><a href="<?= base_url('guest/objek/index')?>" class="nav-link">Objek</a></li>
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
      <div class="site-section-cover overlay" style="background-image: url('<?= base_url('assets/') ?>images/bukitbelong.gif')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5" data-aos="fade-right">
              <h1 class="mb-3 text-primary">Let's Enjoy The Wonders of Nature</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
              <p class="d-flex align-items-center">
                <a href="https://www.youtube.com/watch?v=Zz62w4FyoGg" data-fancybox class="play-btn-39282 mr-3"><span class="icon-play"></span></a> 
                <span class="small">Watch the video</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <span class="backdrop">Story</span>
              <span class="subtitle-39191">Discover Story</span>
              <h3>Tentang Desa Gunaksa</h3>
            </div>
            <p>Desa Gunaksa merupakan sebuah desa yang terdapat di kabupaten Klungkung. Desa Gunaksa adalah destinasi pariwisata yang menawan di Indonesia dengan keindahan alam dan warisan budayanya. </p>
            <p>Desa Gunaksa adalah pusat desa wisata maju dimasa depan dengan pembangunan pusat kebudayaan bali di kawasan wilayah desa</p>
          </div>

          <div class="col-md-2">

          </div>

          <div class="col-md-4" data-aos="fade-right">
            <img src="<?= base_url('assets/') ?>images/logo.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <div class="site-section">

      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-7">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Wisata Kami</span>
              <span class="subtitle-39191">Wisata Kami</span>
              <h3>Mari Berwisata Di Gunaksa</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($objek as $ob ) :  ?>
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <div class="listing-image-front">
                <img src="<?= base_url('assets/upload/' . $ob->foto) ?>" alt="Image" class="img-fluid">
                </div>
                   <div class="flip-card-back">
             
                      <h4 class="title" style="text-align:center"><a href="<?= $ob->maps ?>"><?=$ob->nama_wisata?></a></h4>
                      <iframe src="https://www.google.com/maps/d/embed?<?= $ob->link_maps ?>" width="100%" height="400px"></iframe>
         
                   </div>
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" target="_blank" href="<?= $ob->maps ?>">Lihat Peta</a>
                <h2 class="mb-1"><?=$ob->nama_wisata?></h2>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <img src="<?= base_url('assets/') ?>images/img_2.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$390.00</a>
                <h2 class="mb-1"><a href="trip-single.html">Consectetur adipisicing</a></h2>
              </div>
            </div>
          </div> -->


        </div>
            <div class="justify-content-center text-center" >
              <a href="<?= base_url('guest/objek')  ?>" class="btn btn-primary">More Detail</a>
            </div>
      </div>
      
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up">
            <div class="heading-39101 mb-5"><br>
              <span class="backdrop text-center">Paket Wisata</span>
              <span class="subtitle-39191">Paket Wisata</span>
              <h3>Paket Yang Kami tawarkan</h3>
            </div>
          </div>
        <div class="row">
        <?php foreach ($paket as $cs) :  
          
          ?>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
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
              </div>
            </div>
            
          </div>
        
        <?php endforeach ?>
      </div>
            <div class="justify-content-center text-center" >
              <a href="<?= base_url('guest/paket')  ?>" class="btn btn-primary">More Detail</a>
            </div>
      </div>
      
    </div>

    <div class="site-section">

      <div class="container">

        <div class="row justify-content-center text-center">
          <div class="col-md-10">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Testimonials</span>
              <span class="subtitle-39191">Testimony</span>
              <h3>Happy Customers</h3>
            </div>
          </div>
        </div>

        <div class="owl-carousel slide-one-item">
    <?php foreach ($review as $rev) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial-39191 d-flex">
                    <div class="mr-4">
                        <img src="<?= base_url('assets/') ?>images/logo.png" alt="Image" class="img-fluid" style="width: 100px;">
                    </div>
                    <div>
                        <blockquote>&ldquo; <?= $rev->isi; ?> &rdquo;</blockquote>
                        <p>&mdash; <?= $rev->nama ?></p> <br>
                        <div class="rate">
                            <label for="star5_comment_<?= $rev->idtb_review ?>" title="text">5 stars</label>
                            <input type="radio" name="rate_<?= $rev->idtb_review ?>" value="4" <?php if ($rev->rating == 4) echo 'checked' ?> disabled />
                            <label for="star4_comment_<?= $rev->idtb_review ?>" title="text">4 stars</label>
                            <input type="radio" name="rate_<?= $rev->idtb_review ?>" value="3" <?php if ($rev->rating == 3) echo 'checked' ?> disabled />
                            <label for="star3_comment_<?= $rev->idtb_review ?>" title="text">3 stars</label>
                            <input type="radio" name="rate_<?= $rev->idtb_review ?>" value="2" <?php if ($rev->rating == 2) echo 'checked' ?> disabled />
                            <label for="star2_comment_<?= $rev->idtb_review ?>" title="text">2 stars</label>
                            <input type="radio" name="rate_<?= $rev->idtb_review ?>" value="1" <?php if ($rev->rating == 1) echo 'checked' ?> disabled />
                            <label for="star1_comment_<?= $rev->idtb_review ?>" title="text">1 star</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




            

          </div>

        </div>

      </div>
    </div>


    
    

    <div class="site-section bg-image overlay" style="background-image: url('<?= base_url('assets/') ?>images/hero_1.jpg')">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-bold text-white">Join and Trip With Us And View Our Tourism News</h2> <br>
            <!-- <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus ut, doloremque quo molestiae nesciunt officiis veniam, beatae dignissimos!</p> -->
            <p class="mb-0"><a href="http://localhost/newsgunaksa/news" class="btn btn-primary text-white py-3 px-4">Our Tourism News</a></p>
          </div>
        </div>
      </div>
    </div>
