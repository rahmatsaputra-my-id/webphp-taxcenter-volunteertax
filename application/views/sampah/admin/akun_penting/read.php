<!-- BEGIN EXAMPLE TABLE PORTLET-->
<form action="<?=$link;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings"></i>
                                <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                            <br/>
                            <br/>
                          <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab3" data-toggle="tab">Neraca</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">Laba Rugi</a>
                                            </li>
                                        </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab3">
                                            <div class="row form-group">
                                              <div id="srow40">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan sebagai pengimbang neraca dalam laporan neraca ketika neraca awal yang Anda buat tidak balance </p>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Neraca</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coaneraca' onBlur="fill340();" id="id_akun40" />
                                                      <input class='form-control' type="text" onKeyUp="suggest40(this.value);" name="kode_akun[]" onBlur="fill240();" id="kode_akun40" value='<?=$query["kode_akun"]?>' />
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions40" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList40">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill140();" id="nama_akun40" value='<?=$query["nama_akun"]?>' disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 1)'  type='hidden' class='form-control' name='akun_penting[]' value='Neraca' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest40(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions40').fadeOut();
                                            }else{
                                              $('#nama_akun40').addClass('load');
                                              $.post("../home/suggest_akun3/"+inputString+"/40/3", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions40').fadeIn();
                                                  $('#suggestionsList40').html(data);
                                                  $('#nama_akun40').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill140(thisValue){
                                            $('#nama_akun40').val(thisValue);
                                            setTimeout("$('#suggestions40').fadeOut();", 100);
                                          }
                                          function fill240(thisValue){
                                            $('#kode_akun40').val(thisValue);
                                            setTimeout("$('#suggestions40').fadeOut();", 100);
                                          }
                                          function fill340(thisValue){
                                            $('#id_akun40').val(thisValue);
                                            setTimeout("$('#suggestions40').fadeOut();", 100);
                                          }
                                          </script>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <div id="accordion3" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1">
                                        <h4 class="panel-title">
                                             Laba Ditahan
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion3_1" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                            <div class="row form-group">
                                              <div id="srow41">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menampung laba/rugi yang ditahan setiap terjadi tutup buku tahunan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Laba Ditahan</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coalabaditahan' onBlur="fill341();" id="id_akun41"/>
                                                      <input class='form-control' type="text" onKeyUp="suggest41(this.value);" name="kode_akun[]" onBlur="fill241();" id="kode_akun41" value='<?=$query2["kode_akun"]?>' />
                                                      <div class="result"><div class="suggestionsBox" id="suggestions41" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList41">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill141();" id="nama_akun41" value='<?=$query2["nama_akun"]?>' disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='akun_penting[]' value="Laba Ditahan"/>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest41(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions41').fadeOut();
                                            }else{
                                              $('#nama_akun41').addClass('load');
                                              $.post("../home/suggest_akun3/"+inputString+"/41/3", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions41').fadeIn();
                                                  $('#suggestionsList41').html(data);
                                                  $('#nama_akun41').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill141(thisValue){
                                            $('#nama_akun41').val(thisValue);
                                            setTimeout("$('#suggestions41').fadeOut();", 100);
                                          }
                                          function fill241(thisValue){
                                            $('#kode_akun41').val(thisValue);
                                            setTimeout("$('#suggestions41').fadeOut();", 100);
                                          }
                                          function fill341(thisValue){
                                            $('#id_akun41').val(thisValue);
                                            setTimeout("$('#suggestions41').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2">
                                        <h4 class="panel-title">
                                             Laba Tahun Berjalan 
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion3_2" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                            <div class="row form-group">
                                              <div id="srow42">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menampung laba/rugi setiap terjadinya transaksi </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">SHU Tahun Berjalan</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coalabatahunberjalan' onBlur="fill342();" id="id_akun42"/>
                                                      <input class='form-control' type="text" onKeyUp="suggest42(this.value);" name="kode_akun[]" onBlur="fill242();" id="kode_akun42" value='<?=$query3["kode_akun"]?>' />
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions42" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList42">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill142();" id="nama_akun42" value='<?=$query3["nama_akun"]?>' disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 1)'  type='hidden' class='form-control' name='akun_penting[]' value='Laba Tahun Berjalan' />
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <script>
                                          function suggest42(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions42').fadeOut();
                                            }else{
                                              $('#nama_akun42').addClass('load');
                                              $.post("../home/suggest_akun3/"+inputString+"/42/3", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions42').fadeIn();
                                                  $('#suggestionsList42').html(data);
                                                  $('#nama_akun42').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill142(thisValue){
                                            $('#nama_akun42').val(thisValue);
                                            setTimeout("$('#suggestions42').fadeOut();", 100);
                                          }
                                          function fill242(thisValue){
                                            $('#kode_akun42').val(thisValue);
                                            setTimeout("$('#suggestions42').fadeOut();", 100);
                                          }
                                          function fill342(thisValue){
                                            $('#id_akun42').val(thisValue);
                                            setTimeout("$('#suggestions42').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                    </div>
                                </div>  
                              </div>
                            </div>
                        </div>
                        </div>
        <div class="form-group">
           <div class="col-xs-11">
                <input type="submit" class="btn btn-primary pull-right" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
            </div>
        </div>
      </form>
                        </div>
                      </div>
                      </div>