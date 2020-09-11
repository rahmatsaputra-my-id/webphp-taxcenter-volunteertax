                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                              <div id="accordion2" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
                                        <h4 class="panel-title">
                                             Pembiayaan 
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion2_1" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                          <div class="row form-group">
                                              <div id="srow21">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk produk pembiayaan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill321();" id="id_akun21" />
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
                                                    <input placeholder='(Kas atau Bank)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan 1"/>
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
                                              $.post("../home/suggest_akun/"+inputString+"/21", {queryString:""+inputString+""}, function(data){
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
                                              <div id="srow22">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill322();" id="id_akun22" />
                                                      <input class='form-control' type="text" onKeyUp="suggest22(this.value);" name="kode_akun[]" onBlur="fill222();" id="kode_akun22"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions22" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList22">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill122();" id="nama_akun22" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan 2" />
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
                                          function suggest22(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions22').fadeOut();
                                            }else{
                                              $('#nama_akun22').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/22", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions22').fadeIn();
                                                  $('#suggestionsList22').html(data);
                                                  $('#nama_akun22').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill122(thisValue){
                                            $('#nama_akun22').val(thisValue);
                                            setTimeout("$('#suggestions22').fadeOut();", 100);
                                          }
                                          function fill222(thisValue){
                                            $('#kode_akun22').val(thisValue);
                                            setTimeout("$('#suggestions22').fadeOut();", 100);
                                          }
                                          function fill322(thisValue){
                                            $('#id_akun22').val(thisValue);
                                            setTimeout("$('#suggestions22').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow23">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill323();" id="id_akun23" />
                                                      <input class='form-control' type="text" onKeyUp="suggest23(this.value);" name="kode_akun[]" onBlur="fill223();" id="kode_akun23"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions23" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList23">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill123();" id="nama_akun23" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan 3" />
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
                                          function suggest23(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions23').fadeOut();
                                            }else{
                                              $('#nama_akun23').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/23", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions23').fadeIn();
                                                  $('#suggestionsList23').html(data);
                                                  $('#nama_akun23').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill123(thisValue){
                                            $('#nama_akun23').val(thisValue);
                                            setTimeout("$('#suggestions23').fadeOut();", 100);
                                          }
                                          function fill223(thisValue){
                                            $('#kode_akun23').val(thisValue);
                                            setTimeout("$('#suggestions23').fadeOut();", 100);
                                          }
                                          function fill323(thisValue){
                                            $('#id_akun23').val(thisValue);
                                            setTimeout("$('#suggestions23').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow24">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan 4</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill324();" id="id_akun24" />
                                                      <input class='form-control' type="text" onKeyUp="suggest24(this.value);" name="kode_akun[]" onBlur="fill224();" id="kode_akun24"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions24" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList24">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill124();" id="nama_akun24" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 4)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan 4" />
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
                                          function suggest24(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions24').fadeOut();
                                            }else{
                                              $('#nama_akun24').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/24", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions24').fadeIn();
                                                  $('#suggestionsList24').html(data);
                                                  $('#nama_akun24').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill124(thisValue){
                                            $('#nama_akun24').val(thisValue);
                                            setTimeout("$('#suggestions24').fadeOut();", 100);
                                          }
                                          function fill224(thisValue){
                                            $('#kode_akun24').val(thisValue);
                                            setTimeout("$('#suggestions24').fadeOut();", 100);
                                          }
                                          function fill324(thisValue){
                                            $('#id_akun24').val(thisValue);
                                            setTimeout("$('#suggestions24').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow25">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Pembiayaan 5</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill325();" id="id_akun25" />
                                                      <input class='form-control' type="text" onKeyUp="suggest25(this.value);" name="kode_akun[]" onBlur="fill225();" id="kode_akun25"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions25" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList25">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill125();" id="nama_akun25" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 5)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Pembiayaan 5" />
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
                                          function suggest25(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions25').fadeOut();
                                            }else{
                                              $('#nama_akun25').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/25", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions25').fadeIn();
                                                  $('#suggestionsList25').html(data);
                                                  $('#nama_akun25').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill125(thisValue){
                                            $('#nama_akun25').val(thisValue);
                                            setTimeout("$('#suggestions25').fadeOut();", 100);
                                          }
                                          function fill225(thisValue){
                                            $('#kode_akun25').val(thisValue);
                                            setTimeout("$('#suggestions25').fadeOut();", 100);
                                          }
                                          function fill325(thisValue){
                                            $('#id_akun25').val(thisValue);
                                            setTimeout("$('#suggestions25').fadeOut();", 100);
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
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill326();" id="id_akun26" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/26", {queryString:""+inputString+""}, function(data){
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
                                            <div class="row form-group">
                                              <div id="srow27">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk mengeluarkan uang pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill327();" id="id_akun27" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/27", {queryString:""+inputString+""}, function(data){
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
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2">
                                        <h4 class="panel-title">
                                             Angsuran 
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion2_2" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                            <div class="row form-group">
                                              <div id="srow28">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima uang angsuran pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill328();" id="id_akun28" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/28", {queryString:""+inputString+""}, function(data){
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
                                              <div id="srow29">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima biaya administrasi dari angsuran pembiayaan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Administrasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill329();" id="id_akun29" />
                                                      <input class='form-control' type="text" onKeyUp="suggest29(this.value);" name="kode_akun[]" onBlur="fill229();" id="kode_akun29"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions29" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList29">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill129();" id="nama_akun29" disabled/>
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
                                          function suggest29(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions29').fadeOut();
                                            }else{
                                              $('#nama_akun29').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/29", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions29').fadeIn();
                                                  $('#suggestionsList29').html(data);
                                                  $('#nama_akun29').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill129(thisValue){
                                            $('#nama_akun29').val(thisValue);
                                            setTimeout("$('#suggestions29').fadeOut();", 100);
                                          }
                                          function fill229(thisValue){
                                            $('#kode_akun29').val(thisValue);
                                            setTimeout("$('#suggestions29').fadeOut();", 100);
                                          }
                                          function fill329(thisValue){
                                            $('#id_akun29').val(thisValue);
                                            setTimeout("$('#suggestions29').fadeOut();", 100);
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
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill330();" id="id_akun30" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/30", {queryString:""+inputString+""}, function(data){
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
                                                  <p> Tentukan akun yang digunakan untuk menerima bagi hasil dari produk pembiayaan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill331();" id="id_akun31" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/31", {queryString:""+inputString+""}, function(data){
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
                                              <div id="srow32">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill332();" id="id_akun32" />
                                                      <input class='form-control' type="text" onKeyUp="suggest32(this.value);" name="kode_akun[]" onBlur="fill232();" id="kode_akun32"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions32" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList32">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill132();" id="nama_akun32" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 2)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 2 Penarikan' />
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
                                          function suggest32(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions32').fadeOut();
                                            }else{
                                              $('#nama_akun32').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/32", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions32').fadeIn();
                                                  $('#suggestionsList32').html(data);
                                                  $('#nama_akun32').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill132(thisValue){
                                            $('#nama_akun32').val(thisValue);
                                            setTimeout("$('#suggestions32').fadeOut();", 100);
                                          }
                                          function fill232(thisValue){
                                            $('#kode_akun32').val(thisValue);
                                            setTimeout("$('#suggestions32').fadeOut();", 100);
                                          }
                                          function fill332(thisValue){
                                            $('#id_akun32').val(thisValue);
                                            setTimeout("$('#suggestions32').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow33">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill333();" id="id_akun33" />
                                                      <input class='form-control' type="text" onKeyUp="suggest33(this.value);" name="kode_akun[]" onBlur="fill233();" id="kode_akun33"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions33" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList33">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill133();" id="nama_akun33" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 3 Penarikan' />
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
                                          function suggest33(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions33').fadeOut();
                                            }else{
                                              $('#nama_akun33').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/33", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions33').fadeIn();
                                                  $('#suggestionsList33').html(data);
                                                  $('#nama_akun33').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill133(thisValue){
                                            $('#nama_akun33').val(thisValue);
                                            setTimeout("$('#suggestions33').fadeOut();", 100);
                                          }
                                          function fill233(thisValue){
                                            $('#kode_akun33').val(thisValue);
                                            setTimeout("$('#suggestions33').fadeOut();", 100);
                                          }
                                          function fill333(thisValue){
                                            $('#id_akun33').val(thisValue);
                                            setTimeout("$('#suggestions33').fadeOut();", 100);
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
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill334();" id="id_akun34" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/34", {queryString:""+inputString+""}, function(data){
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
                                            <div class="row form-group">
                                              <div id="srow35">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk produk pembiayaan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill335();" id="id_akun35" />
                                                      <input class='form-control' type="text" onKeyUp="suggest35(this.value);" name="kode_akun[]" onBlur="fill235();" id="kode_akun35"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions35" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList35">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill135();" id="nama_akun35" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 1)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Simpanan 1 Penarikan' />
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
                                          function suggest35(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions35').fadeOut();
                                            }else{
                                              $('#nama_akun35').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/35", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions35').fadeIn();
                                                  $('#suggestionsList35').html(data);
                                                  $('#nama_akun35').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill135(thisValue){
                                            $('#nama_akun35').val(thisValue);
                                            setTimeout("$('#suggestions35').fadeOut();", 100);
                                          }
                                          function fill235(thisValue){
                                            $('#kode_akun35').val(thisValue);
                                            setTimeout("$('#suggestions35').fadeOut();", 100);
                                          }
                                          function fill335(thisValue){
                                            $('#id_akun35').val(thisValue);
                                            setTimeout("$('#suggestions35').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow36">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill336();" id="id_akun36" />
                                                      <input class='form-control' type="text" onKeyUp="suggest36(this.value);" name="kode_akun[]" onBlur="fill236();" id="kode_akun36"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions36" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList36">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill136();" id="nama_akun36" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 2)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 2 Penarikan" />
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
                                          function suggest36(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions36').fadeOut();
                                            }else{
                                              $('#nama_akun36').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/36", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions36').fadeIn();
                                                  $('#suggestionsList36').html(data);
                                                  $('#nama_akun36').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill136(thisValue){
                                            $('#nama_akun36').val(thisValue);
                                            setTimeout("$('#suggestions36').fadeOut();", 100);
                                          }
                                          function fill236(thisValue){
                                            $('#kode_akun36').val(thisValue);
                                            setTimeout("$('#suggestions36').fadeOut();", 100);
                                          }
                                          function fill336(thisValue){
                                            $('#id_akun36').val(thisValue);
                                            setTimeout("$('#suggestions36').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow37">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill337();" id="id_akun37" />
                                                      <input class='form-control' type="text" onKeyUp="suggest37(this.value);" name="kode_akun[]" onBlur="fill237();" id="kode_akun37"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions37" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList37">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill137();" id="nama_akun37" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Simpanan 3 Penarikan' />
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
                                          function suggest37(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions37').fadeOut();
                                            }else{
                                              $('#nama_akun37').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/37", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions37').fadeIn();
                                                  $('#suggestionsList37').html(data);
                                                  $('#nama_akun37').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill137(thisValue){
                                            $('#nama_akun37').val(thisValue);
                                            setTimeout("$('#suggestions37').fadeOut();", 100);
                                          }
                                          function fill237(thisValue){
                                            $('#kode_akun37').val(thisValue);
                                            setTimeout("$('#suggestions37').fadeOut();", 100);
                                          }
                                          function fill337(thisValue){
                                            $('#id_akun37').val(thisValue);
                                            setTimeout("$('#suggestions37').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow38">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 4</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill338();" id="id_akun38" />
                                                      <input class='form-control' type="text" onKeyUp="suggest38(this.value);" name="kode_akun[]" onBlur="fill238();" id="kode_akun38"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions38" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList38">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill138();" id="nama_akun38" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 4)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Simpanan 4 Penarikan' />
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
                                          function suggest38(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions38').fadeOut();
                                            }else{
                                              $('#nama_akun38').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/38", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions38').fadeIn();
                                                  $('#suggestionsList38').html(data);
                                                  $('#nama_akun38').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill138(thisValue){
                                            $('#nama_akun38').val(thisValue);
                                            setTimeout("$('#suggestions38').fadeOut();", 100);
                                          }
                                          function fill238(thisValue){
                                            $('#kode_akun38').val(thisValue);
                                            setTimeout("$('#suggestions38').fadeOut();", 100);
                                          }
                                          function fill338(thisValue){
                                            $('#id_akun38').val(thisValue);
                                            setTimeout("$('#suggestions38').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow39">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 5</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill339();" id="id_akun39" />
                                                      <input class='form-control' type="text" onKeyUp="suggest39(this.value);" name="kode_akun[]" onBlur="fill239();" id="kode_akun39"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions39" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList39">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill139();" id="nama_akun39" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 5)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Simpanan 5 Penarikan' />
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
                                          function suggest39(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions39').fadeOut();
                                            }else{
                                              $('#nama_akun39').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/39", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions39').fadeIn();
                                                  $('#suggestionsList39').html(data);
                                                  $('#nama_akun39').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill139(thisValue){
                                            $('#nama_akun39').val(thisValue);
                                            setTimeout("$('#suggestions39').fadeOut();", 100);
                                          }
                                          function fill239(thisValue){
                                            $('#kode_akun39').val(thisValue);
                                            setTimeout("$('#suggestions39').fadeOut();", 100);
                                          }
                                          function fill339(thisValue){
                                            $('#id_akun39').val(thisValue);
                                            setTimeout("$('#suggestions39').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                    </div>
                                </div>  
                              </div>
                        </div>
                        </div>
                        </div>
                      </div>