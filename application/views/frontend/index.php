<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Relawan Pajak | Tax Center Universitas Gunadarma</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?=base_url('assets/frontend');?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?=base_url('assets/frontend');?>/assets/pages/css/animate.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?=base_url('assets/frontend');?>/assets/pages/css/components.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/pages/css/slider.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/corporate/css/style.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="<?=base_url('assets/frontend');?>/assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?=base_url('assets/frontend');?>/assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!--<div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>-->
    <!-- END BEGIN STYLE CUSTOMIZER --> 

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-globe"></i><span><a href="http://taxcenter.gunadarma.ac.id">Tax Center</a></span></li>
                        <li><i class="fa fa-envelope-o"></i><span><a href="mailto:taxcenter@gunadarma.ac.id">taxcenter@gunadarma.ac.id</a></span></li>
                        <li><i class="fa fa-phone"></i><span>021-7888-111-2 ext : 110</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="<?=base_url().'index/login';?>">Log In</a></li>
                        <li><a href="<?=base_url().'index/registrasi';?>">Registrasi</a></li>
                        <!--<li><a href="http://bit.ly/pembayarankursustaxcentergunadarma">Konfirmasi Pembayaran</a></li>-->
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <?php $this->load->view('frontend/header'); ?>
    <?php $this->load->view($content); ?>
    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Tentang Kami</h2>
            <p>Relawan Pajak ini kami selenggarakan untuk mengedukasi mahasiswa universitas gunadarma dalam bidang perpajakan di indonesia.</p>

            <!--<div class="photo-stream">
              <h2>Photos Stream</h2>
              <ul class="list-unstyled">
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img5-small.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img1.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img4-large.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img6.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img3.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img2-large.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img2.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img5.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img5-small.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img1.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img4-large.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img6.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img3.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/people/img2-large.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="<?php //base_url('assets/frontend');?>/assets/pages/img/works/img2.jpg"></a></li>
              </ul>                    
            </div>-->
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Kontak Kami</h2>
            <address class="margin-bottom-40">
              Kampus D Universitas Gunadarma<br>
              Jl. Margonda Raya No 100, Depok<br>
              Phone: 021-7888-111-2 ext : 110<br>
              <!--Fax: 300 323 1456<br>-->
              Email: <a href="mailto:taxcenter@gunadarma.ac.id">taxcenter@gunadarma.ac.id</a><br>
              <!--Skype: <a href="skype:metronic">metronic</a>-->
            </address>
            <!--<div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              
            </div>-->
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Subscribe</h2>
              <p>Subscribe untuk mendapatkan info terbaru dari kami</p>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            <!--<h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>-->
          </div>
          <!-- END TWITTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            2020 © Relawan Pajak. ALL Rights Reserved 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-4 col-sm-4">
            <!--<ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-github"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li>
            </ul> --> 
          </div>
          <!-- END PAYMENTS -->
          <!-- BEGIN POWERED -->
          <div class="col-md-4 col-sm-4 text-right">
            <p class="powered">Powered by: <a href="http://taxcenter.gunadarma.ac.id">Tax Center</a> | <a href="http://gunadarma.ac.id">Universitas Gunadarma</a></p>
          </div>
          <!-- END POWERED -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="<?=base_url('assets/frontend');?>/assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/frontend');?>/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/frontend');?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?=base_url('assets/frontend');?>/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?=base_url('assets/frontend');?>/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?=base_url('assets/frontend');?>/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="<?=base_url('assets/frontend');?>/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/frontend');?>/assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling();
        });
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>