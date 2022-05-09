function validate(){
	var firstname= document.getElementById('firstName');
	var lastname= document.getElementById('lastName');
	var pword = document.getElementById('pass');
	var email = document.getElementById('emailaddress');
	var emailcheck = /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,5})$/;
	var telephone = document.getElementById('tele');
	
	if(firstname.value==""){
		alert("Enter First Name");
		return false;
	}
	
	if(lastname.value==""){
		alert("Enter Last Name");
		return false;
	}
	
	if(pword.value==""){
		alert("Please Enter Password");
		return false;
	}
	
	if(telephone.value==""){
		alert("Please Enter Phone Number");
		return false;
	}
	
	
	var numbers = /[a-zA-Z0-9]{10,}/;
	if(pword.value.match(numbers)){
		alert("Password must contain one uppercase letter, one special character, and one numerical");
		return false;
		
	}
	
	var identification = document.getElementById("ident");
	var idcheck = /([0-9]{8})/;
	if(identification.value.length!=8){
		alert("ID must be 8 digits");
		return false;
	}
	if(identification.value.test(idcheck)){
		alert("valid ID");
	}
	else{
		alert("ID must contain digits");
		return false;
	}
	var phonecheck = /^[0-9]\d{9}$/;
	if (phonecheck.test(telephone)){
		alert("Valid Phone Number");
	}else{
		alert("please Enter phone number again ");
		return false;
	}
	if(emailcheck.test(email)){
		alert("valid email");
	}
	else{
		alert("Email format: Example@example.com");
		return false;
	}
	
}
function verification(){
	document.getElementById('firstname').value;
	document.getElementById('lastname').value;
	document.getElementById('pword').value;
	document.getElementById('identification').value;
	
	return true;
	
}
