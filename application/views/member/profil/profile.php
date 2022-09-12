<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>


            <!-- Right navbar links -->
            
        </nav>
        <!-- /.navbar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Member Profile </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('member/dasboard') ?>">Member</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            
            
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12">
                          <div class="callout callout-info" style="background-color: 00C0EF; color:white;">
                                <li> Silahkan pesan ID untuk mendapatkan potongan harga sebesar 10%</li>
                                <li>Cetak ID Card untuk dapat mengikuti kegiatan atau event dari Rumah Scopus</li>  
                               
                            </div>

                    </div>
                </div>
            </section>
           
            <!-- /.content-header -->
            <!-- /.login-logo -->
            <div class="card mb-3 m-3" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img style="border-radius:10%; margin:10px;" src="<?= base_url('assets/images/') . $user['foto']; ?>" class="card-img" alt="...">
                        <p class="card-text " style="margin-left:40px ;"><small class="text-muted">Akun dibuat sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama : <strong><?= $user['nama']; ?></strong></h5>
                            <hr class="mt-4">
                            <h6 class="card-text" style="margin-top:-10px ;">Email : <?= $user['email']; ?></h6>
                            <hr style="margin-top: -3px;">
                            <h6 class="card-text" style="margin-top:-10px ;">Jenis Kelamin : <?= $user['gender']; ?></h6>
                            <hr style="margin-top: -3px;">
                            <h6 class="card-text" style="margin-top:-10px ;"> ALamat : <?= $user['alamat']; ?></h6>
                            <hr style="margin-top: -3px;">
                            <h6 class="card-text" style="margin-top:-10px ;">No.Telp : <?= $user['no_hp']; ?></h6>
                            <hr style="margin-top: -3px;">
                            <h6 class="card-text" style="margin-top:-10px ;">Status : <?= $user['status']; ?></h6>

                            <a href="<?= base_url('member/profil/profile/edit') ?>" class="btn btn-primary mt-4">Edit Profile</a>
                            <!--<a href="<?= base_url('member/profile/id') ?>" class="btn btn-primary">Cetak ID Card</a>-->
                            <a href="<?= base_url('member/profil/profile/changePassword') ?>" class="btn btn-primary mt-4">Ubah Password</a>
                        </div>
                    </div>
                </div>
            </div>
     
            <!--<div class="card mb-3 m-3" style="max-width: 395px;">-->
            <!--    <div class="row no-gutters">-->
                   
            <!--        <div class="col-md-4">   -->
            <!--        <img style="width : 390px;" src="<?php echo base_url() . 'theme/images/logo/carddepan.png' ?>">-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
          
            <!--<div class="card mb-3 m-3" style="max-width: 395px;">-->
            <!--    <div class="row no-gutters">-->
            <!--        <div class="col-md-4">   -->
            <!--        <img style="width : 390px;" src="<?php echo base_url() . 'theme/images/logo/idcardbelakang.png' ?>">-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            
           
            
            
        <!-- /.login-box -->