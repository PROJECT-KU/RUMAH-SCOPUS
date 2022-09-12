<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/fonts/material-icon/css/material-design-iconic-font.min.css' ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/css/style.css' ?>">
    
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Finance - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <style media="screen">
    .card {
      background-image: url('assets/img/wave.svg') !important;
      background-size: cover;
      background-position: left;
    }
  </style>
</head>

 <img style="">

<body style="background-image:">
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
                        <h1 class="h4 text-gray-900 mb-4">Change Your Password.</h1>
                        <h4 class="h4 text-gray-900 mb-4">For    <?= $this->session->userdata('reset_email') ?></h4>
                       
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('member/registrasi/changepassword'); ?>" method="post">
                <div class="form-group">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="New Password">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
               <div class="form-group form-button">
                                <input type="submit" name="change" id="change" class="form-submit" value="Change Password" />
                            </div>
            </form>

        </div>
    </div>
    
    
    
        </section>

    </div>

    <script src="<?php echo base_url() . 'theme/member/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'js/main.js' ?>"></script>

</body>