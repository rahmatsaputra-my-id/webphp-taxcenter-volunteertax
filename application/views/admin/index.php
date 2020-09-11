<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Tes Online | <?=$judul;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for blank page layout" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS Typeahead -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS Typeahead -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL Data Tables PLUGINS -->
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL Data Tables PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets/backend');?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url('assets/backend');?>/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/backend');?>/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url('assets/backend');?>/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <script src="<?=base_url('assets/backend');?>/bmt/jquery2.js"></script>
  <style>
  #result {
    height:20px;
    font-size:12px;
    font-family:Arial, Helvetica, sans-serif;
    color:#333;
    padding:5px;
    margin-bottom:10px;
    background-color:#FFFF99;
  }
  #nama_akun{
    padding:3px;
    border:1px #CCC solid;
    font-size:12px;
  }
  .suggestionsBox {
    position: inherit;
    left: 0px;
    top:40px;
    margin: 26px 0px 0px 0px;
    width: 200px;
    padding:0px;
    background-color:#999999;
    border-top: 3px solid #999999;
    color: #fff;
  }
  .suggestionList {
    margin: 0px;
    padding: 0px;
  }
  .suggestionList ul li {
    list-style:none;
    margin: 0px;
    padding: 6px;
    border-bottom:1px dotted #666;
    cursor: pointer;
  }
  .suggestionList ul li:hover {
    background-color: #FC3;
    color:#000;
  }
  .ulakun {
    font-family:Arial, Helvetica, sans-serif;
    font-size:11px;
    color:#FFF;
    padding:0;
    margin:0;
  }
  
  .load{
  background-image:url('<?=base_url();?>assets/backend/bmt/loader.gif');
  background-position:right;
  background-repeat:no-repeat;
  }
  
  #suggest {
    position:relative;
  }
.page-header .page-header-top .page-logo .logo-default{
  margin:15px 0px 0px;
}

  .page-footer{    
    position: fixed;
    left: 0;
    right: 0;
    z-index: 10000;
    bottom: 0;
  }

  .page-content{
    padding-bottom: 62px;
  }
  </style>
  <script type="text/javascript" src="<?=base_url('assets/backend').'/bmt';?>/jquery2.js"></script>
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-menu-fixed">
        <div class="page-wrapper">
            <?php $this->load->view('admin/header2'); ?>
            <?php /*$this->load->view('admin/header');*/ ?>
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <!-- <div class="clearfix"> </div> -->
            <!-- END HEADER & CONTENT DIVIDER -->
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <?php // echo $this->load->view('admin/sidebar'); ?>
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <!-- <div class="page-head">
                                <div class="container-fluid">
                                    <div class="page-title">
                                        <h1><?=$judul;?></h1>
                                    </div>
                                    <div class="page-title pull-right">
                                        <h1> 
                                            <?php // $query1=$this->db->where('id',$this->session->userdata('id_tabel'))->get('data_register');foreach ($query1->result() as $karyawan ){ echo $karyawan->nama_lengkap;}?>
                                        </h1>
                                    </div>
                                </div>
                            </div> -->
                            <!-- END PAGE HEAD-->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE BREADCRUMB -->
                                    <?=$this->breadcrumb->show();?>
                                    <!-- END PAGE BREADCRUMB -->
                                    <!-- BEGIN PAGE BASE CONTENT -->
                                    <?=$this->session->flashdata('message');?>
                                    <?php $this->load->view($content);?>
                                    <!-- END PAGE BASE CONTENT -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                    <!-- BEGIN FOOTER -->
                    <div class="page-footer">
                        <div class="page-footer-inner"> 2017 &copy; Tes Online &nbsp;|&nbsp; By
                            <a target="_blank" href="http://rdevelopper.com">rdevelopper.com</a> 
                        </div>
                        <div class="scroll-to-top">
                            <i class="icon-arrow-up"></i>
                        </div>
                    </div>
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="<?php //base_url('assets/backend');?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php //base_url('assets/backend');?>/assets/global/plugins/excanvas.min.js"></script> 
<script src="<?php //base_url('assets/backend');?>/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS jquery-->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS jquery-->
        <!-- BEGIN PAGE LEVEL Data Tables PLUGINS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL Data Tables PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS Typeahead -->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS Typeahead -->
        <!-- BEGIN PAGE LEVEL SCRIPTS datepicker -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS datepicker -->
        <!-- BEGIN PAGE LEVEL SCRIPTS Data Tables -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/table-datatables-scroller.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS Data Tables -->
        <!-- BEGIN PAGE LEVEL SCRIPTS Edit Tables -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/table-datatables-editable.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS Edit Tables -->
        <!-- BEGIN PAGE LEVEL SCRIPTS fixheader -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/table-datatables-fixedheader.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS fixheader-->
        <!-- BEGIN PAGE LEVEL SCRIPTS Typeahead -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/components-typeahead.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS typeahead -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--<script src="<?php //=base_url('assets/backend');?>/bmt/scripts/registrasi-wizard.js" type="text/javascript"></script>-->
        <script src="<?=base_url('assets/backend');?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS modals-->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/ui-modals.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS modals-->
        <!-- BEGIN PAGE LEVEL SCRIPTS form validation -->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/form-validation.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url('assets/backend');?>/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- bmt-->
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/arf.js"></script>
        <script src="<?=base_url('assets/backend');?>/bmt/scripts/prs.js"></script>
        
        <!--bmt-->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=base_url('assets/backend');?>/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/backend');?>/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>
</html>