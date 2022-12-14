<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/fonts/material-icon/css/material-design-iconic-font.min.css' ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/css/style.css' ?>">
</head>



<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url() . 'theme/member/images/signin-image.jpg' ?>" alt="sing up image"></figure>
                        <a href="registrasi" class="signup-image-link">Create an account</a>
                        <a class="signup-image-link" href="<?php echo site_url(''); ?>">Home</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action="<?= base_url('member/login') ?>" class="register-form" id="login-form">
                            <?= $this->session->flashdata('pesan'); ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                                <a href="<?php echo base_url() . 'member/registrasi/forgotpassword' ?>" class="form-submit btn btn-primary" value="" />Reset Account</a>
                            </div>
                            
                        </form>
                        <div class="social-login">
                            <span class="social-label"></span>
                            <ul class="socials">
                                <!--<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>-->
                                <!--<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>-->
                                <!--<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="<?php echo base_url() . 'theme/member/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'js/main.js' ?>"></script>

</body>