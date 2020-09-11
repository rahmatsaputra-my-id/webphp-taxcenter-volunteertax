        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_kursus        = $list->nama_kursus;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $nama_kursus        = '';
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_kursus        = $list->nama_kursus;
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
      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
				<div class="form-group">
          <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="id" <?=($aksi=='view') ? 'disabled': ''; ?>>
        </div>
        <div class="form-group">
          <label>Nama Event</label>
          <input type="text" name="nama_kursus" value="<?=$nama_kursus;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
        </div>
        <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
        <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
      </form>
    </div>
</div>