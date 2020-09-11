        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_produk_pendanaan  = $list->nama_produk_pendanaan;
            $jumlah_minimal         = $list->jumlah_minimal;
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $suku_bunga             = $list->suku_bunga;
            $simpanan               = $list->simpanan;
            $penarikan              = $list->penarikan;
            $akun_kasbank1          = $list->akun_kasbank1;
            $akun_simpanan          = $list->akun_simpanan;
            $akun_administrasi      = $list->akun_administrasi;
            $akun_nisbah            = $list->akun_nisbah;
            $akun_kasbank2          = $list->akun_kasbank2;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = $id;
            $nama_produk_pendanaan  = "";
            $jumlah_minimal         = "";
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $suku_bunga             = "";
            $simpanan               = "";
            $penarikan              = "";
            $akun_kasbank1          = "";
            $akun_simpanan          = "";
            $akun_administrasi      = "";
            $akun_nisbah            = "";
            $akun_kasbank2          = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_produk_pendanaan  = $list->nama_produk_pendanaan;
            $jumlah_minimal         = $list->jumlah_minimal;
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $suku_bunga             = $list->suku_bunga;
            $simpanan               = $list->simpanan;
            $penarikan              = $list->penarikan;
            $akun_kasbank1          = $list->akun_kasbank1;
            $akun_simpanan          = $list->akun_simpanan;
            $akun_administrasi      = $list->akun_administrasi;
            $akun_nisbah            = $list->akun_nisbah;
            $akun_kasbank2          = $list->akun_kasbank2;
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
                                      <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Nama Produk Pendanaan</label>
                                        <input type="text" name="nama_produk_pendanaan" value="<?=$nama_produk_pendanaan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Jumlah Minimal</label>
                                        <input type="text" name="jumlah_minimal" value="<?=$jumlah_minimal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Suku Bunga</label>
                                        <div class="input-group input-small">
                                        <input type="text" name="suku_bunga" value="<?=$suku_bunga;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                        <span class="input-group-addon" id="sizing-addon1">%</span>
                                        </div>
                                      </div>


                                      <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Akun Penting</a>
                                            </li>
                                        </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab1">

                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <div class="mt-checkbox-inline">
                                                <input type="hidden" name="tipe" value="kepala_akun" onclick="javascript:yesnoCheck();" id="kepala" <?php if ($tipe=="kepala_akun"){echo "checked";}else{echo "checked";} ?>>
                                                  <label class="mt-checkbox">
                                                      <input type="checkbox" name="tipe1" value="simpanan" onclick="javascript:yesnoCheck();" id="klasifikasi" <?php if ($simpanan=="ya"){echo "checked";}else{echo "";} ?>> Simpanan
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-checkbox">
                                                      <input type="checkbox" name="tipe2" value="penarikan" onclick="javascript:yesnoCheck();" id="subklasifikasi" <?php if ($penarikan=="ya"){echo "checked";}else{echo "";} ?>> Penarikan
                                                      <span></span>
                                                  </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12" id="kepala-akun" style='display:none'>
                                            <div class="row form-group">
                                              <div id="srow1">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun (Debet) yang digunakan untuk menerima uang masuk dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_kasbank1; ?>" type='hidden' class='form-control' name='coa1' onBlur="fill31();" id="id_akun1" />
                                                      <input class='form-control' type="text" onKeyUp="suggest1(this.value);" name="kode_akun[]" onBlur="fill21();" id="kode_akun1"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions1" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList1">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill11();" id="nama_akun1" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Kas atau Bank"/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value="Debet" />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest1(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions1').fadeOut();
                                            }else{
                                              $('#nama_akun1').addClass('load');
                                              $.post("<?=base_url();?>/home/suggest_akun/"+inputString+"/1", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions1').fadeIn();
                                                  $('#suggestionsList1').html(data);
                                                  $('#nama_akun1').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill11(thisValue){
                                            $('#nama_akun1').val(thisValue);
                                            setTimeout("$('#suggestions1').fadeOut();", 100);
                                          }
                                          function fill21(thisValue){
                                            $('#kode_akun1').val(thisValue);
                                            setTimeout("$('#suggestions1').fadeOut();", 100);
                                          }
                                          function fill31(thisValue){
                                            $('#id_akun1').val(thisValue);
                                            setTimeout("$('#suggestions1').fadeOut();", 100);
                                          }
                                          </script>
                                          <div class="row form-group">
                                              <div id="srow2">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun (Kredit) yang digunakan untuk produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_simpanan; ?>" type='hidden' class='form-control' name='coa2' onBlur="fill32();" id="id_akun2" />
                                                      <input class='form-control' type="text" onKeyUp="suggest2(this.value);" name="kode_akun[]" onBlur="fill22();" id="kode_akun2"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions2" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList2">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill12();" id="nama_akun2" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 1"/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value="Kredit" />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest2(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions2').fadeOut();
                                            }else{
                                              $('#nama_akun2').addClass('load');
                                              $.post("<?=base_url();?>/home/suggest_akun/"+inputString+"/2", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions2').fadeIn();
                                                  $('#suggestionsList2').html(data);
                                                  $('#nama_akun2').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill12(thisValue){
                                            $('#nama_akun2').val(thisValue);
                                            setTimeout("$('#suggestions2').fadeOut();", 100);
                                          }
                                          function fill22(thisValue){
                                            $('#kode_akun2').val(thisValue);
                                            setTimeout("$('#suggestions2').fadeOut();", 100);
                                          }
                                          function fill32(thisValue){
                                            $('#id_akun2').val(thisValue);
                                            setTimeout("$('#suggestions2').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow7">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun (Kredit) yang digunakan untuk menerima biaya administrasi dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Administrasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_administrasi; ?>" type='hidden' class='form-control' name='coa3' onBlur="fill37();" id="id_akun7" />
                                                      <input class='form-control' type="text" onKeyUp="suggest7(this.value);" name="kode_akun[]" onBlur="fill27();" id="kode_akun7"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions7" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList7">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill17();" id="nama_akun7" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Biaya Administrasi)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Biaya Administrasi" />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value="Debet" />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest7(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions7').fadeOut();
                                            }else{
                                              $('#nama_akun7').addClass('load');
                                              $.post("<?=base_url();?>/home/suggest_akun/"+inputString+"/7", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions7').fadeIn();
                                                  $('#suggestionsList7').html(data);
                                                  $('#nama_akun7').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill17(thisValue){
                                            $('#nama_akun7').val(thisValue);
                                            setTimeout("$('#suggestions7').fadeOut();", 100);
                                          }
                                          function fill27(thisValue){
                                            $('#kode_akun7').val(thisValue);
                                            setTimeout("$('#suggestions7').fadeOut();", 100);
                                          }
                                          function fill37(thisValue){
                                            $('#id_akun7').val(thisValue);
                                            setTimeout("$('#suggestions7').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow8">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun (Debet) yang digunakan untuk memberikan nisbah dari produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Nisbah</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_nisbah; ?>" type='hidden' class='form-control' name='coa4' onBlur="fill38();" id="id_akun8" />
                                                      <input class='form-control' type="text" onKeyUp="suggest8(this.value);" name="kode_akun[]" onBlur="fill28();" id="kode_akun8"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions8" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList8">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill18();" id="nama_akun8" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 1)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 1' />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value='Kredit' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest8(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions8').fadeOut();
                                            }else{
                                              $('#nama_akun8').addClass('load');
                                              $.post("<?=base_url();?>/home/suggest_akun/"+inputString+"/8", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions8').fadeIn();
                                                  $('#suggestionsList8').html(data);
                                                  $('#nama_akun8').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill18(thisValue){
                                            $('#nama_akun8').val(thisValue);
                                            setTimeout("$('#suggestions8').fadeOut();", 100);
                                          }
                                          function fill28(thisValue){
                                            $('#kode_akun8').val(thisValue);
                                            setTimeout("$('#suggestions8').fadeOut();", 100);
                                          }
                                          function fill38(thisValue){
                                            $('#id_akun8').val(thisValue);
                                            setTimeout("$('#suggestions8').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                            <input name="kalsifikasi_akun" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="kode-klasifikasi-akun" type="hidden" value="<?=$klasifikasi_akun;?>" />
                                        <div class="col-md-12" id="klasifikasi-akun" style='display:none'>
                                            
                                            <div class="row form-group">
                                              <div id="srow20">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk mengeluarkan uang dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_kasbank2; ?>" type='hidden' class='form-control' name='coa5' onBlur="fill320();" id="id_akun20" />
                                                      <input class='form-control' type="text" onKeyUp="suggest20(this.value);" name="kode_akun[]" onBlur="fill220();" id="kode_akun20"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions20" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList20">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill120();" id="nama_akun20" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Kas atau Bank Penarikan' />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value='Kredit' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest20(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions20').fadeOut();
                                            }else{
                                              $('#nama_akun20').addClass('load');
                                              $.post("<?=base_url();?>/home/suggest_akun/"+inputString+"/20", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions20').fadeIn();
                                                  $('#suggestionsList20').html(data);
                                                  $('#nama_akun20').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill120(thisValue){
                                            $('#nama_akun20').val(thisValue);
                                            setTimeout("$('#suggestions20').fadeOut();", 100);
                                          }
                                          function fill220(thisValue){
                                            $('#kode_akun20').val(thisValue);
                                            setTimeout("$('#suggestions20').fadeOut();", 100);
                                          }
                                          function fill320(thisValue){
                                            $('#id_akun20').val(thisValue);
                                            setTimeout("$('#suggestions20').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                      </div>
                            </div>
                        </div>
                        </div>
                        <!-- Portlet body-->
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

function yesnoCheck() {

    if (document.getElementById('klasifikasi').checked && document.getElementById('subklasifikasi').checked){
      document.getElementById('kepala-akun').style.display = 'block';
      document.getElementById('klasifikasi-akun').style.display = 'block';
    } else if (document.getElementById('klasifikasi').checked){
      document.getElementById('kepala-akun').style.display = 'block';
      document.getElementById('klasifikasi-akun').style.display = 'none';
    } else if(document.getElementById('subklasifikasi').checked){
      document.getElementById('kepala-akun').style.display = 'none';
      document.getElementById('klasifikasi-akun').style.display = 'block';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
      document.getElementById('klasifikasi-akun').style.display = 'none';
    }

}
</script>