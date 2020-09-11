<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings"></i>
            <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <!-- /.row -->
        <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
        <br/>
        <br/>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?="Data ".$judul ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="1%">NO</th>
                                        <th>NPM</th>
										<th>Nama Mahasiswa</th>
                                        <th>Kelas</th>
                                        <th>Nilai Ujian</th>
                                        <th>Jumlah Benar</th>
                                        <th>Jumlah Salah</th>
                                        <th>Jumlah Kosong</th>
                                        <th>Tanggal Selesai</th>
                                        <th width="20%">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach($query->result() as $row){ ?>
                                    
                                    <tr class="odd gradeX">
                                        <td><?= $no;?></td>
                                        <td><?=($row->npm);?></td>
                                        <td><?=($row->nama_lengkap.' '.$row->nama_depan.' '.$row->nama_belakang);?></td>
                                        <td><?=($row->kelas);?></td>
                                        <td><?=($row->nilai);?></td>
                                        <td><?=($row->jml_benar);?></td>
                                        <td><?=($row->jml_salah);?></td>
                                        <td><?=($row->jml_kosong);?></td>
                                        <td><?=($row->tgl_selesai);?></td>
                                        <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                            <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                    </tr>
                                <?php $no++; }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
</div>