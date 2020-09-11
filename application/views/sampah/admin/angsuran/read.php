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
                            <a type="button" class="btn btn-primary" name="add" href="<?=base_url($linkcreate);?>"><i class="fa fa-plus fa-fw"></i>Tambah <?=$judul;?></a>
                            <a href="<?=base_url($linkprint);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <br/>
                            <br/>
                            <table class="table table-striped table-hover">
                              <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th width="9%">Tanggal Transaksi</th>
                                    <th>ID</th>
                                    <th>Nama Anggota</th>
                                    <th>Kuasa</th>
                                    <th>Nama Produk</th>
                                    <th colspan="2">Keterangan</th>
                                    <th width="10%">Debet</th>
                                    <th width="10%">Kredit</th> 
                                    <th width="10%">Aksi</th>
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
                                  <td><strong><?php echo $r->nama_depan.' '.$r->nama_tengah.' '.$r->nama_belakang;?></strong></td>
                                  <td><strong><?php echo $r->kuasa;?></strong></td>
                                  <td><strong><?php echo $r->nama_produk_pendanaan;?></strong></td>
                                  <td colspan="2"><strong><?php echo $r->keterangan;?></strong></td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">
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
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>(<?php echo $r2['kepala_akun'].'-'.$r2['klasifikasi_akun'].'-'.$r2['kode_akun'];?>)&nbsp;<?php echo $r2['nama_akun'];?></td>
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