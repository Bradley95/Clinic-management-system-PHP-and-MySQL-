var chars = "abcdefghijklmnopqrstubwsyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
var password = '';


function getPassword(btn){
	var plength = document.getElementById('plength').value;
	if(plength == 0){
		alert("Please enter Password length");
	}else{
		document.getElementById('password').value = createPassword(plength);
		
		btn.setAttribute('disabled', 'disabled');
	}
}

function createPassword(plength){
	password='';
		for(i=0; i<plength; i++){
			password+=chars.charAt(Math.floor(Math.random()*chars.length));
		}
	
	return password;
}