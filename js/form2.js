function myFunction2() {
	var modelImplant = document.getElementsByClassName('modelImplant').value;
	var typeImplant = document.getElementsByClassName('typeImplant').value;
	var monthImplant = document.getElementsByClassName('monthImplant').value;

	var dataString2 = 'modelImplant' + modelImplant + 'typeImplant' + typeImplant + 'monthImplant' + monthImplant;
	if(modelImplant == '' || typeImplant == '' || monthImplant == '') {
		alert('Please fill all fields');
	}else {
		$.ajax ({
			type: "POST",
			url: "form2.php",
			data: dataString2,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
}