function addRincian(sl_coa) {
    var idf = document.getElementById("idf").value;
        	stre='<div class="form-group" id="srow'+idf+'">';
            stre=stre+'<div class="col-sm-2">';
            stre=stre+"<input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur='fill3"+idf+"();' id='id_akun"+idf+"' />";
            stre=stre+'<input class="form-control" onKeyUp="suggest'+idf+'(this.value);" type="text" name="kode_akun[]" onBlur="fill2'+idf+'();" id="kode_akun'+idf+'"/>';
            stre=stre+'<div class="result">';
            stre=stre+'<div class="suggestionsBox" id="suggestions'+idf+'" style="display: none;">';
            stre=stre+'<img src="'+sl_coa+'/assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />';
            stre=stre+'<div class="suggestionsList" id="suggestionsList'+idf+'">&nbsp;</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur='fill1"+idf+"();' id='nama_akun"+idf+"' disabled/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Debet'  type='text' class='form-control hitung total-debet' id='debet-"+idf+"' name='debet[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Kredit'  type='text' class='form-control hitung total-kredit' id='kredit-"+idf+"' name='kredit[]'/>";
            stre=stre+'<input type="hidden" name="subtotal[]" type="text" id="total-'+idf+'" class="total" readonly="readonly">';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-1">';
            stre=stre+"<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick=\"removeFormField('#srow"+idf+"'); return false;\"><i class='glyphicon glyphicon-remove'></i></button>";
            stre=stre+'</div>';
        	stre=stre+'</div>';
        	stre=stre+'<script>';
        	stre=stre+'function suggest'+idf+'(inputString){';
          	stre=stre+'if(inputString.length == 0){';
            stre=stre+"$('#suggestions"+idf+"').fadeOut();";
          	stre=stre+'}else{';
            stre=stre+"$('#nama_akun"+idf+"').addClass('load');";
            stre=stre+'$.post("'+sl_coa+'home/suggest_akun/"+inputString+"/'+idf+'", {queryString:""+inputString+""}, function(data){';
            stre=stre+'if(data.length>0){';
            stre=stre+"$('#suggestions"+idf+"').fadeIn();";
            stre=stre+"$('#suggestionsList"+idf+"').html(data);";
            stre=stre+"$('#nama_akun"+idf+"').removeClass('load');";
            stre=stre+'}';
            stre=stre+'});';
          	stre=stre+'}';
        	stre=stre+'}';
        	stre=stre+'function fill1'+idf+'(thisValue){';
          	stre=stre+"$('#nama_akun"+idf+"').val(thisValue);";
          	stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
        	stre=stre+'}';
        	stre=stre+'function fill2'+idf+'(thisValue){';
          	stre=stre+"$('#kode_akun"+idf+"').val(thisValue);";
          	stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
        	stre=stre+'}';
        	stre=stre+'function fill3'+idf+'(thisValue){';
          	stre=stre+"$('#id_akun"+idf+"').val(thisValue);";
          	stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
        	stre=stre+'}';
        	stre=stre+'</script>';

    $("#divAkun").append(stre);
    idf = (idf-1) + 2;
    document.getElementById("idf").value = idf;
}
function removeFormField(idf) {
    $(idf).remove();
}

