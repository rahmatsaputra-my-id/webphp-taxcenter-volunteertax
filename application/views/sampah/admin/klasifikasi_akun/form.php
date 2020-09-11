        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $kepala_akun        = $list->kepala_akun;
            $klasifikasi_akun   = $list->klasifikasi_akun;
            $nama_akun          = $list->nama_akun;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $kepala_akun        = "";
            $klasifikasi_akun   = "";
            $nama_akun          = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $kepala_akun        = $list->kepala_akun;
            $klasifikasi_akun   = $list->klasifikasi_akun;
            $nama_akun          = $list->nama_akun;
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
                                        <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Kepala Akun</label>
                                            <select class="form-control" name="kepala_akun" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                              <?php foreach ($query2->result() as $dd) { ?>
                                              <option value="<?=$dd->kepala_akun?>" <?php if ($kepala_akun==$dd->kepala_akun){echo "selected";}else{echo "";} ?> ><?=$dd->kepala_akun.' -'.$dd->nama_akun; ?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Klasifikasi Akun</label>
                                            <input type="text" name="klasifikasi_akun" value="<?=$klasifikasi_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Nama Akun</label>
                                            <input type="text" name="nama_akun" value="<?=$nama_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->