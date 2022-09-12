<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-D5bhbIKoHpoTznUD"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
              <h1>Submit & Publish</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('member/dasboard') ?>">Member</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('member/order') ?>">Order</a></li>
                <li class="breadcrumb-item active">Submit & Publish</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="accordion" id="accordionExample">
              <div class="card">
                  <div class="card-header" id="headingOne">
                    <h1 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Fasilitas
                      </button>
                    </h1>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                          &#10003;  Penyusunan tata letak tulisan sesuai aturan Jurnal
                    <br>  &#10003;	Pembuatan dokumen pendukung atau pendamping artikel
                    <br>  &#10003;  Submit ke Jurnal 
                    <br>  &#10003;	Revisi sesuai permintaan reviewer
                    <br>  &#10003;  Komunikasi dengan pihak jurnal 
                    <br>  &#10003;	Rekam jejak artikel 
                    <br>  &#10003;	Publikasi hingga indexing artikel ke Scopus 

                    </div>
                  </div>
                </div>
              
             <div class="card">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                   Harga
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  Rp. 3.000.000,-<small> / </small> Artikel

                </div>
              </div>
            </div>
          </div>


          
          <a class="btn btn-primary" href="<?= base_url('member/order/submit_publish_order') ?>" role="button">Setuju & Order</a>
          <a class="btn btn-primary" href="<?= base_url('member/order') ?>" role="button">Batal</a>

      </section> <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>