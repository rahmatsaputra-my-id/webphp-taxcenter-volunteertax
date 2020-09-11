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
                          <div class="tab-content">
                              <div id="accordion1" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                        <h4 class="panel-title">
                                             Simpanan 
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion1_1" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                            <div class="row form-group">
                                              <div id="srow1">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menampung uang masuk dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill31();" id="id_akun1" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/1", {queryString:""+inputString+""}, function(data){
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
                                                  <p> Tentukan akun yang digunakan untuk produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill32();" id="id_akun2" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/2", {queryString:""+inputString+""}, function(data){
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
                                              <div id="srow3">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill33();" id="id_akun3" />
                                                      <input class='form-control' type="text" onKeyUp="suggest3(this.value);" name="kode_akun[]" onBlur="fill23();" id="kode_akun3"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions3" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList3">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill13();" id="nama_akun3" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 2" />
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
                                          function suggest3(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions3').fadeOut();
                                            }else{
                                              $('#nama_akun3').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/3", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions3').fadeIn();
                                                  $('#suggestionsList3').html(data);
                                                  $('#nama_akun3').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill13(thisValue){
                                            $('#nama_akun3').val(thisValue);
                                            setTimeout("$('#suggestions3').fadeOut();", 100);
                                          }
                                          function fill23(thisValue){
                                            $('#kode_akun3').val(thisValue);
                                            setTimeout("$('#suggestions3').fadeOut();", 100);
                                          }
                                          function fill33(thisValue){
                                            $('#id_akun3').val(thisValue);
                                            setTimeout("$('#suggestions3').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow4">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill34();" id="id_akun4" />
                                                      <input class='form-control' type="text" onKeyUp="suggest4(this.value);" name="kode_akun[]" onBlur="fill24();" id="kode_akun4"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions4" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList4">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill14();" id="nama_akun4" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 3" />
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
                                          function suggest4(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions4').fadeOut();
                                            }else{
                                              $('#nama_akun4').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/4", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions4').fadeIn();
                                                  $('#suggestionsList4').html(data);
                                                  $('#nama_akun4').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill14(thisValue){
                                            $('#nama_akun4').val(thisValue);
                                            setTimeout("$('#suggestions4').fadeOut();", 100);
                                          }
                                          function fill24(thisValue){
                                            $('#kode_akun4').val(thisValue);
                                            setTimeout("$('#suggestions4').fadeOut();", 100);
                                          }
                                          function fill34(thisValue){
                                            $('#id_akun4').val(thisValue);
                                            setTimeout("$('#suggestions4').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow5">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 4</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill35();" id="id_akun5" />
                                                      <input class='form-control' type="text" onKeyUp="suggest5(this.value);" name="kode_akun[]" onBlur="fill25();" id="kode_akun5"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions5" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList5">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill15();" id="nama_akun5" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 4)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 4" />
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
                                          function suggest5(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions5').fadeOut();
                                            }else{
                                              $('#nama_akun5').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/5", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions5').fadeIn();
                                                  $('#suggestionsList5').html(data);
                                                  $('#nama_akun5').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill15(thisValue){
                                            $('#nama_akun5').val(thisValue);
                                            setTimeout("$('#suggestions5').fadeOut();", 100);
                                          }
                                          function fill25(thisValue){
                                            $('#kode_akun5').val(thisValue);
                                            setTimeout("$('#suggestions5').fadeOut();", 100);
                                          }
                                          function fill35(thisValue){
                                            $('#id_akun5').val(thisValue);
                                            setTimeout("$('#suggestions5').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow6">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 5</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill36();" id="id_akun6" />
                                                      <input class='form-control' type="text" onKeyUp="suggest6(this.value);" name="kode_akun[]" onBlur="fill26();" id="kode_akun6"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions6" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList6">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill16();" id="nama_akun6" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Simpanan 5)'  type='hidden' class='form-control' name='nama_akun_penting[]' value="Simpanan 5" />
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
                                          function suggest6(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions6').fadeOut();
                                            }else{
                                              $('#nama_akun6').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/6", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions6').fadeIn();
                                                  $('#suggestionsList6').html(data);
                                                  $('#nama_akun6').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill16(thisValue){
                                            $('#nama_akun6').val(thisValue);
                                            setTimeout("$('#suggestions6').fadeOut();", 100);
                                          }
                                          function fill26(thisValue){
                                            $('#kode_akun6').val(thisValue);
                                            setTimeout("$('#suggestions6').fadeOut();", 100);
                                          }
                                          function fill36(thisValue){
                                            $('#id_akun6').val(thisValue);
                                            setTimeout("$('#suggestions6').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow7">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima biaya administrasi dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Administrasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill37();" id="id_akun7" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/7", {queryString:""+inputString+""}, function(data){
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
                                                  <p> Tentukan akun yang digunakan untuk menerima bagi hasil dari produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill38();" id="id_akun8" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/8", {queryString:""+inputString+""}, function(data){
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
                                            <div class="row form-group">
                                              <div id="srow9">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill39();" id="id_akun9" />
                                                      <input class='form-control' type="text" onKeyUp="suggest9(this.value);" name="kode_akun[]" onBlur="fill29();" id="kode_akun9"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions9" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList9">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill19();" id="nama_akun9" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 2)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 2' />
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
                                          function suggest9(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions9').fadeOut();
                                            }else{
                                              $('#nama_akun9').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/9", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions9').fadeIn();
                                                  $('#suggestionsList9').html(data);
                                                  $('#nama_akun9').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill19(thisValue){
                                            $('#nama_akun9').val(thisValue);
                                            setTimeout("$('#suggestions9').fadeOut();", 100);
                                          }
                                          function fill29(thisValue){
                                            $('#kode_akun9').val(thisValue);
                                            setTimeout("$('#suggestions9').fadeOut();", 100);
                                          }
                                          function fill39(thisValue){
                                            $('#id_akun9').val(thisValue);
                                            setTimeout("$('#suggestions9').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow10">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill310();" id="id_akun10" />
                                                      <input class='form-control' type="text" onKeyUp="suggest10(this.value);" name="kode_akun[]" onBlur="fill210();" id="kode_akun10"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions10" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList10">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill110();" id="nama_akun10" disabled/>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='(Bagi Hasil 3)'  type='hidden' class='form-control' name='nama_akun_penting[]' value='Bagi Hasil 3' />
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
                                          function suggest10(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions10').fadeOut();
                                            }else{
                                              $('#nama_akun10').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/10", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions10').fadeIn();
                                                  $('#suggestionsList10').html(data);
                                                  $('#nama_akun10').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill110(thisValue){
                                            $('#nama_akun10').val(thisValue);
                                            setTimeout("$('#suggestions10').fadeOut();", 100);
                                          }
                                          function fill210(thisValue){
                                            $('#kode_akun10').val(thisValue);
                                            setTimeout("$('#suggestions10').fadeOut();", 100);
                                          }
                                          function fill310(thisValue){
                                            $('#id_akun10').val(thisValue);
                                            setTimeout("$('#suggestions10').fadeOut();", 100);
                                          }
                                          </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                                        <h4 class="panel-title">
                                             Penarikan 
                                        </h4>
                                        </a>
                                    </div>
                                    <div id="accordion1_2" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                            <div class="row form-group">
                                              <div id="srow11">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill311();" id="id_akun11" />
                                                      <input class='form-control' type="text" onKeyUp="suggest11(this.value);" name="kode_akun[]" onBlur="fill211();" id="kode_akun11"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions11" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList11">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill111();" id="nama_akun11" disabled/>
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
                                          function suggest11(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions11').fadeOut();
                                            }else{
                                              $('#nama_akun11').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/11", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions11').fadeIn();
                                                  $('#suggestionsList11').html(data);
                                                  $('#nama_akun11').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill111(thisValue){
                                            $('#nama_akun11').val(thisValue);
                                            setTimeout("$('#suggestions11').fadeOut();", 100);
                                          }
                                          function fill211(thisValue){
                                            $('#kode_akun11').val(thisValue);
                                            setTimeout("$('#suggestions11').fadeOut();", 100);
                                          }
                                          function fill311(thisValue){
                                            $('#id_akun11').val(thisValue);
                                            setTimeout("$('#suggestions11').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow12">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill312();" id="id_akun12" />
                                                      <input class='form-control' type="text" onKeyUp="suggest12(this.value);" name="kode_akun[]" onBlur="fill212();" id="kode_akun12"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions12" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList12">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill112();" id="nama_akun12" disabled/>
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
                                          function suggest12(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions12').fadeOut();
                                            }else{
                                              $('#nama_akun12').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/12", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions12').fadeIn();
                                                  $('#suggestionsList12').html(data);
                                                  $('#nama_akun12').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill112(thisValue){
                                            $('#nama_akun12').val(thisValue);
                                            setTimeout("$('#suggestions12').fadeOut();", 100);
                                          }
                                          function fill212(thisValue){
                                            $('#kode_akun12').val(thisValue);
                                            setTimeout("$('#suggestions12').fadeOut();", 100);
                                          }
                                          function fill312(thisValue){
                                            $('#id_akun12').val(thisValue);
                                            setTimeout("$('#suggestions12').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow13">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill313();" id="id_akun13" />
                                                      <input class='form-control' type="text" onKeyUp="suggest13(this.value);" name="kode_akun[]" onBlur="fill213();" id="kode_akun13"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions13" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList13">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill113();" id="nama_akun13" disabled/>
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
                                          function suggest13(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions13').fadeOut();
                                            }else{
                                              $('#nama_akun13').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/13", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions13').fadeIn();
                                                  $('#suggestionsList13').html(data);
                                                  $('#nama_akun13').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill113(thisValue){
                                            $('#nama_akun13').val(thisValue);
                                            setTimeout("$('#suggestions13').fadeOut();", 100);
                                          }
                                          function fill213(thisValue){
                                            $('#kode_akun13').val(thisValue);
                                            setTimeout("$('#suggestions13').fadeOut();", 100);
                                          }
                                          function fill313(thisValue){
                                            $('#id_akun13').val(thisValue);
                                            setTimeout("$('#suggestions13').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow14">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 4</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill314();" id="id_akun14" />
                                                      <input class='form-control' type="text" onKeyUp="suggest14(this.value);" name="kode_akun[]" onBlur="fill214();" id="kode_akun14"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions14" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList14">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill114();" id="nama_akun14" disabled/>
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
                                          function suggest14(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions14').fadeOut();
                                            }else{
                                              $('#nama_akun14').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/14", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions14').fadeIn();
                                                  $('#suggestionsList14').html(data);
                                                  $('#nama_akun14').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill114(thisValue){
                                            $('#nama_akun14').val(thisValue);
                                            setTimeout("$('#suggestions14').fadeOut();", 100);
                                          }
                                          function fill214(thisValue){
                                            $('#kode_akun14').val(thisValue);
                                            setTimeout("$('#suggestions14').fadeOut();", 100);
                                          }
                                          function fill314(thisValue){
                                            $('#id_akun14').val(thisValue);
                                            setTimeout("$('#suggestions14').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow15">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Simpanan 5</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill315();" id="id_akun15" />
                                                      <input class='form-control' type="text" onKeyUp="suggest15(this.value);" name="kode_akun[]" onBlur="fill215();" id="kode_akun15"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions15" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList15">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill115();" id="nama_akun15" disabled/>
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
                                          function suggest15(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions15').fadeOut();
                                            }else{
                                              $('#nama_akun15').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/15", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions15').fadeIn();
                                                  $('#suggestionsList15').html(data);
                                                  $('#nama_akun15').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill115(thisValue){
                                            $('#nama_akun15').val(thisValue);
                                            setTimeout("$('#suggestions15').fadeOut();", 100);
                                          }
                                          function fill215(thisValue){
                                            $('#kode_akun15').val(thisValue);
                                            setTimeout("$('#suggestions15').fadeOut();", 100);
                                          }
                                          function fill315(thisValue){
                                            $('#id_akun15').val(thisValue);
                                            setTimeout("$('#suggestions15').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow16">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima bagi hasil dari produk simpanan </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 1</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill316();" id="id_akun16" />
                                                      <input class='form-control' type="text" onKeyUp="suggest16(this.value);" name="kode_akun[]" onBlur="fill216();" id="kode_akun16"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions16" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList16">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill116();" id="nama_akun16" disabled/>
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
                                          function suggest16(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions16').fadeOut();
                                            }else{
                                              $('#nama_akun16').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/16", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions16').fadeIn();
                                                  $('#suggestionsList16').html(data);
                                                  $('#nama_akun16').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill116(thisValue){
                                            $('#nama_akun16').val(thisValue);
                                            setTimeout("$('#suggestions16').fadeOut();", 100);
                                          }
                                          function fill216(thisValue){
                                            $('#kode_akun16').val(thisValue);
                                            setTimeout("$('#suggestions16').fadeOut();", 100);
                                          }
                                          function fill316(thisValue){
                                            $('#id_akun16').val(thisValue);
                                            setTimeout("$('#suggestions16').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow17">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 2</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill317();" id="id_akun17" />
                                                      <input class='form-control' type="text" onKeyUp="suggest17(this.value);" name="kode_akun[]" onBlur="fill217();" id="kode_akun17"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions17" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList17">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill117();" id="nama_akun17" disabled/>
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
                                          function suggest17(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions17').fadeOut();
                                            }else{
                                              $('#nama_akun17').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/17", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions17').fadeIn();
                                                  $('#suggestionsList17').html(data);
                                                  $('#nama_akun17').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill117(thisValue){
                                            $('#nama_akun17').val(thisValue);
                                            setTimeout("$('#suggestions17').fadeOut();", 100);
                                          }
                                          function fill217(thisValue){
                                            $('#kode_akun17').val(thisValue);
                                            setTimeout("$('#suggestions17').fadeOut();", 100);
                                          }
                                          function fill317(thisValue){
                                            $('#id_akun17').val(thisValue);
                                            setTimeout("$('#suggestions17').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow18">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Bagi Hasil 3</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill318();" id="id_akun18" />
                                                      <input class='form-control' type="text" onKeyUp="suggest18(this.value);" name="kode_akun[]" onBlur="fill218();" id="kode_akun18"/>
                                                      <div class="result">
                                                        <div class="suggestionsBox" id="suggestions18" style="display: none;">
                                                          <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList18">&nbsp;</div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill118();" id="nama_akun18" disabled/>
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
                                          function suggest18(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions18').fadeOut();
                                            }else{
                                              $('#nama_akun18').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/18", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions18').fadeIn();
                                                  $('#suggestionsList18').html(data);
                                                  $('#nama_akun18').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill118(thisValue){
                                            $('#nama_akun18').val(thisValue);
                                            setTimeout("$('#suggestions18').fadeOut();", 100);
                                          }
                                          function fill218(thisValue){
                                            $('#kode_akun18').val(thisValue);
                                            setTimeout("$('#suggestions18').fadeOut();", 100);
                                          }
                                          function fill318(thisValue){
                                            $('#id_akun18').val(thisValue);
                                            setTimeout("$('#suggestions18').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow19">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk menerima biaya administrasi dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Biaya Administrasi</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill319();" id="id_akun19" />
                                                      <input class='form-control' type="text" onKeyUp="suggest19(this.value);" name="kode_akun[]" onBlur="fill219();" id="kode_akun19"/>
                                                      <div class="result"><div class="suggestionsBox" id="suggestions19" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionsList" id="suggestionsList19">&nbsp;</div></div></div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                    <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill119();" id="nama_akun19" disabled/>
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
                                          function suggest19(inputString){
                                            if(inputString.length == 0){
                                              $('#suggestions19').fadeOut();
                                            }else{
                                              $('#nama_akun19').addClass('load');
                                              $.post("../home/suggest_akun/"+inputString+"/19", {queryString:""+inputString+""}, function(data){
                                                if(data.length>0){
                                                  $('#suggestions19').fadeIn();
                                                  $('#suggestionsList19').html(data);
                                                  $('#nama_akun19').removeClass('load');
                                                }
                                              });
                                            }
                                          }
                                          function fill119(thisValue){
                                            $('#nama_akun19').val(thisValue);
                                            setTimeout("$('#suggestions19').fadeOut();", 100);
                                          }
                                          function fill219(thisValue){
                                            $('#kode_akun19').val(thisValue);
                                            setTimeout("$('#suggestions19').fadeOut();", 100);
                                          }
                                          function fill319(thisValue){
                                            $('#id_akun19').val(thisValue);
                                            setTimeout("$('#suggestions19').fadeOut();", 100);
                                          }
                                          </script>
                                            <div class="row form-group">
                                              <div id="srow20">
                                                <div class="col-sm-12">
                                                  <p> Tentukan akun yang digunakan untuk mengeluarkan uang dari simpanan anggota </p>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label class="control-label col-xs-4">Kas atau Bank</label>
                                                    <div class="col-xs-8">
                                                      <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur="fill320();" id="id_akun20" />
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
                                              $.post("../home/suggest_akun/"+inputString+"/20", {queryString:""+inputString+""}, function(data){
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
                        </div>
                        </div>
                      </div>