<?php 
foreach ($query2->result() as $row){
  $id                 = $row->id;
  $tgl_mulai          = $row->tgl_mulai;
  $tgl_selesai        = $row->tgl_selesai;
}
?>
<script>
// Set the date we're counting down to
var countDownDate = new Date('<?=$tgl_selesai; ?>').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        alert("Waktu Anda telah habis");
        document.location.href="<?=base_url().$link?>";
    }
}, 1000);
</script>
<div class="alert alert-danger">
  Waktu mengerjakan tinggal : <div id="demo"></div>
</div>
<!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption pull-left">
                                        <!-- <a type="button" class="btn btn-default pull-left" name="add" href="<?php //=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a><a>&nbsp;&nbsp;&nbsp;</a> -->
                                    </div>
                                    <div class="caption">
                                        <span class="caption-subject font-red bold uppercase"> Pretest Online </span>
                                    </div>
                                    <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>-->
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps" >
                                            <?php
                                                $jumlah=$query->num_rows($hasil);
                                                for ($i=0; $i<$jumlah; $i++){
                                                    ?>
                                                    <li>
                                                        <a href="#tab<?=$i;?>" data-toggle="tab" class="step">
                                                            <span class="number"> <?=$i;?> </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Pengajuan Pembiayaan </span>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            ?>
                                            </ul>
                                            <div class="tab-content">
                                    <?=form_open_multipart($link, array('id' => 'formsoal')); ?>
                                    <?php 
                                    $hasil=$query;
                                    $jumlah=$query->num_rows($hasil);
                                    $urut=0;
                                    $urut2=0;
                                    foreach ($query->result() as $row)
                                    { 
                                        ?>
                                        <?php
                                              echo '<div class="tab-pane" id="tab'.$urut2=$urut2+1; echo '">';
                                              echo '<input type="hidden" name="id[]" value='.$row->id.'>';
                                              echo '<input type="hidden" name="id_kategori[]" value='.$row->id_kategori.'>';
                                              echo '<div class="step well">';
                                              if (!empty($row->gambar)) {
                                                echo '
                                                <table>
                                                  <tbody>
                                                    <tr>
                                                      <td colspan="2"><img src="'.base_url('assets/upload').'/soal/'.$row->gambar.' width="200" hight="200"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>'.$urut=$urut+1; echo '.&nbsp;</p></td>
                                                        <td>'.$row->soal.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="A">&nbsp;</td>
                                                        <td>A. '.$row->opsi_a.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="B">&nbsp;</td>
                                                        <td>B. '.$row->opsi_b.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="C">&nbsp;</td>
                                                        <td>C. '.$row->opsi_c.'</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input name="pilihan['.$row->id.']" type="radio" value="D">&nbsp;</td>
                                                        <td>D. '.$row->opsi_d.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="E">&nbsp;</td>
                                                        <td>E. '.$row->opsi_e.'</td>
                                                    </tr>
                                                  </tbody>
                                                </table>';
                                              }else{
                                                echo '
                                                <table>
                                                  <tbody>
                                                    <tr>
                                                        <td><p>'.$urut=$urut+1; echo '.&nbsp;</p></td>
                                                        <td>'.$row->soal.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="A">&nbsp;</td>
                                                        <td>A. '.$row->opsi_a.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="B">&nbsp;</td>
                                                        <td>B. '.$row->opsi_b.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="C">&nbsp;</td>
                                                        <td>C. '.$row->opsi_c.'</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input name="pilihan['.$row->id.']" type="radio" value="D">&nbsp;</td>
                                                        <td>D. '.$row->opsi_d.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pilihan['.$row->id.']" type="radio" value="E">&nbsp;</td>
                                                        <td>E. '.$row->opsi_e.'</td>
                                                    </tr>
                                                  </tbody>
                                                </table>';
                                              }
                                              echo '</div>
                                                </div>';
                                            }
                                              echo '<input type="hidden" name="jumlah" value='.$jumlah.'>';
                                            ?>
                                            </form>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <!--<a href="javascript:;" class="btn default">
                                                        Batal </a>-->
                                                    <a href="javascript:;" class="btn default button-previous">
                                                        <i class="fa fa-angle-left"></i> Kembali </a>
                                                    <a href="javascript:;" class="btn btn-outline green button-next"> Lanjutkan
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <!--<a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal" class="btn btn-outline green button-submit"> Lanjutkan
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>-->
                                                    
                                                    <input class="btn green button-submit" value="Simpan" name="simpan" type="submit" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')" />
                                                    <!--<a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
                                                    </a>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>