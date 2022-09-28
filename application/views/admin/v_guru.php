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
          Data Trainer
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Trainer</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA TRAINER =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Trainer</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th style="width:20px;">No</th>
                        <th>Photo</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $id = $i['guru_id'];
                        $nip = $i['guru_nip'];
                        $nama = $i['guru_nama'];
                        $jenkel = $i['guru_jenkel'];
                        $tmp_lahir = $i['guru_tmp_lahir'];
                        $tgl_lahir = $i['guru_tgl_lahir'];
                        $mapel = $i['guru_mapel'];
                        $photo = $i['guru_photo'];

                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <?php if (empty($photo)) : ?>
                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                          <?php else : ?>
                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                          <?php endif; ?>
                          <td><?php echo $nip; ?></td>
                          <td><?php echo $nama; ?></td>
                          <td><?php echo $tmp_lahir . ', ' . $tgl_lahir; ?></td>
                          <?php if ($jenkel == 'L') : ?>
                            <td>Laki-Laki</td>
                          <?php else : ?>
                            <td>Perempuan</td>
                          <?php endif; ?>
                          <td><?php echo $mapel; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
    <!--============================= END DATA TRAINER =============================-->

    </div>

    <!--============================= TAMBAH TRAINER =============================-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Trainer</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/simpan_guru' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIP" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                      <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                      <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
                  <div class="col-sm-7">
                    <input type="text" name="xtmp_lahir" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
                  <div class="col-sm-7">
                    <input type="text" name="xtgl_lahir" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                  <div class="col-sm-7">
                    <input type="text" name="xmapel" class="form-control" id="inputUserName" placeholder="Contoh: Trainer, staf" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
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
    <!--============================= END TAMBAH TRAINER =============================-->

    <!--============================= UPDATE TRAINER =============================-->
      <?php foreach ($data->result_array() as $i) :
        $id = $i['guru_id'];
        $nip = $i['guru_nip'];
        $nama = $i['guru_nama'];
        $jenkel = $i['guru_jenkel'];
        $tmp_lahir = $i['guru_tmp_lahir'];
        $tgl_lahir = $i['guru_tgl_lahir'];
        $mapel = $i['guru_mapel'];
        $photo = $i['guru_photo'];
      ?>

        <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Guru</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/update_guru' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                  <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
                    <div class="col-sm-7">
                      <input type="text" name="xnip" value="<?php echo $nip; ?>" class="form-control" id="inputUserName" placeholder="NIP" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-7">
                      <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="inputUserName" placeholder="Nama" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                      <?php if ($jenkel == 'L') : ?>
                        <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                          <label for="inlineRadio1"> Laki-Laki </label>
                        </div>
                        <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                          <label for="inlineRadio2"> Perempuan </label>
                        </div>
                      <?php else : ?>
                        <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                          <label for="inlineRadio1"> Laki-Laki </label>
                        </div>
                        <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                          <label for="inlineRadio2"> Perempuan </label>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
                    <div class="col-sm-7">
                      <input type="text" name="xtmp_lahir" value="<?php echo $tmp_lahir; ?>" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
                    <div class="col-sm-7">
                      <input type="text" name="xtgl_lahir" value="<?php echo $tgl_lahir; ?>" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-7">
                      <input type="text" name="xmapel" value="<?php echo $mapel; ?>" class="form-control" id="inputUserName" placeholder="Contoh: Trainer,Staf" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
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
    <!--============================= END UPDATE TRAINER =============================-->

    <!--============================= DELETE TRAINER =============================-->
      <?php foreach ($data->result_array() as $i) :
        $id = $i['guru_id'];
        $nip = $i['guru_nip'];
        $nama = $i['guru_nama'];
        $jenkel = $i['guru_jenkel'];
        $tmp_lahir = $i['guru_tmp_lahir'];
        $tgl_lahir = $i['guru_tgl_lahir'];
        $mapel = $i['guru_mapel'];
        $photo = $i['guru_photo'];
      ?>

        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Guru</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/hapus_guru' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                  <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                  <p>Apakah Anda yakin mau menghapus guru <b><?php echo $nama; ?></b> ?</p>

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
    <!--============================= END DELETE TRAINER =============================-->

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
        text: "Guru Berhasil disimpan ke database.",
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
        text: "Guru berhasil di update",
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
        text: "Guru Berhasil dihapus.",
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