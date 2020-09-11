<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login &amp; Register Templates</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?=base_url('assets/backend');?>/login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/backend');?>/login/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('assets/backend');?>/login/css/form-elements.css">
        <link rel="stylesheet" href="<?=base_url('assets/backend');?>/login/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <!--<link rel="shortcut icon" href="<?php //base_url('assets/backend');?>/login/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php //base_url('assets/backend');?>/login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php //base_url('assets/backend');?>/login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php //base_url('assets/backend');?>/login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php //base_url('assets/backend');?>/login/ico/apple-touch-icon-57-precomposed.png">-->
		
		<link rel="icon" type="image/png" href="<?=base_url('assets');?>/image/icon.png">
		
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

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong></strong>Brevet A &amp; B Terpadu</h1>
                            <div class="description">
                            	<h2><a href="http://taxcenter.gunadarma.ac.id" target="_blank"><!--<img src="<?php //base_url('assets/image/Logo TC.png'); ?>" width='150' align='center' height='45' alt='User Image'>--><strong>Tax Center</strong></a> <a href="http://gunadarma.ac.id" target="_blank"><!--<img src="<?php //base_url('assets/image/Logo UG.png'); ?>" width='150' height='50' alt='User Image'>--><strong>Universitas Gunadarma</strong></a></h2>
								<?php echo "<h2>".$this->session->flashdata('message')."</h2>";?>
								<!--<p>
	                            	<a href="http://taxcenter.gunadarma.ac.id" target="_blank"><strong>Tax Center</strong></a> <a href="http://gunadarma.ac.id" target="_blank"><strong>Universitas Gunadarma</strong></a>
                            	</p>-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Daftar</h3>
	                            		<p>Masukkan Identitas Diri Anda</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form">
											<input type="hidden" name="id" value="<?=$id ;?>" class="form-control">
											<input type="hidden" name="id_ujian" value="<?=$id_ujian->id ;?>" class="form-control">
										<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Nama Depan</label>
											<input type="text" name="nama_depan" placeholder="Nama Depan..." class="form-first-name form-control" id="form-first-name">
				                        	<!--<input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">-->
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Nama Belakang</label>
											<input type="text" name="nama_belakang" placeholder="Nama Belakang..." class="form-last-name form-control" id="form-last-name">
				                        	<!--<input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">-->
				                        </div>
										<div class="form-group">
											<select id="form-first-name" name="jk"  class="form-first-name form-control">
												<option value="">Jenis Kelamin</option>
												<option value="L">Laki - laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
				                        <div class="row">
				                        	<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" placeholder="Tempat Lahir">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" placeholder="Tanggal Lahir" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
												</div>
											</div>
										</div>
										<div class="form-group">
											<input type="text" name="alamat" id="alamat" class="form-control input-lg" placeholder="Alamat">
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="kota" id="kota" class="form-control input-lg" placeholder="Kota">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="no_hp" id="no_hp" class="form-control input-lg" placeholder="No HP">
												</div>
											</div>
										</div>
										<div class="form-group">
											<select id="kursus" name="id_kursus" class="form-control input-lg">
												<option value="">Kursus</option>
												<?php foreach ($kursus->result() as $dd) { ?>
												<option value="<?=$dd->id?>"><?=$dd->id.' ('.$dd->nama_kursus.') '?></option>
												<?php }?>
											</select>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="npm" id="npm" class="form-control input-lg" placeholder="NPM">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="kelas" id="kelas" class="form-control input-lg" placeholder="Kelas">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="jurusan" id="jurusan" class="form-control input-lg" placeholder="Jurusan">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="text" name="fakultas" id="fakultas" class="form-control input-lg" placeholder="Fakultas">
												</div>
											</div>
										</div>
										<div class="form-group">
											<input type="text" name="domisili" id="domisili" class="form-control input-lg" placeholder="Domisili Kampus">
										</div>
										<div class="form-group">
											<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email">
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password">
												</div>
											</div>
										</div>
				                        <button type="submit" class="btn">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
						
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login</h3>
	                            		<p>Masukkan Email and password</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?=base_url();?>index/cek_login" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="text" placeholder="Email..." name="username" class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" class="btn">Login!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<!--<div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>-->
	                        
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer 
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by Anli Zaimi at <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>-->

        <!-- Javascript -->
        <script src="<?=base_url('assets/backend');?>/login/js/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url('assets/backend');?>/login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/backend');?>/login/js/jquery.backstretch.min.js"></script>
        <script src="<?=base_url('assets/backend');?>/login/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="<?=base_url('assets/backend');?>/login/js/placeholder.js"></script>
        <![endif]-->
		
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