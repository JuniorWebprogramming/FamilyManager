var ok1 = false;
var ok2 = false;
var ok3 = false;
var ok4 = false;
var ok5 = false;


function validateLoginForm(){
	
	var username = document.getElementById("usernameInput").value;
	var password = document.getElementById("passwordInput").value;
	
	
	if(username.length > 0 && password.length > 7){
		document.getElementById("loginButton").disabled = false;
	}else{
		document.getElementById("loginButton").disabled = 'disabled';
	}
	
	if(username.length == 0){
		document.getElementById("usernameInput").style.border = '2px solid red';
	}else{
		document.getElementById("usernameInput").style.border = '2px solid green';
	}
	
	if(password.length < 8){
		document.getElementById("passwordInput").style.border = '2px solid red';
	}else{
		document.getElementById("passwordInput").style.border = '2px solid green';
	}
}

function validateRegisterFormFirstname(adat){
	if(adat == true){
		var firstname = document.getElementById("firstnameInput").value;
	}else{
		var firstname = adat;
	}
	
	
	if(firstname.length > 3){
		if(firstname[0] == firstname[0].toUpperCase()){
			if(firstname.includes(' ')){
				document.getElementById("firstnameInput").style.border = '2px solid red';
				ok1 = false;
			}else{
				document.getElementById("firstnameInput").style.border = '2px solid green';
				ok1 = true;
			}
		}else{
			document.getElementById("firstnameInput").style.border = '2px solid red';
			ok1 = false;
		}
	}else{
		document.getElementById("firstnameInput").style.border = '2px solid red';
		ok1 = false;
	}
	
	if(ok1 == true && ok2 == true && ok3 == true && ok4 == true && ok5 == true){
		document.getElementById("signUpBTN").disabled = false;
	}else{
		document.getElementById("signUpBTN").disabled = 'disabled';
	}
	
	return ok1;
}

function validateRegisterFormLastname(){
	var lastname = document.getElementById("lastnameInput").value;
	
	if(lastname.length > 3){
		if(lastname[0] == lastname[0].toUpperCase()){
			if(lastname.includes(' ')){
				document.getElementById("lastnameInput").style.border = '2px solid red';
				ok2 = false;
			}else{
				document.getElementById("lastnameInput").style.border = '2px solid green';
				ok2 = true;
			}
		}else{
			document.getElementById("lastnameInput").style.border = '2px solid red';
			ok2 = false;
		}
	}else{
		document.getElementById("lastnameInput").style.border = '2px solid red';
		ok2 = false;
	}
	
	if(ok1 == true && ok2 == true && ok3 == true && ok4 == true && ok5 == true){
		document.getElementById("signUpBTN").disabled = false;
	}else{
		document.getElementById("signUpBTN").disabled = 'disabled';
	}
}

function validateRegisterFormUsername(){
	var username = document.getElementById("usernameRegInput").value;
	
	if(username.length > 3){
		if(username[0] == username[0].toUpperCase()){
			if(username.includes(' ')){
				document.getElementById("usernameRegInput").style.border = '2px solid red';
				ok3 = false;
			}else{
				document.getElementById("usernameRegInput").style.border = '2px solid green';
				ok3 = true;
			}
		}else{
			document.getElementById("usernameRegInput").style.border = '2px solid red';
			ok3 = false;
		}
	}else{
		document.getElementById("usernameRegInput").style.border = '2px solid red';
		ok3 = false;
	}
	
	if(ok1 == true && ok2 == true && ok3 == true && ok4 == true && ok5 == true){
		document.getElementById("signUpBTN").disabled = false;
	}else{
		document.getElementById("signUpBTN").disabled = 'disabled';
	}
}

function validateRegisterFormPassword(){
	var password = document.getElementById("passwordRegInput").value;
	
	var pat = /^(?=.*[A-ZÖÜÓŐÚÉÁŰ])/;
	var pat2 = /^(?=.*[0-9])/;
	
	if(password.length > 7){
		if(pat.test(password) && pat2.test(password)){
			if(password.includes(' ')){
				document.getElementById("passwordRegInput").style.border = '2px solid red';
				ok4 = false;
			}else{
				document.getElementById("passwordRegInput").style.border = '2px solid green';
				ok4 = true;
			}
		}else{
			document.getElementById("passwordRegInput").style.border = '2px solid red';
			ok4 = false;
		}
	}else{
		document.getElementById("passwordRegInput").style.border = '2px solid red';
		ok4 = false;
	}
	
	if(ok1 == true && ok2 == true && ok3 == true && ok4 == true && ok5 == true){
		document.getElementById("signUpBTN").disabled = false;
	}else{
		document.getElementById("signUpBTN").disabled = 'disabled';
	}
}

function validateRegisterFormEmail(){
	var email = document.getElementById("emailInput").value;
	
	var pat = /^[a-zöüóőúéáűA-ZÖÜÓŐÚÉÁŰ0-9._-]+@[a-zA-ZÖÜÓŐÚÉÁŰ0-9.-]+\.[a-zöüóőúéáűA-ZÖÜÓŐÚÉÁŰ]{2,6}$/;
	
	if(pat.test(email)){
		document.getElementById("emailInput").style.border = '2px solid green';
		ok5 = true;
	}else{
		document.getElementById("emailInput").style.border = '2px solid red';
		ok5 = false;
	}
	
	if(ok1 == true && ok2 == true && ok3 == true && ok4 == true && ok5 == true){
		document.getElementById("signUpBTN").disabled = false;
	}else{
		document.getElementById("signUpBTN").disabled = 'disabled';
	}
}


