
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?=base_url();?>">Beranda</a></li>
            <li class="active">Registrasi</li>
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
                  <form class="form-horizontal" action="<?=base_url();?>index/createregister" method="post"role="form">
                    <fieldset>
                      <!--<legend>Your personal details</legend>-->
                      <div class="form-group">
                        <div class="col-lg-12">
                          <?php echo $this->session->flashdata('message');?>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?=$id ;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Event <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <select id="kursus" name="id_kursus" class="form-control">
                            <?php foreach ($kursus->result() as $dd) { ?>
                              <option value="<?=$dd->id?>" selected><?=$dd->nama_kursus?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Lengkap <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="nama_lengkap">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis Kelamin <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <select id="jk" name="jk"  class="form-control">
                            <option value="">Jenis Kelamin</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Tempat Lahir <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Tanggal Lahir <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Contoh: 1995/06/25" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Alamat</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="alamat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Kota</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="kota">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">No. HP <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="no_hp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">NPM <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="npm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">IPK <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="ipk">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Semester <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="semester">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Kelas</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="kelas">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Jurusan</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="jurusan">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Fakultas</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="fakultas">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Domisili Kampus</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="domisili">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="email" name="email">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <!--<legend>Your password</legend>-->
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                        </div>
                      </div>
                    </fieldset>
                    <!--<fieldset>
                      <legend>Newsletter</legend>
                      <div class="checkbox form-group">
                        <label>
                          <div class="col-lg-4 col-sm-4">Singup for Newsletter</div>
                          <div class="col-lg-8 col-sm-8">
                            <input type="checkbox">
                          </div>
                        </label>
                      </div>
                    </fieldset>-->
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <input type="submit" class="btn btn-primary" name="submit" value="Register" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Informasi</em> Registrasi</h2>
                    <p>Seluruh informasi pribadi yang telah diberikan akan digunakan dan dilindungi oleh Tax Center Gunadarma. Setiap informasi yang diberikan untuk tujuan proses yang berkaitan dengan Relawan Pajak dan tanpa tujuan lainnya.</p>
					<!--<button type="button" class="btn btn-default">More details</button>-->
                  </div>
				  <div class="form-info">
                    <h2><em>Jam</em> Pelayanan</h2>
                    <p> Hari : Senin s/d Sabtu
					</br> Jam  : 09.00 s/d 16.00
					</br> Istirahat : 12.00 s/d 13.00</p>
					<!--<button type="button" class="btn btn-default">More details</button>-->
                  </div>
				  <div class="form-info">
                    <h2><em>Contact</em> Person</h2>
                    <p>Witasari : 08561633215 </p>
					<!--<button type="button" class="btn btn-default">More details</button>-->
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