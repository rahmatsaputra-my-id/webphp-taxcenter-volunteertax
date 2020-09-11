<div class="container" style="width: 800px; background-color: white">
<div class="row">
    <div class="col-xs-12 ">
    <div class="box-body">
		<form action="<?=base_url();?>index/createregister/<?=$id?>" method="post">
			<h2 style="font-color:black; font-size:25px; text-align:center;" > Pendaftaran Kursus Brevet | Tax Center Universitas Gunadarma</h2>
			<hr class="colorgraph">
			<?php echo "<h2> <small>".$this->session->flashdata('message')."</small></h2>";?>
			<div class="form-group">
				<input type="hidden" name="id" value="<?=$id ;?>" class="form-control">
			</div>
			<div class="form-group">
				<input type="hidden" name="id_ujian" value="<?=$id_ujian->id ;?>" class="form-control">
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="nama_depan" id="nama_depan" class="form-control input-lg" placeholder="Nama Depan">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="nama_belakang" id="nama_belakang" class="form-control input-lg" placeholder="Nama Belakang">
					</div>
				</div>
			</div>
			<div class="form-group">
				<select id="jk" name="jk"  class="form-control input-lg">
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
						<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" placeholder="Tgl Lahir cth: 1995/06/25" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
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
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
						<input type="checkbox" name="term" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" name="simpan" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7" onclick="return confirm('Apakah Anda yakin data ini benar?')"></div>
				<!--<div class="col-xs-6 col-md-6"><a href="<?php //base_url();?>login/" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
		</form>
    </div><!-- /.box-body -->
</div>
</div>

			
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>