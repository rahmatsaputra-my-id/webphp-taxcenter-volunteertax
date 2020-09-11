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
                                    <a type="button" class="btn btn-primary" name="add" href="<?=base_url($linkcreate);?>"><i class="fa fa-plus fa-fw"></i>Tambah <?=$judul;?></a>
                                    <br/>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th width="15%">Kode Akun</th>
                                                <th width="28%">Nama Akun</th>
                                                <th width="16%">Saldo Awal</th>
                                                <th width="15%">Klasifikasi</th>
                                                <th width="10%">Kas & Bank</th>
                                                <th width="25%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?php 
                                                        if ($row->tipe=='kepala_akun') { echo $row->kode_akun;}
                                                        elseif($row->tipe=='klasifikasi_akun'){ echo '&nbsp;&nbsp;'.$row->kode_akun; }
                                                        elseif($row->tipe=='sub_klasifikasi_akun'){ echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$row->kode_akun; }
                                                        elseif($row->tipe=='kode_akun'){ echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->kode_akun; } 
                                                    ?></td>
                                                    <td><?=($row->nama_akun);?></td>
                                                    <td><?=($row->saldo_awal);?></td>
                                                    <td><?=($row->laporan);?></td>
                                                    <td><?php if($row->kas=='ya'){echo '<i class="fa fa-check"></i>';}else{ echo '';};?></td>
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>