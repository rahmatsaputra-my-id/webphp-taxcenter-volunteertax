        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                   = $list->id;
            $kode_akun            = $list->kode_akun;
            $kepala_akun          = $list->kepala_akun;
            $klasifikasi_akun     = $list->klasifikasi_akun;
            $sub_klasifikasi_akun = $list->sub_klasifikasi_akun;
            $nama_akun            = $list->nama_akun;
            $saldo_awal           = $list->saldo_awal;
            $saldo_normal         = $list->saldo_normal;
            $laporan              = $list->laporan;
            $tipe                 = $list->tipe;
            $kas                  = $list->kas;
        }
        }elseif($aksi=='create'){?>
        <?php //form_open_multipart($link,'id="form"');
            $id                   = "";
            $kode_akun            = "";
            $kepala_akun          = "";
            $klasifikasi_akun     = "";
            $sub_klasifikasi_akun = "";
            $nama_akun            = "";
            $saldo_awal           = "";
            $saldo_normal         = "";
            $laporan              = "";
            $tipe                 = "";
            $kas                  = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                   = $list->id;
            $kode_akun            = $list->kode_akun;
            $kepala_akun          = $list->kepala_akun;
            $klasifikasi_akun     = $list->klasifikasi_akun;
            $sub_klasifikasi_akun = $list->sub_klasifikasi_akun;
            $nama_akun            = $list->nama_akun;
            $saldo_awal           = $list->saldo_awal;
            $saldo_normal         = $list->saldo_normal;
            $laporan              = $list->laporan;
            $tipe                 = $list->tipe;
            $kas                  = $list->kas;
        }
        }?>
