<?php
	$attr="";
	if($periode<=0)
		{
			$attr=" style='display:none'";	
?>
<div class="alert alert-danger">
  <strong>Tidak ada Periode aktif!</strong> Pastikan ada periode yang aktif !
</div>
<?php			
		}
?>
<div <?php echo $attr;?>>
<?php
  if($aksi=='edit'){
    foreach ($query->result() as $list)  {
      $id=$list->id;
    }
  }elseif($aksi=='create'){
      $id='';
  }
	$mode=strtoupper($this->uri->segment(3));
	if($r['ste']==2)
		{
?>
<div class="alert alert-warning">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Transaksi masih mengandung kesalahan. <br />
                 <ul>
               	  <li>Akun belum ada</li>
                	<li>Nilai total debet atau kredit nol</li>
                	<li>Nilai total debet tidak sama dengan total kredit</li>
                 </ul>
  </div>

<?php			
		}
?>
                              
                              <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i><?=$judul;?> 
                                    </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
  <?php if($aksi=='create'){?>
  <form action="<?=base_url().$link;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
  <?php }elseif($aksi=='edit'){?>
  <form action="<?=base_url().$link.$id;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
  <?php }?>
  <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
  <input type="hidden" name="modul"  value="1" />
	<input type="hidden" name="menuid"  value="1" />
  <input id="idf" value="3" type="hidden" />		        
       
        <div class="form-group">
        	<input type="hidden" name="periode" id="id" value="<?php echo $periode;?>" />
        </div>
        <div class="form-group">
        <div class="col-xs-2"><a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a></div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">ID</label>
                <div class="col-xs-8">
                    <input placeholder="No Simpanan" class="form-control" name="no_transaksi" type="text"  id="no_bukti" value="<?php echo $r['no_transaksi'];?>"  />
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Anggota</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <option value="0" >--Pilih Anggota--</option>
                  <?php foreach ($anggota->result() as $dd) { ?>
                  <option value="<?=$dd->id?>" <?php if ($r['id_anggota']==$dd->id){echo "selected";}else{echo "";} ?> ><?=$dd->no_kta.'-'.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-xs-4">Tanggal</label>
                <div class="col-xs-8">
                  <input name="tanggal_transaksi" value="<?php echo $r['tanggal_transaksi'];?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Produk</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" onchange="cek_database()" id="id_produk" name="id_produk" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <option value="0" >--Pilih Produk Pendanaan--</option>
                  <?php foreach ($produk->result() as $dd) { ?>
                  <option value="<?=$dd->id?>" <?php if ($r['id_produk']==$dd->id){echo "selected";}else{echo "";} ?> ><?=$dd->nama_produk_pendanaan;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
        </div>        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-4">Keterangan</label>
              <div class="col-xs-8">
                <textarea name="keterangan" class="form-control" id="uraian" placeholder="keterangan" ><?php echo $r['keterangan'];?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Total</label>
              <div class="col-xs-8">
                                                    <input placeholder='ID Akun'  type='hidden' class='form-control' id='coa1' name='coa[]' onBlur="fill31();" id="id_akun1" />
                                                    <input class='form-control' type="hidden" onKeyUp="suggest1(this.value);" name="kode_akun[]" onBlur="fill21();" id="kode_akun1"/>
                                                    <div class="result"><div class="suggestionsBox" id="suggestions1" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                          <div class="suggestionsList" id="suggestionsList1">&nbsp;</div></div></div>
                                                    <input placeholder='Nama Akun'  type='hidden' class='form-control' name='nama_akun' onBlur="fill11();" id="nama_akun1" disabled/>
                <input placeholder="Total" class="form-control" name="debet[]" type="text" id="total" value="<?php echo $r['sebesar'];?>" readonly="readonly"  />
                <input placeholder="Sebesar" class="form-control" name="sebesar" type="hidden" id="total-sebesar" value="<?php echo $r['sebesar'];?>"/>
                <input placeholder='Nilai (Kredit)'  type='hidden' class='form-control' name='kredit[]'/>
              </div>
            </div>
          </div>
        </div>
        
        <?php
        if($aksi=="edit")
				{
					if(count($detail)>0)	
						{
			?>
            			<div class="row">
                    <div class="col-md-1"><div class="form-group"></div></div>
                    <div class="col-md-3"><div class="form-group"><strong>Akun</strong></div></div>
                    <div class="col-md-3"><div class="form-group"><strong>Debet</strong></div></div>
                    <div class="col-md-3"><div class="form-group"><strong>Kredit</strong></div></div>
                    <div class="col-md-1"><div class="form-group"><strong>Hapus</strong></div></div>
                  </div>

            <?php				
							foreach($detail as $rd)
								{
				        ?>
                    <div class="row">
                    <div class="col-md-1"><input type="hidden" name="coa_e[<?php echo $rd->id;?>]" value="<?php echo $rd->id;?>" /></div>
                    <div class="col-md-3"><?='('.$rd->kepala_akun.'-'.$rd->klasifikasi_akun.'-'.$rd->kode_akun.') '.$rd->nama_akun;?></div>
                    <div class="col-md-3"><input  type="text" class="form-control form-group" name="debet_e[<?php echo $rd->id;?>]" value="<?php echo $rd->debet; ?>"  /></div>
                    <div class="col-md-3"><input   type="text" class="form-control form-group" name="kredit_e[<?php echo $rd->id;?>]" value="<?php echo $rd->kredit; ?>"  /></div>
                    <div class="col-md-1"><input type="checkbox" name="coa_cb[]" value="<?php echo $rd->id;?>"></div>
                    </br>
                    </div>

				<?php
								}
					?>
                    
                    <?php		
						}
				}	
				?>
        
       <?php
	   		//$arrCG=$coa->tampilCG("",0,0);
       		$sl_coa="<select name=coa[] class=form-control input-sm>";
        $gp=$this->db->where("tipe","kepala_akun")->get("data_akun")->result();
			if(count($gp)>0)
				{
					foreach($gp as $rg)
						{
							$kelompok=$rg->id;
							$sl_coa.="<option value=$kelompok disabled=disabled>".strtoupper($rg->nama_akun)."</option>";
							$this->db->order_by('kepala_akun','ASC');
							$perkiraan= $this->db
                                  ->where("kepala_akun",$kelompok)
                                  ->where_not_in('tipe','kepala_akun')
                                  ->get('data_akun');
                                  //$this->db->get('data_akun',array('kepala_akun'=>$kelompok,'tipe'=>'klasifikasi_akun','tipe'=>'kode_akun'));
							foreach ($perkiraan->result_array() as $data )
								{
									$ip=$data['id'];
									$sl_coa.= "<option value=$ip>&nbsp;&nbsp;&nbsp;&nbsp;".'('.$data['kepala_akun'].'-'.$data['klasifikasi_akun'].'-'.$data['kode_akun'].")".$data['nama_akun']."</option>";
								}
							/*$arrCOA=$coa->tampilCOA($kelompok,"",0,0);
							if(count($arrCOA)>0)
								{
									foreach($arrCOA as $rc)
										{
											$kode=$rc['kepala_akun'];
											$sl_coa.="<option value=$kode>&nbsp;&nbsp;&nbsp;".$rg['nama_pg']." $kode -&gt; ".$rc['nama_akun']."</option>";
										}	
								}
							*/	
						}
				}
			$sl_coa.="</select>";
			
			
		?>
        
        	
            
       
       <div class="form-group">
       	<label for="NamaLengkap" class="control-label col-xs-1 ckeditor"></label>
         
           <div class="col-xs-9">
				<!--<a class="btn green btn-sm"  onclick="addRincian('<?php //echo $sl_coa;?>'); return false;"><i class="glyphicon glyphicon-plus"></i> Tambah Akun</a>--> </div>
      	</div>	
        
        
  <div class="portlet light form-fit bordered">
    <div class="portlet-body form">
      <div id="form-username" class="form-horizontal form-bordered">
        <div id="divAkun">
  <?php if ($aksi=="create"){ ?>
                                        <div class="form-group">
                                            <div class="col-sm-5" align="center">
                                                <label class="control-label">Transaksi</label>
                                            </div>
                                            <div class="col-sm-5" align="center">
                                                <label class="control-label">Jumlah</label>
                                            </div>
                                        </div>
                                        <div class="form-group" id="srow1">
                                          <input id="akunke" value="1" type="hidden" />    
                                            <div class="col-sm-5" align="center">
                                              Simpanan
                                            </div>
                                            <div class="col-sm-5">
                                                <input placeholder='ID Akun'  type='hidden' class='form-control' id='coa2' name='coa[]' onBlur="fill31();" id="id_akun1" />
                                              <input class='form-control' type="hidden" onKeyUp="suggest1(this.value);" name="kode_akun[]" onBlur="fill21();" id="kode_akun1"/>
                                              <div class="result"><div class="suggestionsBox" id="suggestions1" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                    <div class="suggestionsList" id="suggestionsList1">&nbsp;</div></div></div>
                                              <input placeholder='Nama Akun'  type='hidden' class='form-control' name='nama_akun' onBlur="fill11();" id="nama_akun1" disabled/>
                                              <input placeholder='Debet'  type='hidden' class='form-control hitung' id="debet-1" name='debet[]'/>
                                              <input placeholder='Jumlah'  type='text' class='form-control hitung' id="kredit-1" name='kredit[]'/>
                                              
                                                <input type="hidden" name="subtotal[]" id="total-1" class="total" readonly="readonly">
                                            </div>
                                        </div>
                                        <script>
                                        function suggest1(inputString){
                                          if(inputString.length == 0){
                                            $('#suggestions1').fadeOut();
                                          }else{
                                            $('#nama_akun1').addClass('load');
                                            $.post("../home/suggest_akun/"+inputString+"/1", {queryString:""+inputString+""}, function(data){
                                              if(data.length>0){
                                                $('#suggestions1').fadeIn();
                                                $('#suggestionsList1').html(data);
                                                $('#nama_akun1').removeClass('load');
                                              }
                                            });
                                          }
                                        }
                                        function fill11(thisValue){
                                          $('#nama_akun1').val(thisValue);
                                          setTimeout("$('#suggestions1').fadeOut();", 100);
                                        }
                                        function fill21(thisValue){
                                          $('#kode_akun1').val(thisValue);
                                          setTimeout("$('#suggestions1').fadeOut();", 100);
                                        }
                                        function fill31(thisValue){
                                          $('#id_akun1').val(thisValue);
                                          setTimeout("$('#suggestions1').fadeOut();", 100);
                                        }
                                        </script>
                                        <div class="form-group" id="srow2"> 
                                            <div class="col-sm-5" align="center">
                                              Biaya Administrasi
                                            </div>
                                            <div class="col-sm-5">
                                              <input placeholder='ID Akun'  type='hidden' class='form-control' id='coa3' name='coa[]' onBlur="fill32();" id="id_akun2" />
                                              <input class='form-control' onKeyUp="suggest2(this.value);" type="hidden" name="kode_akun[]" onBlur="fill22();" id="kode_akun2"/> <!--onKeyUp="suggest(this.value);"-->
                                                  <div class="result">
                                                    <div class="suggestionsBox" id="suggestions2" style="display: none;">
                                                      <img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                      <div class="suggestionsList" id="suggestionsList2">&nbsp;</div>
                                                    </div>
                                                  </div>
                                                <input placeholder='Nama Akun'  type='hidden' class='form-control' name='nama_akun' onBlur="fill12();" id="nama_akun2" disabled/>
                                              <input placeholder='Debet'  type='hidden' class='form-control hitung' id="debet-0" name='debet[]'/>
                                                <input placeholder='Jumlah'  type='text' class='form-control hitung' id="kredit-0" name='kredit[]'/>

                                                <input type="hidden" name="subtotal[]" id="total-0" class="total" readonly="readonly">
                                            </div>
                                        </div>
                                        <script>
                                        function suggest2(inputString){
                                          if(inputString.length == 0){
                                            $('#suggestions2').fadeOut();
                                          }else{
                                            $('#nama_akun2').addClass('load');
                                            $.post("../home/suggest_akun/"+inputString+"/2", {queryString:""+inputString+""}, function(data){
                                              if(data.length>0){
                                                $('#suggestions2').fadeIn();
                                                $('#suggestionsList2').html(data);
                                                $('#nama_akun2').removeClass('load');
                                              }
                                            });
                                          }
                                        }
                                        function fill12(thisValue){
                                          $('#nama_akun2').val(thisValue);
                                          setTimeout("$('#suggestions2').fadeOut();", 100);
                                        }
                                        function fill22(thisValue){
                                          $('#kode_akun2').val(thisValue);
                                          setTimeout("$('#suggestions2').fadeOut();", 100);
                                        }
                                        function fill32(thisValue){
                                          $('#id_akun2').val(thisValue);
                                          setTimeout("$('#suggestions2').fadeOut();", 100);
                                        }
                                        </script>
  <?php  }?>
</div>
</div>
</div>
        </div>
        
        <div class="form-group">
           <div class="col-xs-11">
                <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-primary pull-right" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
            </div>
        </div>
      </form>
                                </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    function cek_database(){
        var produk = $("#id_produk").val();
        $.ajax({
            url: '<?=base_url("home/pilih_produk_pendanaan");?>'+'/'+produk,
            //data:"id="+id ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#coa1').val(obj.akun_kasbank1);
            $('#coa2').val(obj.akun_simpanan);
            $('#coa3').val(obj.akun_administrasi);
        });
    }
$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
    berhitung = aydi.split('-');
    $(this).keydown(function() {
        setTimeout(function() {
            var satuan = ($('#debet-' + berhitung[1]).val() != '' ? $('#debet-' + berhitung[1]).val() : 0),
                jasa = ($('#kredit-' + berhitung[1]).val() != '' ? $('#kredit-' + berhitung[1]).val() : 0),
                subtotal = parseInt(satuan) + parseInt(jasa);
            if (!isNaN(subtotal)) {
                $('#total-' + berhitung[1]).val(subtotal);
        var alltotal = 0;
        $('.total').each(function(){
          alltotal += parseFloat($(this).val());
        });
                $('#total').val(alltotal);
                $('#total-sebesar').val(alltotal);
            }
        }, 50);
    });
});
</script>