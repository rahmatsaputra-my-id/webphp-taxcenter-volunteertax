        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id_periode);
            $id                     = $list->id_periode;
            $tahun                  = $list->kode_periode;
            $bulan                  = $list->bulan;
            $tutup_buku             = $list->tutup_buku;
            $status                 = $list->status;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = $id;
            $tahun                  = '';
            $bulan                  = '';
            $tutup_buku             = '';
            $status                 = '';
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id_periode);
            $id                     = $list->id_periode;
            $tahun                  = $list->kode_periode;
            $bulan                  = $list->bulan;
            $tutup_buku             = $list->tutup_buku;
            $status                 = $list->status;
        }
        }?>
<!-- Main content -->
        
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i><?=$judul;?> </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                      <div class="form-group">
                                      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                      </div>
                                      <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" name="kode_periode" value="<?=$tahun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Bulan</label>
                                        <input type="text" name="bulan" value="<?=$bulan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Bulan Tutup Buku</label>
                                        <input type="text" name="tutup_buku" value="<?=$tutup_buku;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Status</label>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" id="optionsRadios4" value="Aktif" <?=($status=='aktif') ? 'checked': ''; ?>> Aktif
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" id="optionsRadios5" value="Tidak Aktif" <?=($status=='Tidak Aktif') ? 'checked': ''; ?>> Tidak Aktif
                                                    <span></span>
                                                </label>
                                            </div>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->