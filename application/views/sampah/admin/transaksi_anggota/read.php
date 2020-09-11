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
                                                <th>Tanggal</th>
                                                <th>ID Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Produk Pendanaan</th>
                                                <th>Simpanan</th>
                                                <th>Penarikan</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $saldo=0;?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->tanggal);?></td>
                                                    <td><?=($row->no_kta);?></td>
                                                    <td><?=($row->nama_depan.' '.$row->nama_tengah.' '.$row->nama_belakang);?></td>
                                                    <td><?=($row->nama_produk_pendanaan);?></td>
                                                    <td><?=($row->simpanan);?></td>
                                                    <td><?=($row->penarikan);?></td>
                                                    <td><?php $saldo = $saldo + $row->simpanan - $row->penarikan ; echo $saldo; ?></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>