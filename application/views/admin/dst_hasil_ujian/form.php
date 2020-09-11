        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_ujian         = $list->nama_ujian;
            $waktu		        = $list->waktu;
            $jumlah_soal       	= $list->jumlah_soal;
            $id_kursus          = $list->id_kursus;
            $status          	= $list->status;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $nama_ujian         = '';
            $waktu		        = '';
            $jumlah_soal        = '';
            $id_kursus          = '';
            $status          = '';
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_ujian         = $list->nama_ujian;
            $waktu		        = $list->waktu;
            $jumlah_soal        = $list->jumlah_soal;
            $id_kursus          = $list->id_kursus;
            $status          = $list->status;
        }
        }?>
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
      <div class="form-group">
			  <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
			</div>
      <div class="form-group">
        <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="id" <?=($aksi=='view') ? 'disabled': ''; ?>>
      </div>
      <div class="form-group">
        <label>Nama Ujian</label>
        <input type="text" name="nama_ujian" value="<?=$nama_ujian;?>" class="form-control" placeholder="Pretest online Brevet 2017" <?=($aksi=='view') ? 'disabled': ''; ?>>
      </div>
      <div class="form-group">
        <label>Waktu</label>
        <input type="text" name="waktu" value="<?=$waktu;?>" class="form-control" placeholder="90 (untuk 90 menit)" <?=($aksi=='view') ? 'disabled': ''; ?>>
      </div>
      <div class="form-group">
        <label>Jumlah Soal</label>
        <input type="text" name="jumlah_soal" value="<?=$jumlah_soal;?>" class="form-control" placeholder="Jumlah Soal" <?=($aksi=='view') ? 'disabled': ''; ?>>
      </div>
      <div class="form-group">
        <label>Nama Kursus</label>
        <select class="form-control" name="id_kursus" <?=($aksi=='view') ? 'disabled': ''; ?>>
          <?php foreach ($kursus->result() as $dd) { ?>
          <option value="<?=$dd->id?>" <?php if ($id_kursus==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->id.') '.$dd->nama_kursus;?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status" <?=($aksi=='view') ? 'disabled': ''; ?>>
          <option value="Aktif" <?php if ($status=="Aktif"){echo "selected";}else{echo "";} ?>>Aktif</option>
          <option value="Tidak Aktif" <?php if ($status=="Tidak Aktif"){echo "selected";}else{echo "";} ?>>Tidak Aktif</option>
        </select>
      </div>
      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
      </form>
    </div>
</div>