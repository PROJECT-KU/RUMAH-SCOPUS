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
                    Invoice Bengkel Scopus
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url('admin/webinar') ?>"><i class="fa fa-list"></i> Bengkel Scopus</a></li>
                    <li class="active">Invoice Bengkel</li>
                </ol>
            </section>
        <!--============================= END JUDUL PAGE =============================-->

        <!--============================= DATA INVOIVE PAPER =============================-->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box">
                                <div class="box-body">
                                    <?= $this->session->flashdata('pesan') ?>
                                    <table id="example1" class="table table-striped" style="font-size:12px;">
                                        <thead>
                                            <tr>
                                                <th style="width:70px;">#</th>
                                                <th>ID Order</th>
                                                <th>Nama Pemesan</th>
                                                <th>Email Pemesan</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Tanggal Order</th>
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
                                                    <td><?php echo $i['id_pesanan']; ?></td>
                                                    <td><?php echo $i['nama']; ?></td>
                                                    <td><?php echo $i['email']; ?></td>
                                                    <td><?php echo $i['Kategori']; ?></td>
                                                    <td><?php echo $i['harga']; ?></td>
                                                    <td><?php echo $i['tanggal_order']; ?></td>
                                                    <?php if ($i['status'] == 1) : ?>
                                                    <td>Confirm</td>
                                                    <?php else : ?>
                                                    <td>Pending</td>
                                                    <?php endif; ?>
                                                    <td style="text-align:right;">
                                                        <a class="btn" data-toggle="modal" href="<?php echo base_url('admin/invoicebengkel/konfir/') .  $i['id_pesanan']; ?>"><span style="color: green;" class="fa fa-check-circle"></span></a>
                                                        <a class="btn" data-toggle="modal" href="<?php echo base_url('admin/invoicebengkel/pending/') .  $i['id_pesanan']; ?>"><span style="color: orange;" class="fa fa-close"></span></a>
                                                        <a class="btn" data-toggle="modal" href="<?php echo base_url('admin/invoicebengkel/delete/') .  $i['id_pesanan']; ?>"><span style="color: red;" class="fa fa-trash"></span></a>
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
        <!--============================= END DATA INVOICE PAPER =============================-->

    </div>
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