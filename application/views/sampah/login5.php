    <div class="hold-transition login-page">
	<div class="login-box">
      <div class="login-logo">
        <a style="font-size:25px;">Brevet Terpadu A&B</a> </br>
		<a style="font-size:25px;"><b>Tax Center Univ. Gunadarma</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <?php echo $this->session->flashdata('message');
          ?>
        </p>
        <form action="<?=base_url();?>index/cek_login" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Email">
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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