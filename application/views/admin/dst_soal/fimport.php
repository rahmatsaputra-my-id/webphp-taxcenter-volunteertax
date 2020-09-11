<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings"></i>
            <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body table-both-scroll">
        <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2.$id_kursus);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
        <br/>
        <br/>
        <form action="<?=$link?>/uploadsoal/<?=$id_kursus?>" method="post" enctype="multipart/form-data">
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
                                    </div>
                                    <div class="form-group">
                                        <label>Ketentuan Import Data Soal</label><br/>
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
    </div>
</div>