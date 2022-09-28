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
          Data Album
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Album</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA ALBUM =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Album</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Album</th>
                        <th>Tanggal</th>
                        <th>Author</th>
                        <th>Jumlah</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $album_id = $i['album_id'];
                        $album_nama = $i['album_nama'];
                        $album_tanggal = $i['tanggal'];
                        $album_author = $i['album_author'];
                        $album_cover = $i['album_cover'];
                        $album_jumlah = $i['album_count'];
                      ?>
                        <tr>
                          <td><img src="<?php echo base_url() . 'assets/images/' . $album_cover; ?>" style="width:80px;"></td>
                          <td><?php echo $album_nama; ?></td>
                          <td><?php echo $album_tanggal; ?></td>
                          <td><?php echo $album_author; ?></td>
                          <td><?php echo $album_jumlah; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $album_id; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $album_id; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
    <!--============================= END DATA ALBUM =============================-->

    </div>
  <div class="control-sidebar-bg"></div>
  </div>

    <!--============================= TAMBAH ALBUM =============================-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Album</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/album/simpan_album' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnama_album" class="form-control" id="inputUserName" placeholder="Nama Album" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
                  <div class="col-sm-7">
                    <input type="file" name="filefoto" required />
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
    <!--============================= END TAMBAH LABUM =============================-->

    <!--============================= UPDATE ALBUM =============================-->
      <?php foreach ($data->result_array() as $i) :
        $album_id = $i['album_id'];
        $album_nama = $i['album_nama'];
        $album_tanggal = $i['tanggal'];
        $album_author = $i['album_author'];
        $album_cover = $i['album_cover'];
        $album_jumlah = $i['album_count'];
      ?>

        <div class="modal fade" id="ModalEdit<?php echo $album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/album/update_album' ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $album_id; ?>" />
                  <input type="hidden" value="<?php echo $album_cover; ?>" name="gambar">

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                    <div class="col-sm-7">
                      <input type="text" name="xnama_album" class="form-control" value="<?php echo $album_nama; ?>" id="inputUserName" placeholder="Nama Album" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
                    <div class="col-sm-7">
                      <input type="file" name="filefoto" />
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
      <?php endforeach; ?>
    <!--============================= END UPDATE ALBUM =============================-->

    <!--============================= DELETE ALBUM =============================-->
      <?php foreach ($data->result_array() as $i) :
        $album_id = $i['album_id'];
        $album_nama = $i['album_nama'];
        $album_tanggal = $i['tanggal'];
        $album_author = $i['album_author'];
        $album_cover = $i['album_cover'];
        $album_jumlah = $i['album_count'];
      ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Album</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/album/hapus_album' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $album_id; ?>" />
                  <input type="hidden" value="<?php echo $album_cover; ?>" name="gambar">
                  <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $album_nama; ?></b> ?</p>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger btn-flat" id="simpan">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <!--============================= END DELETE ALBUM =============================-->

</body>
<!--============================= END CONTENT =============================-->

<!--============================= JAVA SCRIPT =============================-->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
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
        text: "Album Berhasil disimpan ke database.",
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
        text: "Album berhasil di update",
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
        text: "Album Berhasil dihapus.",
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