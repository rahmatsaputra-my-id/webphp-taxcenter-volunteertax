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
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Bulan Tutup Buku</th>
                                                <th>Status</th>
                                                <th width="20%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->kode_periode);?></td>
                                                    <td><?=($row->bulan);?></td>
                                                    <td><?=($row->tutup_buku);?></td>
                                                    <td>
                                            <?php if($row->status=="Aktif") { 
                                                echo "<a class='label label-sm label-success' name='aktif' href='".base_url($linknonaktif.$row->id_periode)."'>Aktif</a>";
                                            } elseif ($row->status=='Tidak Aktif') { 
                                                echo "<a class='label label-sm label-danger' name='nonaktif' href='".base_url($linkaktif.$row->id_periode)."'>Tidak Aktif</a>"; 
                                            } ?></td>
                                                    <!--<td><?php//=($row->klasifikasi);?></td>-->
                                                    <!--<td><?php//=($row->tipe);?></td>-->
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id_periode);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id_periode);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id_periode);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>