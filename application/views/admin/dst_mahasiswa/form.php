        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_depan         = $list->nama_depan;
            $nama_belakang      = $list->nama_belakang;
            $npm		        = $list->npm;
            $kelas              = $list->kelas;
            $tempat_lahir       = $list->tempat_lahir;
            $tanggal_lahir      = $list->tanggal_lahir;
            $jk                 = $list->jk;
            $jurusan            = $list->jurusan;
            $fakultas           = $list->fakultas;
            $domisili           = $list->domisili;
            $nohp               = $list->no_hp;
            $alamat		        = $list->alamat;
            $kota               = $list->kota;
            $email              = $list->email;
			$image              = $list->gambar;
        }
        }elseif($aksi=='create'){?>
        <?= form_open_multipart($link);
            $id                 = $id;
            $nama_depan         = '';
            $nama_belakang      = '';
            $npm		        = '';
            $kelas              = '';
            $tempat_lahir       = '';
            $tanggal_lahir      = '';
            $jk                 = '';
            $jurusan            = '';
            $fakultas           = '';
            $domisili           = '';
            $nohp               = '';
            $alamat		        = '';
            $kota               = '';
            $email              = '';
			$image              = '';
        }elseif($aksi=='view'){ 
        foreach ($query->result() as $list) {?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_depan         = $list->nama_depan;
            $nama_belakang      = $list->nama_belakang;
            $npm		        = $list->npm;
            $kelas              = $list->kelas;
            $tempat_lahir       = $list->tempat_lahir;
            $tanggal_lahir      = $list->tanggal_lahir;
            $jk                 = $list->jk;
            $jurusan            = $list->jurusan;
            $fakultas           = $list->fakultas;
            $domisili           = $list->domisili;
            $nohp               = $list->no_hp;
            $alamat		        = $list->alamat;
            $kota               = $list->kota;
            $email              = $list->email;
			$image              = $list->gambar;
        }}?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings"></i>
            <span class="caption-subject bold uppercase"><?=$judul ?></span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
        <br/>
        <br/>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="id" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Nama Depan</label>
                      <input type="text" name="nama_depan" value="<?=$nama_depan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Nama Belakang</label>
                      <input type="text" name="nama_belakang" value="<?=$nama_belakang;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk" <?=($aksi=='view') ? 'disabled': ''; ?>>
                        <option value="L" <?php if ($jk=="L"){echo "selected";}else{echo "";} ?>>L</option>
                        <option value="P" <?php if ($jk=="P"){echo "selected";}else{echo "";} ?>>P</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NPM</label>
                      <input type="text" name="npm" value="<?=$npm;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" name="kelas" value="<?=$kelas;?>" class="form-control" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" value="<?=$tempat_lahir;?>" class="form-control" placeholder="Contoh : Balik Papan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal_lahir" value="<?=$tanggal_lahir;?>" class="form-control" placeholder="Contoh : 2000-05-25" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask <?=($aksi=='view') ? 'disabled': ''; ?>>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <div class="form-group">
                      <label>Jurusan</label>
                      <input type="text" name="jurusan" value="<?=$jurusan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Fakultas</label>
                      <input type="text" name="fakultas" value="<?=$fakultas;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Domisili</label>
                      <input type="text" name="domisili" value="<?=$domisili;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" name="nohp" value="<?=$nohp;?>" class="form-control" placeholder="Contoh : 08521234xxxx" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" value="<?=$alamat;?>" class="form-control" placeholder="Alamat tinggal mahasiswa / kosan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="kota" value="<?=$kota;?>" class="form-control" placeholder="Contoh : Bekasi" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" name="email" value="<?=$email;?>" class="form-control" placeholder="Contoh : mahasiswa@mail.com" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <?php
                        if ($image) { echo "<img src='".base_url('assets/upload/mahasiswa/'.$image)."' alt='User Image' width='100' height='150'>";}else{ echo "";} ;?>
                      <input type="hidden" name="imagelama" value="<?=$image;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="image" value="<?=$image;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                    <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                    <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
              <?php ?>                     
        </form>
    </div>
</div>