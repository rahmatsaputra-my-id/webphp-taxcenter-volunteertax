<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi | Brevet Tax Center Univ. Gunadarma</title>
    <link rel="icon" type="image/png" href="<?=base_url('assets');?>/image/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
    .login-page, .register-page {
        background: url('<?php echo base_url(); ?>assets/image/aaa.jpg') no-repeat fixed center center;
    }
    .login-logo a, .register-logo a{
        color:#f4f4f4;
    }
  </style>
  <body class="hold-transition register-page">
	<div style="padding-top:10px; padding-left:10px;">
	<a type="button" class="btn btn-default btn-circle btn-lg" href="http://taxcenter.gunadarma.ac.id"><i class="fa fa-home"></i></a>
	</div>
    <div class="register-box">
      <div class="register-logo">
        <a style="font-size:25px;">Brevet A&B Terpadu</a> </br>
		<a style="font-size:25px;"><b>Tax Center Univ. Gunadarma</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <br/><?php echo $this->session->flashdata('message');?>
        </p>
        <form action="<?=base_url();?>registrasi/konfirmasi_bayar" method="post" enctype="multipart/form-data">
          
			<div class="form-group">
				<label>NPM</label>
				<input type="text" name="npm" value="" class="form-control">
			</div>
			<div class="form-group">
				<label>Upload Bukti Pembayaran</label>
				<input type="file" name="image" value="" class="form-control">
			</div>
			<div class="row">
			<div class="col-xs-4">
				  <input type="submit" class="btn btn-primary btn-block btn-flat" name="simpan" value="Konfirmasi" onclick="return confirm('Apakah Anda yakin data ini benar?')">
				</div><!-- /.col -->
			</div>
			
		<br />
		<div class="row">
            <div class="col-xs-6">
              <img src="<?=base_url('assets/image/Logo UG.png'); ?>" width='150' align='center' height='50' alt='User Image'>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <img src="<?=base_url('assets/image/Logo TC.png'); ?>" width='150' height='50' alt='User Image'>
            </div><!-- /.col -->
          </div>
        </form>
    </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/backend');?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/backend');?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/backend');?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/backend');?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url('assets/backend');?>/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?=base_url('assets/backend');?>/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?=base_url('assets/backend');?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?=base_url('assets/backend');?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?=base_url('assets/backend');?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?=base_url('assets/backend');?>/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?=base_url('assets/backend');?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/backend');?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/backend');?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/backend');?>/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/backend');?>/dist/js/demo.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/backend');?>/plugins/iCheck/icheck.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
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
  </body>
</html>