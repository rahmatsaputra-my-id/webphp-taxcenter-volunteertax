
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?=base_url();?>">Beranda</a></li>
            <li class="active">Login</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <!--<div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Login/Register</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> My account</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Address book</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Wish list</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Returns</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Newsletter</a></li>
            </ul>
          </div>-->
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-14 col-sm-14">
            <h1><?=$judul;?></h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <form class="form-horizontal form-without-legend" action="<?=base_url();?>index/cek_login" method="post" role="form">
                    <div class="form-group">
                      <div class="col-lg-12">
                        <?php echo $this->session->flashdata('message');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">NPM <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" id="email" name="username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="Password" class="form-control" id="password" name="password">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0">
                        <a href="forget">Forget Password?</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    <!--<div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">or login using:</p>
                            <ul class="social-icons">
                                <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
                      </div>
                    </div>-->
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Informasi</em> Login</h2>
                    <p>Gunakan NPM dan Password yang sudah di daftarkan.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>