<!-- Main content -->
        
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i><?=$judul;?> </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div>
                                      <div class="form-group">
                                      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                      </div>
                                      <div class="form-group">
                                        <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <?php if($aksi=='edit'){?>
                                      <form action="<?=$link.$id;?>" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                      <?php }else if($aksi=='create'){ ?>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Klasifikasi</label>
                                              <div class="mt-radio-inline">
                                                <input type="hidden" name="tipe" value="kepala_akun" onclick="javascript:yesnoCheck();" id="kepala" <?php if ($tipe=="kepala_akun"){echo "checked";}else{echo "checked";} ?>>
                                                  <label class="mt-radio">
                                                      <input type="radio" name="tipe" value="klasifikasi_akun" onclick="javascript:yesnoCheck();" id="klasifikasi" <?php if ($tipe=="klasifikasi_akun"){echo "checked";}else{echo "";} ?>> Klasifikasi
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-radio">
                                                      <input type="radio" name="tipe" value="sub_klasifikasi_akun" onclick="javascript:yesnoCheck();" id="subklasifikasi" <?php if ($tipe=="sub_klasifikasi_akun"){echo "checked";}else{echo "";} ?>> Sub Klasifikasi
                                                      <span></span>
                                                  </label>
                                                  <label class="mt-radio"><!--mt-radio-disabled-->
                                                      <input type="radio" name="tipe" value="kode_akun" onclick="javascript:yesnoCheck();" id="namaakun" <?php if ($tipe=="kode_akun"){echo "checked";}else{echo "";} ?>> Nama Akun
                                                      <span></span>
                                                  </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <form action="<?=$link;?>" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                      <?php }else if($aksi=='view'){ ?>
                                      <form action="" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                      <?php }?>
                                      <input name="tipe" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="tipe" type="hidden" value="<?=$tipe;?>" />
                                      <div class="row">
                                        <div class="col-md-4" id="kepala-akun" style='display:none'>
                                          <div class="form-group">
                                            <label>Kepala Akun</label>
                                            <select class="form-control" name="kepala_akun" id="kepala-akun-select" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="" >-- Pilih Kepala Akun --</option>
                                                <option value="1" <?php if ($kepala_akun=="1"){echo "selected";}else{echo "";} ?>>Aset</option>
                                                <option value="2" <?php if ($kepala_akun=="2"){echo "selected";}else{echo "";} ?>>Kewajiban</option>
                                                <option value="3" <?php if ($kepala_akun=="3"){echo "selected";}else{echo "";} ?>>Modal</option>
                                                <option value="4" <?php if ($kepala_akun=="4"){echo "selected";}else{echo "";} ?>>Pendapatan</option>
                                                <option value="5" <?php if ($kepala_akun=="5"){echo "selected";}else{echo "";} ?>>Biaya Atas Pendapatan</option>
                                                <option value="6" <?php if ($kepala_akun=="6"){echo "selected";}else{echo "";} ?>>Beban</option>
                                                <option value="8" <?php if ($kepala_akun=="8"){echo "selected";}else{echo "";} ?>>Pendapatan Lain</option>
                                                <option value="9" <?php if ($kepala_akun=="9"){echo "selected";}else{echo "";} ?>>Pengeluaran Lain</option>
                                            </select>
                                          </div>
                                        </div>
                                            <input name="kalsifikasi_akun" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="kode-klasifikasi-akun" type="hidden" value="<?=$klasifikasi_akun;?>" />
                                        <div class="col-md-4" id="klasifikasi-akun" style='display:none'>
                                          <div class="form-group">
                                            <label>Klasifikasi Akun</label>
                                            <select class="form-control" id="klasifikasi-akun-select" name="klasifikasi_akun" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="00">Pilih Kepala Akun terlebih dahulu</option>
                                            </select>
                                          </div>
                                        </div>
                                            <input name="sub_klasifikasi_akun" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?> id="kode-sub-klasifikasi-akun" type="hidden" value="<?=$sub_klasifikasi_akun;?>" />
                                        <div class="col-md-4" id="sub-klasifikasi-akun" style='display:none'>
                                          <div class="form-group">
                                            <label>Sub Klasifikasi Akun</label>
                                            <select class="form-control" id="sub-klasifikasi-akun-select" name="sub_klasifikasi_akun" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="00" >Pilih Klasifikasi Akun terlebih dahulu</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Kode Akun</label>
                                            <input name="kode_akun" value="<?=$kode_akun;?>" class="form-control" placeholder="" <?=($aksi=='view'||$aksi!='create') ? 'readonly': ''; ?> id="mask_ssn" type="text" />
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Nama Akun</label>
                                            <input type="text" name="nama_akun" value="<?=$nama_akun;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group" id="saldo_awal" style='display:none'>
                                        <label>Saldo Awal</label>
                                        <input type="text" name="saldo_awal" value="<?=$saldo_awal;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                      </div>
                                      <?php if($aksi=='edit'){?>
                                      <div class="form-group" id="kas_bank">
                                          <label>Kas & Bank</label>
                                          <div class="mt-checkbox-inline">
                                              <label class="mt-checkbox">
                                                  <input type="checkbox" id="inlineCheckbox1" value="ya" name="kas" <?php if($kas=='ya'){echo 'checked';}else{echo '';} ?>> Kas & Bank
                                                  <span></span>
                                              </label>
                                          </div>
                                      </div>
                                      <?php } ?>
                                      <?php if($aksi=='create'){?>
                                      <div class="form-group" id="kas_bank" style="display:none;">
                                          <label>Kas & Bank</label>
                                          <div class="mt-checkbox-inline">
                                              <label class="mt-checkbox">
                                                  <input type="checkbox" id="inlineCheckbox1" value="ya" name="kas"> Kas & Bank
                                                  <span></span>
                                              </label>
                                          </div>
                                      </div>
                                      <?php } ?>
                                      <!--<div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Saldo Normal</label>
                                            <select class="form-control" name="saldo_normal" <?php //=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="Debet" <?php //if ($saldo_normal=="Debet"){echo "selected";}else{echo "";} ?>>Debet</option>
                                                <option value="Kredit" <?php //if ($saldo_normal=="Kredit"){echo "selected";}else{echo "";} ?>>Kredit</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>-->
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Klasifikasi Untuk Laporan Arus Kas</label>
                                            <select class="form-control" name="laporan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                <option value="Operasi" <?php if ($laporan=="Operasi"){echo "selected";}else{echo "";} ?>>Operasi</option>
                                                <option value="Pendanaan" <?php if ($laporan=="Pendanaan"){echo "selected";}else{echo "";} ?>>Pendanaan</option>
                                                <option value="Pembiayaan" <?php if ($laporan=="Pembiayaan"){echo "selected";}else{echo "";} ?>>Pembiayaan</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                      <input type="<?=($aksi=='view') ? 'hidden' : 'reset' ?>" class="btn btn-default" value="Reset">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#kepala-akun-select').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/pilih_kepala_akun");?>'+'/'+countryID,
                //data:'kepala_akun='+countryID,
                success:function(html){
                    $('#klasifikasi-akun-select').html(html);
                    $('#sub-klasifikasi-akun-select').html('<option value="">- Pertama Pilih Klasifikasi Akun -</option>'); 
                }
            }); 
        }else{
            $('#klasifikasi-akun-select').html('<option value="">- Pertama Pilih Kepala Akun -</option>');
            $('#sub-klasifikasi-akun-select').html('<option value="">- Pertama Pilih klasifikasi-akun -</option>'); 
        }
    });
    
    $('#klasifikasi-akun-select').on('change',function(){
        var stateID = $(this).val();
        var countryID = $('#kepala-akun-select').val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/pilih_klasifikasi_akun");?>'+'/'+countryID+'/'+stateID,
                //data:'klasifikasi_akun='+stateID,
                success:function(html){
                    $('#sub-klasifikasi-akun-select').html(html);
                }
            }); 
        }else{
            $('#sub-klasifikasi-akun-select').html('<option value="">- Pertama Pilih Klasifikasi Akun -</option>'); 
        }
    });

    $('#kepala-akun-select').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/kode_klasifikasi_akun");?>'+'/'+countryID,
                //data:'kepala_akun='+countryID,
                success:function(html){
                    $('#mask_ssn').val(countryID+html+'-'+'00'+'-'+'0000');
                    $('#kode-klasifikasi-akun').val(html);
                    $('#kode-sub-klasifikasi-akun').val('00');
                    $('#tipe').val('klasifikasi_akun');
                }
            }); 
        }else{
        }
    });

    $('#klasifikasi-akun-select').on('change',function(){
        var stateID = $(this).val();
        var countryID = $('#kepala-akun-select').val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/kode_sub_klasifikasi_akun");?>'+'/'+countryID+'/'+stateID,
                //data:'klasifikasi_akun='+stateID,
                success:function(html){
                    $('#mask_ssn').val(countryID+stateID+'-'+html+'-'+'0000');
                    $('#kode-sub-klasifikasi-akun').val(html);
                    $('#tipe').val('sub_klasifikasi_akun');
                }
            }); 
        }else{
        }
    });

    $('#sub-klasifikasi-akun-select').on('change',function(){
        var stateID = $(this).val();
        var countryID = $('#kepala-akun-select').val();
        var klasifikasi = $('#klasifikasi-akun-select').val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/kodeakun");?>'+'/'+countryID+'/'+klasifikasi+'/'+stateID,
                //data:'klasifikasi_akun='+stateID,
                success:function(html){
                    $('#mask_ssn').val(countryID+klasifikasi+'-'+stateID+'-'+html);
                    $('#tipe').val('kode_akun');
                  }
            }); 
        }else{
        }
    });
});

