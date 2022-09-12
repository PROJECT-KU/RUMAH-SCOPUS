

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

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

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
              <h1>Private Online Kelompok</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('member/dasboard') ?>">Member</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('member/order') ?>">Order</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('member/order') ?>">Private</a></li>
                <li class="breadcrumb-item active">Private Online Kelompok</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="accordion" id="accordionExample">
             <div class="card">
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                         &#10003;   Harga Rp 25.000.000  
                    <br> &#10003;	Jumlah peserta maksimal 50 orang 
                    <br> &#10003;	Materi ditentukan trainer
                    <br> &#10003;	10 kali pertemuan (2 jam tiap pertemuan) 
                    <br> &#10003;	Waktu ditentukan oleh kelompok peserta
                </div>
              </div>
            </div>
           
          <a class="btn btn-primary" href="<?= base_url('member/order/private_online_kelompok_order') ?>" role="button">Setuju & Order</a>
          <a class="btn btn-primary" href="<?= base_url('member/order') ?>" role="button">Batal</a>

      </section> <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>