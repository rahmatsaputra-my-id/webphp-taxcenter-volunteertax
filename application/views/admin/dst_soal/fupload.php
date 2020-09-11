        <?php foreach ($query->result() as $list) { ?>
            <?=form_open_multipart($link.$list->id);
            $id                 = $list->id;
            $image              = $list->gambar;
        }?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings"></i>
            <span class="caption-subject bold uppercase"><?=$judul ?></span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body table-both-scroll">
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
                                  <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2.$id_kursus);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                </div>
                                <div class="form-group">
                                  <input type="hidden" name="id" value="<?=$id;?>" class="form-control" placeholder="id">
                                </div>
                                <div class="form-group">
                                    <label>File Gambar</label>
                                    <input type="file" name="image" value="<?=$image;?>" class="form-control" placeholder="id">
                                </div>
                                <input type="submit" class="btn btn-default" name="simpan" value="Simpan" onclick="return confirm('Apakah Anda yakin data ini benar?')">
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