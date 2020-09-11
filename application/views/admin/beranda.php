                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <!-- <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349">0</span>
                                    </div>
                                    <div class="desc"> New Feedbacks </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">0</span>M$ </div>
                                    <div class="desc"> Total Profit </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549">0</span>
                                    </div>
                                    <div class="desc"> New Orders </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89"></span>% </div>
                                    <div class="desc"> Brand Popularity </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <?php
                        foreach ($perusahaan->result() as $list) {
                        $id                     = $list->id;
                        $nama_perusahaan        = $list->nama_lengkap;
                        $alamat                 = $list->alamat;
                        $kota                   = $list->kota;
                        $no_telepon             = $list->no_hp;
                        $email                  = $list->email;
                        }
                    ?>
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Identitas Peserta </a>
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
                                                    <h1 class="font-green sbold uppercase"><?=$nama_perusahaan;?></h1>
                                                    
                                                </div>
                                                <!--end col-md-12-->
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> Informasi Peserta </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="#tab_1_22" data-toggle="tab"> Visi, Misi dan Tujuan </a>
                                                    </li> -->
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
                                                                            Nama
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
                                                                            No HP
                                                                        </td>
                                                                        <td class="hidden-xs"> <?=$no_telepon;?> </td>
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
                                                    <!-- <div class="tab-pane" id="tab_1_22">
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
                                                                            <?php //=$visi_perusahaan;?>
                                                                        </div>
                                                                        <div id="tab_2" class="tab-pane">
                                                                            <?php //=$misi_perusahaan?>
                                                                        </div>
                                                                        <div id="tab_3" class="tab-pane">
                                                                            <?php //=$tujuan_perusahaan;?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
 -->                                                    <!--tab-pane-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_1-->
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->