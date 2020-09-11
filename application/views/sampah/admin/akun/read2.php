                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i><?=$judul;?> </div>
                                </div>
                                <div class="portlet-body form portlet-empty">
                                    <form action="<?=$link;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-body">
                                    <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                    <br/>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th width="40%">Kode Akun</th>
                                                <th width="40%">Nama Akun</th>
                                                <th width="40%">Saldo Awal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php foreach($query->result() as $row){ ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row->kode_akun);?></td>
                                                    <td><?=($row->nama_akun);?></td>
                                                    <td><input type='text' class='field-saldo-awal form-control hitung total-<?=$row->kepala_akun;?>' id='debet-<?=$row->id;?>'  data-kepala-akun='<?=($row->kepala_akun);?>' name="saldo_awal[]" value="<?=($row->saldo_awal);?>"/>
                                                        <input type="hidden" class="btn btn-primary pull-right" name="id[]" value="<?=$row->id;?>">
                                                    </td>
                                                </tr>
                                            <?php $no++; }?>
                                        </tbody>
                                    </table>
                                    <div class="form-actions">
                                            <div class="col-xs-10">
                                                <p>Terdapat Selisih sebesar Rp. <input name="jumlah" id="total" /> akan dialokasikan pada Neraca dengan kode akun <?=$query2['kode_akun']?> - <?=$query2['nama_akun']?> setelah </p> 
                                            </div>
                                          <input type="submit" class="btn btn-primary pull-right" name="simpan" id="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
// proses menghitung total value inputan
$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
    berhitung = aydi.split('-'),
    kepalaakun = $(this).attr("data-kepala-akun");
    $(this).keydown(function() {
        setTimeout(function() {
                var totalsatu = totaldua = totaltiga = alltotal = 0;
                $('#debet-'+ berhitung[1]).each(function(){
                    $('.total-3').each(function(){
                        totaltiga += parseInt($(this).val());
                    });
                    $('.total-2').each(function(){
                        totaldua += parseInt($(this).val());
                    });
                    $('.total-1').each(function(){
                        totalsatu += parseInt($(this).val());
                    });
                });
                var alltotal;
                alltotal = totalsatu - totaldua - totaltiga;
                $('#total').val(alltotal);
        }, 50);
    });
});
</script>