function addRincian2(sl_coa) {
    var idf = document.getElementById("idf").value;
            stre='<div class="form-group" id="srow'+idf+'">';
            stre=stre+'<div class="col-sm-2">';
            stre=stre+"<input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur='fill3"+idf+"();' id='id_akun"+idf+"' />";
            stre=stre+'<input class="form-control" onKeyUp="suggest'+idf+'(this.value);" type="text" name="kode_akun[]" onBlur="fill2'+idf+'();" id="kode_akun'+idf+'"/>';
            stre=stre+'<div class="result">';
            stre=stre+'<div class="suggestionsBox" id="suggestions'+idf+'" style="display: none;">';
            stre=stre+'<img src="'+sl_coa+'/assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />';
            stre=stre+'<div class="suggestionsList" id="suggestionsList'+idf+'">&nbsp;</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur='fill1"+idf+"();' id='nama_akun"+idf+"' disabled/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Debet'  type='hidden' class='form-control hitung' id='debet-"+idf+"' name='debet[]'/>";
            stre=stre+"<input placeholder='Kredit'  type='text' class='form-control hitung' id='kredit-"+idf+"' name='kredit[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Departemen'  type='text' class='form-control hitung' name='departemen[]'/>";
            stre=stre+'<input type="hidden" name="subtotal[]" type="text" id="total-'+idf+'" class="total" readonly="readonly">';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-1">';
            stre=stre+"<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick=\"removeFormField('#srow"+idf+"'); return false;\"><i class='glyphicon glyphicon-remove'></i></button>";
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<script>';
            stre=stre+'function suggest'+idf+'(inputString){';
            stre=stre+'if(inputString.length == 0){';
            stre=stre+"$('#suggestions"+idf+"').fadeOut();";
            stre=stre+'}else{';
            stre=stre+"$('#nama_akun"+idf+"').addClass('load');";
            stre=stre+'$.post("'+sl_coa+'home/suggest_akun/"+inputString+"/'+idf+'", {queryString:""+inputString+""}, function(data){';
            stre=stre+'if(data.length>0){';
            stre=stre+"$('#suggestions"+idf+"').fadeIn();";
            stre=stre+"$('#suggestionsList"+idf+"').html(data);";
            stre=stre+"$('#nama_akun"+idf+"').removeClass('load');";
            stre=stre+'}';
            stre=stre+'});';
            stre=stre+'}';
            stre=stre+'}';
            stre=stre+'function fill1'+idf+'(thisValue){';
            stre=stre+"$('#nama_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill2'+idf+'(thisValue){';
            stre=stre+"$('#kode_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill3'+idf+'(thisValue){';
            stre=stre+"$('#id_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'</script>';

    $("#divAkun").append(stre);
    idf = (idf-1) + 2;
    document.getElementById("idf").value = idf;
}
function removeFormField2(idf) {
    $(idf).remove();
}

function addRincian3(sl_coa) {
    var idf = document.getElementById("idf").value;
            stre='<div class="form-group" id="srow'+idf+'">';
            stre=stre+'<input id="akunke" value="'+idf+'" type="hidden" />';
            stre=stre+'<div class="col-sm-4">'
            stre=stre+"<input placeholder='Nama SHU'  type='text' class='form-control' name='nama_shu[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Persentase'  type='text' class='form-control hitung total' id='debet-"+idf+"' name='persentasi[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-4">';
            stre=stre+"<input placeholder='Keterangan'  type='text' class='form-control' name='keterangan[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-1">';
            stre=stre+"<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick=\"removeFormField('#srow"+idf+"'); return false;\"><i class='glyphicon glyphicon-remove'></i></button>";
            stre=stre+'</div>';
            stre=stre+'</div>';

    $("#divAkun").append(stre);
    idf = (idf-1) + 2;
    document.getElementById("idf").value = idf;
}
function removeFormField3(idf) {
    $(idf).remove();
}

function addRincian4(sl_coa) {
    var idf = document.getElementById("idf").value;
            stre='<div class="form-group" id="srow'+idf+'">';
            stre=stre+'<div class="col-sm-2">';
            stre=stre+"<input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur='fill3"+idf+"();' id='id_akun"+idf+"' />";
            stre=stre+'<input class="form-control" onKeyUp="suggest'+idf+'(this.value);" type="text" name="kode_akun[]" onBlur="fill2'+idf+'();" id="kode_akun'+idf+'"/>';
            stre=stre+'<div class="result">';
            stre=stre+'<div class="suggestionsBox" id="suggestions'+idf+'" style="display: none;">';
            stre=stre+'<img src="'+sl_coa+'/assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />';
            stre=stre+'<div class="suggestionsList" id="suggestionsList'+idf+'">&nbsp;</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur='fill1"+idf+"();' id='nama_akun"+idf+"' disabled/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Debet'  type='text' class='form-control hitung total-debet' id='debet-"+idf+"' name='debet[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Kredit'  type='text' class='form-control hitung total-kredit' id='kredit-"+idf+"' name='kredit[]'/>";
            stre=stre+'<input type="hidden" name="subtotal[]" type="text" id="total-'+idf+'" class="total" readonly="readonly">';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-1">';
            stre=stre+"<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick=\"removeFormField('#srow"+idf+"'); return false;\"><i class='glyphicon glyphicon-remove'></i></button>";
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<script>';
            stre=stre+'function suggest'+idf+'(inputString){';
            stre=stre+'if(inputString.length == 0){';
            stre=stre+"$('#suggestions"+idf+"').fadeOut();";
            stre=stre+'}else{';
            stre=stre+"$('#nama_akun"+idf+"').addClass('load');";
            stre=stre+'$.post("'+sl_coa+'home/suggest_akun/"+inputString+"/'+idf+'", {queryString:""+inputString+""}, function(data){';
            stre=stre+'if(data.length>0){';
            stre=stre+"$('#suggestions"+idf+"').fadeIn();";
            stre=stre+"$('#suggestionsList"+idf+"').html(data);";
            stre=stre+"$('#nama_akun"+idf+"').removeClass('load');";
            stre=stre+'}';
            stre=stre+'});';
            stre=stre+'}';
            stre=stre+'}';
            stre=stre+'function fill1'+idf+'(thisValue){';
            stre=stre+"$('#nama_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill2'+idf+'(thisValue){';
            stre=stre+"$('#kode_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill3'+idf+'(thisValue){';
            stre=stre+"$('#id_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'</script>';

    $("#divAkun").append(stre);
    idf = (idf-1) + 2;
    document.getElementById("idf").value = idf;
}
function removeFormField4(idf) {
    $(idf).remove();
}

