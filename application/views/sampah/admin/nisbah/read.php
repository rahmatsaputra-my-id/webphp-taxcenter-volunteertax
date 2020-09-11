        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings"></i>
                                        <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body table-both-scroll">
                                    <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                    <a type="button" class="btn btn-primary" name="add" data-toggle="modal" href="#draggable" data-target="#draggable2" data-toggle="modal"><i class="fa fa-plus fa-fw"></i>Tambah <?=$judul;?></a>
                                    <br/>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>ID</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Bulan</th>
                                                <th>Total Nisbah</th>
                                                <th width="20%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $tanggal=''; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->id);?></td>
                                                    <td><?=($tanggal=$row->tanggal);?></td>
                                                    <td><?=($row->bulan);?></td>
                                                    <td><?=($row->total_nisbah);?></td>
                                                    <?php $tanggal_terakhir2=$row->tanggal;?>
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <!--<a class="btn btn-danger" name="delete" href="<?php //=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>-->
                                                </tr>
                                            <?php $no++; } $tanggal2=$tanggal;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            $bulan = array(
                                    '01' => 'Januari',
                                    '02' => 'Februari',
                                    '03' => 'Maret',
                                    '04' => 'April',
                                    '05' => 'Mei',
                                    '06' => 'Juni',
                                    '07' => 'Juli',
                                    '08' => 'Agustus',
                                    '09' => 'September',
                                    '10' => 'Oktober',
                                    '11' => 'November',
                                    '12' => 'Desember',
                            );
                            ?>

                                <form action="<?=base_url().'home/createposting_nisbah';?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable2" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Posting Nisbah</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Tanggal Posting Hari Ini</label>
                                                            <div class="col-xs-8">
                                                              <input name="dari_tanggal" class="form-control form-control-inline date-picker" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>" placeholder="" >
                                                              <input type="hidden" name="bulan" class="form-control form-control-inline date-picker" value="<?php $tgl=$bulan[date('m')]; echo $tgl; ?>" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Tanggal Posting Terakhir</label>
                                                            <div class="col-xs-8">
                                                              <input name="sampai_tanggal" value="<?=$tanggal2;?>" class="form-control form-control-inline date-picker" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                                                    <input type="submit" class="btn green" name="simpan2" id="simpan" value="Lanjutkan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </form>