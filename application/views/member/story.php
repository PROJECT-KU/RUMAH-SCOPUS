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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Story Order</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('member/dasboard') ?>">Member</a></li>
                <li class="breadcrumb-item active">Story Order</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          
<!--WEBINAR SCOPUS-->
        <div class="container-fluid">
          <?php
          $id = $this->session->userdata('email');
          $queryOrder = "SELECT *
                        FROM `tbl_order` 
                        WHERE `email` = '$id'
                        ORDER BY `tanggal` ASC";
          $order = $this->db->query($queryOrder)->result_array(); ?>
          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <?php foreach ($order as $o) :  ?>
                  <?php if ($o['status'] == 1) : ?>
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-red"><?= $o['tanggal'] ?></span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-clock bg-green"></i>
                      <div class="timeline-item">
                        <span class="time">Pelaksanaan <i class="fas fa-clock"></i><?= $o['tanggal_pelaksanaan'] ?></span>
                        <h3 class="timeline-header no-border"><?= $o['nama_webinar'] ?></h3>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- END WEBINAR -->

<!--BENGKEL SCOPUS-->
 <div class="container-fluid">
          <?php
          $id = $this->session->userdata('email');
          $queryOrder = "SELECT *
                        FROM `tbl_order_bengkel_scopus` 
                        WHERE `email` = '$id'
                        ORDER BY `tanggal_order` ASC";
          $order = $this->db->query($queryOrder)->result_array(); ?>
          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <?php foreach ($order as $o) :  ?>
                  <?php if ($o['status'] == 1) : ?>
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-red"><?= $o['tanggal_order'] ?></span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-clock bg-green"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i><?= $o['tanggal_order'] ?></span>
                        <h3 class="timeline-header no-border">Bengkel Scopus</h3>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END BENGKEL SCOPUS -->

<!--PRIVATE-->
 <div class="container-fluid">
          <?php
          $id = $this->session->userdata('email');
          $queryOrder = "SELECT *
                        FROM `tbl_order_private` 
                        WHERE `email` = '$id'
                        ORDER BY `tanggal_order` ASC";
          $order = $this->db->query($queryOrder)->result_array(); ?>
          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <?php foreach ($order as $o) :  ?>
                  <?php if ($o['status'] == 1) : ?>
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-red"><?= $o['tanggal_order'] ?></span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-clock bg-green"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i><?= $o['tanggal_order'] ?></span>
                        <h3 class="timeline-header no-border"><?= $o['kategori'] ?></h3>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PRIVATE -->











      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>