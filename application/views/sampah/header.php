      <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url('operator');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Brevet </b>Terpadu</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='user-image' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='user-image' alt='User Image'>";
                    }?>
                  <span class="hidden-xs"><?=$this->session->userdata("nama")?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if ($this->session->userdata("image")=='') {
                      echo "<img src='".base_url('assets/image/noimagesuser.jpg')."' class='img-circle' alt='User Image'>";
                    }else{
                      echo "<img src='".base_url('assets/upload/operator/'.$this->session->userdata("image"))."' class='img-circle' alt='User Image'>";
                    }?>
                    <p>
                      <?=$this->session->userdata("nama")?>
                      <small><?=$this->session->userdata("level")?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url('home/user');?>" class="btn btn-default btn-flat">Edit</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url('home/logout');?>" class="btn btn-default btn-flat" onclick="return confirm('Apakah Anda yakin akan Logout?')">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>