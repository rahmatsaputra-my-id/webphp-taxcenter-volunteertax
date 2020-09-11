    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.html"><img src="<?=base_url('assets/file/gambar');?>/relawanpajak.png" alt="Brevet A & B Terpadu | Tax Center Universitas Gunadarma" width="120px" height="45px"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
<!--BEGIN-->
        <div class="header-navigation pull-right font-transform-inherit">
<?php 
$arrayMenu = array(
                 array(
                 'title-menu' => 'Beranda',
                 'url' => base_url().'index' ,
                 'kelas' => 'beranda',
                 'icon' => 'icon-home',
                 'child' => array()
                ),
                 /*array(
                 'title-menu' => 'Harga',
                 'url' => base_url().'index/harga',
                 'kelas' => 'harga',
                 'icon' => 'icon-home',
                 'child' => array()
             ),*/
             /*array(
                 'title-menu' => 'Galeri',
                 'url' => base_url().'index/galeri' ,
                 'kelas' => 'data',
                 'icon' => 'icon-graph',
                 'child' => array()
             ),*/
             array(
                 'title-menu' => 'Prosedur',
                 'url' => base_url().'index/prosedur' ,
                 'kelas' => 'prosedur',
                 'icon' => 'icon-home',
                 'child' => array()
             ),
             array(
                 'title-menu' => 'Tentang Kami',
                 'url' => base_url().'index/tentang' ,
                 'kelas' => 'tentang',
                 'icon' => 'icon-home',
                 'child' => array()
             ),
             array(
                 'title-menu' => 'Kontak Kami',
                 'url' => base_url().'index/kontak' ,
                 'kelas' => 'kontak',
                 'icon' => 'icon-home',
                 'child' => array()
             ),
             /*array(
                 'title-menu' => 'FAQ',
                 'url' => base_url().'index/faq' ,
                 'kelas' => 'faq',
                 'icon' => 'icon-home',
                 'child' => array()
             ),*/
             array(
                 'title-menu' => 'Registrasi',
                 'url' => base_url().'index/registrasi' ,
                 'kelas' => 'registrasi',
                 'icon' => 'icon-home',
                 'child' => array()
             ),
             array(
                 'title-menu' => 'Tax Center',
                 'url' => 'http://taxcenter.gunadarma.ac.id' ,
                 'kelas' => 'home',
                 'icon' => 'icon-home',
                 'child' => array()
             )
         );
 
 
 $menus = '<ul>'; 
 foreach ($arrayMenu as $key => $value) { 
      if ( $kelasroot == $value['kelas']){
        $menus .= '<li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                '.$value['title-menu'].'
              </a>';
      }elseif($kelassingle == $value['kelas']){
        $menus .= '<li class="active"><a href="'.$value['url'].'">'.$value['title-menu'].'</a></li>';
      }else{
        $menus .= '<li><a href="'.$value['url'].'">'.$value['title-menu'].'</a></li>';
      }
     # untuk mengetahui apakah menu utama memiliki sub menu atau tidak
     if( count($value['child']) > 0 ){
        if ( $kelasroot == $value['kelas']){
          $menus .= '<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                '.$value['title-menu'].'
              </a>
              <ul class="dropdown-menu">';
        }else{
          $menus .= '';
        } // pembuka submenu 
        foreach ($value['child'] as $key => $value) { 
        if ($kelas == $value['kelas']){
            $menus .= '<li class="active"><a href="'.$value['url'].'">'.$value['title-menu'].'</a></li>';
        }else{
            $menus .= '<li><a href="'.$value['url'].'">'.$value['title-menu'].'</a></li>'; 
        //<span class="selected"></span>
        }
        } 
 
         $menus .= '</ul>'; // penutup submenu
     }
 
 $menus .= '</li>'; 
 
 } 
 $menus .= '<!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
            </ul>'; 
 echo $menus; 
 ?>
 <!--END-->
        </div>
      </div>
    </div>
    <!-- Header END -->