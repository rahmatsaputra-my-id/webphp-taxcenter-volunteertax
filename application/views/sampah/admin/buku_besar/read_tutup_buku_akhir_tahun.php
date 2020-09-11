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
                                    Laba Rugi <br/>
                                    
                                    <?php 
                                    $query6 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','4')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir=0;
                                    foreach($query6->result() as $row7){ 
                                        $saldo_awal2=$row7->saldo_awal;
                                        echo 'Kepala_akun : '.$row7->kepala_akun.' Saldo Awal = '.number_format($saldo_awal2,0,",",".");

                                        $query8 = $this->db->select_sum('debet')->where('coa',$row7->id)->get($table);foreach ($query8->result() as $r8 ){$debet2=$r8->debet;}
                                        $query9 = $this->db->select_sum('kredit')->where('coa',$row7->id)->get($table);foreach ($query9->result() as $r9 ){$kredit2=$r9->kredit;}
                                        
                                        $saldo_normal2=$row7->saldo_normal;
                                        if ($saldo_normal2 == 'Debet'){
                                            $mutasi2=$debet2-$kredit2;
                                        }else{
                                            $mutasi2=$kredit2-$debet2;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi2,0,",",".");
                                        
                                        $saldo_akhir_pendapatan = $saldo_awal2 + $mutasi2;
                                        $saldo_akhir=$saldo_akhir+$saldo_akhir_pendapatan;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan,0,",",".").' Nama Akun : '.$row7->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row7->kepala_akun.' : '.$saldo_akhir.'<br />';?>

                                    <?php 
                                    $where56 = "kepala_akun > '4' AND kepala_akun < '7'";
                                    $query7 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where($where56)->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir2=0;
                                    foreach($query7->result() as $row8){ 
                                        $saldo_awal3=$row8->saldo_awal;
                                        echo 'Kepala_akun : '.$row8->kepala_akun.' Saldo Awal = '.number_format($saldo_awal3,0,",",".");

                                        $query10 = $this->db->select_sum('debet')->where('coa',$row8->id)->get($table);foreach ($query10->result() as $r10 ){$debet3=$r10->debet;}
                                        $query11 = $this->db->select_sum('kredit')->where('coa',$row8->id)->get($table);foreach ($query11->result() as $r11 ){$kredit3=$r11->kredit;}
                                        
                                        $saldo_normal3=$row8->saldo_normal;
                                        if ($saldo_normal3 == 'Debet'){
                                            $mutasi3=$debet3-$kredit3;
                                        }else{
                                            $mutasi3=$kredit3-$debet3;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi3,0,",",".");
                                        
                                        $saldo_akhir_pendapatan2 = $saldo_awal3 + $mutasi3;
                                        $saldo_akhir2=$saldo_akhir2+$saldo_akhir_pendapatan2;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan2,0,",",".").' Nama Akun : '.$row8->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun 5 & 6 : '.$saldo_akhir2.'<br />';?>

                                    <?php 
                                    $query12 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','8')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir3=0;
                                    foreach($query12->result() as $row12){ 
                                        $saldo_awal4=$row12->saldo_awal;
                                        echo 'Kepala_akun : '.$row12->kepala_akun.' Saldo Awal = '.number_format($saldo_awal4,0,",",".");

                                        $query13 = $this->db->select_sum('debet')->where('coa',$row12->id)->get($table);foreach ($query13->result() as $r13 ){$debet4=$r13->debet;}
                                        $query14 = $this->db->select_sum('kredit')->where('coa',$row12->id)->get($table);foreach ($query14->result() as $r14 ){$kredit4=$r14->kredit;}
                                        
                                        $saldo_normal4=$row12->saldo_normal;
                                        if ($saldo_normal4 == 'Debet'){
                                            $mutasi4=$debet4-$kredit4;
                                        }else{
                                            $mutasi4=$kredit4-$debet4;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi4,0,",",".");
                                        
                                        $saldo_akhir_pendapatan3 = $saldo_awal4 + $mutasi4;
                                        $saldo_akhir3=$saldo_akhir3+$saldo_akhir_pendapatan3;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan3,0,",",".").' Nama Akun : '.$row12->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row12->kepala_akun.' : '.$saldo_akhir3.'<br />';?>

                                    <?php 
                                    $query15 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','9')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir4=0;
                                    foreach($query15->result() as $row13){ 
                                        $saldo_awal5=$row13->saldo_awal;
                                        echo 'Kepala_akun : '.$row13->kepala_akun.' Saldo Awal = '.number_format($saldo_awal5,0,",",".");

                                        $query16 = $this->db->select_sum('debet')->where('coa',$row13->id)->get($table);foreach ($query16->result() as $r16 ){$debet5=$r16->debet;}
                                        $query17 = $this->db->select_sum('kredit')->where('coa',$row13->id)->get($table);foreach ($query17->result() as $r17 ){$kredit5=$r17->kredit;}
                                        
                                        $saldo_normal5=$row13->saldo_normal;
                                        if ($saldo_normal5 == 'Debet'){
                                            $mutasi5=$debet5-$kredit5;
                                        }else{
                                            $mutasi5=$kredit5-$debet5;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi5,0,",",".");
                                        
                                        $saldo_akhir_pendapatan4 = $saldo_awal5 + $mutasi5;
                                        $saldo_akhir4=$saldo_akhir4+$saldo_akhir_pendapatan4;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan4,0,",",".").' Nama Akun : '.$row13->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row13->kepala_akun.' : '.$saldo_akhir4.'<br />';?>

                                     <?php

                                     $a=($saldo_akhir-$saldo_akhir2);
                                     echo '<br/> a = '.number_format($saldo_akhir,0,",",".").'-'.number_format($saldo_akhir2,0,",",".").'='.number_format($a,0,",",".").'<br/>';
                                     $b=($saldo_akhir3-$saldo_akhir4);
                                     echo '<br/> b = '.number_format($saldo_akhir3,0,",",".").'-'.number_format($saldo_akhir4,0,",",".").'='.number_format($b,0,",",".").'<br/>';
                                     $c=($a+$b);
                                     echo '<br/> c = '.number_format($a,0,",",".").'+'.number_format($b,0,",",".").'='.number_format($c,0,",",".").'<br/>';

                                     ?>

                                    <?php 
                                    $query18 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','1')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir5=0;
                                    foreach($query18->result() as $row14){ 
                                        $saldo_awal6=$row14->saldo_awal;
                                        echo 'Kepala_akun : '.$row14->kepala_akun.' Saldo Awal = '.number_format($saldo_awal6,0,",",".");

                                        $query19 = $this->db->select_sum('debet')->where('coa',$row14->id)->get($table);foreach ($query19->result() as $r18 ){$debet6=$r18->debet;}
                                        $query20 = $this->db->select_sum('kredit')->where('coa',$row14->id)->get($table);foreach ($query20->result() as $r19 ){$kredit6=$r19->kredit;}
                                        
                                        $saldo_normal6=$row14->saldo_normal;
                                        if ($saldo_normal6 == 'Debet'){
                                            $mutasi6=$debet6-$kredit6;
                                        }else{
                                            $mutasi6=$kredit6-$debet6;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi6,0,",",".");
                                        
                                        $saldo_akhir_pendapatan5 = $saldo_awal6 + $mutasi6;
                                        $saldo_akhir5=$saldo_akhir5+$saldo_akhir_pendapatan5;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan5,0,",",".").' Nama Akun : '.$row14->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row13->kepala_akun.' : '.$saldo_akhir5.'<br />';?>

                                    <?php 
                                    $query21 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','2')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir6=0;
                                    foreach($query21->result() as $row15){ 
                                        $saldo_awal7=$row15->saldo_awal;
                                        echo 'Kepala_akun : '.$row15->kepala_akun.' Saldo Awal = '.number_format($saldo_awal7,0,",",".");

                                        $query22 = $this->db->select_sum('debet')->where('coa',$row15->id)->get($table);foreach ($query22->result() as $r20 ){$debet7=$r20->debet;}
                                        $query23 = $this->db->select_sum('kredit')->where('coa',$row15->id)->get($table);foreach ($query23->result() as $r21 ){$kredit7=$r21->kredit;}
                                        
                                        $saldo_normal7=$row15->saldo_normal;
                                        if ($saldo_normal7 == 'Debet'){
                                            $mutasi7=$debet7-$kredit7;
                                        }else{
                                            $mutasi7=$kredit7-$debet7;
                                        }
                                        echo ' Mutasi = '.number_format($mutasi7,0,",",".");
                                        
                                        $saldo_akhir_pendapatan6 = $saldo_awal7 + $mutasi7;
                                        $saldo_akhir6=$saldo_akhir6+$saldo_akhir_pendapatan6;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan6,0,",",".").' Nama Akun : '.$row15->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row15->kepala_akun.' : '.$saldo_akhir6.'<br />';?>

                                    <?php 
                                    $query24 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('tipe','kode_akun')->where('kepala_akun','3')->order_by('kode_akun','ASC')->get($table2);
                                    $saldo_akhir7=0;
                                    foreach($query24->result() as $row16){ 
                                        $saldo_awal8=$row16->saldo_awal;
                                        echo 'Kepala_akun : '.$row16->kepala_akun.' Saldo Awal = '.number_format($saldo_awal8,0,",",".");

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
                                        echo ' Mutasi = '.number_format($mutasi8,0,",",".");
                                        
                                        $saldo_akhir_pendapatan7 = $saldo_awal8 + $mutasi8;
                                        $saldo_akhir7=$saldo_akhir7+$saldo_akhir_pendapatan7;
                                        echo ' Saldo Akhir = '.number_format($saldo_akhir_pendapatan7,0,",",".").' Nama Akun : '.$row16->nama_akun.'<br/>';

                                     }
                                     echo 'Saldo Akhir Akun '.$row16->kepala_akun.' : '.$saldo_akhir7.'<br />';?>

                                     <?php 
                                     $saldo_akhir8=$saldo_akhir6+$saldo_akhir7;
                                     echo 'Saldo 1 ='.$saldo_akhir5.'<br/>';
                                     echo 'Saldo 2 & 3 ='.$saldo_akhir8.'<br/>';
                                     if($saldo_akhir5==$saldo_akhir8){
                                        echo 'Balance'.'<br/>';
                                     }else{
                                        echo 'Tidak Balance'.'<br/>';
                                     }
                                     echo $this->session->userdata('level').'<br/>';

                                     $bulan2 = array(
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
                                     $tanggal2 = date('Y-m-d');
                                     $tanggal =substr($tanggal2,8,2); 
                                     $bulan =substr($tanggal2,5,2);
                                     $tahun =substr($tanggal2,0,4);

                                     echo 'Tanggal = '.$tanggal.'-'.$bulan2[$bulan].'-'.$tahun.'<br/>';
                                     ?>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th width="15%">Kode Akun</th>
                                                <th width="15%">Nama Akun</th>
                                                <th width="14%">Saldo Awal</th>
                                                <th width="14%">Total Debet</th>
                                                <th width="14%">Total Kredit</th>
                                                <th width="14%">Mutasi</th>
                                                <th width="22%">Saldo Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?php if ($row->tipe=='kepala_akun') { echo $row->kode_akun;}
                                                    elseif($row->tipe=='klasifikasi_akun'){ echo '&nbsp;&nbsp;'.$row->kode_akun; }
                                                    elseif($row->tipe=='sub_klasifikasi_akun'){ echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$row->kode_akun; }
                                                    elseif($row->tipe=='kode_akun'){
                                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->kode_akun;
                                                    } ?></td>
                                                    <td><?=($row->nama_akun);?></td>
                                                    <td><?=$saldo_awal=$row->saldo_awal;?></td>
                                                    <td><?php $this->db->select_sum('debet');$query2 = $this->db->where('coa',$row->id)->get($table);foreach ($query2->result() as $r3 ){echo number_format($debet=$r3->debet,0,",",".");}?></td>
                                                    <td><?php $this->db->select_sum('kredit');$query3 = $this->db->where('coa',$row->id)->get($table);foreach ($query3->result() as $r4 ){echo number_format($kredit=$r4->kredit,0,",",".");}?></td>
                                                    <td><?php 
                                                        $query5 = $this->db->where('id',$row->id)->get($table2);
                                                        foreach ($query5->result() as $r6 ){ $saldo_normal=$r6->saldo_normal; }
                                                        if ($saldo_normal == 'Debet'){
                                                            $mutasi=$debet-$kredit;
                                                        }else{
                                                            $mutasi=$kredit-$debet;
                                                        }
                                                        echo number_format($mutasi,0,",",".");
                                                        ?></td>
                                                <td><?php $saldo_akhir=$saldo_awal+$mutasi; if($saldo_akhir < 0){echo '('.number_format(abs($saldo_akhir),0,",",".").')';}else{echo number_format($saldo_akhir,0,",",".");};?></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>