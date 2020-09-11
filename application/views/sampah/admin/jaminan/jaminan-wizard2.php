            <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?php
            $id                 = $list->id;
            $id_jaminan         = $list->id_jaminan;
            $id_produk_pembiayaan= $list->id_produk_pembiayaan;
            $nominal_pengajuan  = $list->nominal_pengajuan;
            $kegunaan           = $list->kegunaan;
            $id_jaminan         = $list->id_jaminan;
            $id_anggota         = $list->id_anggota;
            $tipe               = $list->tipe;
            $nilai              = $list->nilai;
            $nomor              = $list->nomor;
            $tanggal_masuk      = $list->tanggal_masuk;
            $tanggal_akad       = $list->tanggal_akad;
            $status             = $list->status;
            $dokumen            = $list->dokumen;
            $dokumen_jaminan    = $list->dokumen_jaminan;
            $id_produk          = $list->id_produk_pembiayaan;
            $periode            = $list->periode;
            $nilai_realisasi    = $list->nilai_realisasi;
            $jangka_waktu       = $list->jangka_waktu;
            $jatuh_tempo        = $list->jatuh_tempo;
            $nisbah             = $list->nisbah;
            $nominal_nisbah     = $list->nominal_nisbah;
            $total_angsuran     = $list->total_angsuran;
            $total_angsuran_nisbah= $list->total_angsuran_nisbah;
            $total_angsuran_keseluruhan= $list->total_angsuran_keseluruhan;
            $persentase_kebijakan= $list->persentase_kebijakan;
            $persentase_jaminan = $list->persentase_jaminan;
            $hasil_persentase   = $list->hasil_persentase;
            $persentase_denda   = $list->persentase_denda;
            $id_karyawan        = $list->id_karyawan;
            $id_karyawan2       = $list->id_karyawan2;
        }
        }elseif($aksi=='create'){?>
        <?php
            $id_jaminan         = $id;
            $id_produk_pembiayaan= "";
            $nominal_pengajuan  = "";
            $kegunaan           = "";
            $id_jaminan         = "";
            $id_anggota         = "";
            $tipe               = "";
            $nilai              = "";
            $nomor              = "";
            $tanggal_masuk      = "";
            $tanggal_akad       = "";
            $status             = "";
            $dokumen            = "";
            $dokumen_jaminan    = "";
            $id_produk          = "";
            $periode            = "";
            $nilai_realisasi    = "";
            $jangka_waktu       = "";
            $jatuh_tempo        = "";
            $nisbah             = "";
            $nominal_nisbah     = "";
            $total_angsuran     = "";
            $total_angsuran_nisbah= "";
            $total_angsuran_keseluruhan= "";
            $persentase_kebijakan= "";
            $persentase_jaminan = "";
            $hasil_persentase   = "";
            $persentase_denda   = "";
            $id_karyawan        = "";
            $id_karyawan2       = "";
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?php
            $id                 = $list->id;
            $id_jaminan         = $list->id_jaminan;
            $id_produk_pembiayaan= $list->id_produk_pembiayaan;
            $nominal_pengajuan  = $list->nominal_pengajuan;
            $kegunaan           = $list->kegunaan;
            $id_jaminan         = $list->id_jaminan;
            $id_anggota         = $list->id_anggota;
            $tipe               = $list->tipe;
            $nilai              = $list->nilai;
            $nomor              = $list->nomor;
            $tanggal_masuk      = $list->tanggal_masuk;
            $tanggal_akad       = $list->tanggal_akad;
            $status             = $list->status;
            $dokumen            = $list->dokumen;
            $dokumen_jaminan    = $list->dokumen_jaminan;
            $id_produk          = $list->id_produk_pembiayaan;
            $periode            = $list->periode;
            $nilai_realisasi    = $list->nilai_realisasi;
            $jangka_waktu       = $list->jangka_waktu;
            $jatuh_tempo        = $list->jatuh_tempo;
            $nisbah             = $list->nisbah;
            $nominal_nisbah     = $list->nominal_nisbah;
            $total_angsuran     = $list->total_angsuran;
            $total_angsuran_nisbah= $list->total_angsuran_nisbah;
            $total_angsuran_keseluruhan= $list->total_angsuran_keseluruhan;
            $persentase_kebijakan= $list->persentase_kebijakan;
            $persentase_jaminan = $list->persentase_jaminan;
            $hasil_persentase   = $list->hasil_persentase;
            $persentase_denda   = $list->persentase_denda;
            $id_karyawan        = $list->id_karyawan;
            $id_karyawan2       = $list->id_karyawan2;
        }
        }?>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption pull-left">
                                        <a type="button" class="btn btn-default pull-left" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a><a>&nbsp;&nbsp;&nbsp;</a>
                                    </div>
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
                                    <form class="form-horizontal" name="formulir" action="<?=base_url('home');?><?php if ($aksi=='edit'||$aksi=='view'){ echo '/updatejaminan/'.$id; }else{ echo '/createjaminan/';} ?>" id="submit_form" method="POST" enctype="multipart/form-data">
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
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Data Pembiayaan </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step active">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Data Angsuran </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab5" data-toggle="tab" class="step">
                                                            <span class="number"> 5 </span>
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
                                                                <input type="text" class="form-control" name="id_jaminan" value="<?=$id_jaminan;?>" />
                                                                <span class="help-block"> ID ini sudah Otomatis terisi. </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment" value="1" data-title="1"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                                  <div id="form_payment_error1"> </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="tanggal_masuk" value="<?=$tanggal_masuk;?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Tanggal ini sudah Otomatis terisi dengan tanggal hari ini. </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment" value="2" data-title="2"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                                  <div id="form_payment_error2"> </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Anggota
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="bs-select form-control" data-live-search="true" id="id_anggota" name="id_anggota" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="" >--Pilih Anggota--</option>
                                                                  <?php foreach ($anggota->result() as $dd) { ?>
                                                                  <option value="<?=$dd->id?>" <?php if ($id_anggota==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->no_kta.') '.$dd->nama_depan.' '.$dd->nama_tengah.' '.$dd->nama_belakang;?></option>
                                                                  <?php }?>
                                                                </select>
                                                                <span class="help-block"> Pilih Anggota. </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Pembiayaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="bs-select form-control" data-live-search="true" id="id_produk_pembiayaan"  name="id_produk_pembiayaan" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="" >--Pilih Produk Pembiayaan--</option>
                                                                  <?php foreach ($produk->result() as $dd) { ?>
                                                                  <option value="<?=$dd->id?>" <?php if ($id_produk_pembiayaan==$dd->id){echo "selected";}else{echo "";} ?> ><?='('.$dd->id.') '.$dd->nama_produk_pembiayaan;?></option>
                                                                  <?php }?>
                                                                </select>
                                                                <span class="help-block"> Pilih Produk Pembiayaan. </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kegunaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="mt-radio-inline">
                                                                    <input type="hidden" name="kegunaan" value="kepala_akun" onclick="javascript:yesnoCheck2();" id="kepala" <?php if ($kegunaan=="kepala_akun"){echo "checked";}else{echo "checked";} ?>>
                                                                      <label class="mt-radio">
                                                                          <input type="radio" name="kegunaan" value="Modal Kerja" data-title="Modal Kerja" onclick="javascript:yesnoCheck2();" id="klasifikasi6" <?php if ($kegunaan=="Modal Kerja"){echo "checked";}else{echo "";} ?>> Modal Kerja
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="kegunaan" value="Investasi" data-title="Investasi" onclick="javascript:yesnoCheck2();" id="namaakun4" <?php if ($kegunaan=="Investasi"){echo "checked";}else{echo "";} ?>> Investasi
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="kegunaan" value="Konsumtif" data-title="Konsumtif" onclick="javascript:yesnoCheck2();" id="namaakun5" <?php if ($kegunaan=="Konsumtif"){echo "checked";}else{echo "";} ?>> Konsumtif
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="kegunaan" value="lainnya" onclick="javascript:yesnoCheck2();" id="namaakun6" <?php if ($kegunaan!="Modal Kerja" && $kegunaan!="Investasi" && $kegunaan!="Konsumtif" && $kegunaan!=""){echo "checked";}else{echo "";} ?>> Lainnya
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                                  <input type="text" placeholder="Lainnya" id="lainnya2" name="kegunaan" value="<?php if ($kegunaan!="Modal Kerja" && $kegunaan!="Investasi" && $kegunaan!="Konsumtif" && $kegunaan!=""){echo $kegunaan;}else{echo "";} ?>" disabled class="form-control" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Pilih Kegunaan </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
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
                                                                          <input type="radio" name="tipe" value="Tanah Bangunan" data-title="Tanah Bangunan" onclick="javascript:yesnoCheck();" id="klasifikasi" <?php if ($tipe=="Tanah Bangunan"){echo "checked";}else{echo "";} ?>> Tanah/Bangunan
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="tipe" value="Kendaraan" data-title="Kendaraan" onclick="javascript:yesnoCheck();" id="namaakun2" <?php if ($tipe=="Kendaraan"){echo "checked";}else{echo "";} ?>> Kendaraan
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-radio"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="tipe" value="lainnya" data-title="Lainnya" onclick="javascript:yesnoCheck();" id="namaakun" <?php if ($tipe!="Tanah Bangunan" && $tipe!="Kendaraan" && $tipe!=""){echo "checked";}else{echo "";} ?>> Lainnya
                                                                          <span></span>
                                                                      </label>
                                                                    <input type="text" id="lainnya" name="tipe" class="form-control" value="<?php if ($tipe!="Tanah Bangunan" && $tipe!="Kendaraan" && $tipe!=""){echo $tipe;}else{echo "";} ?>" placeholder="Lainnya" disabled >
                                                                  </div>
                                                                <span class="help-block"> Pilih Jenis Jaminan </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Dokumen Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="dokumen_jaminan" value="<?=$dokumen_jaminan;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Dokumen Jaminan </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nomor Dokumen
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="nomor" value="<?=$nomor;?>" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Nomor Dokumen </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Dokumen
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
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nominal Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="nilai" value="<?=$nilai;?>" class="form-control" placeholder="" id="text11" onkeyup="sum4();" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Nilai Jaminan </span>
                                                                <i class="form-control-feedback"></i>
                                                                <span class="text-warning" ></span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nominal Pembiayaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="mt-radio-inline">
                                                                    <input type="text" name="nilai_realisasi" value="<?=$nilai_realisasi;?>" class="form-control" id="text1" onkeyup="sum();sum4();" placeholder="" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? '': 'disabled'; ?>>
                                                                    <span class="help-block"> Isi dengan Nominal Pembiayaan </span>
                                                                <i class="form-control-feedback"></i>
                                                                <span class="text-warning" ></span>
                                                                </div>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Persentase Jaminan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="input-group">
                                                                    <input type="text" name="persentase_jaminan" value="<?=$persentase_jaminan;?>" id="text8" onkeyup="sum4();" class="form-control" placeholder="(Nominal Jaminan / Nominal Pembiayaan) * 100" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                    <span class="input-group-addon" id="sizing-addon1">%</span>
                                                                  </div>
                                                                <span class="help-block"> Persentase Jaminan </span>
                                                                <i class="form-control-feedback"></i>
                                                                <span class="text-warning" ></span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Persentase Produk Pembiayaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="input-group">
                                                                    <input type="text" name="persentase_kebijakan" value="<?=$persentase_kebijakan;?>" id="text9" onkeyup="sum4();" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                    <span class="input-group-addon" id="sizing-addon1">%</span>
                                                                  </div>
                                                                  <div id="form_persentase_kebijakan_error"> </div>
                                                                <span class="help-block"> Persentase Jaminan </span>
                                                                <i class="form-control-feedback"></i>
                                                                <span class="text-warning" ></span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                                  <div class="input-group">
                                                                    <input type="hidden" name="hasil_persentase" value="<?=$hasil_persentase;?>" id="text10" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                    
                                                                  </div>

                                                        <!--
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Hasil Persentase
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="input-group">
                                                                    <input type="text" name="hasil_persentase" value="<?=$hasil_persentase;?>" id="text10" class="form-control" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                    <span class="input-group-addon" id="sizing-addon1">%</span>
                                                                  </div>
                                                                <span class="help-block"> Persentase Jaminan </span>
                                                            </div>
                                                            <?php //if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox">
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php //} ?>
                                                        </div>
                                                    -->
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">Data Jaminan</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Tanggal Akad
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="tanggal_akad" value="<?=$tanggal_akad;?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Dokumen Jaminan </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Persentase Denda
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="input-group">
                                                                    <input type="text" class="form-control" name="persentase_denda" value="<?=$persentase_denda;?>" <?=($aksi=='view') ? 'disabled': ''; ?> aria-describedby="sizing-addon1">
                                                                    <span class="input-group-addon" id="sizing-addon1">%</span>
                                                                  </div>
                                                                <span class="help-block"> Isian ini otomatis terisi jika isian nisbah dan nominal realisasi terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Persentase Nisbah
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                  <div class="input-group">
                                                                    <input type="text" class="form-control" name="nisbah" value="<?=$nisbah;?>" id="text2" onkeyup="sum();" <?=($aksi=='view') ? 'disabled': ''; ?> aria-describedby="sizing-addon1">
                                                                    <span class="input-group-addon" id="sizing-addon1">%</span>
                                                                  </div>
                                                                <span class="help-block"> Isian ini otomatis terisi jika isian nisbah dan nominal realisasi terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Nominal Nisbah
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="nominal_nisbah" value="<?=$nominal_nisbah?>" placeholder="Nisbah x Nominal Realisasi" id="text3" onkeyup="sum2();" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? '': 'disabled'; ?>>
                                                                <span class="help-block"> Isian ini otomatis terisi jika isian nisbah dan nominal realisasi terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Data Angsuran</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Jatuh Tempo
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="jatuh_tempo" value="<?=$jatuh_tempo;?>" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Isi dengan tanggal Jatuh Tempo </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Periode
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="bs-select form-control" data-live-search="true" name="periode" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                  <option value="" <?php if ($periode==''){echo "selected";}else{echo "selected";} ?> >--Pilih Periode Angsuran--</option>
                                                                  <option value="bulanan" <?php if ($periode=='bulanan'){echo "selected";}else{echo "";} ?> >Bulanan</option>
                                                                  <option value="mingguan" <?php if ($periode=='mingguan'){echo "selected";}else{echo "";} ?> >Mingguan</option>
                                                                </select>
                                                                <span class="help-block"> Pilih Periode Angsuran </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Jangka Waktu
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="jangka_waktu" value="<?=$jangka_waktu;?>" class="form-control" placeholder="" id="text4" onkeyup="sum2();" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <span class="help-block"> Dokumen Jaminan </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Total Angsuran Pembiayaan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="total_angsuran" value="<?=$total_angsuran;?>" class="form-control" onkeyup="sum2();" placeholder="Nominal Realisasi / Jangka Waktu" id="text6" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? '': 'disabled'; ?>>
                                                                <span class="help-block"> Isian ini otomatis terisi jika nominal nisbah dan jangka waktu terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Total Angsuran Nisbah
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="total_angsuran_nisbah" value="<?=$total_angsuran_nisbah;?>" class="form-control" onkeyup="sum2();" placeholder="Nominal Nisbah / Jangka Waktu" id="text5" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? '': 'disabled'; ?>>
                                                                <span class="help-block"> Isian ini otomatis terisi jika nominal nisbah dan jangka waktu terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Total Angsuran Keseluruhan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="total_angsuran_keseluruhan" value="<?=$total_angsuran_keseluruhan;?>" class="form-control" placeholder="Total Angsuran Pembiayaan + Total Angsuran Nisbah" id="text7" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? '': 'disabled'; ?>>
                                                                <span class="help-block"> Isian ini otomatis terisi jika nominal nisbah dan jangka waktu terisi </span>
                                                            </div>
                                                            <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="checkbox" name="payment"> 
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                            </div>
                                                            <?php } ?>
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
                                                            <label class="control-label col-md-3">Kegunaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="kegunaan"> </p>
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
                                                            <label class="control-label col-md-3">Nomor Dokumen:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nomor"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nominal Jaminan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nilai"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nominal Pembiayaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nilai"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Persentase Jaminan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="persentase_jaminan"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Persentase Produk Pembiayaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="persentase_kebijakan"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Data Pembiayaan</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal Akad:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="persentase_denda"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Persentase Denda:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="persentase_denda"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Persentase Nisbah:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nisbah"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nominal Nisbah:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nominal_nisbah"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Data Angsuran</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jatuh Tempo:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="jatuh_tempo"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Periode:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="periode"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jangka Waktu:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="jangka_waktu"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Total Angsuran Pembiayaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="total_angsuran"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Total Angsuran Nisbah:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="total_angsuran_nisbah"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Total Angsuran Keseluruhan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="total_angsuran_keseluruhan"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Nama Karyawan</h4>
                                                        <?php $karyawan = $this->db->where('id',$this->session->userdata('id_karyawan'))->get('data_anggota')->row_array(); ?>
                                                        <?php if ($this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin'&& $aksi!='Create'){ ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Karyawan:</label>
                                                            <div class="col-md-4">
                                                                <?php $karyawan2 = $this->db->where('id',$id_karyawan)->get('data_anggota')->row_array(); ?>
                                                                <input type="hidden" name="id_karyawan" value="<?=$karyawan2['id'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <input type="text" name="nama_karyawan" value="<?=$karyawan2['no_kta'].'-'.$karyawan2['nama_depan'].' '.$karyawan2['nama_tengah'].' '.$karyawan2['nama_belakang'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Avalis:</label>
                                                            <div class="col-md-4">
                                                                <input type="hidden" name="id_karyawan2" value="<?=$karyawan['id'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <input type="text" name="nama_karyawan" value="<?=$karyawan['no_kta'].'-'.$karyawan['nama_depan'].' '.$karyawan['nama_tengah'].' '.$karyawan['nama_belakang'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Konfirmasi</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Status
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="mt-checkbox-inline">
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="status" value="Terima" data-title="Terima" id="namaakun2" <?php if($status=="Terima"){ echo "selected";}else{ echo "";} ?> > Terima
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="status" value="Tolak" data-title="Tolak" id="namaakun" <?php if($status=="Tolak"){ echo "selected";}else{ echo "";} ?>> Tolak
                                                                          <span></span>
                                                                      </label>
                                                                      <label class="mt-checkbox"><!--mt-radio-disabled-->
                                                                          <input type="radio" name="status" value="Batal" data-title="Batal" id="namaakun3" selected<?php if($status=="Batal"){ echo "selected";}else{ echo "";} ?>> Batal
                                                                          <span></span>
                                                                      </label>
                                                                  </div>
                                                                <span class="help-block"> Pilih Status Pengajuan Pembiayaan </span>
                                                            </div>
                                                        </div>
                                                        <?php }else{?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Karyawan:</label>
                                                            <div class="col-md-4">
                                                                <input type="hidden" name="status" value="Belum Konfimasi" class="form-control form-control-inline date-picker" placeholder="" <?=($aksi!='view'||$this->session->userdata('level')=='avalis'||$this->session->userdata('level')=='Admin'||$this->session->userdata('level')=='Super Admin') ? 'readonly': ''; ?>>
                                                                <input type="hidden" name="id_karyawan" value="<?=$karyawan['id'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                                <input type="text" name="nama_karyawan" value="<?=$karyawan['no_kta'].'-'.$karyawan['nama_depan'].' '.$karyawan['nama_tengah'].' '.$karyawan['nama_belakang'];?>" class="form-control form-control-inline" placeholder="" <?=($aksi=='view') ? 'disabled': ''; ?>>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <!--<a href="javascript:;" class="btn default">
                                                            Batal </a>-->
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Kembali </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Lanjutkan
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <!--<a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal" class="btn btn-outline green button-submit"> Lanjutkan
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>-->
                                                        
                                                        <input class="btn green button-submit" value="Simpan" name="simpan" type="submit" />
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
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('#id_produk_pembiayaan').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/pilih_produk_pembiayaan");?>'+'/'+countryID,
                //data:'kepala_akun='+countryID,
                success:function(html){
                    $('#text9').val(html);
                }
            }); 
        }else{
        }
    });

});

