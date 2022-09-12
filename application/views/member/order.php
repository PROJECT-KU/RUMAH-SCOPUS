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

    <!-- CONTENT HEADER -->
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
        </div>
      </section>
      <!-- END CONTENTA HEADER -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="accordion" id="accordionExample">

      <!-- WEBINAR -->
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h1 class="mb-0">
                      <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Webinar
                      </button>
                    </h1>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                       <?php
                    foreach ($bulan as $bln) : ?>
                    <a href="<?= base_url('member/order/bulan/') . $bln['id'] ?>" class="list-group-item list-group-item-action"><?= $bln['nama'] ?></a>
                    <?php endforeach; ?>
                    </div>
                  </div>
                </div>
      <!-- END -->

      <!-- PRIVATE -->
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h1 class="mb-0">
                      <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Private
                      </button>
                    </h1>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="col-sm-12" style="margin-top:15px;">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"><strong>ONLINE</strong></h5>
                            <p class="card-text">Kami memberikan layanan pendampingan penulisan artikel berbasis online menggunakan aplikasi zoom meeting baik individu maupun kelompok.</p>
                            <a href="<?= base_url('member/order/private_online_kelompok') ?>" class="btn btn-primary">KELOMPOK</a><a style="margin-left:10px;" href="<?= base_url('member/order/private_online_individu') ?>" class="btn btn-success">INDIVIDU</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"><strong>OFFLINE</strong></h5>
                            <p class="card-text">Kami memberikan pendampingan penulisan artikel secara tatap muka langsung baik individu maupun kelompok dengan tetap mengikuti Protokol Kesehatan Covid-19.</p>
                            <a href="<?= base_url('member/order/private_offline_kelompok') ?>" class="btn btn-primary">KELOMPOK</a><a style="margin-left:10px;" href="<?= base_url('member/order/private_offline_individu') ?>" class="btn btn-success">INDIVIDU</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      <!-- END -->

      <!-- PREPARATION MANUSCRIPT -->
                <div class="card">
                  <div class="card-header" id="headingFour">
                    <h1 class="mb-0">
                      <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                       Preparation Manuscript 
                      </button>
                    </h1>
                  </div>
                  <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
                    <div class="card-body">
                     <div class="card w-85">
                        <div class="card-body">
                            <h5 class="card-title">Preparation Manuscript  </h5>
                            <p class="card-text">Kami membantu Anda dalam penyusunan artikel untuk dipublikasikan ke jurnal internasional bereputasi.</p>
                            <a href="<?= base_url('member/order/manuscript') ?>" class="btn btn-primary">Detail Order</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingfive">
                    <h1 class="mb-0">
                      <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                        Submit & Publish
                      </button>
                    </h1>
                  </div>
                  <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="card w-85">
                        <div class="card-body">
                            <h5 class="card-title">Submit & Publish</h5>
                            <p class="card-text">Kami membantu mempersiapkan perangkat pendukung paper sebelum submit, publish hingga indexing scopus</p>
                            <a href="<?= base_url('member/order/submit_publish') ?>" class="btn btn-primary">Detail Order</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      <!-- END -->
                
      <!-- BENGKEL PAPER -->
                <div class="card">
                  <div class="card-header" id="headingseven">
                    <h1 class="mb-0">
                      <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                        Bengkel Paper
                      </button>
                    </h1>
                  </div>
                  <div id="collapseseven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="card w-85">
                        <div class="card-body">
                            <h5 class="card-title">Fasilitas Bengkel Paper</h5>
                            <p class="card-text">Kami membantu menyempurnakan paper sebelum  dipublikasikan ke jurnal internasional terindex Scopus.
                            </p>
                            <a href="<?= base_url('member/order/bengkel_detail') ?>" class="btn btn-primary">Detail Order</a>
                         </div>
                        </div>
                    </div>
                  </div>
                </div>
      <!-- END -->

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
        
        <!--</div>
        </div>
        </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
            -->
            
</body>