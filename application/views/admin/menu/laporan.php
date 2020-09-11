
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp sbold"><?=$judul;?></span>
                            </div>
                        </div>
                        <div class="portlet-body">

                        <div class="tabbable tabbable-tabdrop">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">Laporan Keuangan</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">Buku besar</a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">Kas Dan Bank</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="tiles">
                                        <a href="<?=base_url('home/nama_akun2');?>">
                                            <div class="tile double bg-blue-hoki">
                                                <div class="tile-body">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Saldo Awal </div>
                                                </div>
                                            </div>
                                        </a><!-- 
                                        <a href="<?php //=base_url('home/periode_shu');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> SHU </div>
                                                </div>
                                            </div>
                                        </a> -->
                                        <a href="<?=base_url('home/akun_penting');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Akun Penting </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/updateperusahaan').'/'.$this->session->userdata('id_perusahaan');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Informasi Perusahaan </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Tutup Buku </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="tiles">
                                        <a href="<?=base_url('home/nama_akun2');?>">
                                            <div class="tile double bg-blue-hoki">
                                                <div class="tile-body">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Saldo Awal </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/periode_shu');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> SHU </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/akun_penting');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Akun Penting </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/updateperusahaan').'/'.$this->session->userdata('id_perusahaan');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Informasi Perusahaan </div>
                                                </div>
                                            </div>
                                        </a><!-- 
                                        <a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Tutup Buku </div>
                                                </div>
                                            </div>
                                        </a> -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="tiles">
                                        <a href="<?=base_url('home/nama_akun2');?>">
                                            <div class="tile double bg-blue-hoki">
                                                <div class="tile-body">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Saldo Awal </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/periode_shu');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> SHU </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/akun_penting');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Akun Penting </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=base_url('home/updateperusahaan').'/'.$this->session->userdata('id_perusahaan');?>">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Informasi Perusahaan </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal">
                                            <div class="tile double bg-red-sunglo">
                                                <div class="tile-body">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="tile-object">
                                                    <div class="name"> Tutup Buku </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->