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
<script type="text/javascript" src="<?=base_url();?>assets/backend/bmt/jquery2.js"></script>
<script>
function suggest(inputString){
  if(inputString.length == 0){
    $('#suggestions').fadeOut();
  }else{
    $('#country').addClass('load');
    $.post("<?=base_url('home/suggest_akun');?>/"+inputString, {queryString:""+inputString+""}, function(data){
      if(data.length>0){
        $('#suggestionsBox').fadeIn();
        $('#suggestionsList').html(data);
        $('#country').removeClass('load');
      }
    });
  }
}
function fill(thisValue){
  $('#country').val(thisValue);
  setTimeout("$('#suggestions').fadeOut();", 10);
}
function fill2(thisValue){
  $('#kode').val(thisValue);
  setTimeout("$('#suggestions').fadeOut();", 10);
}
</script>
<style>
  #result {
    height:20px;
    font-size:12px;
    font-family:Arial, Helvetica, sans-serif;
    color:#333;
    padding:5px;
    margin-bottom:10px;
    background-color:#FFFF99;
  }
  #country{
    padding:3px;
    border:1px #CCC solid;
    font-size:12px;
  }
  .suggestionsBox {
    position: absolute;
    left: 0px;
    top:40px;
    margin: 26px 0px 0px 0px;
    width: 200px;
    padding:0px;
    background-color:#999999;
    border-top: 3px solid #999999;
    color: #fff;
  }
  .suggestionList {
    margin: 0px;
    padding: 0px;
  }
  .suggestionList ul li {
    list-style:none;
    margin: 0px;
    padding: 6px;
    border-bottom:1px dotted #666;
    cursor: pointer;
  }
  .suggestionList ul li:hover {
    background-color: #FC3;
    color:#000;
  }
  ul {
    font-family:Arial, Helvetica, sans-serif;
    font-size:11px;
    color:#FFF;
    padding:0;
    margin:0;
  }
  
  .load{
  background-image:url('<?=base_url();?>assets/backend/bmt/loader.gif');
  background-position:right;
  background-repeat:no-repeat;
  }
  
  #suggest {
    position:relative;
  }
</style>
                              
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

  <input type="hidden" name="id_perusahaan"  value="<?=$this->session->userdata('id_perusahaan');?>" />
  <input type="hidden" name="id_karyawan"  value="<?=$this->session->userdata('id_karyawan');?>" />

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
                <label for="NamaLengkap" class="control-label col-xs-4">Tanggal</label>
                <div class="col-xs-8">
                  <input name="tanggal_transaksi" value="<?php echo $r['tanggal_transaksi'];?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-xs-2">Produk</label>
              <div class="col-xs-8">
                <select class="bs-select form-control" data-live-search="true" name="id_produk" <?=($aksi=='view') ? 'disabled': ''; ?>>
                  <?php foreach ($produk->result() as $dd) { ?>
                  <option value="<?=$dd->id?>" <?php if ($r['id_produk']==$dd->id){echo "selected";}else{echo "";} ?> ><?=$dd->nama_produk_pendanaan;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-4">Kuasa</label>
                <div class="col-xs-8">
                    <input placeholder="Kuasa" class="form-control" name="kuasa" type="text"  id="no_bukti" value="<?php echo $r['kuasa'];?>"  />
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="NamaLengkap" class="control-label col-xs-2">No Identitas Kuasa</label>
                <div class="col-xs-8">
                    <input class="form-control" name="no_identitas_kuasa" type="text" value="<?php echo $r['id_kuasa'];?>"  />
                </div>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="NamaLengkap" class="control-label col-xs-2">Keterangan</label>
            <div class="col-xs-9">
            	
               <textarea name="keterangan" class="form-control input-sm" id="uraian" placeholder="keterangan" ><?php echo $r['keterangan'];?></textarea>
               
            </div>
        </div> 
        <?php
        //$arrCG=$coa->tampilCG("",0,0);
          $sl_coa="<select class='bs-select form-control' data-live-search='true' name=coa[]>";
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
                  $sl_coa.= "<option value=$ip>&nbsp;&nbsp;&nbsp;&nbsp;".$data['kepala_akun'].'-'.$data['klasifikasi_akun'].'-'.$data['kode_akun']."</option>";
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
                                      <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Kode Akun </th>
                                                <th> Nama Akun </th>
                                                <th> Debet </th>
                                                <th> Kredit </th>
                                                <th> Edit </th>
                                                <th> Hapus </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="suggest"><input class='form-control' type="text" onKeyUp="suggest(this.value);" name="coa[]" onBlur="fill2();" id="kode"/>
                                                  <div class="suggestionsBox" id="suggestionsBox" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                    <div class="suggestionsList" id="suggestionsList">&nbsp;</div></div></td>
                                                <td><input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill();" id="country"/></td>
                                                <td><input placeholder='Debet'  type='text' class='form-control' name='debet[]'/></td>
                                                <td><input placeholder='Kredit'  type='text' class='form-control' name='kredit[]'/></td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="suggest"><input class='form-control' type="text" onKeyUp="suggest(this.value);" name="coa[]" onBlur="fill2();" id="kode"/>
                                                  <div class="media"><div class="suggestionsBox" id="suggestionsBox" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                    <div class="suggestionsList" id="suggestionsList">&nbsp;</div></div></div></td>
                                                <td><input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill();" id="country"/></td>
                                                <td><input placeholder='Debet'  type='text' class='form-control' name='debet[]'/></td>
                                                <td><input placeholder='Kredit'  type='text' class='form-control' name='kredit[]'/></td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td id="suggest"><input class='form-control' type="text" onKeyUp="suggest(this.value);" name="coa[]" onBlur="fill2();" id="kode"/>
                                                  <div class="suggestionsBox" id="suggestionsBox" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                    <div class="suggestionsList" id="suggestionsList">&nbsp;</div></div></td>
                                                <td><input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill();" id="country"/></td>
                                                <td><input placeholder='Debet'  type='text' class='form-control' name='debet[]'/></td>
                                                <td><input placeholder='Kredit'  type='text' class='form-control' name='kredit[]'/></td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td id="suggest"><input class='form-control' type="text" onKeyUp="suggest(this.value);" name="coa[]" onBlur="fill2();" id="kode"/>
                                                  <div class="suggestionsBox" id="suggestionsBox" style="display: none;"><img src="<?=base_url();?>assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                    <div class="suggestionsList" id="suggestionsList">&nbsp;</div></div></td>
                                                <td><input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur="fill();" id="country"/></td>
                                                <td><input placeholder='Debet'  type='text' class='form-control' name='debet[]'/></td>
                                                <td><input placeholder='Kredit'  type='text' class='form-control' name='kredit[]'/></td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
        
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