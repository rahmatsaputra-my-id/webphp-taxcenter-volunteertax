        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_harta_tetap       = $list->nama_harta_tetap;
            $harga_beli             = $list->harga_beli;
            $lokasi                 = $list->lokasi;
            $departemen             = $list->departemen;
            $tanggal_beli           = $list->tanggal_beli;
            $nilai_residu           = $list->nilai_residu;
            $umur_ekonomis          = $list->umur_ekonomis;
            $metode_penyusutan      = $list->metode_penyusutan;
            $akumulasi_beban        = $list->akumulasi_beban;
            $beban_perbulan         = $list->beban_perbulan;
            $nilai_buku             = $list->nilai_buku;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = $id;
            $nama_harta_tetap       = "";
            $harga_beli             = "";
            $lokasi                 = "";
            $departemen             = "";
            $tanggal_beli           = "";
            $nilai_residu           = "";
            $umur_ekonomis          = "";
            $metode_penyusutan      = "";
            $akumulasi_beban        = "";
            $beban_perbulan         = "";
            $nilai_buku             = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_harta_tetap       = $list->nama_harta_tetap;
            $harga_beli             = $list->harga_beli;
            $lokasi                 = $list->lokasi;
            $departemen             = $list->departemen;
            $tanggal_beli           = $list->tanggal_beli;
            $nilai_residu           = $list->nilai_residu;
            $umur_ekonomis          = $list->umur_ekonomis;
            $metode_penyusutan      = $list->metode_penyusutan;
            $akumulasi_beban        = $list->akumulasi_beban;
            $beban_perbulan         = $list->beban_perbulan;
            $nilai_buku             = $list->nilai_buku;
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
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">ID Harta Tetap</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Metode Penyusutan</label>
                <div class="col-xs-8 form-group">
                  <?php $kepala_akun=$metode_penyusutan;?>
                      <select class="form-control" name="metode_penyusutan" id="metode_penyusutan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                          <option value="" >-- Pilih Metode --</option>
                          <option value="1" <?php if ($kepala_akun=="1"){echo "selected";}else{echo "";} ?>>Tanpa Penyusutan</option>
                          <option value="2" <?php if ($kepala_akun=="2"){echo "selected";}else{echo "";} ?>>Garis Lurus</option>
                          <option value="3" <?php if ($kepala_akun=="3"){echo "selected";}else{echo "";} ?>>Jumlah Angka Tahun</option>
                          <option value="4" <?php if ($kepala_akun=="4"){echo "selected";}else{echo "";} ?>>Saldo Menurun</option>
                          <!--<option value="5" <?php// if ($kepala_akun=="5"){echo "selected";}else{echo "";} ?>>Double declining balance method</option>
                          <option value="6" <?php// if ($kepala_akun=="6"){echo "selected";}else{echo "";} ?>>Dari Tabel Penyusutan</option>-->
                      </select>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Lokasi</label>
                <div class="col-xs-8 form-group">
                  <select class="bs-select form-control" data-live-search="true" name="lokasi" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    <?php foreach ($data_lokasi->result() as $dd) { ?>
                    <option value="<?=$dd->id?>" <?php if ($lokasi==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->id.') '.$dd->nama_lokasi;?></option>
                    <?php }?>
                  </select>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Departemen</label>
                <div class="col-xs-8 form-group">
                  <select class="bs-select form-control" data-live-search="true" name="departemen" <?=($aksi=='view') ? 'disabled': ''; ?>>
                    <?php foreach ($data_departemen->result() as $dd) { ?>
                    <option value="<?=$dd->id?>" <?php if ($departemen==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->no_departemen.') '.$dd->nama_departemen;?></option>
                    <?php }?>
                  </select>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Nama Harta Tetap</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="nama_harta_tetap" value="<?=$nama_harta_tetap;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Akumulasi beban</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="akumulasi_beban" value="<?=$akumulasi_beban;?>" class="form-control" id="total-sebesar" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Tanggal Beli</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="tanggal_beli" value="<?=$tanggal_beli;?>" class="form-control date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Beban Perbulan</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="beban_perbulan" value="<?=$beban_perbulan;?>" class="form-control" id="total-sebesar2" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Harga Beli</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="harga_beli" value="<?=$harga_beli;?>" class="form-control hitung total-debet" id="debet-0"  placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <input type="hidden" name="subtotal[]" id="total-0" class="total" readonly="readonly">
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Nilai Buku</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="nilai_buku" value="<?=$nilai_buku;?>" class="form-control" id="total-sebesar3" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Nilai Residu</label>
                <div class="col-xs-8 form-group">
                  <input type="text" name="nilai_residu" value="<?=$nilai_residu;?>" class="form-control hitung total-residu" id="residu-0" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Umur Ekonomis</label>
                <div class="col-xs-2 form-group">
                  <input type="text" name="umur_ekonomis" value="<?=$umur_ekonomis;?>" class="form-control hitung total-kredit" id="kredit-0"  placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
                <div class="col-xs-4 form-group">
                <label class="control-label">Tahun</label>
                </div>
            </div>
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
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12" id="kepala-akun" >
                                            <div class="row form-group">
                                              <div id="srow1">
                                                <div class="col-sm-12">
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Aset</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa1' onBlur="fill31();" id="id_akun1" />
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
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Akumulasi Depresiasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa2' onBlur="fill32();" id="id_akun2" />
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
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Depresiasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa3' onBlur="fill37();" id="id_akun7" />
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
$('#metode_penyusutan').change(function() { 
var value= $('#metode_penyusutan option:selected').attr('value');

})
$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
    berhitung = aydi.split('-');
    $(this).keydown(function() {
        setTimeout(function() {
            var satuan = ($('#debet-' + berhitung[1]).val() != '' ? $('#debet-' + berhitung[1]).val() : 0),
                jasa = ($('#kredit-' + berhitung[1]).val() != '' ? $('#kredit-' + berhitung[1]).val() : 0),
                residu = ($('#residu-' + berhitung[1]).val() != '' ? $('#residu-' + berhitung[1]).val() : 0),
                value = $('#metode_penyusutan option:selected').attr('value'),
                subtotal = 0;
                if (value=='2'){
                  subtotal = (parseInt(satuan) - parseInt(residu)) / parseInt(jasa);
                }else if(value=='3'){
                  subtotal = ((parseInt(satuan) - parseInt(residu)) * (parseInt(jasa) / ((parseInt(jasa)*(parseInt(jasa)+1)) / 2)));
                }else if(value=='4'){
                  subtotal =  (((((100/100) / parseInt(jasa))* 2 ) * parseInt(satuan)) - ((((100/100) / parseInt(jasa))* 2 ) * parseInt(satuan)))
                }else{
                  subtotal = satuan;
                }
            if (!isNaN(subtotal)) {
                $('#total-' + berhitung[1]).val(subtotal);
        var alltotal = 0;
        $('.total').each(function(){
          alltotal += parseFloat($(this).val());
        });
                $('#total').val(alltotal);
                $('#total-sebesar').val(alltotal);
                $('#total-sebesar2').val(alltotal/12);
                $('#total-sebesar3').val(satuan);
            }
        }, 50);
    });
});
</script>