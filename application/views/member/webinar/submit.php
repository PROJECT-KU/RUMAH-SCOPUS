<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

  <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- END -->


    <!-- CONTENT -->
    <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                                <li class="breadcrumb-item active">Submit Payment</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info" style="background-color: 00C0EF; color:white;">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                Silahkan masukan terlebih dahulu <strong>KODE BOOKING</strong>, agar bisa mengupload bukti pembayaran.
                            </div>


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <img src="<?php echo base_url() . 'theme/images/logo/favicon-32x32.png' ?>"></i> Rumah Scopus
                                            <small class="float-right">Date: <?= date('d F Y'); ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info mt-3">
                                    <div class="col-sm-4 invoice-col">
                                        <?php echo form_open_multipart('member/tagihan/submit_payment'); ?>
                                        <div class="form-group">
                                            <label for="pass"><i class="zmdi zmdi-lock">Kode Booking</i></label>
                                            <input type="text" name="id_order" id="id_order" required="required">
                                            <input type="hidden" name="kategori" id="kategori" value = "Webinar" />
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5">Bukti Pembayaran</div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="foto" name="foto" required="required">
                                                            <label class="custom-file-label" for="foto">Pilih Gambar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-end">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>