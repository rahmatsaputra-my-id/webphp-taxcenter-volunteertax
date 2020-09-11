		<!-- Main content -->
        <!--<section class="content">
            <div class="error-content">
              <h3 align="center">Selamat Datang di</h3>
              <h2 class="headline text-blue" align="center">Kursus Brevet A&B Terpadu <br/><b>Tax Center | Universitas Gunadarma</b></h2>
            </div>
        </section>--><!-- /.content -->
<?=$this->session->flashdata('message');?>
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$judul;?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <table class="table">
                    <tr>
                      <td colspan='6' align="center"><strong>Profil Mahasiswa</strong></td>
                    </tr>
                    <?php foreach ($query->result() as $list) { ?>
                    <tr>
                      <td width='24%' align='right'>NPM</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->npm;?></td>
                      <td width='24%' align='right'>Kelas</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->kelas;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Nama Lengkap</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->nama_lengkap;?></td>
                      <td width='24%' align='right'>Jurusan</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->jurusan;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Jenis Kelamin</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->jk;?></td>
                      <td width='24%' align='right'>Fakultas</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->fakultas;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Tempat, Tanggal Lahir</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->tempat_lahir.', '.$list->tanggal_lahir;?></td>
                      <td width='24%' align='right'>Domisili Kampus</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->domisili;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Alamat</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->alamat;?></td>
                      <td width='24%' align='right'>Email</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->email;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Kota</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->kota;?></td>
                      <td width='24%' align='right'>No HP</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->no_hp;?></td>
                    </tr>
                    <!--<tr>
                      <td colspan='6' align='center'><a class="btn btn-warning" name="edit" href="<?php //base_url($linkupdate.$list->id);?>"><i class="fa fa-wrench fa-fw"></i>Edit Biodata Siswa</a></td>
                    </tr>-->
                    <?php }?>
                  </table>
                </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jadwal Kursus</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <table class="table">
                    <tr>
                      <td colspan='6' align="center"><strong>Jadwal Kursus</strong></td>
                    </tr>
                    <?php foreach ($query->result() as $list) { ?>
                    <tr>
                      <td width='24%' align='right'>Tanggal</td>
                      <td width='2%'>Jam</td>
                      <td width='24%'>Materi</td>
                      <td width='24%' align='right'>Pengajar</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->kelas;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Nama Lengkap</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->nama_lengkap;?></td>
                      <td width='24%' align='right'>Jurusan</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->jurusan;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Jenis Kelamin</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->jk;?></td>
                      <td width='24%' align='right'>Fakultas</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->fakultas;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Tempat, Tanggal Lahir</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->tempat_lahir.', '.$list->tanggal_lahir;?></td>
                      <td width='24%' align='right'>Domisili Kampus</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->domisili;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Alamat</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->alamat;?></td>
                      <td width='24%' align='right'>Email</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->email;?></td>
                    </tr>
                    <tr>
                      <td width='24%' align='right'>Kota</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->kota;?></td>
                      <td width='24%' align='right'>No HP</td>
                      <td width='2%'>:</td>
                      <td width='24%'><?=$list->no_hp;?></td>
                    </tr>
                    <!--<tr>
                      <td colspan='6' align='center'><a class="btn btn-warning" name="edit" href="<?php //base_url($linkupdate.$list->id);?>"><i class="fa fa-wrench fa-fw"></i>Edit Biodata Siswa</a></td>
                    </tr>-->
                    <?php }?>
                  </table>
                </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->