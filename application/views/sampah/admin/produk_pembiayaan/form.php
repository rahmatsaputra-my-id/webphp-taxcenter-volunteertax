        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_produk_pembiayaan = $list->nama_produk_pembiayaan;
            $jumlah_minimal         = $list->jumlah_minimal;
            $persentase_kebijakan   = $list->persentase_kebijakan;
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $pembiayaan             = $list->pembiayaan;
            $angsuran               = $list->angsuran;
            $akun_kasbank1          = $list->akun_kasbank1;
            $akun_pembiayaan        = $list->akun_pembiayaan;
            $akun_administrasi      = $list->akun_administrasi;
            $akun_kasbank2          = $list->akun_kasbank2;
            $akun_denda             = $list->akun_denda;
            $akun_nisbah            = $list->akun_nisbah;
            $akun_infaq             = $list->akun_infaq;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = $id;
            $nama_produk_pembiayaan = "";
            $jumlah_minimal         = "";
            $persentase_kebijakan   = "";
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $pembiayaan             = "";
            $angsuran               = "";
            $akun_kasbank1          = "";
            $akun_pembiayaan        = "";
            $akun_administrasi      = "";
            $akun_kasbank2          = "";
            $akun_denda             = "";
            $akun_nisbah            = "";
            $akun_infaq             = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_produk_pembiayaan = $list->nama_produk_pembiayaan;
            $jumlah_minimal         = $list->jumlah_minimal;
            $persentase_kebijakan   = $list->persentase_kebijakan;
            $tipe                   = "";
            $kepala_akun            = "";
            $klasifikasi_akun       = "";
            $pembiayaan             = $list->pembiayaan;
            $angsuran               = $list->angsuran;
            $akun_kasbank1          = $list->akun_kasbank1;
            $akun_pembiayaan        = $list->akun_pembiayaan;
            $akun_administrasi      = $list->akun_administrasi;
            $akun_kasbank2          = $list->akun_kasbank2;
            $akun_denda             = $list->akun_denda;
            $akun_nisbah            = $list->akun_nisbah;
            $akun_infaq             = $list->akun_infaq;
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
                                        <label>Nama Produk Pembiayaan</label>
                                        <input type="text" name="nama_produk_pembiayaan" value="<?=$nama_produk_pembiayaan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Jumlah Minimal</label>
                                        <input type="text" name="jumlah_minimal" value="<?=$jumlah_minimal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="form-group">
                                        <label>Persentase Minimal Jaminan</label>
                                        <div class="input-group input-small">
                                        <input type="text" name="persentase_kebijakan" value="<?=$persentase_kebijakan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
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
                                                      <input type="checkbox" name="tipe" value="klasifikasi_akun" onclick="javascript:yesnoCheck();" id="klasifikasi" <?php if ($tipe=="klasifikasi_akun"){echo "checked";}else{echo "";} ?>> Pembiayaan
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-checkbox">
                                                      <input type="checkbox" name="tipe" value="sub_klasifikasi_akun" onclick="javascript:yesnoCheck();" id="subklasifikasi" <?php if ($tipe=="sub_klasifikasi_akun"){echo "checked";}else{echo "";} ?>> Angsuran
                                                      <span></span>
                                                  </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12" id="kepala-akun" style='display:none'>
                                          
                                            <div class="row form-group">
                                              <div id="srow27">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk mengeluarkan uang pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_kasbank1; ?>" type='hidden' class='form-control' name='coa1' onBlur="fill327();" id="id_akun27" />
                                                      <input class='form-control' type="text" onKeyUp="suggest27(this.value);" name="kode_akun[]" onBlur="fill227();" id="kode_akun27"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions27" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList27">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill127();" id="nama_akun27" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Kas atau Bank Pembiayaan"/>
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
                                          function suggest27(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions27').fadeOut();
                                            }else{
                                              $('#nama_akun27').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/27", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions27').fadeIn();
                                                  $('#suggestionsList27').html(data);
                                                  $('#nama_akun27').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill127(thisValue){
                                            $('#nama_akun27').val(thisValue);
                                            setTimeout("$('#suggestions27').fadeOut();", 100);
                                          }
                                          function fill227(thisValue){
                                            $('#kode_akun27').val(thisValue);
                                            setTimeout("$('#suggestions27').fadeOut();", 100);
                                          }
                                          function fill327(thisValue){
                                            $('#id_akun27').val(thisValue);
                                            setTimeout("$('#suggestions27').fadeOut();", 100);
                                          }
                                          </script>
                                          <div class="row form-group">
                                              <div id="srow21">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk produk pembiayaan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_pembiayaan; ?>" type='hidden' class='form-control' name='coa2' onBlur="fill321();" id="id_akun21" />
                                                      <input class='form-control' type="text" onKeyUp="suggest21(this.value);" name="kode_akun[]" onBlur="fill221();" id="kode_akun21"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions21" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList21">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill121();" id="nama_akun21" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan"/>
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
                                          function suggest21(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions21').fadeOut();
                                            }else{
                                              $('#nama_akun21').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/21", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions21').fadeIn();
                                                  $('#suggestionsList21').html(data);
                                                  $('#nama_akun21').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill121(thisValue){
                                            $('#nama_akun21').val(thisValue);
                                            setTimeout("$('#suggestions21').fadeOut();", 100);
                                          }
                                          function fill221(thisValue){
                                            $('#kode_akun21').val(thisValue);
                                            setTimeout("$('#suggestions21').fadeOut();", 100);
                                          }
                                          function fill321(thisValue){
                                            $('#id_akun21').val(thisValue);
                                            setTimeout("$('#suggestions21').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow26">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima biaya administrasi dari pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Administrasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_administrasi; ?>" type='hidden' class='form-control' name='coa3' onBlur="fill326();" id="id_akun26" />
                                                      <input class='form-control' type="text" onKeyUp="suggest26(this.value);" name="kode_akun[]" onBlur="fill226();" id="kode_akun26"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions26" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList26">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill126();" id="nama_akun26" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Biaya Administrasi)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Biaya Administrasi Pembiayaan" />
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
                                          function suggest26(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions26').fadeOut();
                                            }else{
                                              $('#nama_akun26').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/26", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions26').fadeIn();
                                                  $('#suggestionsList26').html(data);
                                                  $('#nama_akun26').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill126(thisValue){
                                            $('#nama_akun26').val(thisValue);
                                            setTimeout("$('#suggestions26').fadeOut();", 100);
                                          }
                                          function fill226(thisValue){
                                            $('#kode_akun26').val(thisValue);
                                            setTimeout("$('#suggestions26').fadeOut();", 100);
                                          }
                                          function fill326(thisValue){
                                            $('#id_akun26').val(thisValue);
                                            setTimeout("$('#suggestions26').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                            <input name="kalsifikasi_akun" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="kode-klasifikasi-akun" type="hidden" value="<?=$klasifikasi_akun;?>" />
                                        <div class="col-md-12" id="klasifikasi-akun" style='display:none'>
                                            <div class="row form-group">
                                              <div id="srow28">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima uang angsuran pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_kasbank2; ?>" type='hidden' class='form-control' name='coa4' onBlur="fill328();" id="id_akun28" />
                                                      <input class='form-control' type="text" onKeyUp="suggest28(this.value);" name="kode_akun[]" onBlur="fill228();" id="kode_akun28"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions28" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList28">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill128();" id="nama_akun28" disabled/>
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
                                            function suggest28(inputString){
                                              if(inputString.length == 0){
                                                $('#suggestions28').fadeOut();
                                              }else{
                                                $('#nama_akun28').addClass('load');
                                                $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/28", {queryString:""+inputString+""}, function(data){
                                                  if(data.length>0){
                                                    $('#suggestions28').fadeIn();
                                                    $('#suggestionsList28').html(data);
                                                    $('#nama_akun28').removeClass('load');
                                                  }
                                                });
                                              }
                                            }
                                            function fill128(thisValue){
                                              $('#nama_akun28').val(thisValue);
                                              setTimeout("$('#suggestions28').fadeOut();", 100);
                                            }
                                            function fill228(thisValue){
                                              $('#kode_akun28').val(thisValue);
                                              setTimeout("$('#suggestions28').fadeOut();", 100);
                                            }
                                            function fill328(thisValue){
                                              $('#id_akun28').val(thisValue);
                                              setTimeout("$('#suggestions28').fadeOut();", 100);
                                            }
                                            </script>
                                            <div class="row form-group">
                                              <div id="srow30">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima denda keterlambatan dari angsuran pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Denda</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_denda; ?>" type='hidden' class='form-control' name='coa5' onBlur="fill330();" id="id_akun30" />
                                                      <input class='form-control' type="text" onKeyUp="suggest30(this.value);" name="kode_akun[]" onBlur="fill230();" id="kode_akun30"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions30" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList30">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill130();" id="nama_akun30" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Biaya Administrasi)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Biaya Infaq Angsuran' />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value='Debet' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest30(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions30').fadeOut();
                                            }else{
                                              $('#nama_akun30').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/30", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions30').fadeIn();
                                                  $('#suggestionsList30').html(data);
                                                  $('#nama_akun30').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill130(thisValue){
                                            $('#nama_akun30').val(thisValue);
                                            setTimeout("$('#suggestions30').fadeOut();", 100);
                                          }
                                          function fill230(thisValue){
                                            $('#kode_akun30').val(thisValue);
                                            setTimeout("$('#suggestions30').fadeOut();", 100);
                                          }
                                          function fill330(thisValue){
                                            $('#id_akun30').val(thisValue);
                                            setTimeout("$('#suggestions30').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow31">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima nisbah dari produk pembiayaan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Nisbah</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_nisbah; ?>" type='hidden' class='form-control' name='coa6' onBlur="fill331();" id="id_akun31" />
                                                      <input class='form-control' type="text" onKeyUp="suggest31(this.value);" name="kode_akun[]" onBlur="fill231();" id="kode_akun31"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions31" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList31">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill131();" id="nama_akun31" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 1)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 1 Penarikan' />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value='Debet' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest31(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions31').fadeOut();
                                            }else{
                                              $('#nama_akun31').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/31", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions31').fadeIn();
                                                  $('#suggestionsList31').html(data);
                                                  $('#nama_akun31').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill131(thisValue){
                                            $('#nama_akun31').val(thisValue);
                                            setTimeout("$('#suggestions31').fadeOut();", 100);
                                          }
                                          function fill231(thisValue){
                                            $('#kode_akun31').val(thisValue);
                                            setTimeout("$('#suggestions31').fadeOut();", 100);
                                          }
                                          function fill331(thisValue){
                                            $('#id_akun31').val(thisValue);
                                            setTimeout("$('#suggestions31').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow34">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima biaya infaq dari angsuran pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Infaq</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun' value="<?=$akun_infaq; ?>" type='hidden' class='form-control' name='coa7' onBlur="fill334();" id="id_akun34" />
                                                      <input class='form-control' type="text" onKeyUp="suggest34(this.value);" name="kode_akun[]" onBlur="fill234();" id="kode_akun34"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions34" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList34">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill134();" id="nama_akun34" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Biaya Administrasi)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Biaya Administrasi Penarikan' />
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Debet / Kredit'  type='hidden' class='form-control' name='posisi[]' value='Debet' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest34(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions34').fadeOut();
                                            }else{
                                              $('#nama_akun34').addClass('load');
                                              $.post("<?=base_url();?>home/suggest_akun/"+inputString+"/34", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions34').fadeIn();
                                                  $('#suggestionsList34').html(data);
                                                  $('#nama_akun34').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill134(thisValue){
                                            $('#nama_akun34').val(thisValue);
                                            setTimeout("$('#suggestions34').fadeOut();", 100);
                                          }
                                          function fill234(thisValue){
                                            $('#kode_akun34').val(thisValue);
                                            setTimeout("$('#suggestions34').fadeOut();", 100);
                                          }
                                          function fill334(thisValue){
                                            $('#id_akun34').val(thisValue);
                                            setTimeout("$('#suggestions34').fadeOut();", 100);
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