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
          Data Agenda
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Agenda</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA AGENDA =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Agenda</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th style="width:20px;">No</th>
                        <th>Tanggal</th>
                        <th>Agenda</th>
                        <th>Tanggal Agenda</th>
                        <th>Tempat</th>
                        <th>Waktu</th>
                        <th>Link Pendaftaran</th>
                        <!--<th>Foto Agenda</th>-->
                        <th>Author</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $tanggal = $i['tanggal'];
                        $agenda_id = $i['agenda_id'];
                        $agenda_nama = $i['agenda_nama'];
                        $agenda_deskripsi = $i['agenda_deskripsi'];
                        $agenda_mulai = $i['agenda_mulai'];
                        $agenda_selesai = $i['agenda_selesai'];
                        $agenda_tempat = $i['agenda_tempat'];
                        $agenda_waktu = $i['agenda_waktu'];
                        $agenda_keterangan = $i['agenda_keterangan'];
                        //$agenda_foto = $i['agenda_foto'];
                        $agenda_author = $i['agenda_author'];
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tanggal; ?></td>
                          <td><?php echo $agenda_nama; ?></td>
                          <td><?php echo date("d M y", strtotime($agenda_mulai));?> s/d <?php echo date("d M y", strtotime($agenda_selesai));?></td>
                          <td><?php echo $agenda_tempat; ?></td>
                          <td><?php echo $agenda_waktu; ?></td>
                          <td><?php echo $agenda_keterangan; ?></td>
                          <!--<td><?php echo $agenda_foto; ?></td>-->
                          <td><?php echo $agenda_author; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $agenda_id; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $agenda_id; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
    <!--============================= END DATA AGENDA =============================-->

    </div>
  <div class="control-sidebar-bg"></div>
  </div>

    <!--============================= TAMBAH AGENDA =============================-->                  
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Agenda</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/simpan_agenda' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
              
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnama_agenda" class="form-control" id="inputUserName" placeholder="Nama Agenda" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
                  <div class="col-sm-7">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="xmulai" class="form-control pull-right" id="datepicker" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
                  <div class="col-sm-7">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="xselesai" class="form-control pull-right" id="datepicker2" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                  <div class="col-sm-7">
                    <input type="text" name="xtempat" class="form-control" id="inputUserName" placeholder="Tempat" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                  <div class="col-sm-7">
                    <input type="text" name="xwaktu" class="form-control" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Link Pendaftaran</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" name="xketerangan" rows="2" placeholder="Link Pendaftaran ..."></textarea>
                  </div>
                </div>

                <!--<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Foto Agenda</label>
                  <div class="col-sm-7">
                  <input type="file" name="filefoto" style="width: 100%;" required>
                  </div>
                </div>-->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!--============================= END TAMBAH AGENDA =============================-->
    
    <!--============================= UPDATE AGENDA =============================-->
      <?php foreach ($data->result_array() as $i) :
        $agenda_id = $i['agenda_id'];
        $agenda_nama = $i['agenda_nama'];
        $agenda_deskripsi = $i['agenda_deskripsi'];
        $agenda_mulai = $i['agenda_mulai'];
        $agenda_selesai = $i['agenda_selesai'];
        $agenda_tempat = $i['agenda_tempat'];
        $agenda_waktu = $i['agenda_waktu'];
        $agenda_keterangan = $i['agenda_keterangan'];
        //$agenda_foto = $i['agenda_foto'];
        $agenda_author = $i['agenda_author'];
        $tangal = $i['tanggal'];
      ?>
        
        <div class="modal fade" id="ModalEdit<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Agenda</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/update_agenda' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $agenda_id; ?>">
                      <input type="text" name="xnama_agenda" class="form-control" value="<?php echo $agenda_nama; ?>" id="inputUserName" placeholder="Nama Agenda" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $agenda_deskripsi; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
                    <div class="col-sm-7">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="xmulai" value="<?php echo $agenda_mulai; ?>" class="form-control pull-right datepicker3" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
                    <div class="col-sm-7">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="xselesai" value="<?php echo $agenda_selesai; ?>" class="form-control pull-right datepicker4" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                    <div class="col-sm-7">
                      <input type="text" name="xtempat" class="form-control" value="<?php echo $agenda_tempat; ?>" id="inputUserName" placeholder="Tempat" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                    <div class="col-sm-7">
                      <input type="text" name="xwaktu" class="form-control" value="<?php echo $agenda_waktu; ?>" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Link Pendafataran</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" name="xketerangan" rows="2" placeholder="Link Pendaftaran ..."><?php echo $agenda_keterangan; ?></textarea>
                    </div>
                  </div>

                  <!--<div class="form-group">
                    <label for="inputUserName" class="col-sm-4 control-label">Foto Agenda</label>
                    <div class="col-sm-7">
                    <input type="file" name="filefoto" style="width: 100%;" required><?php echo $agenda_foto; ?>
                    </div>
                  </div>-->

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
    <!--============================= END UPDATE AGENDA =============================-->

    <!--============================= HAPUS AGENDA =============================-->
      <?php foreach ($data->result_array() as $i) :
        $agenda_id = $i['agenda_id'];
        $agenda_nama = $i['agenda_nama'];
        $agenda_deskripsi = $i['agenda_deskripsi'];
        $agenda_mulai = $i['agenda_mulai'];
        $agenda_selesai = $i['agenda_selesai'];
        $agenda_tempat = $i['agenda_tempat'];
        $agenda_waktu = $i['agenda_waktu'];
        $agenda_keterangan = $i['agenda_keterangan'];
        $agenda_foto = $i['agenda_foto'];
        $agenda_author = $i['agenda_author'];
        $tangal = $i['tanggal'];
      ?>
        
        <div class="modal fade" id="ModalHapus<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Agenda</h4>
              </div>

              <form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/hapus_agenda' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $agenda_id; ?>" />
                  <p>Apakah Anda yakin mau menghapus Agenda <b><?php echo $agenda_nama; ?></b> ?</p>
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
    <!--============================= END HAPUS AGENDA =============================-->

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
        text: "Agenda Berhasil disimpan ke database.",
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
        text: "Agenda berhasil di update",
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
        text: "Agenda Berhasil dihapus.",
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
