
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container-fluid">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="<?=base_url();?>"><img src="<?=base_url('assets/file/gambar');?>/relawanpajak.png" style="width:130px;height:50px" alt="logo" class="logo-default" /> </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                                        
                                        <li class="droddown dropdown-separator">
                                            <span class="separator"></span>
                                        </li>
                                        <!-- END INBOX DROPDOWN -->
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <img alt="" class="img-circle" src="<?=base_url('assets');?>/file/gambar/noimagesuser.jpg" />
                                                <!-- <span class="username username-hide-mobile">Nick</span> -->
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="page_user_profile_1.html">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <!-- <li>
                                                    <a href="app_calendar.html">
                                                        <i class="icon-calendar"></i> My Calendar </a>
                                                </li>
                                                <li>
                                                    <a href="app_inbox.html">
                                                        <i class="icon-envelope-open"></i> My Inbox
                                                        <span class="badge badge-danger"> 3 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="app_todo_2.html">
                                                        <i class="icon-rocket"></i> My Tasks
                                                        <span class="badge badge-success"> 7 </span>
                                                    </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="page_user_lock_1.html">
                                                        <i class="icon-lock"></i> Lock Screen </a>
                                                </li> -->
                                                <li>
                                                    <a href="<?=base_url();?>home/logout">
                                                        <i class="icon-key"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container-fluid">
                                <!-- BEGIN HEADER SEARCH BOX -->
                                <!-- <form class="search-form" action="page_general_search.html" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="query">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form> -->
                                <!-- END HEADER SEARCH BOX -->
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <!-- BEGIN LOGO -->
                                
                                <!-- END LOGO -->
                                <div class="hor-menu  ">
                                    <?php $query1=$this->db->where('id_tabel',$this->session->userdata('id_tabel'))->get('user');foreach ($query1->result() as $karyawan ){$akses=$karyawan->level;}?>
                                    <?php if($akses=='Admin' || $akses=='Super Admin'){ ?>
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Beranda'){ echo 'active';}?>">
                                            <a href="<?=base_url();?>"> Beranda
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Kursus'){ echo 'active';}?>">
                                            <a href="<?=base_url('home/kursus');?>"> Event
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Ujian'){ echo 'active';}?>">
                                            <a href="<?=base_url('home/ujian');?>"> Ujian
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Mahasiswa'){ echo 'active';}?>">
                                            <a href="<?=base_url('home/mahasiswa');?>"> Mahasiswa
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                        <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="javascript:;">
                                                <i class="icon-briefcase"></i> Pages
                                                <span class="arrow"></span>
                                            </a>
                                        </li> -->
                                    </ul>
                                    <?php } ?><?php if($akses=='Mahasiswa'){ ?>
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Beranda'){ echo 'active';}?>">
                                            <a href="<?=base_url();?>"> Beranda
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown <?php if($nav=='Soal Pretest'){ echo 'active';}?>">
                                            <a href="<?=base_url('home/pretest');?>"> Ujian
                                                <!-- <span class="arrow"></span> -->
                                            </a>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>