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

           

             </nav>
        <!-- /.navbar -->
        \




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
<!-- WELCOME -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12">
                          <div class="callout callout-info" style="background-color: 00C0EF; color:white;">
                                <h5><i class="fas fa-info"></i>&nbspSelamat Datang&nbsp<strong><?= $user['nama'] ?></strong></h5>
                            </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cloud-download-alt"></i></span>
          <?php
              $query = $this->db->query("SELECT * FROM tbl_files");
              $jml = $query->num_rows();
              ?>
                                <div class="info-box-content">
                                    <span class="info-box-text"><Strong>Downloads</Strong></span>
                                    <span class="info-box-number">
                                    <?php echo number_format($jml); ?>
                                    <small>file</small>
                                    </span>
                                    
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Service</strong></span>
                                    <span class="info-box-number">6</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>
 <?php
              $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
              $jml = $query->num_rows();
              ?>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Kunjungan Terakhir</strong></span>
                                    <span class="info-box-number"><?php echo number_format($jml); ?>
                                    <small>pengunjung</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
<?php
              $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
              $jml = $query->num_rows();
              ?>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Pengunjung Bulan Ini</strong></span>
                                    <span class="info-box-number"><?php echo number_format($jml); ?>
                                    <small>pengunjung</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                            <!-- PRODUCT LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Postingan Populer</strong></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <li class="item">
                                            <div class="row">

                <table class="table">
                  <?php
                  $query = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC");
                  foreach ($query->result_array() as $i) :
                    $tulisan_id = $i['tulisan_id'];
                    $tulisan_judul = $i['tulisan_judul'];
                    $tulisan_views = $i['tulisan_views'];
                  ?>
                    <tr>
                      <td><?php echo $tulisan_judul; ?></td>
                    
                      <td class="badge badge-info float-right"><?php echo $tulisan_views . ' Views'; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>



</body>