
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
            <a href="<?php echo base_url() ?>">
                <img src="<?= base_url('assets/') ?>images/logo.png" alt="IMG">
            </a>
            </div>
		
            <?php $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('auth/reset_password')?>" method="POST" class="login100-form validate-form" enctype="multipart/form-data">
                <?= $this->session->flashdata('pesan'); ?>

                <span class="login100-form-title">
                    Kode Verifikasi
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid Code is required: ex@abc.xyz">
                    <input type="hidden" name="email"  value="<?= $email ?>">
                    <input class="input100" type="text" name="verification_code" placeholder="Masukkan Verifikasi Kode">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Valid Code is required: ex@abc.xyz">
                    <input class="input100" type="text" name="new_password" placeholder="Masukkan Password Baru">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Kirim Kode
                    </button>
                </div>

                
                
                <div class="text-center p-t-136">
                    <a class="txt2" href="<?= base_url('Auth/login') ?>">
                    <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>

                        Back To Page Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
