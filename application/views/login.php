<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="<?= base_url('LPage')?>"><img src="images/logo.svg" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->


<!-- Header -->
<header id="header" class="ex-2-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Log In</h1>
                <!-- Sign Up Form -->
                <div class="form-container">
                <span class="m-1"><?php echo $this->session->flashdata('pesan') ?></span>
                    <form action="<?php base_url('auth/login') ?>" method="post" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control-input" id="lemail" required>
                            <label class="label-control" for="lemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control-input" id="lpassword" required>
                            <label class="label-control" for="lpassword">Password</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">LOG IN</button>
                        </div>
                        <div class="register">
                            <p>You don't have a password? Then please <a href="<?= base_url('Auth/') ?>register">Sign Up</a></p>
                        </div>
                        <div class="form-message">
                            <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>

                    <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=198551423388-g1m51qrmp7qlkp73t80nfrra12ri5ee9.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2FE-Catalogue%2Fauth%2FloginGoogle&state&scope=email%20profile&approval_prompt=auto">Login Google</a>
                </div> <!-- end of form container -->
                <!-- end of sign up form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->