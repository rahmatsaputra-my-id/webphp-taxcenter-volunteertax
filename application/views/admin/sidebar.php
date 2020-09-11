            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<?php 
            $arrayMenu = array(
                 array(
                 'title-menu' => 'Beranda',
                 'url' => 'index' ,
                 'kelas' => 'beranda',
                 'icon' => 'icon-home',
                 'child' => array()
                ),
                 array(
                 'title-menu' => 'File',
                 'url' => 'index',
                 'kelas' => 'file',
                 'icon' => 'icon-home',
                 'child' => array(
                         array(
                                 'title-menu' => 'Import Data',
                                 'url' => 'import_data',
                                 'icon' => 'icon-login',
                                 'kelas'=>'import_data'
                         ),
                         array(
                             'title-menu' => 'Export Data',
                             'url' => 'export_data',
                             'icon' => 'icon-logout',
                             'kelas' => 'export_data'
                         ),
                         ),
                 ),
                 array(
                 'title-menu' => 'Akuntansi',
                 'url' => 'index',
                 'kelas' => 'akuntansi',
                 'icon' => 'icon-home',
                 'child' => array(
                         /*array(
                                 'title-menu' => 'Daftar COA / Akun',
                                 'url' => 'import_data',
                                 'icon' => 'icon-login',
                                 'kelas'=>'akun'
                         ),*/
                         array(
                             'title-menu' => 'Jurnal Umum',
                             'url' => 'jurnal_umum_akuntansi',
                             'icon' => 'icon-logout',
                             'kelas' => 'jurnal_umum_akuntansi'
                         ),
                         array(
                             'title-menu' => 'Daftar Jurnal',
                             'url' => 'export_data',
                             'icon' => 'icon-logout',
                             'kelas' => 'daftar_jurnal_akuntansi'
                         ),
                         array(
                             'title-menu' => 'Buku Besar',
                             'url' => 'export_data',
                             'icon' => 'icon-logout',
                             'kelas' => 'buku_besar'
                         ),
                         ),
                 ),
                 array(
                 'title-menu' => 'Bank',
                 'url' => 'index',
                 'kelas' => 'bank',
                 'icon' => 'icon-home',
                 'child' => array(
                         array(
                                 'title-menu' => 'Pengeluaran',
                                 'url' => 'pengeluaran_bank',
                                 'icon' => 'icon-login',
                                 'kelas'=>'pengeluaran_bank'
                         ),
                         array(
                             'title-menu' => 'Penerimaan',
                             'url' => 'penerimaan_bank',
                             'icon' => 'icon-logout',
                             'kelas' => 'penerimaan_bank'
                         ),
                         array(
                             'title-menu' => 'Daftar Jurnal',
                             'url' => 'daftar_jurnal_bank',
                             'icon' => 'icon-logout',
                             'kelas' => 'daftar_jurnal_bank'
                         ),
                         ),
                 ),
                 array(
                 'title-menu' => 'Pendanaan',
                 'url' => 'index',
                 'kelas' => 'pendanaan',
                 'icon' => 'icon-home',
                 'child' => array(
                         array(
                                 'title-menu' => 'Simpanan',
                                 'url' => 'simpanan',
                                 'icon' => 'icon-login',
                                 'kelas'=>'simpanan'
                         ),
                         array(
                             'title-menu' => 'Penarikan',
                             'url' => 'penarikan',
                             'icon' => 'icon-logout',
                             'kelas' => 'penarikan'
                         ),
                         array(
                             'title-menu' => 'Daftar Transaksi',
                             'url' => 'daftar_jurnal_pendanaan',
                             'icon' => 'icon-logout',
                             'kelas' => 'daftar_jurnal_pendanaan'
                         ),
                         ),
                 ),
                 array(
                 'title-menu' => 'Pembiayaan',
                 'url' => 'index',
                 'kelas' => 'pembiayaan',
                 'icon' => 'icon-home',
                 'child' => array(
                         array(
                                 'title-menu' => 'Pengajuan Pinjaman',
                                 'url' => 'jaminan',
                                 'icon' => 'icon-login',
                                 'kelas'=>'jaminan'
                         ),
                         array(
                             'title-menu' => 'Pinjaman',
                             'url' => 'pinjaman',
                             'icon' => 'icon-logout',
                             'kelas' => 'pinjaman'
                         ),
                         array(
                             'title-menu' => 'Angsuran',
                             'url' => 'angsuran',
                             'icon' => 'icon-logout',
                             'kelas' => 'angsuran'
                         ),
                         array(
                             'title-menu' => 'Daftar Transaksi',
                             'url' => 'daftar_jurnal_pembiayaan',
                             'icon' => 'icon-logout',
                             'kelas' => 'daftar_jurnal_pembiayaan'
                         ),
                         ),
                 ),
                 /*array(
                 'title-menu' => 'Harta Tetap',
                 'url' => 'index',
                 'kelas' => 'harta_tetap',
                 'icon' => 'icon-home',
                 'child' => array(
                         array(
                                 'title-menu' => 'Daftar Harta Tetap',
                                 'url' => 'import_data',
                                 'icon' => 'icon-login',
                                 'kelas'=>'daftar_harta_tetap'
                         ),
                         array(
                             'title-menu' => 'Jurnal Penyesuaian',
                             'url' => 'export_data',
                             'icon' => 'icon-logout',
                             'kelas' => 'jurnal penyesuaian'
                         ),
                         array(
                             'title-menu' => 'Daftar Jurnal',
                             'url' => 'export_data',
                             'icon' => 'icon-logout',
                             'kelas' => 'daftar_jurnal_harta'
                         ),
                         ),
                 ),*/
                 array(
                     'title-menu' => 'Data',
                     'url' => 'data' ,
                     'kelas' => 'data',
                     'icon' => 'icon-graph',
                     'child' => array(
                             array(
                                 'title-menu' => 'Anggota',
                                 'url' => 'anggota',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'anggota'
                             ),
                             array(
                                 'title-menu' => 'Karyawan',
                                 'url' => 'karyawan',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'karyawan'
                             ),
                             array(
                                 'title-menu' => 'Produk Pendanaan',
                                 'url' => 'produk_pendanaan',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'produk_pendanaan'
                             ),
                             array(
                                 'title-menu' => 'Produk Pembiayaan',
                                 'url' => 'produk_pembiayaan',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'produk_pembiayaan'
                             ),
                             array(
                                 'title-menu' => 'Departemen',
                                 'url' => 'departemen',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'departemen'
                             ),
                             array(
                                 'title-menu' => 'Lokasi',
                                 'url' => 'lokasi',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'lokasi'
                             ),
                             /*array(
                                 'title-menu' => 'Pajak',
                                 'url' => 'pajak',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'pajak'
                             ),
                             array(
                                 'title-menu' => 'Mata Uang',
                                 'url' => 'uang',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'uang'
                             ),*/
                             array(
                                 'title-menu' => 'Harta Tetap',
                                 'url' => 'harta',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'harta'
                             ),
                     ),
                 ),
                 array(
                     'title-menu' => 'Akun',
                     'url' => 'akun',
                     'icon' => 'icon-logout',
                     'kelas' => 'akun',
                     'child' => array(
                             array(
                                 'title-menu' => 'Kepala Akun',
                                 'url' => 'kepala_akun',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'kepala_akun'
                             ),
                             array(
                                 'title-menu' => 'Klasifikasi Akun',
                                 'url' => 'klasifikasi_akun',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'klasifikasi_akun'
                             ),
                             array(
                                 'title-menu' => 'Nama Akun',
                                 'url' => 'nama_akun',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'nama_akun'
                             ),
                    )
                 ),
                 array(
                     'title-menu' => 'Setup',
                     'url' => 'saldo' ,
                     'kelas' => 'saldo',
                     'icon' => 'icon-home',
                     'child' => array(
                             array(
                                 'title-menu' => 'Saldo Awal',
                                 'url' => 'saldo',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'saldo'
                             ),
                             array(
                                 'title-menu' => 'SHU',
                                 'url' => 'shu',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'shu'
                             ),
                             array(
                                 'title-menu' => 'Periode Akuntansi',
                                 'url' => 'periode_akuntansi',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'periode_akuntansi'
                             ),
                             array(
                                 'title-menu' => 'Informasi Perusahaan',
                                 'url' => 'perusahaan',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'perusahaan'
                             ),
                             array(
                                 'title-menu' => 'Link Akun',
                                 'url' => 'link',
                                 'icon' => 'icon-logout',
                                 'kelas' => 'link'
                             ),
                    )
                 ),
                 array(
                     'title-menu' => 'Help',
                     'url' => 'help' ,
                     'kelas' => 'help',
                     'icon' => 'icon-home',
                     'child' => array()
                 )
         );
 
 
 $menus = '<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">'; 
 foreach ($arrayMenu as $key => $value) { 
    
     if ( $kelasroot == $value['kelas']){
     $menus .= '<li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="'.$value['icon'].'"></i>
                                <span class="title">'.$value['title-menu'].'</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>';
    }elseif($kelassingle == $value['kelas']){
        $menus .= '<li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="'.$value['icon'].'"></i>
                                <span class="title">'.$value['title-menu'].'</span>
                                <span class="selected"></span>';
    }else{
    //active open
     $menus .= '<li class="nav-item start ">
                            <a href="'.base_url().'home/'.$value['url'].'" class="nav-link nav-toggle">
                                <i class="'.$value['icon'].'"></i>
                                <span class="title">'.$value['title-menu'].'</span>';
    //<span class="selected"></span>
    //                            <span class="arrow open"></span>
     }
     # untuk mengetahui apakah menu utama memiliki sub menu atau tidak
     if( count($value['child']) > 0 ){
        //active open
        if ( $kelasroot == $value['kelas']){
            $menus .= '     </a>
                            <ul class="sub-menu">';
        }elseif($kelassingle == $value['kelas']){
            $menus .= '     </a>
                            <li>';
        }else{
            $menus .= '<span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">';
        } // pembuka submenu 
        foreach ($value['child'] as $key => $value) { 
        if ($kelas == $value['kelas']){
            $menus .= '<li class="nav-item start active open">
                                    <a href="'.base_url().'home/'.$value['url'].'" class="nav-link ">
                                        <i class="'.$value['icon'].'"></i>
                                        <span class="title">'.$value['title-menu'].'</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                ';
        }else{
            $menus .= '<li class="nav-item start ">
                                    <a href="'.base_url().'home/'.$value['url'].'" class="nav-link ">
                                        <i class="'.$value['icon'].'"></i>
                                        <span class="title">'.$value['title-menu'].'</span>
                                    </a>
                                </li>'; 
        //<span class="selected"></span>
        }
        } 
 
         $menus .= '</ul>'; // penutup submenu
     }
 
 $menus .= '</a></li>'; 
 
 } 
 $menus .= '</ul>'; 
 echo $menus; 
 ?>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->