$('#text9').keyup(function() {
    $(this).val() // get the current value of the input field.
});
        //mengecek Hasil Persentasi
        $('#text10').blur(function(){
            var nama= $(this).val();
            var len= nama.length;
            if(nama=="<"){ //jika ada isinya
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Persentase Jaminan Lebih kecil dari Persentase Produk Pembiayaan");
                    return apply_feedback_error(this);
            } 
        });
</script>
                    <script src="<?=base_url('assets/backend');?>/bmt/scripts/jaminan-wizard-edit.js" type="text/javascript"></script>
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
      var txtFirstNumberValue2 = document.getElementById('text1').value;
      var txtSecondNumberValue2 = document.getElementById('text4').value;
      var result2 = parseInt(txtFirstNumberValue2) / parseInt(txtSecondNumberValue2);
      if (!isNaN(result2)) {
         document.getElementById('text6').value = result2;
      }
      var result3 = parseInt(result) + parseInt(result2);
      if (!isNaN(result3)) {
         document.getElementById('text7').value = result3;
      }
}
function sum4() {
      var pesan               = '';
      var txtFirstNumberValue = document.getElementById('text11').value;
      var txtSecondNumberValue = document.getElementById('text1').value;
      var result = (parseInt(txtFirstNumberValue) / parseInt(txtSecondNumberValue)) * 100 ;
      if (!isNaN(result)) {
         document.getElementById('text8').value = result;
      }
      var result2 = document.getElementById('text9').value;
      if (result > result2) {
         document.getElementById('text10').value = ">";
      }else if (result < result2) {
         document.getElementById('text8').value = result;
         document.getElementById('text10').value = "<";
         setTimeout(function(){pesan = 'Kesalahan pada Persentase jaminan yang lebih kecil dari Persentase Produk Pembiayaan\n';
         alert('Maaf, ada kesalahan pengisian Formulir : \n'+pesan);},100);
         
      }else if (result = result2) {
         document.getElementById('text10').value = "=";
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

function yesnoCheck2() {

    if (document.getElementById('klasifikasi6').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun4').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun5').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun6').checked){
      document.getElementById('lainnya2').disabled = '';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
    }
    

}
</script>