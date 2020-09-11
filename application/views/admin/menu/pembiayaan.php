
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
                                <!--<a href="<?php //=base_url('home/createjaminan');?>">
                                    <div class="tile double bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Pengajuan Pinjaman </div>
                                        </div>
                                    </div>
                                </a>-->
                                <a href="<?=base_url('home/jaminan');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Daftar Pengajuan Pembiayaan </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/createpinjaman');?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Entry Pembiayaan </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/createangsuran');?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Entry Angsuran </div>
                                        </div>
                                    </div>
                                </a>
                                <a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal">
                                    <div class="tile bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Detail Transaksi Anggota </div>
                                        </div>
                                    </div>
                                </a>
                                <!--<a href="<?php //=base_url('home/pinjaman');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Jurnal Transaksi Pinjaman </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?php //=base_url('home/angsuran');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Jurnal Transaksi Angsuran </div>
                                        </div>
                                    </div>
                                </a>-->
                                <a href="<?=base_url('home/daftar_jurnal_pembiayaan');?>">
                                    <div class="tile double bg-green-turquoise">
                                        <div class="tile-body">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">Jurnal Transaksi</div>
                                        </div>
                                    </div>
                                </a>
                                <form action="<?=base_url().'home/transaksi_anggota_pembiayaan';?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Detail Transaksi Anggota</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Anggota</label>
                                                            <div class="col-xs-8">
                                                                <select class="bs-select form-control" data-live-search="true" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="0" >--Pilih Anggota--</option>
                                                                  <?php foreach ($pinjaman->result() as $dd) { ?>
                                                                  <option value="<?=$dd->id?>" ><?=$dd->no_kta.'-'.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                                                                  <?php }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Dari Tanggal</label>
                                                            <div class="col-xs-8">
                                                              <input name="dari_tanggal" class="form-control form-control-inline date-picker" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Sampai Tanggal</label>
                                                            <div class="col-xs-8">
                                                              <input name="sampai_tanggal" class="form-control form-control-inline date-picker" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                                                    <input type="submit" class="btn green" name="simpan" id="simpan" value="Lanjutkan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->