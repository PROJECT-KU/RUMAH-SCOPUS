<head>

    <!-- Required meta tags -->
    <link rel="shortcut icon" href="favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rumah Scopus</title>
    <link rel="shortcut icon" href="<?php echo base_url() . 'theme/images/logo/favicon.ico' ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/bootstrap.min.css' ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/simple-line-icons.css' ?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick-theme.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/owl.carousel.min.css' ?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url() . 'theme/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/css/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">
    <!-- Calendar Css -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/fullcalendar.min.css' ?>" />
    <!--Social Share-->
    <link href="<?php echo base_url() . 'theme/css/jssocials.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/css/jssocials-theme-flat.css' ?>" rel="stylesheet">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/magnific-popup.css' ?>">
    <!-- Image Hover CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/normalize.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/set2.css' ?>" />
    <!-- Masonry Gallery -->
    <link href="<?php echo base_url() . 'theme/css/animated-masonry-gallery.css' ?>" rel="stylesheet" type="text/css" />
   
    <style>
        .sharePopup {
            font-size: 11px;
        }

        .sharePopup a {
            font-size: 11px;
            color: #fff;
            text-decoration: none;
        }
    </style>
    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>
<!-- box shadow -->
<style>
    .kotak{
        box-shadow: 20px 20px 50px grey;
    }
    </style>
<!-- end -->

<!--============================= GALLERY =============================-->
<!--<link href="<?php echo base_url() . 'theme/galeri/css/bootstrap.min.css' ?>" rel="stylesheet">-->
<link href="<?php echo base_url() . 'theme/galeri/css/boxicon.min.css' ?>" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() . 'theme/galeri/css/templatemo.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'theme/galeri/css/custom.css' ?>">
<!--============================= END =============================-->

<!--============================= KENAPA MEMILIH KAMI & BRAND PARTNER =============================-->
   
    <style>

@media (max-width:992px){
  .digital-marketing-service 
  .flex-item:first-of-type{order:2}
  .digital-marketing-service 
  .flex-item:nth-of-type(2){order:1}
  .digital-marketing-service 
  .img-digital{text-align:center}
}
    </style>
    
<!-- BRAND PARTNER -->
<style>
@media (max-width: 767px) {
    .brand-logo {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
}
.single-logo {
    padding: 15px 30px;
    text-align: center;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .single-logo {
    padding: 15px 15px;
    }
}
@media (max-width: 767px) {
    .single-logo {
    padding: 15px 30px;
    }
}
@media (max-width: 767px) {
    .single-logo {
    width: 50%;
    }
}
@media only screen and (min-width: 576px) and (max-width: 767px) {
    .single-logo {
    width: 33.33%;
    }
}
.single-logo img {
    max-width: 100%;
    -webkit-filter: grayscale(5);
    filter: grayscale(5);
    opacity: 0.5;
    -webkit-transition: all 0.3s ease-out 0s;
    transition: all 0.3s ease-out 0s;
}
.single-logo:hover img {
    opacity: 1;
    -webkit-filter: none;
    filter: none;
}
    </style>
    <!-- END -->

<!--============================= END =============================-->


</head>


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
<script src="<?php echo base_url() . 'theme/js/contact.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/jquery-ui-1.10.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/jquery.isotope.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/animated-masonry-gallery.js' ?>"></script>
<!-- Script JS -->
<script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>
<!-- Plugins -->
<script src="<?php echo base_url() . 'theme/js/moment.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/fullcalendar.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>
<!-- Script JS -->
<script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/jssocials.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/dataTables.bootstrap4.min.js' ?>"></script>
<!-- Magnific popup JS -->
<script src="<?php echo base_url() . 'theme/js/jquery.magnific-popup.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#display').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $(".sharePopup").jsSocials({
            showCount: true,
            showLabel: true,
            shareIn: "popup",
            shares: [{
                    share: "twitter",
                    label: "Twitter"
                },
                {
                    share: "facebook",
                    label: "Facebook"
                },
                {
                    share: "googleplus",
                    label: "Google+"
                },
                {
                    share: "linkedin",
                    label: "Linked In"
                },
                {
                    share: "pinterest",
                    label: "Pinterest"
                }
            ]
        });
    });
</script>



<!--============================= HOME =============================-->
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rumah Scopus</title>
    <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/logo/favicon-32x32.png' ?>">
    </head>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" />
<style>
    h1 {
        font-family: Bahnschrift;
        font-size: 40px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
    }



    p {
        font-family: Righteous;
        font-size: 14px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 20px;
    }

    blockquote {
        font-family: Righteous;
        font-size: 21px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 30px;
    }

    pre {
        font-family: Righteous;
        font-size: 13px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 18.5714px;
    }
</style>

<!-- FITUR -->
<link rel="stylesheet" href="<?php echo base_url() . 'theme/css/fiturHome.css' ?>">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!-- END -->

<!-- VIDEO YOUTUBE -->
<style>
    html,
    body1 {
        height: 100%
    }

    .container1 {
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 40px;

        justify-content: center;
        align-items: center;
    }

    .box {
        height: 100px;
        width: 100px;

    }
</style>
<!-- END -->

<!--============================= END HOME =============================-->
