        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings"></i>
                                        <span class="caption-subject bold uppercase"><?="Data ".$judul." Anggota" ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body table-both-scroll">
                            <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Batal</a>
                            <form action="<?=base_url().'home/createposting_nisbah';?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <br/>
                                    <br/>
                                    <input type="hidden" name="periode" value="<?php echo $periode;?>" />
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>ID Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Produk Pendanaan</th>
                                                <th>Total Simpanan</th>
                                                <th>Persentase Nisbah</th>
                                                <th>Nominal Nisbah</th>
                                                <th>Saldo Simpanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $mutasi3=0;
                                            foreach($query->result() as $row){
                                            $mutasi2=0;
                                            $query2 = $this->db->select('p.id, p.id_produk, p.saldo, p.id_anggota, p.id_perusahaan, d.no_kta, d.nama_depan, d.nama_tengah, d.nama_belakang, e.nama_produk_pendanaan, e.suku_bunga, e.akun_kasbank1, e.akun_simpanan, e.akun_administrasi, e.akun_kasbank2, e.akun_nisbah')->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))->join('data_anggota d','p.id_anggota = d.id','LEFT')->join('data_produk_pendanaan e','p.id_produk = e.id','LEFT')->where('p.id_produk',$row->id)->order_by('p.id_produk','ASC')->get('data_anggota_produk_pendanaan'.' p');
                                             foreach($query2->result() as $row2){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row2->no_kta);?></td>
                                                    <td><?=($row2->nama_depan.' '.$row2->nama_tengah.' '.$row2->nama_belakang);?></td>
                                                    <td><?=($row2->nama_produk_pendanaan);?></td>
                                                    <td><?php $query2 = $this->db->select_sum('simpanan')->where('jenis_transaksi','Simpanan')->where('id_anggota',$row2->id_anggota)->get('data_anggota_transaksi');foreach ($query2->result() as $r3 ){$debet=$r3->simpanan;}
                                                              $query4 = $this->db->select_sum('simpanan')->where('jenis_transaksi','Nisbah')->where('id_anggota',$row2->id_anggota)->get('data_anggota_transaksi');foreach ($query4->result() as $r5 ){$nisbah=$r5->simpanan;}
                                                              $query3 = $this->db->select_sum('penarikan')->where('jenis_transaksi','Penarikan')->where('id_anggota',$row2->id_anggota)->get('data_anggota_transaksi');foreach ($query3->result() as $r4 ){$kredit=$r4->penarikan;}
                                                              $mutasi = ($debet+$nisbah)-$kredit;
                                                              echo number_format($mutasi,0,",",".");
                                                              ?></td>
                                                    <td><?=($nisbah=$row2->suku_bunga);?></td>
                                                    <td><?=$nominal_nisbah=($mutasi*$nisbah)/100;
                                                            $mutasi2=$mutasi2+$nominal_nisbah;
                                                            $mutasi3=$mutasi3+$nominal_nisbah; ?>
                                                            <input type="hidden" name="id_anggota[]" value="<?=($row2->id_anggota);?>"/>
                                                            <input type="hidden" name="id_produk[]" value="<?=($row2->id_produk);?>"/>
                                                            <input type="hidden" name="tanggal[]" value="<?=($this->input->post('dari_tanggal'));?>"/>
                                                            <input type="hidden" name="nominal_nisbah[]" value="<?=$nominal_nisbah;?>"/>
                                                    </td>
                                                    <td><?=$saldo_simpanan=($mutasi+$nominal_nisbah);?></td>
                                                </tr>
                                            <?php $no++; }?>
                                                <tr>
                                                    <td colspan="8">
                                                            <input type="hidden" name="total_nisbah[]" value="<?=$mutasi2;?>"/>
                                                            <input type="hidden" name="tanggal_transaksi[]" value="<?=($this->input->post('dari_tanggal'));?>"/>
                                                            <input type="hidden" name="id_produk2[]" value="<?=($row2->id_produk);?>"/>
                                                            <input type='hidden' placeholder='ID Akun' name='coa1[]' value='<?=$row->akun_kasbank1;?>' />
                                                            <input type='hidden' placeholder='Debet' name='kredit1[]' value='<?=$mutasi2;?>' />
                                                            <input type='hidden' placeholder='Kredit' name='debet1[]' value='0' />
                                                            <input type='hidden' placeholder='ID Akun' name='coa2[]' value='<?=$row->akun_nisbah;?>' />
                                                            <input type='hidden' placeholder='Debet' name='kredit2[]' value='0' />
                                                            <input type='hidden' placeholder='Kredit' name='debet2[]' value='<?=$mutasi2;?>' />
                                                        <?=$mutasi2;?>
                                                    </td>
                                                </tr>

                                        <?php }?>
                                                <tr>
                                                    <td colspan="8">
                                                            <input type="hidden" name="total_nisbah2" value="<?=$mutasi3;?>"/>
                                                            <input type="hidden" name="tanggal" value="<?=($this->input->post('dari_tanggal'));?>"/>
                                                            <input type="hidden" name="bulan" value="<?=$this->input->post('bulan');?>"/>
                                                        <?=$mutasi3;?>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                       <div class="col-xs-11">
                                            <input type="submit" class="btn green pull-right" name="simpan" id="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
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
                                                              <input name="dari_tanggal" class="form-control form-control-inline date-picker" value="<?php $tgl=date('Y/m/d'); echo $tgl; ?>" placeholder="" >
                                                              <input type="hidden" name="bulan" class="form-control form-control-inline date-picker" value="<?php $tgl=date('M'); echo $tgl; ?>" placeholder="" >
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row form-group">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-4">Tanggal Posting Terakhir</label>
                                                            <div class="col-xs-8">
                                                              <input name="sampai_tanggal" class="form-control form-control-inline date-picker" placeholder="" >
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