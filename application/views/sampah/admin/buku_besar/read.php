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
                                    
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <!--<th width="1%">No</th>-->
                                                <th width="40%">Kode Akun</th>
                                                <th width="48%">Nama Akun</th>
                                                <!--<th width="20%">Saldo Awal</th>
                                                <th width="10%">Klasifikasi</th>-->
                                                <th width="27%">Kas & Bank</th>
                                                <th width="5%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <!--<td><?=$no;?></td>-->
                                                    <td><?=($row->kode_akun);?></td>
                                                    <td><?=($row->nama_akun);?></td>
                                                    <td><?php if($row->kas=='ya'){echo '<i class="fa fa-check"></i>';}else{ echo '';};?></td>
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>