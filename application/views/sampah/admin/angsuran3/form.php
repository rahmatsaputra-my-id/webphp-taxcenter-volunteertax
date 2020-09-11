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
				<a class="btn green btn-sm"  onclick="addRincian('<?php echo $sl_coa;?>'); return false;"><i class="glyphicon glyphicon-plus"></i> Tambah Akun</a> </div>
      	</div>	
        
        <div id="divAkun">
  <?php if ($aksi=="create"){ ?>
  <div class='form-group'  id='srow1'>
  <div class='controls'>
  <label for='NamaLengkap' class='control-label col-xs-2 ckeditor'></label>
  <div class='col-xs-4'>
  <?=$sl_coa;?>
  </div>
  <div class='col-xs-2'>
  <input placeholder='Debet'  type='text' class='form-control input-sm' name='debet[]'/>
  </div>
  <div class='col-xs-2'>
  <input placeholder='Kredit'  type='text' class='form-control input-sm' name='kredit[]'/>
  </div>
  <div class='col-xs-1'></div>
  </div>
  </div>

  <div class='form-group'  id='srow2'>
  <div class='controls'>
  <label for='NamaLengkap' class='control-label col-xs-2 ckeditor'></label>
  <div class='col-xs-4'>
  <?=$sl_coa;?>
  </div>
  <div class='col-xs-2'>
  <input placeholder='Debet'  type='text' class='form-control input-sm' name='debet[]'/>
  </div>
  <div class='col-xs-2'>
  <input placeholder='Kredit'  type='text' class='form-control input-sm' name='kredit[]'/>
  </div>
  <div class='col-xs-1'></div>
  </div>
  </div>  
  <?php  }?>
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