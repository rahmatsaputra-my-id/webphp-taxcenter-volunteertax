        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $kode_akun          = $list->kode_akun;
            $nama_akun          = $list->nama_akun;
            $saldo_awal         = $list->saldo_awal;
            $laporan            = $list->laporan;
            $tipe               = $list->tipe;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = "";
            $kode_akun          = "";
            $nama_akun          = "";
            $saldo_awal         = "";
            $laporan            = "";
            $tipe               = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $kode_akun          = $list->kode_akun;
            $nama_akun          = $list->nama_akun;
            $saldo_awal         = $list->saldo_awal;
            $laporan            = $list->laporan;
            $tipe               = $list->tipe;
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
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Kode Akun</label>
                                            <input name="kode_akun" value="<?=$kode_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="mask_ssn" type="text" />
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Nama Akun</label>
                                            <input type="text" name="nama_akun" value="<?=$nama_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Saldo Awal</label>
                                        <input type="text" name="saldo_awal" value="<?=$saldo_awal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                          <label>Kas & Bank</label>
                                          <div class="mt-checkbox-inline">
                                              <label class="mt-checkbox">
                                                  <input type="checkbox" id="inlineCheckbox1" value="ya" name="kas"> Kas & Bank
                                                  <span></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Klasifikasi Untuk Laporan Arus Kas</label>
                                            <select class="form-control" name="laporan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="Operasi" <?php if ($laporan=="Operasi"){echo "selected";}else{echo "";} ?>>Operasi</option>
                                                <option value="Pendanaan" <?php if ($laporan=="Pendanaan"){echo "selected";}else{echo "";} ?>>Pendanaan</option>
                                                <option value="Pembiayaan" <?php if ($laporan=="Pembiayaan"){echo "selected";}else{echo "";} ?>>Pembiayaan</option>
                                            </select>
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