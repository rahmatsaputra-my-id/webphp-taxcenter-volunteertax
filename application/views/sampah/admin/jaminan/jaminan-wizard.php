
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> Pengajuan Pembiayaan Baitul Maal wat Tamwil -
                                            <span class="step-title"> Step 1 of 3 </span>
                                        </span>
                                    </div>
                                    <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>-->
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="<?=base_url('home');?>/createjaminan" id="submit_form" method="POST" enctype="multipart/form-data">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Pengajuan Pembiayaan </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step active">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Data Jaminan </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab5" data-toggle="tab" class="step">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Konfirmasi </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> Terdapat error pada masukkan di bawah. Tolong di cek lagi. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Anda Telah sukses melakukan registrasi! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Pengajuan Pembiayaan</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nomor Pengajuan
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="id_jaminan" value="<?=$id;?>" />
                                                                <input type="hidden" name="status" value="Belum Konfimasi" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin') ? 'readonly': ''; ?>>
                                                                <span class="help-block"> ID ini sudah Otomatis terisi. </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="tanggal_masuk" value="<?php $tgl=date('Y/m/d'); echo $tgl; ?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Tanggal ini sudah Otomatis terisi dengan tanggal hari ini. </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Anggota
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="bs-select form-control" data-live-search="true" id="id_anggota" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="" >--Pilih Anggota--</option>
                                                                  <?php foreach ($anggota->result() as $dd) { ?>
                                                                  <option value="<?=$dd->id?>" ><?='('.$dd->no_kta.') '.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                                                                  <?php }?>
                                                                </select>
                                                                <span class="help-block"> Pilih Anggota. </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Pembiayaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="bs-select form-control" data-live-search="true" id="id_produk_pembiayaan" name="id_produk_pembiayaan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="" >--Pilih Produk Pembiayaan--</option>
                                                                  <?php foreach ($produk->result() as $dd) { ?>
                                                                  <option value="<?=$dd->id?>" ><?='('.$dd->id.') '.$dd->nama_produk_pembiayaan;?></option>
                                                                  <?php }?>
                                                                </select>
                                                                <span class="help-block"> Pilih Produk Pembiayaan. </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nominal Pengajuan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="nominal_pengajuan" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Nominal Pengajuan </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Data Jaminan</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="mt-radio-inline">
                                                                    <input type="hidden" name="tipe" value="kepala_akun" onclick="javascript:yesnoCheck();" id="kepala">
                                                                      <label class="mt-radio">
                                                                          <input type="radio" name="tipe" value="Tanah Bangunan" data-title="Tanah Bangunan" onclick="javascript:yesnoCheck();" id="klasifikasi" > Tanah/Bangunan
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="tipe" value="Kendaraan" data-title="Kendaraan" onclick="javascript:yesnoCheck();" id="namaakun2" > Kendaraan
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="tipe" value="lainnya" data-title="Lainnya" onclick="javascript:yesnoCheck();" id="namaakun" > Lainnya
                                                                          <span></span>
                                                                      </label>
                                                                    <input type="text" id="lainnya" name="tipe" class="form-control" placeholder="Lainnya" disabled >
                                                                  </div>
                                                                <span class="help-block"> Pilih Jenis Jaminan </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Dokumen
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="input-group">
                                                                        <div class="form-control uneditable-input input-fixed" data-trigger="fileinput">
                                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                            <span class="fileinput-filename"> </span>
                                                                        </div>
                                                                        <span class="input-group-addon btn default btn-file">
                                                                            <span class="fileinput-new"> Select file </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="dokumen"> </span>
                                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <span class="help-block"> Pilih File Dokumen </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Dokumen Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="dokumen_jaminan" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Dokumen Jaminan </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nilai Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="nilai" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Nilai Jaminan </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nomor Dokumen
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="nomor" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Nomor Dokumen </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab5">
                                                        <h3 class="block">Konfirmasi</h3>
                                                        <h4 class="form-section">Pengajuan Pembiayaan</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="tanggal_masuk"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Anggota:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="id_anggota"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Janis Pembiayaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="id_produk_pembiayaan"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nominal Pengajuan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nominal_pengajuan"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Jaminan</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Jaminan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="tipe"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Dokumen Jaminan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="dokumen_jaminan"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nilai Jaminan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nilai"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nomor Dokumen:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nomor"> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Kembali </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Lanjutkan
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <input class="btn green button-submit" value="Simpan" name="simpan" type="submit" onclick="return confirm('Apakah Anda yakin data ini benar?')"/>
                                                        <!--<a href="javascript:;" class="btn green button-submit"> Submit
                                                            <i class="fa fa-check"></i>
                                                        </a>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                    <script src="<?=base_url('assets/backend');?>/bmt/scripts/jaminan-wizard.js" type="text/javascript"></script>
                    <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('text1').value;
      var txtSecondNumberValue = document.getElementById('text2').value;
      var result = parseInt(txtFirstNumberValue) * (parseInt(txtSecondNumberValue) / 100);
      if (!isNaN(result)) {
         document.getElementById('text3').value = result;
      }
}
function sum2() {
      var txtFirstNumberValue = document.getElementById('text3').value;
      var txtSecondNumberValue = document.getElementById('text4').value;
      var result = parseInt(txtFirstNumberValue) / parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('text5').value = result;
      }
}

function yesnoCheck() {

    if (document.getElementById('klasifikasi').checked){
      document.getElementById('lainnya').disabled = 'status';
    } else if(document.getElementById('namaakun2').checked){
      document.getElementById('lainnya').disabled = 'status';
    } else if(document.getElementById('namaakun').checked){
      document.getElementById('lainnya').disabled = '';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
    }
    

}
</script>