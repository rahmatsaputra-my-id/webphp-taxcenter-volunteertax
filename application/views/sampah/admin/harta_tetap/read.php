        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings"></i>
                                        <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
                                    </div>
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
                                                <!-- <th>Id</th> -->
                                                <th width="25%">Nama Harta Tetap</th>
                                                <th>Nilai Perolehan</th>
                                                <th>Umur</th>
                                                <th>Akumulasi Penyusutan</th>
                                                <th>Beban Perbulan</th>
                                                <th>Nilai Buku</th>
                                                <th>Detail</th>
                                                <th width="15%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <!-- <td><?php //=($row->id);?></td> -->
                                                    <td><?=($row->nama_harta_tetap);?></td>
                                                    <td><?=($row->harga_beli);?></td>
                                                    <td><?=($row->umur_ekonomis);?></td>
                                                    <td><?=($row->akumulasi_beban);?></td>
                                                    <td><?=($row->beban_perbulan);?></td>
                                                    <td><?=($row->nilai_buku);?></td>
                                                    <td><a type="button" class="btn btn-primary" name="add" data-toggle="modal" href="#draggable" onClick="data(<?=$row->id;?>);data2(<?=$row->id;?>);" data-target="#draggable2" data-toggle="modal"><i class="fa fa-search fa-fw"></i></a></td>
                                                    <td><a class="btn btn-info" name="view" href="<?=base_url($linkview.$row->id);?>"><i class="fa fa-search fa-fw"></i></a>
                                                        <a class="btn btn-warning" name="edit" href="<?=base_url($linkupdate.$row->id);?>"><i class="fa fa-wrench fa-fw"></i></a>
                                                        <a class="btn btn-danger" name="delete" href="<?=base_url($linkdelete.$row->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <script>
                            function data(inputString){
                                $.ajax({
                                url: '<?=base_url("home/detail_harta_tetap");?>'+'/'+inputString,
                                //data:"id="+id ,
                                }).success(function (data) {
                                    var json = data,
                                    obj = JSON.parse(json);
                                    $('#nama_harta').html(obj.nama_harta_tetap);
                                    $('#departemen').html(obj.departemen);
                                    $('#tanggal_beli').html(obj.tanggal_beli);
                                    $('#tanggal_pensiun').html(obj.tanggal_pensiun);
                                    $('#terhitung_tanggal').html(obj.terhitung_tanggal);
                                    $('#nilai_residu').html(obj.nilai_residu);
                                    $('#umur_ekonomis').html(obj.umur_ekonomis);
                                    $('#lokasi').html(obj.lokasi);
                                    $('#metode_penyusutan').html(obj.metode_penyusutan);
                                    $('#akumulasi_beban').html(obj.akumulasi_beban);
                                    $('#beban_perbulan').html(obj.beban_perbulan);
                                    $('#beban_per_tahun_ini').html(obj.beban_per_tahun_ini);
                                    $('#nilai_buku').html(obj.nilai_buku);
                                    $('#harga_beli').html(obj.harga_beli);
                                });
                            }
                            function data2(inputString){
                                $.ajax({
                                url: '<?=base_url("home/detail_harta_tetap2");?>'+'/'+inputString,
                                //data:"id="+id ,
                                }).success(function (data) {
                                    if(data.length>0){
                                      //$('#suggestions2').fadeIn();
                                      $('#listdata2').html(data);
                                    }
                                });
                            }
                            </script>
                                <form action="<?=base_url().'home/createposting_nisbah';?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="modal fade draggable-modal" id="draggable2" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Detail Aset Tetap</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row invoice-info">
                                                        <div class="box-body col-sm-12">
                                                            <table class="table table-light">
                                                              <tr>
                                                                <td width='20%'>Nama</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="nama_harta"></td>

                                                                <td width='20%'>Departemen</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="departemen"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Tanggal Beli</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="tanggal_beli"></td>

                                                                <td width='20%'>Akumulasi Beban</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="akumulasi_beban"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Harga Perolehan</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="harga_beli"></td>

                                                                <td width='20%'>Beban Per Tahun Ini</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="beban_per_tahun_ini"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Nilai Residu</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="nilai_residu"></td>

                                                                <?php
                                                                /*if($query2['periode']=='bulanan'){
                                                                  $periode="Bulan";
                                                                }else if($query2['periode']=='mingguan'){
                                                                  $periode="Minggu";
                                                                }*/
                                                                ?>
                                                                <td width='20%'>Terhitung Tanggal</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="terhitung_tanggal"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Umur</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="umur_ekonomis"></td>

                                                                <td width='20%'>Nilai Buku</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="nilai_buku"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Lokasi</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="lokasi"></td>

                                                                <td width='20%'>Penyusutan Bulanan</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="beban_perbulan"></td>
                                                              </tr>
                                                              <tr>
                                                                <td width='20%'>Metode</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="metode_penyusutan"></td>

                                                                <td width='20%'>Tanggal Pensiun</td>
                                                                <td width='2%'>:</td>
                                                                <td width='30%' id="tanggal_pensiun"></td>
                                                              </tr>
                                                            </table>
                                                        </div><!-- /.box-body -->
                                                    </div><!-- /.row -->
                                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                                        <thead>
                                                            <tr align="center">
                                                                <th width="1%">No</th>
                                                                <th>Tanggal</th>
                                                                <th>Akun Beban</th>
                                                                <th>Penyusutan Bulanan</th>
                                                                <th>Nilai Buku</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="listdata2">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                                                    <!-- <input type="submit" class="btn green" name="simpan2" id="simpan" value="Lanjutkan" onclick="return confirm('Apakah Anda yakin data ini benar?')"> -->
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </form>