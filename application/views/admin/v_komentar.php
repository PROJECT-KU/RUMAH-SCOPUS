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
          Komentar
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Komentar</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA KOMENTAR =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Tanggapan Untuk</th>
                        <th>Dikirimkan Pada</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($data->result() as $row) : ?>
                        <tr>
                          <td><?php echo $row->komentar_nama; ?></td>
                          <td><?php echo $row->komentar_isi; ?></td>
                          <td><a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>" target="_blank"><?php echo $row->tulisan_judul; ?></a></td>
                          <td><?php echo date("d M Y H:i", strtotime($row->komentar_tanggal)); ?></td>
                          <td style="text-align:right;">
                            <?php if ($row->komentar_status == '1' && $row->komentar_parent == '0') : ?>
                              <a class="btn btn-reply" href="javascript:void(0);" data-id="<?php echo $row->komentar_id; ?>" data-post_id="<?php echo $row->komentar_tulisan_id; ?>" title="Balas"><span style="color: orange;" class="fa fa-reply"></span></a>
                              <a class="btn btn-hapus" href="javascript:void(0);" data-id="<?php echo $row->komentar_id; ?>" title="Hapus"><span style="color: red;" class="fa fa-trash"></span></a>
                            <?php elseif ($row->komentar_status == '1') : ?>
                              <a class="btn btn-hapus" href="javascript:void(0);" data-id="<?php echo $row->komentar_id; ?>" title="Hapus"><span style="color: red;" class="fa fa-trash"></span></a>
                            <?php else : ?>
                              <a class="btn" href="<?php echo site_url('admin/komentar/publish/' . $row->komentar_id); ?>" title="Publish"><span class="fa fa-send"></span></a>
                              <a class="btn btn-hapus" href="javascript:void(0);" data-id="<?php echo $row->komentar_id; ?>" title="Hapus"><span style="color: red;" class="fa fa-trash"></span></a>
                            <?php endif; ?>
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
    <!--============================= END DATA KOMNETAR =============================-->

  </div>

    <!--============================= DELETE KOMENTAR =============================-->
      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Komentar</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/komentar/hapus' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="kode" value="" />
                <p>Apakah Anda yakin mau menghapus komentar ini?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-flat" id="simpan">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!--============================= END DELETE KOMENTAR =============================-->

    <!--============================= REPLY KOMENTAR =============================-->
      <div class="modal fade" id="ModalReply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Reply</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/komentar/reply' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="komenid" value="" />
                <input type="hidden" name="postid" value="" />
                <textarea name="komentar" class="form-control" rows="8" cols="80" required></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat" id="simpan">Relpy</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!--============================= END REPLY KOMENTAR =============================-->

</body> 
<!--============================= END CONTENT =============================-->

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

      $('#example1').on('click', '.btn-reply', function() {
        var komentar_id = $(this).data('id');
        var post_id = $(this).data('post_id');
        $('#ModalReply').modal('show');
        $('[name="komenid"]').val(komentar_id);
        $('[name="postid"]').val(post_id);
      });

      $('#example1').on('click', '.btn-hapus', function() {
        var komentar_id = $(this).data('id');
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(komentar_id);
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

  <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Info',
        text: "Komentar berhasil di Balas",
        showHideTransition: 'slide',
        icon: 'info',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#00C9E6'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Komentar Berhasil Publish.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Komentar Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php else : ?>

  <?php endif; ?>
<!--============================= END JAVA SCRIPT=============================-->