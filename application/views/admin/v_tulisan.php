<!--Counter Inbox-->
<?php
$query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2 = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>

  <?php
  function limit_words($string, $word_limit)
  {
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
  }

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
          List Berita
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Berita</a></li>
          <li class="active">List Berita</li>
        </ol>
      </section>
    <!--============================= END JUDUL PAGE =============================-->

    <!--============================= DATA ARTIKEL =============================-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" href="<?php echo base_url() . 'admin/tulisan/add_tulisan' ?>"><span class="fa fa-plus"></span> Tambah Berita</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Author</th>
                        <th>Baca</th>
                        <th>Kategori</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $tulisan_id = $i['tulisan_id'];
                        $tulisan_judul = $i['tulisan_judul'];
                        $tulisan_isi = $i['tulisan_isi'];
                        $tulisan_tanggal = $i['tanggal'];
                        $tulisan_author = $i['tulisan_author'];
                        $tulisan_gambar = $i['tulisan_gambar'];
                        $tulisan_views = $i['tulisan_views'];
                        $kategori_id = $i['tulisan_kategori_id'];
                        $kategori_nama = $i['tulisan_kategori_nama'];
                      ?>
                        <tr>
                          <td><img src="<?php echo base_url() . 'assets/images/' . $tulisan_gambar; ?>" style="width:90px;"></td>
                          <td><?php echo $tulisan_judul; ?></td>
                          <td><?php echo $tulisan_tanggal; ?></td>
                          <td><?php echo $tulisan_author; ?></td>
                          <td><?php echo $tulisan_views; ?></td>
                          <td><?php echo $kategori_nama; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" href="<?php echo base_url() . 'admin/tulisan/get_edit/' . $tulisan_id; ?>"><span style="color: orange;" class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $tulisan_id; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
    <!--============================= END DATA ARTIKEL =============================-->
    
  </div>
  
    <!--============================= DELETE ARTIKEL =============================-->
      <?php foreach ($data->result_array() as $i) :
        $tulisan_id = $i['tulisan_id'];
        $tulisan_judul = $i['tulisan_judul'];
        $tulisan_gambar = $i['tulisan_gambar'];
      ?>

        <div class="modal fade" id="ModalHapus<?php echo $tulisan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/tulisan/hapus_tulisan' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $tulisan_id; ?>" />
                  <input type="hidden" value="<?php echo $tulisan_gambar; ?>" name="gambar">
                  <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $tulisan_judul; ?></b> ?</p>

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
    <!--============================= END DELETE ARTIKEL =============================-->

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
        text: "Berita Berhasil disimpan ke database.",
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
        text: "Berita berhasil di update",
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
        text: "Berita Berhasil dihapus.",
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