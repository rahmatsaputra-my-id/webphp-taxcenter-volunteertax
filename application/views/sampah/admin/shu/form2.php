        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_shu               = $list->nama_shu;
            $persentase             = $list->persentase;
            $keterangan             = $list->keterangan;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = $id;
            $nama_shu               = '';
            $persentase             = '';
            $keterangan             = '';
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_shu               = $list->nama_shu;
            $persentase             = $list->persentase;
            $keterangan             = $list->keterangan;
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
                                      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2.$periode);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                      </div>
                                      <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Nama SHU</label>
                                        <input type="text" name="nama_shu" value="<?=$nama_shu;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Persentase</label>
                                        <input type="text" name="persentase" value="<?=$persentase;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->