function yesnoCheck() {

    if (document.getElementById('klasifikasi').checked){
      document.getElementById('kepala-akun').style.display = 'block';
      document.getElementById('kode-klasifikasi-akun').style.display = 'block';
      document.getElementById('kode-sub-klasifikasi-akun').style.display = 'block';
      document.getElementById('klasifikasi-akun').style.display = 'none';
      document.getElementById('sub-klasifikasi-akun').style.display = 'none';
      document.getElementById('saldo_awal').style.display = 'none';
      document.getElementById('kas_bank').style.display = 'none';
      document.getElementById('form').reset();
    } else if(document.getElementById('subklasifikasi').checked){
      document.getElementById('kepala-akun').style.display = 'block';
      document.getElementById('kode-klasifikasi-akun').style.display = 'none';
      document.getElementById('kode-sub-klasifikasi-akun').style.display = 'block';
      document.getElementById('klasifikasi-akun').style.display = 'block';
      document.getElementById('sub-klasifikasi-akun').style.display = 'none';
      document.getElementById('saldo_awal').style.display = 'none';
      document.getElementById('kas_bank').style.display = 'none';
      document.getElementById('form').reset();
    } else if(document.getElementById('namaakun').checked){
      document.getElementById('kepala-akun').style.display = 'block';
      document.getElementById('saldo_awal').style.display = 'block';
      document.getElementById('kas_bank').style.display = 'block';
      document.getElementById('kode-klasifikasi-akun').style.display = 'none';
      document.getElementById('kode-sub-klasifikasi-akun').style.display = 'none';
      document.getElementById('klasifikasi-akun').style.display = 'block';
      document.getElementById('sub-klasifikasi-akun').style.display = 'block';
      document.getElementById('form').reset();
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
      document.getElementById('klasifikasi-akun').style.display = 'none';
      document.getElementById('sub-klasifikasi-akun').style.display = 'none';
    }

}
</script>