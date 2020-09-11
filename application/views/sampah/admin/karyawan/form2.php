        <?php if($aksi=='edit'){
            foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_perusahaan        = $list->nama_perusahaan;
            $deskripsi_perusahaan   = $list->deskripsi_perusahaan;
            $visi_perusahaan        = $list->visi_perusahaan;
            $misi_perusahaan        = $list->misi_perusahaan;
            $tujuan_perusahaan      = $list->tujuan_perusahaan;
            $alamat                 = $list->alamat;
            $kota                   = $list->kota;
            $kode_pos               = $list->kode_pos;
            $negara                 = $list->negara;
            $no_telepon             = $list->no_telepon;
            $fax                    = $list->fax;
            $email                  = $list->email;
        }
        }elseif($aksi=='create'){?>
        <?=form_open_multipart($link);
            $id                     = '';
            $nama_perusahaan        = '';
            $deskripsi_perusahaan   = '';
            $visi_perusahaan        = '';
            $misi_perusahaan        = '';
            $tujuan_perusahaan      = '';
            $alamat                 = '';
            $kota                   = '';
            $kode_pos               = '';
            $negara                 = '';
            $no_telepon             = '';
            $fax                    = '';
            $email                  = '';
        }elseif($aksi=='view'){
        foreach ($query->result() as $list)  { ?>
        <?=form_open_multipart($link.$list->id);
            $id                     = $list->id;
            $nama_perusahaan        = $list->nama_perusahaan;
            $deskripsi_perusahaan   = $list->deskripsi_perusahaan;
            $visi_perusahaan        = $list->visi_perusahaan;
            $misi_perusahaan        = $list->misi_perusahaan;
            $tujuan_perusahaan      = $list->tujuan_perusahaan;
            $alamat                 = $list->alamat;
            $kota                   = $list->kota;
            $kode_pos               = $list->kode_pos;
            $negara                 = $list->negara;
            $no_telepon             = $list->no_telepon;
            $fax                    = $list->fax;
            $email                  = $list->email;
        }
        }?>
<!-- Main content -->
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="profile">
                                <div class="form-group">
                                    <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                </div>
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Informasi Perusahaan </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Ubah Informasi Perusahaan </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="<?=base_url('assets/file')?>/gambar/noimagesuser.jpg" width="300px" class="img-responsive pic-bordered" alt="" />
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12 profile-info">
                                                    <h1 class="font-green sbold uppercase">BMT <?=$nama_perusahaan;?></h1>
                                                    <p> <?=$deskripsi_perusahaan;?></p>
                                                </div>
                                                <!--end col-md-12-->
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> Informasi Perusahaan </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_22" data-toggle="tab"> Visi, Misi dan Tujuan </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="20%">
                                                                            <i class="fa fa-briefcase"></i></th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i></th>                                                                 </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Nama Perusahaan
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$nama_perusahaan;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Alamat
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$alamat;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Kota
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$kota;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Kode Pos
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$kode_pos;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            No Telepon
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$no_telepon;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            No Fax
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$fax;?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Email
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$email;?> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                    <div class="tab-pane" id="tab_1_22">
                                                        <div class="tab-pane active" id="tab_1_1_1">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                                        <li class="active">
                                                                            <a data-toggle="tab" href="#tab_1">
                                                                                <i class="fa fa-briefcase"></i> Visi </a>
                                                                            <span class="after"> </span>
                                                                        </li>
                                                                        <li>
                                                                            <a data-toggle="tab" href="#tab_2">
                                                                                <i class="fa fa-group"></i> Misi </a>
                                                                        </li>
                                                                        <li>
                                                                            <a data-toggle="tab" href="#tab_3">
                                                                                <i class="fa fa-leaf"></i> Tujuan </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="tab-content">
                                                                        <div id="tab_1" class="tab-pane active">
                                                                            <?=$visi_perusahaan;?>
                                                                        </div>
                                                                        <div id="tab_2" class="tab-pane">
                                                                            <?=$misi_perusahaan?>
                                                                        </div>
                                                                        <div id="tab_3" class="tab-pane">
                                                                            <?=$tujuan_perusahaan;?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_1-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#tab_1-1">
                                                        <i class="fa fa-cog"></i> Informasi Perusahaan </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <!--<li>
                                                    <a data-toggle="tab" href="#tab_2-2">
                                                        <i class="fa fa-picture-o"></i> Ubah Gambar </a>
                                                </li>-->
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                        <div class="form-group">
                                                            <label class="control-label">Nama Perusahaan</label>
                                                            <input type="text" placeholder="" class="form-control" name="nama_perusahaan" value="<?=$nama_perusahaan;?>" /> 
                                                            <input type="hidden" placeholder="" class="form-control" name="id" value="<?=$id;?>" />

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Deskripsi Perusahaan</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="deskripsi_perusahaan"><?=$deskripsi_perusahaan;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Visi Perusahaan</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="visi_perusahaan"><?=$visi_perusahaan;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Misi Perusahaan</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="misi_perusahaan"><?=$misi_perusahaan;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tujuan Perusahaan</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="tujuan_perusahaan"><?=$tujuan_perusahaan;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Alamat</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="alamat"><?=$alamat;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Kota</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$kota;?>" name="kota"/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Kode Pos</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$kode_pos;?>" name="kode_pos"/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Negara</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$negara;?>" name="negara"/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">No Telepon</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$no_telepon;?>" name="no_telepon"/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Fax</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$fax;?>" name="fax"/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" placeholder="" class="form-control" value="<?=$email;?>" name="email"/> 
                                                        </div>
                                                        <div class="margiv-top-10">
                                                            <input class="btn green button-submit" value="Simpan Perubahan" name="simpan" type="submit" onclick="return confirm('Apakah Anda yakin data ini benar?')"/>
                                                            <a href="javascript:;" class="btn default"> Batal </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <form action="#" role="form">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Pilih Gambar </span>
                                                                        <span class="fileinput-exists"> Ubah </span>
                                                                        <input type="file" name="..."> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Buang </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <a href="javascript:;" class="btn green"> Simpan </a>
                                                            <a href="javascript:;" class="btn default"> Batal </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                  </form>