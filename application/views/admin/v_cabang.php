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
          Data Cabang
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Cabang</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA CABANG =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Cabang</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                      <th style="width:20px;">No</th>
                        <th>Photo</th>
                        <th>No.Telp</th>
                        <th>Penanggung Jawab</th>
                        <th>Jenis Kelamin</th>
                        <th>Cabang</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $id = $i['siswa_id'];
                        $nis = $i['siswa_nis'];
                        $nama = $i['siswa_nama'];
                        $jenkel = $i['siswa_jenkel'];
                        $kelas_id = $i['siswa_kelas_id'];
                        $kelas_nama = $i['kelas_nama'];
                        $photo = $i['siswa_photo'];
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <?php if (empty($photo)) : ?>
                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                          <?php else : ?>
                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                          <?php endif; ?>
                          <td><?php echo $nis; ?></td>
                          <td><?php echo $nama; ?></td>
                          <?php if ($jenkel == 'L') : ?>
                            <td>Laki-Laki</td>
                          <?php else : ?>
                            <td>Perempuan</td>
                          <?php endif; ?>
                          <td><?php echo $kelas_nama; ?></td>
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
    <!--============================= END DATA CABANG =============================-->

    </div>

    <!--============================= TAMBAH CABANG =============================-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Cabang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/cabang/simpan_siswa' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No.Telp</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnis" class="form-control" id="inputUserName" placeholder="No.Telp" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Penanggung jawab</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Penanggung Jawab" required>
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
                  <label for="inputUserName" class="col-sm-4 control-label">Cabang</label>
                  <div class="col-sm-7">
                    <select name="xkelas" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <?php
                      foreach ($kelas->result_array() as $k) {
                        $id_kelas = $k['kelas_id'];
                        $nm_kelas = $k['kelas_nama'];

                      ?>
                        <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                      <?php } ?>
                    </select>
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
    <!--============================= END TAMBAH CABANG =============================-->

    <!--============================= UPDATE CABANG =============================-->
      <?php foreach ($data->result_array() as $i) :
        $id = $i['siswa_id'];
        $nis = $i['siswa_nis'];
        $nama = $i['siswa_nama'];
        $jenkel = $i['siswa_jenkel'];
        $kelas_id = $i['siswa_kelas_id'];
        $photo = $i['siswa_photo'];
      ?>

        <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Cabang</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/cabang/update_siswa' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                  <input type="hidden" value="<?php echo $photo; ?>" name="gambar">

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">No.Telp</label>
                    <div class="col-sm-7">
                      <input type="text" name="xnis" value="<?php echo $nis; ?>" class="form-control" id="inputUserName" placeholder="No.Telp" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Penanggung Jawab</label>
                    <div class="col-sm-7">
                      <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="inputUserName" placeholder="Penanggung Jawab" required>
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
                    <label for="inputUserName" class="col-sm-4 control-label">Cabang</label>
                    <div class="col-sm-7">
                      <select name="xkelas" class="form-control" required>
                        <option value="">-Pilih-</option>
                        <?php
                        foreach ($kelas->result_array() as $k) {
                          $id_kelas = $k['kelas_id'];
                          $nm_kelas = $k['kelas_nama'];

                        ?>
                          <?php if ($id_kelas == $kelas_id) : ?>
                            <option value="<?php echo $id_kelas; ?>" selected><?php echo $nm_kelas; ?></option>
                          <?php else : ?>
                            <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                          <?php endif; ?>
                        <?php } ?>
                      </select>
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
    <!--============================= END UPDATE CABANG =============================-->

    <!--============================= DELETE CABANG =============================-->
      <?php foreach ($data->result_array() as $i) :
        $id = $i['siswa_id'];
        $nis = $i['siswa_nis'];
        $nama = $i['siswa_nama'];
        $jenkel = $i['siswa_jenkel'];
        $kelas_id = $i['siswa_kelas_id'];
        $photo = $i['siswa_photo'];
      ?>

        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Cabang</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/cabang/hapus_siswa' ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                  <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                  <p>Apakah Anda yakin mau menghapus Cabang<b><?php echo $nama; ?></b> ?</p>
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
    <!--============================= END DELETE CABANG =============================-->

</body>

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
        text: "Siswa Berhasil disimpan ke database.",
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
        text: "Siswa berhasil di update",
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
        text: "Siswa Berhasil dihapus.",
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