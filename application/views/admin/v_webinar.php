<!--Counter Inbox-->
<?php
$query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2 = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>

<!--============================= TITLE =============================-->
<head>
<title><?php echo $title; ?></title>
</head>
<!--============================= END =============================-->

<!--============================= CONTENT =============================-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">

    <!--============================= JUDUL PAGE =============================-->
      <section class="content-header">
        <h1>
          Data Webinar
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?= base_url('admin/webinar') ?>"><i class="fa fa-video-camera"></i> Webinar</a></li>
          <li class="active">Data Webinar</li>
        </ol>
      </section>
    <!--============================= END =============================-->

    <!--============================= DATA WEBINAR =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Webinar</a>
                </div>
                <div class="box-body">
                    <?= $this->session->flashdata('pesan') ?>
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th style="width:70px;">#</th>
                        <th>Nama Webinar</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kuota</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Sampai Tanggal</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data as $i) :
                        $no++;
                        $harga = $i['harga'];
                        $hasil_rupiah = "Rp " . number_format($harga, 2, ',', '.'); ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $i['nama_webinar']; ?></td>
                          <td><?php echo $i['deskripsi']; ?></td>
                          <td><?php echo $hasil_rupiah; ?></td>
                          <td><?php echo $i['kuota']; ?></td>
                          <td><?php echo $i['tgl_pelaksanaan']; ?></td>
                          <td><?php echo $i['tanggal2']; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['id']; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" href="<?php echo base_url('admin/webinar/delete/') . $i['id']; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </section>
    <!--============================= END DATA WEBINAR =============================-->

    </div>
    
    <!--============================= TAMBAH WEBINAR =============================-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Webinar</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/webinar/add_webinar' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama Webinar</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama_webinar" class="form-control" id="nama_webinar" placeholder="Judul" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi ..." required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                  <div class="col-sm-7">
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga dalam Rp" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Kuota</label>
                  <div class="col-sm-7">
                    <input type="text" name="kuota" class="form-control" id="kuota" placeholder="Kuota" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal Pelaksanan</label>
                  <div class="col-sm-7">
                    <input type="date" name="tgl_pelaksanaan" class="form-control" id="tgl_pelaksanaan" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Sampai Tanggal</label>
                  <div class="col-sm-7">
                    <input type="date" name="tanggal2" class="form-control" id="tanggal2" required>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!--============================= END DATA WEBINAR =============================-->

    <!--============================= UPDATE WEBINAR =============================-->
      <?php foreach ($data as $i) :
        $harga = $i['harga'];
        $hasil_rupiah = "Rp " . number_format($harga, 2, ',', '.');
      ?>
        
        <div class="modal fade" id="ModalEdit<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Webinar</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/webinar/edit' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Nama Webinar</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="text" name="nama_webinar" id="nama_webinar" class="form-control" value="<?php echo $i['nama_webinar']; ?>" id="inputUserName" placeholder="Judul" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi ..." required><?php echo $i['deskripsi']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $i['harga'] ?>" id="inputUserName" placeholder="Judul" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Kuota</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="text" name="kuota" id="kuota" class="form-control" value="<?php echo $i['kuota']; ?>" id="inputUserName" placeholder="Judul" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Tanggal Pelaksanaan</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control" value="<?php echo $i['tgl_pelaksanaan']; ?>" id="inputUserName" placeholder="Judul" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Sampai Tanggal</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="date" name="tanggal2" id="tanggal2" class="form-control" value="<?php echo $i['tanggal2']; ?>" id="inputUserName" placeholder="Judul" required>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success btn-flat" id="simpan">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <!--============================= END UPDATE WEBINAR =============================-->
      
</body>

<!--============================= JAVA SCRIPT =============================-->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('#datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker3').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker4').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $(".timepicker").timepicker({
        showInputs: true
      });

    });
  </script>
  <?php if ($this->session->flashdata('msg') == 'error') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Error',
        text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
        showHideTransition: 'slide',
        icon: 'error',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FF4859'
      });
    </script>

  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Pengumuman Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Info',
        text: "Pengumuman berhasil di update",
        showHideTransition: 'slide',
        icon: 'info',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#00C9E6'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Pengumuman Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php else : ?>

  <?php endif; ?>
<!--============================= END JAVA SCRIPT =============================-->