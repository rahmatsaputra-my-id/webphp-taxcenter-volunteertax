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
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Tahun</th>
                                                <th width="20%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->kode_periode);?></td>
                                                    <!--<td><?php//=($row->klasifikasi);?></td>-->
                                                    <!--<td><?php//=($row->tipe);?></td>-->
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id_periode);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <?php if ($row->status=='Aktif'){ echo '<a class="btn btn-warning" name="view" href="'.base_url($linkupdate.$row->id_periode).'"><i class="fa fa-wrench fa-fw"></i></a>
                                                        '; }else{echo '';} ?>
                                                    </td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>