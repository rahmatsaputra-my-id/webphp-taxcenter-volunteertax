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
	$mode=strtoupper('ha');
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
  <form action="<?=base_url().$link.'/'.$periode;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
  <?php }elseif($aksi=='edit'){?>
  <form action="<?=base_url().$link.'/'.$periode;?>" method="post" name="frmJurnal" id="frmJurnal" class="form-horizontal" enctype="multipart/form-data">
  <?php }?>
  <input type="hidden" name="id" id="id" value="" />
  <input type="hidden" name="modul"  value="1" />
	<input type="hidden" name="menuid"  value="1" />     
       
        <div class="form-group">
        	<input type="hidden" name="periode" id="id" value="<?php echo $periode;?>" />
        </div>
        <div class="form-group">
        <div class="col-xs-2"><a type="button" class="btn btn-default" name="add" href="<?=base_url($link2.'/'.$periode);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a></div>
        </div>
        
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
        </div>  
        
        
  <div class="portlet light form-fit bordered">
    <div class="portlet-body form">
      <div id="form-username" class="form-horizontal form-bordered">
        <div id="divAkun">
  <?php if ($aksi=="create"){ ?>
  
                                        <div class="form-group">
                                            <div class="col-sm-4" align="center">
                                                <label class="control-label">Nama SHU</label>
                                            </div>
                                            <div class="col-sm-3" align="center">
                                                <label class="control-label">Persentase</label>
                                            </div>
                                            <div class="col-sm-4" align="center">
                                                <label class="control-label">Keterangan</label>
                                            </div>
                                            <div class="col-sm-1" align="center">
                                                <label class="control-label">Hapus</label>
                                            </div>
                                        </div>
                                        <?php $no=3; foreach($query->result() as $rd)
                { ?>      
                                        <div class="form-group" id="srow<?=$no;?>">
                                          <input id="akunke" value="<?=$no;?>" type="hidden" />
                                            <div class="col-sm-4">
                                                <input placeholder='Nama SHU'  type='text' class='form-control' name='nama_shu[]' value='<?=$rd->nama_shu;?>' readonly />
                                            </div>
                                            <div class="col-sm-3">
                                              <input placeholder='Persentase'  type='text' class='form-control hitung total' id='debet-0' name='persentase[]' value='<?=$rd->persentase;?>' readonly />
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <input placeholder='Keterangan'  type='text' class='form-control' name='keterangan[]' value='<?=$rd->keterangan;?>' readonly />
                                            </div>
                                            <div class="col-sm-1">
                                                <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField("#srow<?=$no;?>"); return false;'><i class='glyphicon glyphicon-remove'></i></button>
                                            </div>
                                        </div>
  <input id="idf" value="<?=$no=$no+1;?>" type="hidden" /> 
  <?php  }

?>
                                        <div class="form-group" id="srow1">
                                          <input id="akunke" value="1" type="hidden" />
                                            <div class="col-sm-4">
                                                <input placeholder='Nama SHU'  type='text' class='form-control' name='nama_shu[]'/>
                                            </div>
                                            <div class="col-sm-3">
                                              <input placeholder='Persentase'  type='text' class='form-control hitung total' id='debet-0' name='persentase[]'/>
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <input placeholder='Keterangan'  type='text' class='form-control' name='keterangan[]'/>
                                            </div>
                                            <div class="col-sm-1">
                                                <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField("#srow1"); return false;'><i class='glyphicon glyphicon-remove'></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="srow2">
                                          <input id="akunke" value="2" type="hidden" />
                                            <div class="col-sm-4">
                                                <input placeholder='Nama SHU'  type='text' class='form-control' name='nama_shu[]'/>
                                            </div>
                                            <div class="col-sm-3">
                                              <input placeholder='Persentase'  type='text' class='form-control hitung total' id='debet-1' name='persentase[]'/>
                                               
                                            </div>
                                            <div class="col-sm-4">
                                                <input placeholder='Keterangan'  type='text' class='form-control' name='keterangan[]'/>
                                            </div>
                                            <div class="col-sm-1">
                                                <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField("#srow2"); return false;'><i class='glyphicon glyphicon-remove'></i></button>
                                            </div>
                                        </div>
  <?php  }?>
  <?php if ($aksi=="edit"){ 
    
                  ?>

  
                                        <div class="form-group">
                                            <div class="col-sm-4" align="center">
                                                <label class="control-label">Nama SHU</label>
                                            </div>
                                            <div class="col-sm-4" align="center">
                                                <label class="control-label">Persentase</label>
                                            </div>
                                            <div class="col-sm-4" align="center">
                                                <label class="control-label">Keterangan</label>
                                            </div>
                                        </div>
                                        <?php foreach($query->result() as $rd)
                { ?>
                                        <div class="form-group" id="srow1">
                                          <input id="akunke" value="1" type="hidden" />
                                            <div class="col-sm-4">
                                                <input placeholder='Nama SHU'  type='text' class='form-control' name='nama_shu[]' value='<?=$rd->nama_shu;?>' readonly />
                                            </div>
                                            <div class="col-sm-4">
                                              <input placeholder='Persentase'  type='text' class='form-control hitung total' id='debet-0' name='persentase[]' value='<?=$rd->persentase;?>' readonly />
                                                
                                            </div>
                                            <div class="col-sm-4">
                                                <input placeholder='Keterangan'  type='text' class='form-control' name='keterangan[]' value='<?=$rd->keterangan;?>' readonly />
                                            </div>
                                        </div>
  <?php  }
}
?>
</div>
                                        <div class="form-group"> 
                                            <div class="col-sm-4" align="center">
                                                <label>Total</label>
                                            </div>
                                            <div class="col-sm-3">
                                              <input type='text' class='form-control pull-right' placeholder='Persentase' name="alltotal" id="total" readonly="readonly"/>
                                            </div>
                                            <div class="col-sm-4" align="center">
                                            </div>
                                            <div class="col-sm-1" align="center">
                                            </div>
                                        </div>
</div>
</div>
        </div>
        
        
        <div class="form-group">
            <div class="col-xs-12" style="padding-left:80px;padding-right:40px;">
              <?php if ($aksi=="create"){ 
    
                  ?>
              <a class="btn green btn-sm"  onclick="addRincian3('<?=base_url();?>'); return false;"><i class="glyphicon glyphicon-plus"></i> Tambah Baris</a> 
              <input type="<?=($aksi=='view') ? 'hidden' : 'submit' ?>" class="btn btn-primary pull-right" name="simpan" id="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
              <?php } ?>
            </div>
        </div>
      </form>
                                </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
// proses menghitung total value inputan
$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
    berhitung = aydi.split('-');
    $(this).keydown(function() {
        setTimeout(function() {
            var satuan = ($('#debet-' + berhitung[1]).val() != '' ? $('#debet-' + berhitung[1]).val() : 0),
                subtotal = parseInt(satuan);
            if (!isNaN(subtotal)) {
                $('#total-' + berhitung[1]).val(subtotal);
                var alltotal = 0;
                $('.total').each(function(){
                  alltotal += parseFloat($(this).val());
                });
                $('#total').val(alltotal);
            }
        }, 50);
    });
});
</script>