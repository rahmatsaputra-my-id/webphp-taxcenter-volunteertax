<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title><?=$judul; ?></title>
    <link rel="icon" type="image/png" href="<?=base_url('assets');?>/image/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/font-awesome/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/iCheck/flat/blue.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    $(document).ready(function(){
      $('#id_jaminan').change(function(){
        $.getJSON('<?=base_url()."home/tampil_jaminan";?>',{action:'getJaminan',id_jaminan:$(this).val()},function(json){
          if(json==null){
            $('#anggota').val('');
            $('#realisasi').val('');
            $('#total_angsuran').val('');
            $('#jangka_waktu').val('');
            $('#jatuh_tempo').val('');
          }else{
            $('#anggota').val(json.anggota);
            $('#realisasi').val(json.realisasi);
            $('#total_angsuran').val(json.total_angsuran);
            $('#jangka_waktu').val(json.jangka_waktu);
            $('#jatuh_tempo').val(json.jatuh_tempo);
          }
        });
      });
    });
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php //$this->load->view('header');?>
	        <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url('operator');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Brevet </b>Terpadu</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='user-image' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='user-image' alt='User Image'>";
                    }?>
                  <span class="hidden-xs"><?=$this->session->userdata("nama")?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='img-circle' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='img-circle' alt='User Image'>";
                    }?>
                    <p>
                      <?=$this->session->userdata("nama")?>
                      <small><?=$this->session->userdata("level")?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url('home/user');?>" class="btn btn-default btn-flat">Edit</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url('home/logout');?>" class="btn btn-default btn-flat" onclick="return confirm('Apakah Anda yakin akan Logout?')">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <?php //$this->load->view('menu');?>
	  
	  <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='img-circle' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='img-circle' alt='User Image'>";
                    }?>
            </div>
            <div class="pull-left info">
              <a>Nama &nbsp;&nbsp;&nbsp;: &nbsp; <?=$this->session->userdata("nama")?></a><br/>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
			<?php
				$sess_array = $this->session->userdata('level');
				$uri2 = $this->uri->segment(2);
				
				$menu = array();
				
				if ($sess_array == "Mahasiswa"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
						array("icon"=>"check-square-o", "url"=>"pretest", "text"=>"Pretest"),
						array("icon"=>"user", "url"=>"profile", "text"=>"Profile"),
						//array("icon"=>"newspaper-o", "url"=>"post", "text"=>"Berita"),
						array("icon"=>"file-pdf-o", "url"=>"modul", "text"=>"Modul"),
						//array("icon"=>"male", "url"=>"pengajar", "text"=>"Pengajar"),
						array("icon"=>"calendar", "url"=>"jadwal", "text"=>"Jadwal"),
						//array("icon"=>"dashboard", "url"=>"nilai", "text"=>"Nilai"),
					);
				} else if ($sess_array == "Super Admin"){
          $menu = array(
            array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
            array("icon"=>"edit", "url"=>"registrasi", "text"=>"Status Registrasi"),
            array("icon"=>"edit", "url"=>"pembayaran", "text"=>"Pembayaran"),
            array("icon"=>"calendar", "url"=>"gelombang", "text"=>"Gelombang"),
            array("icon"=>"calendar", "url"=>"ujian", "text"=>"Ujian"),
            array("icon"=>"edit", "url"=>"a_post", "text"=>"Posting"),
            array("icon"=>"book", "url"=>"a_modul", "text"=>"Modul"),
            array("icon"=>"newspaper-o", "url"=>"kategorisoal", "text"=>"Kategori Soal"),
            //array("icon"=>"newspaper-o", "url"=>"kursus2", "text"=>"Soal"),
            //array("icon"=>"calendar", "url"=>"hasil_ujian", "text"=>"Hasil Ujian"),
            array("icon"=>"user", "url"=>"mahasiswa", "text"=>"Mahasiswa"),
            array("icon"=>"male", "url"=>"a_pengajar", "text"=>"Pengajar"),
            array("icon"=>"book", "url"=>"kursus", "text"=>"Kursus"),
            array("icon"=>"book", "url"=>"workshop", "text"=>"Workshop"),
            array("icon"=>"calendar", "url"=>"aspekpenilaian", "text"=>"Aspek Penilaian"),
            array("icon"=>"calendar", "url"=>"a_jadwal", "text"=>"Jadwal"),
            array("icon"=>"check-square-o", "url"=>"a_input_nilai", "text"=>"Input Nilai"),
            array("icon"=>"book", "url"=>"up", "text"=>"Username Password"),
          );
        } else if ($sess_array == "Admin"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
            array("icon"=>"edit", "url"=>"registrasi", "text"=>"Status Registrasi"),
            array("icon"=>"edit", "url"=>"pembayaran", "text"=>"Pembayaran"),
            array("icon"=>"calendar", "url"=>"gelombang", "text"=>"Gelombang"),
            array("icon"=>"calendar", "url"=>"ujian", "text"=>"Ujian"),
						array("icon"=>"edit", "url"=>"a_post", "text"=>"Posting"),
						array("icon"=>"book", "url"=>"a_modul", "text"=>"Modul"),
						array("icon"=>"newspaper-o", "url"=>"kategorisoal", "text"=>"Kategori Soal"),
						//array("icon"=>"newspaper-o", "url"=>"kursus2", "text"=>"Soal"),
						//array("icon"=>"calendar", "url"=>"hasil_ujian", "text"=>"Hasil Ujian"),
						array("icon"=>"user", "url"=>"mahasiswa", "text"=>"Mahasiswa"),
						array("icon"=>"male", "url"=>"a_pengajar", "text"=>"Pengajar"),
						array("icon"=>"book", "url"=>"kursus", "text"=>"Kursus"),
						array("icon"=>"book", "url"=>"workshop", "text"=>"Workshop"),
						array("icon"=>"calendar", "url"=>"aspekpenilaian", "text"=>"Aspek Penilaian"),
						array("icon"=>"calendar", "url"=>"a_jadwal", "text"=>"Jadwal"),
						array("icon"=>"check-square-o", "url"=>"a_input_nilai", "text"=>"Input Nilai"),
					);
				} else if ($sess_array == "Pengajar"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
						array("icon"=>"book", "url"=>"p_profile", "text"=>"Profile"),
						array("icon"=>"newspaper-o", "url"=>"post", "text"=>"Berita"),
						array("icon"=>"file-pdf-o", "url"=>"a_modul", "text"=>"Modul"),
						array("icon"=>"calendar", "url"=>"p_jadwal", "text"=>"Jadwal"),
						array("icon"=>"check-square-o", "url"=>"input_nilai", "text"=>"Input Nilai"),
					);
				} else {
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
					);
				}
				
			?>
		  
		  
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			
			<?php
				foreach ($menu as $m){
					if ($uri2 == $m['url']){
						echo '<li class="treeview active"><a href="'.base_url().'home/'.$m['url'].'"><i class="fa fa-'.$m['icon'].'"></i> <span>'.$m['text'].'</span></a></li>';
					}else{
						echo '<li class="treeview"><a href="'.base_url().'home/'.$m['url'].'"><i class="fa fa-'.$m['icon'].'"></i> <span>'.$m['text'].'</span></a></li>';
					}
				}
			?>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--<section class="content-header">
          <h1>
            <?=$judul;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?=$judul;?></a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>-->
              <?php $this->load->view($content); ?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://taxcenter.gunadarma.ac.id">Tax Center</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

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
    <!-- CK editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- mysihtml5 -->
    <script src="<?=base_url('assets/backend');?>/plugins/bootstrap-mysihtml5/bootstrap3-mysihtml5.all.min.js"></script>
    <!--Page Script -->
	<script>
      $(function () {
        CKEDITOR.replace('editor1');
		$('.textarea').mysihtml5();
		});
	</script>
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });
      });
    </script> 
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