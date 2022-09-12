<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Cambo&family=Roboto:wght@100&display=swap" />
<style>
    h1 {
        font-family: Cambo;
        font-size: 50px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
        margin-bottom: 40px;
    }
</style>
<section class="our-teachers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">


                </div>
                <center>
                    <h1>Trainer Kami</h1>
                    <hr size="50%" width="30%" align="center" color="orange" style="margin-top: -15px;">
                </center>
            </div>
        </div>
        <center>
            <img src="<?php echo base_url() . 'theme/images/bapak1.jpg' ?>">
            <p class="text-center mt-3"><span style=" font-size:20px; color:black"><strong>Dr. Jumintono Suwardi Joyo Sumarto, M.Pd</strong></span><br>
                <strong><span style="color: #CBB58B;">Master Trainer</span></strong></p>
            </p>
        </center>
        <div class="row">
            <?php foreach ($data->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <?php if (empty($row->guru_photo)) : ?>
                            <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="img-fluid" alt="#">
                        <?php else : ?>
                            <img src="<?php echo base_url() . 'assets/images/' . $row->guru_photo; ?>" class="img-fluid" alt="#">
                        <?php endif; ?>
                        <p class="text-center mt-3" style="font-size: 17px; "><span style="color: black;"><?php echo $row->guru_nama; ?></span>
                            <br><span style="color: #CBB58B">
                                <?php echo $row->guru_mapel; ?></span></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- End row -->
        <nav><?php echo $page; ?></nav>
    </div>
</section>