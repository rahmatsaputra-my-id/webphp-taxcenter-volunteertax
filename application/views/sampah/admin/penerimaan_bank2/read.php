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
                                    <a type="button" class="btn btn-primary" name="add" href="<?=base_url($linkcreate);?>"><i class="fa fa-plus fa-fw"></i>Tambah <?=$judul;?></a>
                                    <br/>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Id Jurnal</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Id Akun</th>
                                                <th>Id Departemen</th>
                                                <th>Id Pajak</th>
                                                <th>Nilai</th>
                                                <th>Jumlah</th>
                                                <th>Total Pajak</th>
                                                <th>Balance</th>
                                                <th width="20%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->id);?></td>
                                                    <td><?=($row->id_jurnal);?></td>
                                                    <td><?=($row->tanggal);?></td>
                                                    <td><?=($row->keterangan);?></td>
                                                    <td><?=($row->id_akun);?></td>
                                                    <td><?=($row->id_departemen);?></td>
                                                    <td><?=($row->id_pajak);?></td>
                                                    <td><?=($row->nilai);?></td>
                                                    <td><?=($row->jumlah);?></td>
                                                    <td><?=($row->total_pajak);?></td>
                                                    <td><?=($row->balance);?></td>
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>