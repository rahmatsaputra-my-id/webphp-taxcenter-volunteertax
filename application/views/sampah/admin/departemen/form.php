        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_departemen    = $list->nama_departemen;
            $sub_departemen     = $list->sub_departemen;
            $penanggung_jawab   = $list->penanggung_jawab;
            $keterangan         = $list->keterangan;
            $no_kta             = $list->no_kta;
            $nama_depan         = $list->nama_depan;
            $nama_tengah        = $list->nama_tengah;
            $nama_belakang      = $list->nama_belakang;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                 = $id;
            $nama_departemen    = "";
            $sub_departemen     = "";
            $penanggung_jawab   = "";
            $keterangan         = "";
            $no_kta             = "";
            $nama_depan         = "";
            $nama_tengah        = "";
            $nama_belakang      = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $nama_departemen    = $list->nama_departemen;
            $sub_departemen     = $list->sub_departemen;
            $penanggung_jawab   = $list->penanggung_jawab;
            $keterangan         = $list->keterangan;
            $no_kta             = $list->no_kta;
            $nama_depan         = $list->nama_depan;
            $nama_tengah        = $list->nama_tengah;
            $nama_belakang      = $list->nama_belakang;
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
                                    <div>
                                      <div class="form-group">
                                      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                      </div>
                                      <div class="form-group">
                                        <label>Id</label>
                                        <input type="text" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Nama Departemen</label>
                                            <input type="text" name="nama_departemen" value="<?=$nama_departemen;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Sub Departemen</label>
                                            <select class="bs-select form-control" data-live-search="true" name="sub_departemen" id="sub_departemen" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                              <?php foreach ($departemen->result() as $dd) { ?>
                                              <option value="<?=$dd->id?>" <?php if ($sub_departemen==$dd->id){echo "selected";}else{echo "";} ?> ><?=$dd->no_departemen.'-'.$dd->nama_departemen;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Penanggung Jawab</label>
                                          </div>
                                                <div class="col-md-3">
                                                  <input placeholder='ID Karyawan'  type='hidden' class='form-control' name='coa' onBlur="fill31();" id="id_akun1" value="<?=$penanggung_jawab;?>" />
                                                  <input placeholder='ID Karyawan' class='form-control' type="text" onKeyUp="suggest1(this.value);" name="kode_akun[]" onBlur="fill21();" id="kode_akun1" value="<?=$no_kta;?>" <?=($aksi=='view') ? 'disabled': ''; ?>/>
                                                  <div class="result">
                                                    <div class="suggestionsBox" id="suggestions1" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                      <div class="suggestionsList" id="suggestionsList1">&nbsp;
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input placeholder='Nama Karyawan'  type='text' class='form-control' name='nama_akun' onBlur="fill11();" id="nama_akun1" disabled value="<?=$nama_depan.' '.$nama_tengah.' '.$nama_belakang;?>"/>
                                                </div>
                                            <script>
                                            function suggest1(inputString){
                                              if(inputString.length == 0){
                                                $('#suggestions1').fadeOut();
                                              }else{
                                                $('#nama_akun1').addClass('load');
                                                $.post("<?=base_url();?>home/suggest_karyawan/"+inputString+"/1", {queryString:""+inputString+""}, function(data){
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
                                          </div>
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