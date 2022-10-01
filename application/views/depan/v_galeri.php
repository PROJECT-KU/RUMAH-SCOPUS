
<!--============================= TITLE =============================-->
<head>
<title><?php echo $title; ?></title>
</head>
<!--============================= END =============================-->

<!--============================= FILTER ALBUM =============================-->
<div class="gallery-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="gallery-style">Gallery Photo</h1>
                <hr size="50%" width="30%" align="center" color="orange" style="margin-top: -15px;">
            </div>
        </div>

        <div class="card text-center bg-white" style="border: none;">
            <!--<div class="card-header text-muted">
            <h5 class="m-0 card-title" style="font-size: 20px;"><b>Kategori</b></h5>
            </div>-->
            <div class="card-body bg-white">
                <?php foreach ($alb->result() as $row) : ?>
                    <a aria-current="page" href="#">  <?= anchor('Galeri/album/' . $row->album_id, '<div class="  btn btn-info text-light  light-200" style="color: white; margin:1px; position:relative;">'.$row->album_nama.'</div>')  ?></a>
                <?php endforeach;?>
            </div>
        </div>

        <!--<div class="row">
            <div class="col-md-8" style="position: relative; ">
                <center>
                    <?php foreach ($alb->result() as $row) : ?>
                        <ul class="nav nav-tabs">
                            <center>
                            <li class="nav-item " >
                                    <a  class="nav" aria-current="page" href="#">  <?= anchor('Galeri/album/' . $row->album_id, '<div class="filter-btn  btn btn-info text-light  light-200" style="color: white; margin:1px; position:relative;">'.$row->album_nama.'</div>')  ?></a>
                                </li>
                            </center>
                        </ul>
                    <?php endforeach;?>
                </center>
            </div>
        </div>-->
    </div>
</div>

<!--============================= END =============================-->



<!--============================= GALLERY FOTO BERDASAR ALBUM =============================-->

<div class="gallery-wrap" style="margin-top:-100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<h3 class="gallery-style">Gallery Photo </h3>-->
            </div>
        </div>
        <div class="row"> 
            
        <?php foreach ($alb->result() as $row) : ?>
            <!--<?php echo $row->album_id;?>-->
                <?php endforeach;?>
                <div class="col-md-12 >
                <div id="gallery">
                    <div id="gallery-content">
                        <div id="gallery-content-center">
                        <?php foreach ($all_galeri->result() as $row) : ?>
                            <a href="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                            <img style="margin-button:10px;" src="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" class="img-fluid mb-2" alt="black sample"/>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================= END =============================-->