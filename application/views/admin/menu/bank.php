
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp sbold"><?=$judul;?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tiles">
                                <a href="<?=base_url('home/createpenerimaan_bank');?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Entry Jurnal Penerimaan </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/createpengeluaran_bank');?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Entry Jurnal Pengeluaran </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/createtransfer_kas');?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Transfer Kas & Bank </div>
                                        </div>
                                    </div>
                                </a>
                                <a data-toggle="modal" href="#draggable">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Rekonsiliasi </div>
                                        </div>
                                    </div>
                                </a>
                                <form action="<?=base_url().'home/rekonsiliasi_bank';?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Rekonsiliasi Bank</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <input id="akunke" value="3" type="hidden" />    
                                                      <div class="row form-group">
                                                        <div id="srow1">
                                                          <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label class="control-label col-xs-4">Kode Akun</label>
                                                              <div class="col-xs-8">
                                                                <input placeholder='ID Akun'  type='hidden' class='form-control' name='coa' onBlur="fill31();" id="id_akun1" />
                                                                <input class='form-control' type="text" onKeyUp="suggest1(this.value);" name="kode_akun[]" onBlur="fill21();" id="kode_akun1"/>
                                                                <div class="result"><div class="suggestionsBox" id="suggestions1" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                                      <div class="suggestionsList" id="suggestionsList1">&nbsp;</div></div></div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <!--<div class="col-sm-6">
                                                            <div class="form-group">
                                                              <label class="control-label col-xs-2">Nama Akun</label>
                                                              <div class="col-xs-8">
                                                                <input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill11();" id="nama_akun1" disabled/>
                                                              </div>
                                                            </div>
                                                          </div>-->
                                                        </div>
                                                      </div>
                                                    <script>
                                                    function suggest1(inputString){
                                                      if(inputString.length == 0){
                                                        $('#suggestions1').fadeOut();
                                                      }else{
                                                        $('#nama_akun1').addClass('load');
                                                        $.post("../home/suggest_akun_bank/"+inputString+"/1", {queryString:""+inputString+""}, function(data){
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
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Tanggal Rekening Koran</label>
                                                            <div class="col-xs-8">
                                                              <input name="tanggal_rekening_koran" class="form-control form-control-inline date-picker" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Saldo Rekening Koran</label>
                                                            <div class="col-xs-8">
                                                              <input name="saldo_rekening_koran" placeholder="Saldo Pada Rekening Koran" class="form-control" type="text"  id="saldo_rekening_koran" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Batal</button>
                                                    <input type="submit" class="btn green" name="simpan" id="simpan" value="Lanjutkan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                                    <!--<button type="button" class="btn green">Lanjutkan</button>-->
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                    </form>
                                <!--<a href="<?php //=base_url('home/penerimaan_bank');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Jurnal Transaksi Penerimaan </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?php //=base_url('home/pengeluaran_bank');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Jurnal Transaksi Pengeluaran </div>
                                        </div>
                                    </div>
                                </a>-->
                                <a href="<?=base_url('home/daftar_jurnal_bank');?>">
                                <div class="tile double bg-green-turquoise">
                                    <div class="tile-body">
                                        <i class="fa fa-book"></i>
                                    </div>
                                        <div class="tile-object">
                                            <div class="name"> Jurnal Transaksi </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->