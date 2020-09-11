        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $no_kta           = $list->no_kta;
            $nama_depan         = $list->nama_depan;
            $nama_tengah        = $list->nama_tengah;
            $nama_belakang      = $list->nama_belakang;
            $jenis_kelamin      = $list->jenis_kelamin;
            $tempat_lahir       = $list->tempat_lahir;
            $tanggal_lahir      = $list->tanggal_lahir;
            $alamat             = $list->alamat;
            $jalan              = $list->jalan;
            $kota               = $list->kota;
            $kode_pos           = $list->kode_pos;
            $no_telepon         = $list->no_telepon;
            $status             = $list->status;
            $pekerjaan          = $list->pekerjaan;
            $no_identitas       = $list->no_identitas;
            $tipe_identitas     = $list->tipe_identitas;
            $tanggal_masuk      = $list->tanggal_masuk;
            $dokumen            = $list->dokumen;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $no_kta             = $no_kta;
            $nama_depan         = "";
            $nama_tengah        = "";
            $nama_belakang      = "";
            $jenis_kelamin      = "";
            $tempat_lahir       = "";
            $tanggal_lahir      = "";
            $alamat             = "";
            $jalan              = "";
            $kota               = "";
            $kode_pos           = "";
            $no_telepon         = "";
            $status             = "";
            $pekerjaan          = "";
            $no_identitas       = "";
            $tipe_identitas     = "";
            $tanggal_masuk      = "";
            $dokumen            = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $no_kta           = $list->no_kta;
            $nama_depan         = $list->nama_depan;
            $nama_tengah        = $list->nama_tengah;
            $nama_belakang      = $list->nama_belakang;
            $jenis_kelamin      = $list->jenis_kelamin;
            $tempat_lahir       = $list->tempat_lahir;
            $tanggal_lahir      = $list->tanggal_lahir;
            $alamat             = $list->alamat;
            $jalan              = $list->jalan;
            $kota               = $list->kota;
            $kode_pos           = $list->kode_pos;
            $no_telepon         = $list->no_telepon;
            $status             = $list->status;
            $pekerjaan          = $list->pekerjaan;
            $no_identitas       = $list->no_identitas;
            $tipe_identitas     = $list->tipe_identitas;
            $tanggal_masuk      = $list->tanggal_masuk;
            $dokumen            = $list->dokumen;
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
                                        <label>Nomor Induk Karyawan</label>
                                        <input type="text" name="no_kta" value="<?=$no_kta;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Nama Depan</label>
                                            <input type="text" name="nama_depan" value="<?=$nama_depan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Nama Tengah</label>
                                            <input type="text" name="nama_tengah" value="<?=$nama_tengah;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Nama Belakang</label>
                                            <input type="text" name="nama_belakang" value="<?=$nama_belakang;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Jenis Kelamin</label>
                                          <div class="mt-radio-inline">
                                              <label class="mt-radio">
                                                  <input type="radio" name="jenis_kelamin" id="optionsRadios4" value="Laki-Laki" <?=($jenis_kelamin=='Laki-Laki') ? 'checked': ''; ?>> Laki - Laki
                                                  <span></span>
                                              </label>
                                              <label class="mt-radio">
                                                  <input type="radio" name="jenis_kelamin" id="optionsRadios5" value="Perempuan" <?=($jenis_kelamin=='Perempuan') ? 'checked': ''; ?>> Perempuan
                                                  <span></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Status</label>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" id="optionsRadios4" value="Kawin" <?=($status=='Kawin') ? 'checked': ''; ?>> Kawin
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" id="optionsRadios5" value="Belum Kawin" <?=($status=='Belum Kawin') ? 'checked': ''; ?>> Belum Kawin
                                                    <span></span>
                                                </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Tipe Identitas</label>
                                            <select class="bs-select form-control" data-live-search="true" name="tipe_identitas" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                              <option value="KTP" <?php if ($tipe_identitas=="KTP"){echo "selected";}else{echo "";} ?> >KTP</option>
                                              <option value="SIM" <?php if ($tipe_identitas=="SIM"){echo "selected";}else{echo "";} ?> >SIM</option>
                                              <option value="Passport" <?php if ($tipe_identitas=="Passport"){echo "selected";}else{echo "";} ?> >Passport</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>No Identitas</label>
                                            <input type="text" name="no_identitas" value="<?=$no_identitas;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Dokumen</label>
                                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                                  <div class="input-group">
                                                      <div class="form-control uneditable-input input-fixed" data-trigger="fileinput">
                                                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                          <span class="fileinput-filename"> </span>
                                                      </div>
                                                      <span class="input-group-addon btn default btn-file">
                                                          <span class="fileinput-new"> Select file </span>
                                                          <span class="fileinput-exists"> Change </span>
                                                          <input type="file" name="dokumen" value="<?=$dokumen;?>" <?=($aksi=='view') ? 'disabled': ''; ?>> </span>
                                                      <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" value="<?=$tempat_lahir;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="text" name="tanggal_lahir" value="<?=$tanggal_lahir;?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?=$alamat;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Kota</label>
                                            <input type="text" name="kota" value="<?=$kota;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Kode Pos</label>
                                            <input type="text" name="kode_pos" value="<?=$kode_pos;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                      <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="text" name="no_telepon" value="<?=$no_telepon;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" name="pekerjaan" value="<?=$pekerjaan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                      <div class="form-group">
                                        <label>Tanggal Bekerja</label>
                                        <input type="text" name="tanggal_masuk" value="<?php if($aksi=='create'){$tgl=date('Y/m/d'); echo $tgl;}else{ echo $tanggal_masuk;}?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
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