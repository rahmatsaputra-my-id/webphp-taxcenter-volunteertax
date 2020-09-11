        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_jurnal          = $list->id_jurnal;
            $tanggal            = $list->tanggal;
            $keterangan         = $list->keterangan;
            $id_akun            = $list->id_akun;
            $id_departemen      = $list->id_departemen;
            $id_pajak           = $list->id_pajak;
            $nilai              = $list->nilai;
            $jumlah             = $list->jumlah;
            $total_pajak        = $list->total_pajak;
            $id_pajak           = $list->id_pajak;
            $balance            = $list->balance;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $id_jurnal          = "";
            $tanggal            = "";
            $keterangan         = "";
            $id_akun            = "";
            $id_departemen      = "";
            $id_pajak           = "";
            $nilai              = "";
            $jumlah             = "";
            $total_pajak        = "";
            $id_pajak           = "";
            $balance            = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_jurnal          = $list->id_jurnal;
            $tanggal            = $list->tanggal;
            $keterangan         = $list->keterangan;
            $id_akun            = $list->id_akun;
            $id_departemen      = $list->id_departemen;
            $id_pajak           = $list->id_pajak;
            $nilai              = $list->nilai;
            $jumlah             = $list->jumlah;
            $total_pajak        = $list->total_pajak;
            $id_pajak           = $list->id_pajak;
            $balance            = $list->balance;
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
                                        <label>Id Jurnal</label>
                                        <input type="text" name="id_jurnal" value="<?=$id_jurnal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" name="tanggal" value="<?=$tanggal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Id Akun</label>
                                        <input type="text" name="id_akun" value="<?=$id_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Id Departemen</label>
                                        <input type="text" name="id_departemen" value="<?=$id_departemen;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Id Pajak</label>
                                        <input type="text" name="id_pajak" value="<?=$id_pajak;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="text" name="nilai" value="<?=$nilai;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" name="jumlah" value="<?=$jumlah;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Total Pajak</label>
                                        <input type="text" name="total_pajak" value="<?=$total_pajak;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Balance</label>
                                        <input type="text" name="balance" value="<?=$balance;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->