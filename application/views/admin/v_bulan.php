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
          Data Bulan Webinar
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?= base_url('admin/webinar') ?>"><i class="fa fa-video-camera"></i>Bulan Webinar</a></li>
          <li class="active">Data Bulan Webinar</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA BULAN =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Bulan Webinar</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th style="width:70px;">#</th>
                        <th>Nama Bulan Webinar</th>
                        <th>Status</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data as $i) :
                        $no++;
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $i['nama']; ?></td>
                          <?php if ($i['status'] == 1) : ?>
                            <td>Aktif</td>
                            <?php else : ?>
                            <td>Pending</td>
                            <?php endif; ?>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['id']; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['id']; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
    <!--============================= END DATA BULAN =============================-->

    </div>


    <!--============================= TAMBAH BULAN =============================-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Bulan Webinar</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/bulan/add_bulan' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama Bulan Webinar</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Bulan Webinar" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="status" id="status" placeholder="Status ..." required></textarea>
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
    <!--============================= END TAMABH BULAN =============================-->

    <!--============================= UPDATE BULAN =============================-->
      <?php foreach ($data as $i) :
        $harga = $i['harga'];
        $hasil_rupiah = "Rp " . number_format($harga, 2, ',', '.');
      ?>
        
        <div class="modal fade" id="ModalEdit<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Bulan Webinar</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/bulan/edit' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Nama Bulan Webinar</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $i['id']; ?>">
                      <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $i['nama']; ?>" id="inputUserName" placeholder="Bulan Webinar" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="3" name="status" id="status" placeholder="Status ..." required><?php echo $i['status']; ?></textarea>
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
    <!--============================= END UPDATE BULAN =============================-->

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
  <!--<?php else : ?>
  <?php endif; ?>-->
<!--============================= END JAVA SCRIPT =============================-->