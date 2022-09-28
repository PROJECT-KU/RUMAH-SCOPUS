
<!--============================= TITLE =============================-->
<head>
<title><?php echo $title; ?></title>
</head>
<!--============================= END =============================-->

<!--============================= CABANG =============================-->
<section class="our_courses" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                </div>
                <center>
                    <h1>Cabang Kami</h1>
                    <hr size="50%" width="25%" align="center" color="orange" style="margin-top: -10px;">
                </center>
            </div>
        </div>
        <div class="row" ">
        <?php foreach ($data->result() as $row) : ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card courses_box mb-4">
                    <?php if (empty($row->siswa_photo)) : ?>
                        <img style="background-color: rgba(22, 160, 133, 0.1); " src="<?php echo base_url() . 'theme/images/logo/scopus.png'; ?>" class="img-fluid" alt="#">
                    <?php else : ?>
                        <img style="background-color: rgba(22, 160, 133, 0.1); " src="<?php echo base_url() . 'assets/images/' . $row->siswa_photo; ?>" class="img-fluid" alt="#">
                    <?php endif; ?> 
                    <div class="card-body">
                        <center>
                            <h5 class="card-title mt-3" ><b><?php echo $row->kelas_nama; ?></p></b></h5>
                        </center>
                        <hr size="6px" width="50%" align="center" color="orange">
                        <!--<p style="margin-left:15px;">Pelayanan kegiatan seminar yang dilakukan secara online atau offline yang di lakukan oleh pihak scopus dalam melayani pendampingan jurnal</p>-->
                        <center>
                            <a href="https://api.whatsapp.com/send?phone=<?php echo $row->siswa_nis; ?>&text=Hallo%20kak!%20Saya%20mau%20pesan%20program%20Rumah%20Scopus." class="btn btn-warning mb-3" style="color:white; border-radius:30px; background-color:orange;">
                                Hubungi Sekarang!
                            </a>
                        </center>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <nav><?php echo $page; ?></nav>
    </div>
</section>
<!--============================= END =============================-->



        <!--<div class="row">
            <?php foreach ($data->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <?php if (empty($row->siswa_photo)) : ?>
                            <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="img-fluid" alt="#">
                        <?php else : ?>
                            <img src="<?php echo base_url() . 'assets/images/' . $row->siswa_photo; ?>" class="img-fluid" alt="#">
                        <?php endif; ?>
                        <p class="text-center mt-3"><span><?php echo $row->siswa_nama; ?></span>
                            <br>
                            <?php echo $row->kelas_nama; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <nav><?php echo $page; ?></nav>
    </div>
</section>-->