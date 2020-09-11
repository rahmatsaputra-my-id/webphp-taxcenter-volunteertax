<!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='img-circle' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='img-circle' alt='User Image'>";
                    }?>
            </div>
            <div class="pull-left info">
              <a>Nama &nbsp;&nbsp;&nbsp;: &nbsp; <?=$this->session->userdata("nama")?></a><br/>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
			<?php
				$sess_array = $this->session->userdata('level');
				$uri2 = $this->uri->segment(2);
				
				$menu = array();
				
				if ($sess_array == "Mahasiswa"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
						array("icon"=>"check-square-o", "url"=>"pretest", "text"=>"Pretest"),
						array("icon"=>"user", "url"=>"profile", "text"=>"Profile"),
						//array("icon"=>"newspaper-o", "url"=>"post", "text"=>"Berita"),
						array("icon"=>"file-pdf-o", "url"=>"modul", "text"=>"Modul"),
						//array("icon"=>"male", "url"=>"pengajar", "text"=>"Pengajar"),
						array("icon"=>"calendar", "url"=>"jadwal", "text"=>"Jadwal"),
						//array("icon"=>"dashboard", "url"=>"nilai", "text"=>"Nilai"),
					);
				} else if ($sess_array == "Admin"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
						array("icon"=>"edit", "url"=>"a_post", "text"=>"Posting"),
						array("icon"=>"book", "url"=>"a_modul", "text"=>"Modul"),
						array("icon"=>"newspaper-o", "url"=>"kategorisoal", "text"=>"Kategori Soal"),
						//array("icon"=>"newspaper-o", "url"=>"kursus2", "text"=>"Soal"),
						array("icon"=>"calendar", "url"=>"ujian", "text"=>"Ujian"),
						//array("icon"=>"calendar", "url"=>"hasil_ujian", "text"=>"Hasil Ujian"),
						array("icon"=>"user", "url"=>"mahasiswa", "text"=>"Mahasiswa"),
						array("icon"=>"male", "url"=>"a_pengajar", "text"=>"Pengajar"),
						array("icon"=>"book", "url"=>"kursus", "text"=>"Kursus"),
						array("icon"=>"book", "url"=>"workshop", "text"=>"Workshop"),
						array("icon"=>"calendar", "url"=>"gelombang", "text"=>"Gelombang"),
						array("icon"=>"calendar", "url"=>"aspekpenilaian", "text"=>"Aspek Penilaian"),
						array("icon"=>"calendar", "url"=>"a_jadwal", "text"=>"Jadwal"),
						array("icon"=>"check-square-o", "url"=>"a_input_nilai", "text"=>"Input Nilai"),
						array("icon"=>"book", "url"=>"up", "text"=>"Username Password"),
					);
				} else if ($sess_array == "Pengajar"){
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
						array("icon"=>"book", "url"=>"p_profile", "text"=>"Profile"),
						array("icon"=>"newspaper-o", "url"=>"post", "text"=>"Berita"),
						array("icon"=>"file-pdf-o", "url"=>"a_modul", "text"=>"Modul"),
						array("icon"=>"calendar", "url"=>"p_jadwal", "text"=>"Jadwal"),
						array("icon"=>"check-square-o", "url"=>"input_nilai", "text"=>"Input Nilai"),
					);
				} else {
					$menu = array(
						array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
					);
				}
				
			?>
		  
		  
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			
			<?php
				foreach ($menu as $m){
					if ($uri2 == $m['url']){
						echo '<li class="treeview active"><a href="'.base_url().'home/'.$m['url'].'"><i class="fa fa-'.$m['icon'].'"></i> <span>'.$m['text'].'</span></a></li>';
					}else{
						echo '<li class="treeview"><a href="'.base_url().'home/'.$m['url'].'"><i class="fa fa-'.$m['icon'].'"></i> <span>'.$m['text'].'</span></a></li>';
					}
				}
			?>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>