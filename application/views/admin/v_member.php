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
          Data Member
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Member</a></li>
          <li class="active">Data Member</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA MEMBER =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                          <th style="width:20px;">No</th>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th style="text-align:center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                          $no++;
                        $foto = $i['foto'];
                        $id = $i['id'];
                        $nama = $i['nama'];
                        $gender = $i['gender'];
                        $email = $i['email'];
                        $no_hp = $i['no_hp'];
                        $alamat = $i['alamat'];
                        $user_active = $i['user_active'];
                      ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                          <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $foto; ?>"></td>
                          <td><?php echo $id; ?></td>
                          <td><?php echo $nama; ?></td>
                          <td><?php echo $gender; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $no_hp; ?></td>
                          <td><?php echo $alamat; ?></td>
                          <?php if ($user_active == '1') : ?>
                            <td>Aktif</td>
                          <?php else : ?>
                            <td>Non Aktif</td>
                          <?php endif; ?>
                          <td style="text-align:right;">
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
    <!--============================= END DATA MEMBER =============================-->

    </div>

    <!--============================= DELETE MEMBER =============================-->  
      <?php foreach ($data->result_array() as $i) :
        $foto = $i['foto'];
                            $id = $i['id'];
                            $nama = $i['nama'];
                            $gender = $i['gender'];
                            $email = $i['email'];
                            $no_hp = $i['no_hp'];
                            $alamat = $i['alamat'];
                            $user_active = $i['user_active'];
      ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/pengguna/hapus_pengguna' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                  <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $nama; ?></b> ?</p>

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
    <!--============================= END DELET MEMBER =============================-->

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
  <?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Warning',
        text: "Gambar yang Anda masukan terlalu besar.",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FFC017'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Pengguna Berhasil disimpan ke database.",
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
        text: "Pengguna berhasil di update",
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
        text: "Pengguna Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'show-modal') : ?>
    <script type="text/javascript">
      $('#ModalResetPassword').modal('show');
    </script>
  <?php else : ?>

  <?php endif; ?>
<!--============================= END JAVA SCRIPT =============================-->