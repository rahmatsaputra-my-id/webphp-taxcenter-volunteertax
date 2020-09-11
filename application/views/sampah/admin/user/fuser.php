            <?php foreach($query->result() as $row){ ?>
            <?php 

                function decryptIt( $q ) {
                    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
                    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
                    return( $qDecoded );
                }
            ?>
            <?= form_open('operator/home/proses_updateuser/'.$row->id) ?>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="text" name="email" value="<?=($row->email);?>" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <?php
                                        $password = $row->password;
                                        $npassword = decryptIt($password);
                                        ?>
                                        <input type="password" name="password" value="<?=($npassword);?>" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                    <?php }?>
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