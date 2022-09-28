
<!--============================= TITLE =============================-->
<head>
<title><?php echo $title; ?></title>
</head>
<!--============================= END =============================-->

<!--============================= AGENDA =============================-->
<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="event-title">Agenda</h2>
            </div>
            <div class="col-md-8">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item nav-tab1">
                        <a class="nav-link tab-list active" data-toggle="tab" href="#" role="tab">Agenda Terbaru </a>
                    </li>

                </ul>
            </div>
        </div>
        <br>
        <div class="row">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                    <?php foreach($data->result() as $row):?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="event-date">
                                    <h4><?php echo date("d", strtotime($row->agenda_tanggal));?></h4> <span><?php echo date("M Y", strtotime($row->agenda_tanggal));?></span>
                                </div>
                                <span class="event-time"><?php echo $row->agenda_waktu;?></span>
                            </div>
                            <div class="col-md-10">
                                <div class="event-heading">
                                    <h3><?php echo $row->agenda_nama;?></h3>
                                    <span style="color: orange; margin-top:-30px;"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("d M y", strtotime($row->agenda_mulai));?> s/d <?php echo date("d M y", strtotime($row->agenda_selesai));?> | <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row->agenda_tempat;?> | <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                        </svg> <?php echo $row->agenda_waktu;?>
                                    </span>
                                    <div class="card mt-3 kotak">
                                        <div class="card-body" style="margin: 10px;">
                                            <blockquote >
                                                <?php echo $row->agenda_deskripsi;?>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <a href="https://<?php echo $row->agenda_keterangan;?>." class="btn btn-warning mb-3 mt-3" style="color:white; border-radius:30px; background-color:orange;">
                                        Daftar Sekarang!
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="event-underline">
                    </div>
                    <?php endforeach;?>

                    <div class="col-md-12 text-center">
                        <?php echo $page;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================= END =============================-->