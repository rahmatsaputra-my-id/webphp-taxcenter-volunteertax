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
                                    <br/>
                                    <br/>
                                    <div class="row invoice-info">
                                          <div class="box-body col-sm-12">
                                            <table class="table table-light">
                                              <tr>
                                                <td width='20%'>Nama</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=$query2['nama_depan'].' '.$query2['nama_tengah'].' '.$query2['nama_belakang']; ?></td>

                                                <td width='20%'>Jumlah Pinjaman</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=number_format($query2['nilai_realisasi'],0,",","."); ?></td>
                                              </tr>
                                              <tr>
                                                <td width='20%'>Alamat</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=$query2['alamat'].' '.$query2['kota'].' '.$query2['kode_pos']; ?></td>

                                                <td width='20%'>Nisbah</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=number_format($query2['nominal_nisbah'],0,",",".");?></td>
                                              </tr>
                                              <tr>
                                                <td width='20%'>Jenis Pinjaman</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=$query2['nama_produk_pembiayaan']; ?></td>

                                                <td width='20%'>Total Pinjaman</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'> <?php $total=$query2['nilai_realisasi']+$query2['nominal_nisbah']; echo number_format($total,0,",",".");?></td>
                                              </tr>
                                              <tr>
                                                <td width='20%'>Jatuh Tempo</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'><?=$query2['jatuh_tempo']; ?></td>

                                                <?php
                                                if($query2['periode']=='bulanan'){
                                                  $periode="Bulan";
                                                }else if($query2['periode']=='mingguan'){
                                                  $periode="Minggu";
                                                }
                                                ?>
                                                <td width='20%'>Jangka Waktu</td>
                                                <td width='2%'>:</td>
                                                <td width='30%'> <?=$query2['jangka_waktu'].' '.$periode;?></td>
                                              </tr>
                                            </table>
                                          </div><!-- /.box-body -->
                                    </div><!-- /.row -->
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr align="center">
                                                <th width="12%">Angsuran Ke</th>
                                                <th width="18%">Tanggal Jatuh Tempo</th>
                                                <th width="15%">Tanggal Bayar</th>
                                                <th width="17%">Angsuran</th>
                                                <th width="15%">Nisbah</th>
                                                <th width="14%">Denda</th>
                                                <th width="20%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $saldo=0;?>
                                                <?php 
                                                     
                                                    $tanggal =substr($query2['jatuh_tempo'],8,2); 
                                                    $bulan =substr($query2['jatuh_tempo'],5,2);
                                                    $tahun =substr($query2['jatuh_tempo'],0,4);
                                                    $bulan2 = (int)$bulan;
                                                    $bulan3 = $bulan2+$query->num_rows();
                                                    $bulan4 = $bulan2;
                                                    //$semua=xinthinx($query2['jatuh_tempo']);
                                                    //echo $data=$query->num_rows();
                                                
                                                
                                                if ($query->result()) {
                                                  foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td align="center"><?=$no;?></td>
                                                    <?php 
                                                    if ($bulan4 < 12){
                                                      $bulan4=$bulan4+1;
                                                    }else{
                                                      $bulan4 = 0+1;
                                                      $tahun = $tahun+1;
                                                    }
                                                    if($bulan4 < 10){
                                                        $bulan5 = '0'.$bulan4;    
                                                    }else{
                                                        $bulan5 = $bulan4;
                                                    }
                                                    ?>
                                                    <td align="center"><?=$tahun.'-'.$bulan5.'-'.$tanggal;?></td>
                                                    <td align="center"><?=($row->tanggal);?></td>
                                                    <td align="center"><?='Rp. '.number_format($row->angsuran,0,",",".");?></td>
                                                    <td align="center"><?='Rp. '.number_format($row->nisbah,0,",",".");?></td>
                                                    <td align="center"><?='Rp. '.number_format($row->denda,0,",",".");?></td>
                                                    <td align="center"><?='Rp. '.number_format($row->angsuran+$row->nisbah+$row->denda,0,",","."); ?></td>
                                                </tr>
                                                <?php $no++; }
                                                }
                                                /*foreach($query->result() as $row){*/ 
                                                for ($i=$no; $i < $query2['jangka_waktu']+1 ; $i++) { 
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td align="center"><?=$i;?></td>
                                                    <?php 
                                                    if ($bulan3 < 12){
                                                      $bulan3=$bulan3+1;
                                                    }else{
                                                      $bulan3 = 0+1;
                                                      $tahun = $tahun+1;
                                                    }
                                                    if($bulan3 < 10){
                                                        $bulan6 = '0'.$bulan3;    
                                                    }else{
                                                        $bulan6 = $bulan3;
                                                    }
                                                    ?>
                                                    <td align="center"><?php echo $tahun.'-'.$bulan6.'-'.$tanggal;?></td>
                                                    <td><?php //=($row->infaq);?></td>
                                                    <td align="center"><?='Rp. '.number_format($query2['total_angsuran'],0,",",".");?></td>
                                                    <td align="center"><?='Rp. '.number_format($query2['total_angsuran_nisbah'],0,",",".");?></td>
                                                    <td><?php //=($row->denda);?></td>
                                                    <td align="center"><?='Rp. '.number_format($query2['total_angsuran_keseluruhan'],0,",",".");?></td>
                                                </tr>
                                            <?php $no++; /*}*/}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>