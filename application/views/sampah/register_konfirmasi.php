<div class="register-box">
      <div class="register-logo">
        <a style="font-size:25px;">Brevet A&B Terpadu</a> </br>
		<a style="font-size:25px;"><b>Tax Center Univ. Gunadarma</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <br/><?php echo $this->session->flashdata('message');?>
        </p>
        <form action="<?=base_url();?>index/konfirmasi_bayar" method="post" enctype="multipart/form-data">
          
			<div class="form-group">
				<label>NPM</label>
				<input type="text" name="npm" value="" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" value="" class="form-control">
			</div>
			<div class="form-group">
				<label>No Validasi Bank</label>
				<input type="text" name="novalidasi" value="" class="form-control">
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