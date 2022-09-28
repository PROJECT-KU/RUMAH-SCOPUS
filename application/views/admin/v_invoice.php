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
                    Bukti Pembayaran
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url('admin/webinar') ?>"><i class="fa fa-list"></i> Bukti Pembayaran</a></li>
                    <li class="active">Bukti Pembayaran</li>
                </ol>
            </section>
        <!--============================= END JUDUL PAGE =============================-->

        <!--============================= DATA INVOICE =============================-->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box">
                                <div class="box-body">
                                    <table id="example1" class="table table-striped" style="font-size:12px;">
                                        <thead>
                                            <tr>
                                                <th style="width:70px;">#</th>
                                                <th>ID Order</th>
                                                <th>Email</th>
                                                <th>Kategori</th>
                                                <th>Bukti Pembayaran</th>

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
                                                    <td><?php echo $i['id_order']; ?></td>
                                                    <td><?php echo $i['email']; ?></td>
                                                    <td><?php echo $i['kategori']; ?></td>
                                                    <td><a href="<?= base_url('assets/images/') . $i['bukti_pembayaran'] ?>"  /><img style="width: 50px; height:50px;" src=<?= base_url('assets/images/') . $i['bukti_pembayaran'] ?> /></td>
                                                    <td style="text-align:right;">
                                                        <!--<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['id']; ?>"><span class="fa fa-pencil"></span></a>-->
                                                        <a class="btn" data-toggle="modal" href="<?php echo base_url('admin/invoice/delete/') .  $i['id']; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
        <!--============================= END DATA INVOICE =============================-->
        
    </div>
</body>
<!--============================= END CONTENT =============================-->

<!--============================= JAVA SCRIPT =============================-->
    <script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
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
        $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
        alwaysShowClose: true
        });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
    $('.btn[data-filter]').removeClass('active');
    $(this).addClass('active');
        });
    })
    </script>
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