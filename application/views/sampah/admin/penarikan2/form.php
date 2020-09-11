        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_produk          = $list->id_produk;
            $tanggal            = $list->tanggal;
            $id_anggota         = $list->id_anggota;
            $id_akun            = $list->id_akun;
            $id_departemen      = $list->id_departemen;
            $jumlah_hisbah      = $list->jumlah_hisbah;
            $total              = $list->total;
            $saldo_simpanan     = $list->saldo_simpanan;
            $kuasa              = $list->kuasa;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $id_produk          = "";
            $tanggal            = "";
            $id_anggota         = "";
            $id_akun            = "";
            $id_departemen      = "";
            $jumlah_hisbah      = "";
            $total              = "";
            $saldo_simpanan     = "";
            $kuasa              = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_produk          = $list->id_produk;
            $tanggal            = $list->tanggal;
            $id_anggota         = $list->id_anggota;
            $id_akun            = $list->id_akun;
            $id_departemen      = $list->id_departemen;
            $jumlah_hisbah      = $list->jumlah_hisbah;
            $total              = $list->total;
            $saldo_simpanan     = $list->saldo_simpanan;
            $kuasa              = $list->kuasa;
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
                                        <label>Id</label>
                                        <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" name="tanggal" value="<?=$tanggal;?>" class="form-control" id="mask_date2" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Produk</label>
                                        <select class="bs-select form-control" data-live-search="true" name="id_produk" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          <?php foreach ($produk->result() as $dd) { ?>
                                          <option value="<?=$dd->id?>" <?php if ($id_produk==$dd->id){echo "selected";}else{echo "";} ?> ><?=$dd->nama_produk_pendanaan;?></option>
                                          <?php }?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Anggota</label>
                                        <select class="bs-select form-control" data-live-search="true" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          <?php foreach ($anggota->result() as $dd) { ?>
                                          <option value="<?=$dd->id?>" <?php if ($id_anggota==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->no_kta.') '.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                                          <?php }?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Id Akun</label>
                                        <select class="bs-select form-control" data-live-search="true" name="id_akun" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          <?php foreach ($akun->result() as $dd) { ?>
                                          <option value="<?=$dd->id?>" <?php if ($id_akun==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->kepala_akun.'-'.$dd->klasifikasi_akun.'-'.$dd->kode_akun.') '.$dd->nama_akun;?></option>
                                          <?php }?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Kuasa</label>
                                        <input type="text" name="kuasa" value="<?=$kuasa;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Jumlah Hisbah</label>
                                        <input type="text" name="jumlah_hisbah" value="<?=$jumlah_hisbah;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" name="total" value="<?=$total;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Saldo Simpanan</label>
                                        <input type="text" name="saldo_simpanan" value="<?=$saldo_simpanan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Departemen</label>
                                        <input type="text" name="id_departemen" value="<?=$id_departemen;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->