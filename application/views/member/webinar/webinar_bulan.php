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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('member/dasboard') ?>">Member</a></li>
                <li class="breadcrumb-item active">Order</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <?php
              $id_bulan = $this->uri->segment(4);
              $nama_bulan = $this->db->get_where('tbl_bulan', ['id' => $id_bulan])->row_array();
              $webinar = $this->db->get('tbl_webinar')->result_array();
              foreach ($webinar as $i) :
                $harga = $i['harga'];
                $hasil_rupiah = "Rp " . number_format($harga, 2, ',', '.');
                $bulan = date('F', strtotime($i['tgl_pelaksanaan']));
                $tanggal1 = date('d', strtotime($i['tgl_pelaksanaan']));
                $tanggal2 = date('d F Y', strtotime($i['tanggal2'])); ?>

                <?php if ($bulan == $nama_bulan['nama']) : ?>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?= $i['nama_webinar'] ?></h5>
                      <p class="card-text">Pelaksanaan : <?= $tanggal1 ?> s/d <?= $tanggal2 ?></p>
                      <p class="card-text"> <?= $hasil_rupiah ?></p>
                      <a href="<?= base_url('member/order/konfir_order/') . $i['id'] ?>" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.timeline -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>