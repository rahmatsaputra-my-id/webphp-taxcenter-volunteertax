        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_jaminan         = $list->id_jaminan;
            $id_anggota         = $list->id_anggota;
            $tipe               = $list->tipe;
            $nilai              = $list->nilai;
            $nomor              = $list->nomor;
            $tanggal_masuk      = $list->tanggal_masuk;
            $status             = $list->status;
            $dokumen            = $list->dokumen;
            $dokumen_jaminan    = $list->dokumen_jaminan;
            $id_produk          = $list->id_produk_pembiayaan;
            $periode            = $list->periode;
            $nilai_realisasi    = $list->nilai_realisasi;
            $jangka_waktu       = $list->jangka_waktu;
            $jatuh_tempo        = $list->jatuh_tempo;
            $hisbah             = $list->hisbah;
            $nilai_hisbah       = $list->nilai_hisbah;
            $total_angsuran     = $list->total_angsuran;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $id_anggota         = "";
            $tipe               = "";
            $nilai              = "";
            $nomor              = "";
            $tanggal_masuk      = "";
            $status             = "";
            $dokumen            = "";
            $dokumen_jaminan    = "";
            $id_produk          = "";
            $periode            = "";
            $nilai_realisasi    = "";
            $jangka_waktu       = "";
            $jatuh_tempo        = "";
            $hisbah             = "";
            $nilai_hisbah       = "";
            $total_angsuran     = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $id_jaminan         = $list->id_jaminan;
            $id_anggota         = $list->id_anggota;
            $tipe               = $list->tipe;
            $nilai              = $list->nilai;
            $nomor              = $list->nomor;
            $tanggal_masuk      = $list->tanggal_masuk;
            $status             = $list->status;
            $dokumen            = $list->dokumen;
            $dokumen_jaminan    = $list->dokumen_jaminan;
            $id_produk          = $list->id_produk_pembiayaan;
            $periode            = $list->periode;
            $nilai_realisasi    = $list->nilai_realisasi;
            $jangka_waktu       = $list->jangka_waktu;
            $jatuh_tempo        = $list->jatuh_tempo;
            $hisbah             = $list->hisbah;
            $nilai_hisbah       = $list->nilai_hisbah;
            $total_angsuran     = $list->total_angsuran;
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
                                      <div class="form-group">
                                        <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                      </div>
        <h3 class="">Data Pengajuan</h3>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
              <label for="NamaLengkap" class="control-label col-xs-4">ID</label>
              <div class="col-xs-8">
                  <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <input type="text" name="id_jaminan" value="<?=$id_jaminan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Anggota</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <?php foreach ($anggota->result() as $dd) { ?>
                  <option value="<?=$dd->id?>" <?php if ($id_anggota==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->no_kta.') '.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Tanggal</label>
                <div class="col-xs-8">
                  <input type="text" name="tanggal_masuk" value="<?=$tanggal_masuk;?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Status</label>
              <div class="col-xs-8">
                <input type="hidden" name="status" value="Belum Konfimasi" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? 'disabled': ''; ?>>
                <select class="bs-select form-control" data-live-search="true" name="status" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? '': 'disabled'; ?>>
                  <option value="Belum Konfirmasi" selected>Belum Di Konfirmasi</option>
                  <option value="Diterima" <?php if ($status=='Diterima'){echo "selected";}else{echo "";} ?> >Diterima</option>
                  <option value="Ditolak" <?php if ($status=='Ditolak'){echo "selected";}else{echo "";} ?> >Ditolak</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <h3 class="">Data Jaminan</h3>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
              <label for="NamaLengkap" class="control-label col-xs-4">Jenis</label>
              <div class="col-xs-8">
                                              <div class="mt-radio-inline">
                                                <input type="hidden" name="tipe" value="kepala_akun" onclick="javascript:yesnoCheck();" id="kepala" <?php if ($tipe=="kepala_akun"){echo "checked";}else{echo "checked";} ?>>
                                                  <label class="mt-radio">
                                                      <input type="radio" name="tipe" value="Tanah" onclick="javascript:yesnoCheck();" id="klasifikasi" <?php if ($tipe=="Tanah"){echo "checked";}else{echo "";} ?>> Tanah
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-radio">
                                                      <input type="radio" name="tipe" value="Bangunan" onclick="javascript:yesnoCheck();" id="subklasifikasi" <?php if ($tipe=="Bangunan"){echo "checked";}else{echo "";} ?>> Bangunan
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-radio"><!--mt-radio-disabled-->
                                                      <input type="radio" name="tipe" value="Kendaraan" onclick="javascript:yesnoCheck();" id="namaakun2" <?php if ($tipe=="Kendaraan"){echo "checked";}else{echo "";} ?>> Kendaraan
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-radio"><!--mt-radio-disabled-->
                                                      <input type="radio" name="tipe" value="lainnya" onclick="javascript:yesnoCheck();" id="namaakun" <?php if ($tipe!="Tanah" && $tipe!="Bangunan" && $tipe!="Kendaraam" && $tipe!=""){echo "checked";}else{echo "";} ?>> Lainnya
                                                      <span></span>
                                                  </label>
                                              </div>
                  
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Dokumen</label>
              <div class="col-xs-8">
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
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4"></label>
                <div class="col-xs-8">
                  <input type="text" id="lainnya" style='display:none' name="tipe" value="<?=$tipe;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-2">Dokumen Jaminan</label>
                <div class="col-xs-8">
                  <input type="text" name="dokumen_jaminan" value="<?=$dokumen_jaminan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Nomor</label>
                <div class="col-xs-8">
                  <input type="text" name="nomor" value="<?=$nomor;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Nominal</label>
              <div class="col-xs-8">
                <input type="text" name="nilai" value="<?=$nilai;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
              </div>
            </div>
          </div>
        </div>
        <h3 class="">Data Pembiayaan</h3>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
              <label for="NamaLengkap" class="control-label col-xs-4">Jenis Pembiayaan</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" name="id_produk_pembiayaan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <?php foreach ($produk->result() as $dd) { ?>
                  <option value="<?=$dd->id?>" <?php if ($id_produk==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->id.') '.$dd->nama_produk_pendanaan;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Periode</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" name="periode" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <option value="" <?php if ($status==''){echo "selected";}else{echo "selected";} ?> ></option>
                  <option value="bulanan" <?php if ($periode=='bulanan'){echo "selected";}else{echo "";} ?> >Bulanan</option>
                  <option value="mingguan" <?php if ($periode=='mingguan'){echo "selected";}else{echo "";} ?> >Mingguan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Nominal Realisasi</label>
                <div class="col-xs-8">
                <input type="text" name="nilai_realisasi" value="<?=$nilai_realisasi;?>" class="form-control" id="text1" onkeyup="sum();" placeholder="" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? '': 'disabled'; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Jangka Waktu</label>
              <div class="col-xs-8">
                <input type="text" name="jangka_waktu" value="<?=$jangka_waktu;?>" class="form-control" placeholder="" id="text4" onkeyup="sum2()" <?=($aksi=='view') ? 'disabled': ''; ?>>
              </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Nisbah</label>
                <div class="col-xs-8">
                  <div class="input-group">
                      <input type="text" class="form-control" name="hisbah" value="<?=$hisbah;?>" id="text2" onkeyup="sum();" <?=($aksi=='view') ? 'disabled': ''; ?> aria-describedby="sizing-addon1">
                      <span class="input-group-addon" id="sizing-addon1">%</span>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Jatuh Tempo</label>
              <div class="col-xs-8">
                <input type="text" name="jatuh_tempo" value="<?=$jatuh_tempo;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
              </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Nominal Hisbah</label>
                <div class="col-xs-8">
                      <input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="Hisbah x Nominal Realisasi" id="text3" onkeyup="sum2();" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? '': 'disabled'; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Total Angsuran</label>
              <div class="col-xs-8">
                <input type="text" name="total_angsuran" value="<?=$total_angsuran;?>" class="form-control" placeholder="Nominal Hisbah / Jangka Waktu" id="text5" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? '': 'disabled'; ?>>
              </div>
            </div>
          </div>
        </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('text1').value;
      var txtSecondNumberValue = document.getElementById('text2').value;
      var result = parseInt(txtFirstNumberValue) * (parseInt(txtSecondNumberValue) / 100);
      if (!isNaN(result)) {
         document.getElementById('text3').value = result;
      }
}
function sum2() {
      var txtFirstNumberValue = document.getElementById('text3').value;
      var txtSecondNumberValue = document.getElementById('text4').value;
      var result = parseInt(txtFirstNumberValue) / parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('text5').value = result;
      }
}

function yesnoCheck() {

    if (document.getElementById('klasifikasi').checked){
      document.getElementById('lainnya').style.display = 'none';
    } else if(document.getElementById('subklasifikasi').checked){
      document.getElementById('lainnya').style.display = 'none';
    } else if(document.getElementById('namaakun2').checked){
      document.getElementById('lainnya').style.display = 'none';
    } else if(document.getElementById('namaakun').checked){
      document.getElementById('lainnya').style.display = 'block';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
    }

}
</script>