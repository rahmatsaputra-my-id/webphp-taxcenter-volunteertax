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
                            <div class="dataTable_wrapper">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1%">NO</th>
                                            <th>NPM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan / Fakultas</th>
                                            <th>Kelas</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Tanggal Register</th>
                                            <th width="20%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($query->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?= $no;?></td>
                                            <td><?=($row->npm);?></td>
                                            <td><?=($row->nama_lengkap.$row->nama_depan.' '.$row->nama_belakang);?></td>
                                            <td><?=($row->jurusan.' / '.$row->fakultas);?></td>
                                            <td><?=($row->kelas);?></td>
                                            <td><?=($row->no_hp); ?></td>
                                            <td><?=($row->email); ?></td>
                                            <td><?=($row->tgl_register); ?></td>
                                            <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                        </tr>
                                    <?php $no++; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>