function addRincian5(sl_coa) {
    var idf = document.getElementById("idf").value;
            stre='<div class="form-group" id="srow'+idf+'">';
            stre=stre+'<div class="col-sm-2">';
            stre=stre+"<input placeholder='ID Akun'  type='hidden' class='form-control' name='coa[]' onBlur='fill3"+idf+"();' id='id_akun"+idf+"' />";
            stre=stre+'<input class="form-control" onKeyUp="suggest'+idf+'(this.value);" type="text" name="kode_akun[]" onBlur="fill2'+idf+'();" id="kode_akun'+idf+'"/>';
            stre=stre+'<div class="result">';
            stre=stre+'<div class="suggestionsBox" id="suggestions'+idf+'" style="display: none;">';
            stre=stre+'<img src="'+sl_coa+'/assets/backend/bmt/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />';
            stre=stre+'<div class="suggestionsList" id="suggestionsList'+idf+'">&nbsp;</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Nama Akun'  type='text' class='form-control' name='nama_akun' onBlur='fill1"+idf+"();' id='nama_akun"+idf+"' disabled/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Debet'  type='text' class='form-control hitung' id='debet-"+idf+"' name='debet[]'/>";
            stre=stre+"<input placeholder='Kredit'  type='hidden' class='form-control hitung' id='kredit-"+idf+"' name='kredit[]'/>";
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-3">';
            stre=stre+"<input placeholder='Departemen'  type='text' class='form-control hitung' name='departemen[]'/>";
            stre=stre+'<input type="hidden" name="subtotal[]" type="text" id="total-'+idf+'" class="total" readonly="readonly">';
            stre=stre+'</div>';
            stre=stre+'<div class="col-sm-1">';
            stre=stre+"<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick=\"removeFormField('#srow"+idf+"'); return false;\"><i class='glyphicon glyphicon-remove'></i></button>";
            stre=stre+'</div>';
            stre=stre+'</div>';
            stre=stre+'<script>';
            stre=stre+'function suggest'+idf+'(inputString){';
            stre=stre+'if(inputString.length == 0){';
            stre=stre+"$('#suggestions"+idf+"').fadeOut();";
            stre=stre+'}else{';
            stre=stre+"$('#nama_akun"+idf+"').addClass('load');";
            stre=stre+'$.post("'+sl_coa+'home/suggest_akun/"+inputString+"/'+idf+'", {queryString:""+inputString+""}, function(data){';
            stre=stre+'if(data.length>0){';
            stre=stre+"$('#suggestions"+idf+"').fadeIn();";
            stre=stre+"$('#suggestionsList"+idf+"').html(data);";
            stre=stre+"$('#nama_akun"+idf+"').removeClass('load');";
            stre=stre+'}';
            stre=stre+'});';
            stre=stre+'}';
            stre=stre+'}';
            stre=stre+'function fill1'+idf+'(thisValue){';
            stre=stre+"$('#nama_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill2'+idf+'(thisValue){';
            stre=stre+"$('#kode_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'function fill3'+idf+'(thisValue){';
            stre=stre+"$('#id_akun"+idf+"').val(thisValue);";
            stre=stre+"setTimeout(\"$('#suggestions"+idf+"').fadeOut();\", 100);";
            stre=stre+'}';
            stre=stre+'</script>';

    $("#divAkun").append(stre);
    idf = (idf-1) + 2;
    document.getElementById("idf").value = idf;
}
function removeFormField5(idf) {
    $(idf).remove();
}