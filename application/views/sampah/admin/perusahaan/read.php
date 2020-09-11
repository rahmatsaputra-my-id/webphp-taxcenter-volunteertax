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
                                    <!--<a type="button" class="btn btn-primary" name="add" href="<?php //=base_url($linkcreate);?>"><i class="fa fa-plus fa-fw"></i>Tambah <?php //=$judul;?></a>-->
                                    <br/>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>ID Registrasi</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Status</th>
                                                <!--<th>Klasifikasi</th>-->
                                                <!--<th>Tipe</th>-->
                                                <th width="20%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->id);?></td>
                                                    <td><?=($row->nama_perusahaan);?></td>
                                                    <td>
                                            <?php if($row->status=="1") { 
                                                echo "<a class='label label-sm label-warning' name='aktif' href='".base_url($linknonaktif.$row->id)."'>Tolak</a>";
                                            } elseif ($row->status=='0') { 
                                                echo "<a class='label label-sm label-success' name='nonaktif' href='".base_url($linkaktif.$row->id)."'>Setujui</a>&nbsp;&nbsp;&nbsp;"; 
                                                echo "<a class='label label-sm label-danger' name='aktif' href='".base_url($linknonaktif.$row->id)."'>Tolak</a>";
                                            } else{
                                                echo "<a class='label label-sm label-success' name='nonaktif' href='".base_url($linkaktif.$row->id)."'>Setujui</a>"; 
                                            }
                                                ?></td>
                                                    <!--<td><?php//=($row->klasifikasi);?></td>-->
                                                    <!--<td><?php//=($row->tipe);?></td>-->
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>