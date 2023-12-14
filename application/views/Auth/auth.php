
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
            <a href="<?php echo base_url() ?>">
                <img src="<?= base_url('assets/') ?>images/logo.png" alt="IMG">
            </a>
            </div>
		

            <form action="<?= base_url('auth/login2')?>" method="POST" class="login100-form validate-form" enctype="multipart/form-data">
                <?= $this->session->flashdata('pesan'); ?>

                <span class="login100-form-title">
                    Admin Login
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="<?= base_url('auth/Google') ?>">
                        Login Melalui Google
                    </a>
                </div>

				<?php
   if(!isset($login_button))
   {

    $user_data = $this->session->userdata('user_data');
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
    echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
    echo '<h3><a href="'.base_url().'auth/logout">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
                
                <div class="text-center p-t-20">
                    <a class="txt2" href="<?= base_url('Auth/forgot') ?>" style="color:#e29624;">
                        Forgot Password ?
                        <!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
                    </a>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2" href="<?= base_url() ?>">
                    <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>

                        Back To Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
