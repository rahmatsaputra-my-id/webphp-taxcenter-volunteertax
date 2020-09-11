  var DatePicked = function() {
    		var departure = $("#from");
    		var arrival = $("#to");
    		var nights = $("#lama");

    		var triggeringElement = $(this);

    		var departureDate = departure.datepicker("getDate");

    		var minArrivalDate = new Date();
    		if (departureDate != null) {
    			minArrivalDate.setDate(departureDate.getDate() + 0);
    		} else {
    			minArrivalDate.setDate(minArrivalDate.getDate() + 0);
    		}
    		arrival.datepicker('option', 'minDate', minArrivalDate);

    		var arrivalDate = arrival.datepicker("getDate");

    		if (departureDate != null && arrivalDate != null && triggeringElement.attr("id") != "nights") {
    			var oneDay = 1000*60*60*24;
    			var difference = Math.ceil((arrivalDate.getTime() - departureDate.getTime()) / oneDay);
    			nights.val(difference);
    		} else if (departureDate != null && triggeringElement.attr("id") == "nights") {
    			var nightsEntered = parseInt(nights.val());
    			if (nightsEntered >= 2) {
    				var newArrivalDate = new Date();
    				newArrivalDate.setDate(departureDate.getDate() + nightsEntered);
    				arrival.datepicker("setDate", newArrivalDate);
    			} else {
    				alert("Nights must be greater than 2.");
    			}
    		}
    	}
	
	// when start time change, update minimum for end timepicker
function tpStartSelect( time, endTimePickerInst ) {
   $('#jam2').timepicker('option', {
       minTime: {
           hour: endTimePickerInst.hours,
           minute: endTimePickerInst.minutes
       }
   });
}

// when end time change, update maximum for start timepicker
function tpEndSelect( time, startTimePickerInst ) {
   $('#jam1').timepicker('option', {
       maxTime: {
           hour: startTimePickerInst.hours,
           minute: startTimePickerInst.minutes
       }
   });
}  	
  
	
 	$(function() 
		{
			/*--------------------------------Validasi form Input Akun---------------------------------*/
			$('#frmAkun').validate({
				rules: {
					coa_perkiraan : {
					    required: true,
						digits: true,
						minlength:5,
						maxlength:5
					},
					nama_perkiraan:"required",
					kelompok:"required",
					neraca_akhir:"required"
				},
				messages: {
					coa_perkiraan: {
						required: "Isian COA  harus diisi",
						minlength: "Kolom COA harus terdiri dari 5 digit"
					},
					nama_perkiraan: {
						required: "Nama perkiraan harus diisi"
					},
					kelompok: {
						required: "Kelompok harus dipilih"
					},
					neraca_akhir: {
						required: ""
					}
				},
				highlight: function(element) {
						$(element).closest('.form-group').addClass('has-error');
					},
					unhighlight: function(element) {
						$(element).closest('.form-group').removeClass('has-error');
					},
					errorElement: 'span',
					errorClass: 'help-block',
					errorPlacement: function(error, element) {
						if(element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					}
			});
		
		/*--------------------------------Validasi form Input Jurnal---------------------------------*/
			$('#frmJurnal').validate({
				rules: {
							no_bukti:"required",
							tanggal_transaksi:"required",
							uraian:"required",
							ajp:"required"
						},
				messages: 
						{
							no_bukti: {	required: "No bukti harus diisi" },
							tanggal_transaksi: { required: "Tanggal transaksi harus diisi" },
							uraiaan: { required: "Uraian wajib disini" 	},
							ajp: { required: "Pilih salah satu AJO" }
						},
				highlight: function(element) {
						$(element).closest('.form-group').addClass('has-error');
					},
					unhighlight: function(element) {
						$(element).closest('.form-group').removeClass('has-error');
					},
					errorElement: 'span',
					errorClass: 'help-block',
					errorPlacement: function(error, element) {
						if(element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					}
			});	
			
			$('#frmPeriode').validate({
				rules: {
							kode_periode:{
									required: true,
									digits: true,
									minlength:4,
									maxlength:4
								},
							from:"required",
							to:"required"
						},
				messages: 
						{
							kode_periode: {	required: "Kode Periode wajib diiisi dengan format(YYMM)" },
							from: { required: "Tanggal awal periode wajib diisi" },
							to: { required: "Tanggal awal periode wajib diisi" }
						},
				highlight: function(element) {
						$(element).closest('.form-group').addClass('has-error');
					},
					unhighlight: function(element) {
						$(element).closest('.form-group').removeClass('has-error');
					},
					errorElement: 'span',
					errorClass: 'help-block',
					errorPlacement: function(error, element) {
						if(element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					}
			});	
			
	
		$( "#fr2" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
        });	
		$( ".tgl" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
        });	
		$( "#dtp1" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
        });	
		$( "#dtp2" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
        });	
		$( "#from" ).datepicker({
			changeMonth: true,
			changeYear: true,
			onSelect: DatePicked,
			dateFormat: 'yy-mm-dd',
			 onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
        });
		$('#jam1').timepicker({
       showLeadingZero: false,
       onSelect: tpStartSelect,
       maxTime: {
           hour: 23, minute: 30
       }
	   });
	   $('#jam2').timepicker({
		   showLeadingZero: false,
		   onSelect: tpEndSelect,
		   minTime: {
			   hour: 9, minute: 15
		   }
	   });
    });
