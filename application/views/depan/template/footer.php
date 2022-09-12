<script src="https://cdn.jsdelivr.net/npm/vue@2.7.8"></script>
<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=+6281226883280&text=Hallo%20kak!%20Saya%20mau%20tanya%20tentang%20layanan%20Rumah%20Scopus." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>

<!--============================= FOOTER =============================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="foot-logo">
                    <a href="<?php echo site_url(); ?>">
                        <img class="img img-responsive" width="250px;" src="<?php echo base_url() . 'theme/images/logo/logo.png' ?>" class="img-fluid" alt="footer_logo">
                    </a>
                    <p>copyright © <?php echo date('Y'); ?>  by <a href="" target="_blank" style="color: orange;">Rumah Scopus Foundation</a>. <br>All rights reserved.</p>

                </div>
            </div>
            <div class="col-md-3">
                <div class="sitemap">
                    <h3>Menu Utama</h3>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>">Beranda</a></li>
                        <li><a href="<?php echo site_url('trainer'); ?>">Trainer</a></li>
                        <li><a href="<?php echo site_url('agenda'); ?>">Agenda</a></li>
                        <li><a href="<?php echo site_url('cabang'); ?>">Cabang</a></li>
                        <li><a href="<?php echo site_url('artikel'); ?>">Artikel</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sitemap">
                    <h3>Akademik</h3>
                    <ul>
                        <li><a href="<?php echo site_url('#'); ?>">Webinar Scopus Training</a></li>
                        <li><a href="<?php echo site_url('#'); ?>">Scopus Camp</a></li>
                        <li><a href="<?php echo site_url('#'); ?>">Program Nyata Percepatan Guru Besar (PNP GB)</a></li>
                        <li><a href="<?php echo site_url('#'); ?>">Multi Entri Multi Exit (MeMe)</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3>Hubungi Kami</h3>
                    <p><span>Alamat: </span>Bangunsari, Bangunkerto, Turi, Sleman, Yogyakarta 55551</p>
                    <p>Email : info@rumahscopus.com
                        <br> Phone : (+62) 812-2688-3280</p>
                    <ul class="footer-social-icons">
                        <li><a href="https://www.facebook.com/rumah.scopus.3"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCRieEL0h0Zi4ju0t9zeU76g"><i class="fa fa-youtube fa-in" aria-hidden="true"></i></a></li>
                        <li><a href="mailto:info@rumahscopus.com"><i class="fa fa-envelope fa-tw" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/rumah_scopus/"><i class="fa fa-instagram fa-in" aria-hidden="true"></i></a></li>

                    </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//END FOOTER -->

<!--============================= HOME =============================-->
<!--//END TESTIMONIAL -->
<!-- jQuery, Bootstrap JS. -->
<script src="<?php echo base_url() . 'theme/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tether.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/bootstrap.min.js' ?>"></script>
<!-- Plugins -->
<script src="<?php echo base_url() . 'theme/js/slick.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/waypoints.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/counterup.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>
<!-- Subscribe -->
<script src="<?php echo base_url() . 'theme/js/subscribe.js' ?>"></script>
<!-- Script JS -->
<script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>


<!--============================= END HOME =============================-->

<!-- galeri -->
<!--<script src="<?php echo base_url() . 'theme/galeri/js/bootstrap.bundle.min.js' ?>"></script>
  
    <script src="<?php echo base_url() . 'theme/galeri/js/jquery.min.js' ?>"></script>
    
    <script src="<?php echo base_url() . 'theme/galeri/js/isotope.pkgd.js' ?>"></script>
    
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
   
    <script src="<?php echo base_url() . 'theme/galeri/js/templatemo.js' ?>"></script>
   
    <script src="<?php echo base_url() . 'theme/galeri/js/custom.js' ?>"></script>-->
<!-- end -->