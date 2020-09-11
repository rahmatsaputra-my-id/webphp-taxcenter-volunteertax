
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
                                <a href="<?=base_url('home/nama_akun2');?>">
                                    <div class="tile double bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Saldo Awal </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/periode_shu');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> SHU </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?=base_url('home/akun_penting');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Akun Penting </div>
                                        </div>
                                    </div>
                                </a>
                                <!--<a href="<?php //=base_url('home/periode_akuntansi');?>">
                                <div class="tile double bg-green-turquoise">
                                    <div class="tile-body">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div class="tile-object">
                                        <div class="name">Periode Akuntansi</div>
                                    </div>
                                </div>
                                </a>-->
                                <a href="<?=base_url('home/updateperusahaan').'/'.$this->session->userdata('id_perusahaan');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Informasi Perusahaan </div>
                                        </div>
                                    </div>
                                </a>
                                <a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Tutup Buku </div>
                                        </div>
                                    </div>
                                </a>
                                <?php if($this->session->userdata('level')=='Super Admin'){ ?>
                                <a data-toggle="modal" href="<?=base_url('home/perusahaan');?>">
                                    <div class="tile double bg-red-sunglo">
                                        <div class="tile-body">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Data Registrasi </div>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>
                                    <?php 
                                    $query6 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','4')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir=0;
                                    foreach($query6->result() as $row7){ 
                                        $saldo_awal2=$row7->saldo_awal;
                                        number_format($saldo_awal2,0,",",".");

                                        $query8 = $this->db->select_sum('debet')->where('coa',$row7->id)->get($table);foreach ($query8->result() as $r8 ){$debet2=$r8->debet;}
                                        $query9 = $this->db->select_sum('kredit')->where('coa',$row7->id)->get($table);foreach ($query9->result() as $r9 ){$kredit2=$r9->kredit;}
                                        
                                        $saldo_normal2=$row7->saldo_normal;
                                        if ($saldo_normal2 == 'Debet'){
                                            $mutasi2=$debet2-$kredit2;
                                        }else{
                                            $mutasi2=$kredit2-$debet2;
                                        }
                                        number_format($mutasi2,0,",",".");
                                        
                                        $saldo_akhir_pendapatan = $saldo_awal2 + $mutasi2;
                                        $saldo_akhir=$saldo_akhir+$saldo_akhir_pendapatan;
                                        number_format($saldo_akhir_pendapatan,0,",",".");

                                     }
                                     $saldo_akhir;?>

                                    <?php 
                                    $query7 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','5')->where('kepala_akun','6')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir2=0;
                                    foreach($query7->result() as $row8){ 
                                        $saldo_awal3=$row8->saldo_awal;
                                        number_format($saldo_awal3,0,",",".");

                                        $query10 = $this->db->select_sum('debet')->where('coa',$row8->id)->get($table);foreach ($query10->result() as $r10 ){$debet3=$r10->debet;}
                                        $query11 = $this->db->select_sum('kredit')->where('coa',$row8->id)->get($table);foreach ($query11->result() as $r11 ){$kredit3=$r11->kredit;}
                                        
                                        $saldo_normal3=$row8->saldo_normal;
                                        if ($saldo_normal3 == 'Debet'){
                                            $mutasi3=$debet3-$kredit3;
                                        }else{
                                            $mutasi3=$kredit3-$debet3;
                                        }
                                        number_format($mutasi3,0,",",".");
                                        
                                        $saldo_akhir_pendapatan2 = $saldo_awal3 + $mutasi3;
                                        $saldo_akhir2=$saldo_akhir2+$saldo_akhir_pendapatan2;
                                        number_format($saldo_akhir_pendapatan2,0,",",".");

                                     }
                                     $saldo_akhir2;?>

                                    <?php 
                                    $query12 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','8')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir3=0;
                                    foreach($query12->result() as $row12){ 
                                        $saldo_awal4=$row12->saldo_awal;
                                        number_format($saldo_awal4,0,",",".");

                                        $query13 = $this->db->select_sum('debet')->where('coa',$row12->id)->get($table);foreach ($query13->result() as $r13 ){$debet4=$r13->debet;}
                                        $query14 = $this->db->select_sum('kredit')->where('coa',$row12->id)->get($table);foreach ($query14->result() as $r14 ){$kredit4=$r14->kredit;}
                                        
                                        $saldo_normal4=$row12->saldo_normal;
                                        if ($saldo_normal4 == 'Debet'){
                                            $mutasi4=$debet4-$kredit4;
                                        }else{
                                            $mutasi4=$kredit4-$debet4;
                                        }
                                        number_format($mutasi4,0,",",".");
                                        
                                        $saldo_akhir_pendapatan3 = $saldo_awal4 + $mutasi4;
                                        $saldo_akhir3=$saldo_akhir3+$saldo_akhir_pendapatan3;
                                        number_format($saldo_akhir_pendapatan3,0,",",".");

                                     }
                                     $saldo_akhir3;?>

                                    <?php 
                                    $query15 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','9')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir4=0;
                                    foreach($query15->result() as $row13){ 
                                        $saldo_awal5=$row13->saldo_awal;
                                        number_format($saldo_awal5,0,",",".");

                                        $query16 = $this->db->select_sum('debet')->where('coa',$row13->id)->get($table);foreach ($query16->result() as $r16 ){$debet5=$r16->debet;}
                                        $query17 = $this->db->select_sum('kredit')->where('coa',$row13->id)->get($table);foreach ($query17->result() as $r17 ){$kredit5=$r17->kredit;}
                                        
                                        $saldo_normal5=$row13->saldo_normal;
                                        if ($saldo_normal5 == 'Debet'){
                                            $mutasi5=$debet5-$kredit5;
                                        }else{
                                            $mutasi5=$kredit5-$debet5;
                                        }
                                        number_format($mutasi5,0,",",".");
                                        
                                        $saldo_akhir_pendapatan4 = $saldo_awal5 + $mutasi5;
                                        $saldo_akhir4=$saldo_akhir4+$saldo_akhir_pendapatan4;
                                        number_format($saldo_akhir_pendapatan4,0,",",".");

                                     }
                                     $saldo_akhir4;?>

                                     <?php

                                     $a=($saldo_akhir-$saldo_akhir2);
                                     number_format($a,0,",",".");
                                     $b=($saldo_akhir3-$saldo_akhir4);
                                     number_format($b,0,",",".");
                                     $c=($a+$b);
                                     number_format($b,0,",",".");

                                     ?>

                                    <?php 
                                    $query18 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','1')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir5=0;
                                    foreach($query18->result() as $row14){ 
                                        $saldo_awal6=$row14->saldo_awal;
                                        number_format($saldo_awal6,0,",",".");

                                        $query19 = $this->db->select_sum('debet')->where('coa',$row14->id)->get($table);foreach ($query19->result() as $r18 ){$debet6=$r18->debet;}
                                        $query20 = $this->db->select_sum('kredit')->where('coa',$row14->id)->get($table);foreach ($query20->result() as $r19 ){$kredit6=$r19->kredit;}
                                        
                                        $saldo_normal6=$row14->saldo_normal;
                                        if ($saldo_normal6 == 'Debet'){
                                            $mutasi6=$debet6-$kredit6;
                                        }else{
                                            $mutasi6=$kredit6-$debet6;
                                        }
                                        number_format($mutasi6,0,",",".");
                                        
                                        $saldo_akhir_pendapatan5 = $saldo_awal6 + $mutasi6;
                                        $saldo_akhir5=$saldo_akhir5+$saldo_akhir_pendapatan5;
                                        number_format($saldo_akhir_pendapatan5,0,",",".");

                                     }
                                     $saldo_akhir5;?>

                                    <?php 
                                    $query21 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','2')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir6=0;
                                    foreach($query21->result() as $row15){ 
                                        $saldo_awal7=$row15->saldo_awal;
                                        number_format($saldo_awal7,0,",",".");

                                        $query22 = $this->db->select_sum('debet')->where('coa',$row15->id)->get($table);foreach ($query22->result() as $r20 ){$debet7=$r20->debet;}
                                        $query23 = $this->db->select_sum('kredit')->where('coa',$row15->id)->get($table);foreach ($query23->result() as $r21 ){$kredit7=$r21->kredit;}
                                        
                                        $saldo_normal7=$row15->saldo_normal;
                                        if ($saldo_normal7 == 'Debet'){
                                            $mutasi7=$debet7-$kredit7;
                                        }else{
                                            $mutasi7=$kredit7-$debet7;
                                        }
                                        number_format($mutasi7,0,",",".");
                                        
                                        $saldo_akhir_pendapatan6 = $saldo_awal7 + $mutasi7;
                                        $saldo_akhir6=$saldo_akhir6+$saldo_akhir_pendapatan6;
                                        number_format($saldo_akhir_pendapatan6,0,",",".");

                                     }
                                     $saldo_akhir6;?>

                                    <?php 
                                    $query24 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','3')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir7=0;
                                    foreach($query24->result() as $row16){ 
                                        $saldo_awal8=$row16->saldo_awal;
                                        number_format($saldo_awal8,0,",",".");

                                        $query25 = $this->db->select_sum('debet')->where('coa',$row16->id)->get($table);foreach ($query25->result() as $r22 ){$debet8=$r22->debet;}
                                        $query26 = $this->db->select_sum('kredit')->where('coa',$row16->id)->get($table);foreach ($query26->result() as $r23 ){$kredit8=$r23->kredit;}
                                        
                                        $saldo_normal8=$row16->saldo_normal;
                                        if ($saldo_normal8 == 'Debet'){
                                            if($row16->akun_penting=='Laba Tahun Berjalan'){
                                                $mutasi8=$c;
                                            }else{
                                                $mutasi8=$debet8-$kredit8;
                                            }
                                        }else{
                                            if($row16->akun_penting=='Laba Tahun Berjalan'){
                                                $mutasi8=$c;
                                            }else{
                                                $mutasi8=$kredit8-$debet8;
                                            }
                                        }
                                        number_format($mutasi8,0,",",".");
                                        
                                        $saldo_akhir_pendapatan7 = $saldo_awal8 + $mutasi8;
                                        $saldo_akhir7=$saldo_akhir7+$saldo_akhir_pendapatan7;
                                        number_format($saldo_akhir_pendapatan7,0,",",".");

                                     }
                                     $saldo_akhir7;?><?php 
                                     $saldo_akhir8=$saldo_akhir6+$saldo_akhir7;
                                     if($saldo_akhir5==$saldo_akhir8){
                                        $balance='2';
                                        $balance2='4';
                                     }else{
                                        $balance='1';
                                     }
                                     ?>
                                    <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Tutup Buku</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <a class="dashboard-stat dashboard-stat-v2 blue" data-target="#stack<?=$balance2;?>" data-toggle="modal">
                                                                <div class="visual">
                                                                    <i class="fa fa-comments"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="number"> Tutup Buku Bulanan </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <a class="dashboard-stat dashboard-stat-v2 red" data-target="#stack<?=$balance;?>" data-toggle="modal">
                                                                <div class="visual">
                                                                    <i class="fa fa-bar-chart-o"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="number"> Tutup Buku Tahunan </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div id="stack1" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Peringatan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 align="center">Maaf, Saldo Tidak Balance. Anda tidak dapat melanjutkannya</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stack2" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Peringatan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 align="center">Saldo Sudah Balance. Ingin di lanjutkan?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tidak</button>
                                                    <a type="button" class="btn yellow" data-target="#stack3" data-toggle="modal">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stack3" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Peringatan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 align="center">Jika Anda melakukan Tutup Buku Akhir tahun, maka anda tidak dapat melihat transaksi pada tahun sebelumnya.
                                                                <br/> Apakah Anda Yakin Akan melanjutkan!</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tidak</button>
                                                    <a type="button" class="btn yellow" href="#draggable" data-target="#draggable2" data-toggle="modal">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stack4" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Peringatan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 align="center">Saldo Sudah Balance. Ingin di lanjutkan?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tidak</button>
                                                    <a type="button" class="btn yellow" href="#draggable" data-target="#draggable3" data-toggle="modal">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <form action="<?=base_url('home/tutup_buku_akhir_tahun');?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable2" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Periode Akuntansi Selanjutnya</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Bulan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$perusahaan['bulan_awal_periode'];?>" type="text" name="bulan" readonly />
                                                                <span class="help-block"> Bulan dimulainya periode </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tahun Selanjutnya
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$periode['kode_periode']+1;?>" type="text" name="tahun" readonly />
                                                                <span class="help-block"> Tahun periode akuntansi </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tutup Buku Akhir Tahun
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$perusahaan['bulan_akhir_periode'];?>" type="text" name="tutup_buku" readonly />
                                                                <span class="help-block"> Tutup buku akhir tahun </span>
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
                                <?php 
                                $bulan2 = array(
                                             '1' => 'Januari',
                                             '2' => 'Februari',
                                             '3' => 'Maret',
                                             '4' => 'April',
                                             '5' => 'Mei',
                                             '6' => 'Juni',
                                             '7' => 'Juli',
                                             '8' => 'Agustus',
                                             '9' => 'September',
                                             '10' => 'Oktober',
                                             '11' => 'November',
                                             '12' => 'Desember',
                                     );
                                ?>
                                <form action="<?=base_url('home/tutup_buku_akhir_tahun');?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable3" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Periode Akuntansi Selanjutnya</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Bulan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$perusahaan['bulan_awal_periode'];?>" type="text" name="bulan" readonly />
                                                                <span class="help-block"> Bulan dimulainya periode </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Bulan Selanjutnya
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$bulan2[$periode['bulan']+1];?>" type="text" name="bulan" readonly />
                                                                <span class="help-block"> Bulan periode akuntansi </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tahun
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$periode['kode_periode'];?>" type="text" name="tahun" readonly />
                                                                <span class="help-block"> Tahun periode akuntansi </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tutup Buku Akhir Tahun
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" value="<?=$perusahaan['bulan_akhir_periode'];?>" type="text" name="tutup_buku" readonly />
                                                                <span class="help-block"> Tutup buku akhir tahun </span>
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
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->