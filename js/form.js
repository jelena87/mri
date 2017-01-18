function myFunction() {
	var foreignObject = document.getElementsByClassName('foreignObject').value;
	var placeObject = document.getElementsByClassName('placeObject').value;
	var monthObject = document.getElementsByClassName('monthObject').value;

	var dataString = 'foreignObject' + foreignObject + 'placeObject' + placeObject + 'monthObject' + monthObject;
	if(foreignObject == '' || placeObject == '' || monthObject == '') {
		alert('Please fill all fields');
	}else {
		$.ajax ({
			type: "POST",
			url: "form.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
}