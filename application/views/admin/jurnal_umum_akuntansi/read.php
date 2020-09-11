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
                            <!--<a type="button" class="btn btn-primary" name="add" href="<?php //=base_url($linkcreate);?>"><i class="fa fa-plus fa-fw"></i>Tambah <?=$judul;?></a>-->
                            <a href="<?=base_url($linkprint);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <br/>
                            <br/>
    <div class="portlet light form-fit bordered">
      <div class="portlet-body form">
        <div id="form-username" class="form-horizontal form-bordered">
          <div class="col-md-12">
            <div class="form-group" style="text-align:center;">
                <label class="control-label"><strong>Cari Jurnal</strong></label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-xs-4">Dari Tanggal</label>
            <div class="col-xs-8">
              <input name="tanggal_transaksi" value="<?php //echo $r['tanggal_transaksi'];?>" class="form-control form-control-inline date-picker" placeholder="" >
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label col-xs-4">Sampai Tanggal</label>
            <div class="col-xs-8">
              <input name="tanggal_transaksi" value="<?php //echo $r['tanggal_transaksi'];?>" class="form-control form-control-inline date-picker" placeholder="" >
            </div>
          </div>
        <div class="form-actions">
                <div class="col-md-12" style="text-align:center; padding-top:12px;">
                    <input type="submit" class="btn btn-primary" name="cari" value="Cari">
                </div>
        </div>
        </div>
      </div>
    </div>

                            <table class="table table-striped table-hover">
                              <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>No Jurnal</th>
                                    <th>Keterangan</th>
                                    <th width="15%">Kode Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Debet</th>
                                    <th>Kredit</th> 
                                    <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no=1;
                                foreach ($query as $r){
                            			$cls="class='odd gradeX'";
                            			if($r->ste==2)
                            				{
                            					$cls="class='warning odd gradeX'";	
              					            }
                                ?>
                                <tr <?php echo $cls;?>>
                                  <td><strong><?php echo ($no++); ?></strong></td>
                                  <td><strong><?php echo $r->tanggal_transaksi;?></strong></td>
                                  <td><strong><?php echo $r->no_transaksi;?></strong></td>
                                  <td><strong><?php echo $r->keterangan;?></strong></td>
                                  <td></td>
                                  <td></td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">
                                    <a class="btn btn-info btn-sm" name="view" href="<?=base_url($linkview.$r->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                    <a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdate.$r->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdelete.$r->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                </tr>
                              <?php
                                $rincian=$this->db->query('SELECT '.$table2.'.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun FROM '.$table2.' LEFT JOIN data_akun b ON coa=b.id WHERE header='.$r->id);
                        				foreach ($rincian->result_array() as $r2 ){
			                        ?>
                                <tr <?php echo $cls;?>>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $r2['kode_akun'];?></td>
                                  <td><?php echo $r2['nama_akun'];?></td>
                                  <td align="right"><?php echo number_format($r2['debet'],0,",",".");?></td>
                                  <td align="right"><?php echo number_format($r2['kredit'],0,",",".");?></td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                            <?php
  					                    }
                              }
                            ?>
                              </tbody>
                          </table>
                        </div>
                      </div>