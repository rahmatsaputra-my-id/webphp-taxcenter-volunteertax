<?php 
foreach ($query2->result() as $row){
  $id                 = $row->id;
  $tgl_mulai          = $row->tgl_mulai;
  $tgl_selesai        = $row->tgl_selesai;
}
?>
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script>
// Set the date we're counting down to
var countDownDate = new Date('<?=$tgl_selesai; ?>').getTime();

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;

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
        /*$('#submit_form').submit(function(){
            alert("AAABBBIIIISSSSS CCCCOOOOYYYYY");
        });*/
        //document.formulir.submit;
        //var frmSoal = document.getElementById('submit_form');
        //frmSoal.submit();
        document.formulir.submit.click();
    }
}, 1000);
</script>                    
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row" id="form_wizard_1">
                        <div class="col-md-8">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption pull-left">
                                        <a type="button" class="btn btn-default pull-left" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a><a>&nbsp;&nbsp;&nbsp;</a>
                                    </div>
                                    <div class="caption">
                                        <span class="caption-subject font-red bold uppercase"> Ujian Online </span>
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
                                    <form class="form-horizontal" name="formulir" action="<?=base_url().$link;?>" id="submit_form" method="POST" enctype="multipart/form-data">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                              <div class="mega-menu-content">
                                              </div>
                                                <div class="tab-content">
                                                    <?php //=form_open_multipart($link, array('id' => 'formsoal')); ?>
                                    <?php 
                                    $hasil=$query;
                                    $jumlah=$query->num_rows($hasil);
                                    $urut=0;
                                    $urut2=0;
                                    foreach ($query->result() as $row)
                                    { 
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
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <!--<a href="javascript:;" class="btn default">
                                                            Batal </a>-->
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Sebelumnya </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Selanjutnya
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <!--<a data-toggle="modal" href="#draggable" data-target="#draggable" data-toggle="modal" class="btn btn-outline green button-submit"> Lanjutkan
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>-->
                                                        
                                                        <input class="btn green button-submit" value="Simpan" name="simpan" id="submit" type="submit" />
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
                        <div class="col-md-4">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption pull-left">
                                    </div>
                                    <div class="caption">
                                        <span class="caption-subject font-red bold uppercase"> Ujian Online </span>
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
                                              <div class="alert alert-danger">
                                                Waktu mengerjakan tinggal : <div id="demo"></div>
                                              </div>
                                              <div class="mega-menu-content">
                                                <ul class="mega-menu-submenu steps" >
                                                <?php
                                                    $hasil=$query;
                                                    $jumlah=$query->num_rows($hasil);
                                                    for ($i=1; $i<=$jumlah; $i++){
                                                        ?>
                                                        <li>
                                                            <a href="#tab<?=$i;?>" data-toggle="tab" class="step" style="padding:1px 1px;">
                                                                <span class="number"> <?=$i;?> </span>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                ?>
                                                </ul>
                                              </div>
                                                <div class="tab-content">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
<script src="<?=base_url('assets/backend');?>/bmt/scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('#id_produk_pembiayaan').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?=base_url("home/pilih_produk_pembiayaan");?>'+'/'+countryID,
                //data:'kepala_akun='+countryID,
                success:function(html){
                    $('#text9').val(html);
                }
            }); 
        }else{
        }
    });

});

$('#text9').keyup(function() {
    $(this).val() // get the current value of the input field.
});
        //mengecek Hasil Persentasi
        $('#text10').blur(function(){
            var nama= $(this).val();
            var len= nama.length;
            if(nama=="<"){ //jika ada isinya
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Persentase Jaminan Lebih kecil dari Persentase Produk Pembiayaan");
                    return apply_feedback_error(this);
            } 
        });
</script>
                    <script src="<?=base_url('assets/backend');?>/bmt/scripts/jaminan-wizard-edit.js" type="text/javascript"></script>
                    <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('text1').value;
      var txtSecondNumberValue = document.getElementById('text2').value;
      var result = parseInt(txtFirstNumberValue) * (parseInt(txtSecondNumberValue) / 100);
      if (!isNaN(result)) {
         document.getElementById('text3').value = result;
      }
}
function sum2() {
      var txtFirstNumberValue = document.getElementById('text3').value;
      var txtSecondNumberValue = document.getElementById('text4').value;
      var result = parseInt(txtFirstNumberValue) / parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('text5').value = result;
      }
      var txtFirstNumberValue2 = document.getElementById('text1').value;
      var txtSecondNumberValue2 = document.getElementById('text4').value;
      var result2 = parseInt(txtFirstNumberValue2) / parseInt(txtSecondNumberValue2);
      if (!isNaN(result2)) {
         document.getElementById('text6').value = result2;
      }
      var result3 = parseInt(result) + parseInt(result2);
      if (!isNaN(result3)) {
         document.getElementById('text7').value = result3;
      }
}
function sum4() {
      var pesan               = '';
      var txtFirstNumberValue = document.getElementById('text11').value;
      var txtSecondNumberValue = document.getElementById('text1').value;
      var result = (parseInt(txtFirstNumberValue) / parseInt(txtSecondNumberValue)) * 100 ;
      if (!isNaN(result)) {
         document.getElementById('text8').value = result;
      }
      var result2 = document.getElementById('text9').value;
      if (result > result2) {
         document.getElementById('text10').value = ">";
      }else if (result < result2) {
         document.getElementById('text8').value = result;
         document.getElementById('text10').value = "<";
         setTimeout(function(){pesan = 'Kesalahan pada Persentase jaminan yang lebih kecil dari Persentase Produk Pembiayaan\n';
         alert('Maaf, ada kesalahan pengisian Formulir : \n'+pesan);},100);
         
      }else if (result = result2) {
         document.getElementById('text10').value = "=";
      }
}

function yesnoCheck() {

    if (document.getElementById('klasifikasi').checked){
      document.getElementById('lainnya').disabled = 'status';
    } else if(document.getElementById('namaakun2').checked){
      document.getElementById('lainnya').disabled = 'status';
    } else if(document.getElementById('namaakun').checked){
      document.getElementById('lainnya').disabled = '';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
    }
    

}

function yesnoCheck2() {

    if (document.getElementById('klasifikasi6').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun4').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun5').checked){
      document.getElementById('lainnya2').disabled = 'status';
    } else if(document.getElementById('namaakun6').checked){
      document.getElementById('lainnya2').disabled = '';
    }else{
      document.getElementById('kepala-akun').style.display = 'none';
    }
    

}
</script>