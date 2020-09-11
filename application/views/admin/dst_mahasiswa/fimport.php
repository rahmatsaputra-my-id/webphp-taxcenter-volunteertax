<!-- Main content -->
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
        <form action="<?=$link?>/uploadsis" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $judul ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                    </div>
                                    <div class="form-group">
                                        <label>Ketentuan Import Data Siswa</label><br/>
                                        1. Download file ini terlebih dahulu, dan sudah terdapat salah satu contoh. </br>
                                        2. Ukuran file tidak lebih dari 100MB.<br/>
                                        3. Format file berupa xls|xlsx|csv.<br/>
                                    </div>
                                    <div class="form-group">
                                        <label>File Import</label>
                                        <input type="file" name="file">
                                    </div>
                                    <button type="submit" class="btn btn-default" name="simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">Simpan</button>
                                    <button type="reset" class="btn btn-default">Reset</button>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->