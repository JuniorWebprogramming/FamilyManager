function validateFamilyname(){

	var familyname = document.getElementById("familyNameInput").value;


	if(familyname.length > 3){
		if(familyname[0] == familyname[0].toUpperCase()){
			if(familyname.includes(' ')){
				document.getElementById("familyNameInput").style.border = '2px solid red';
				document.getElementById("createFamilyBTN").disabled = true;
			}else{
				document.getElementById("familyNameInput").style.border = '2px solid green';
				document.getElementById("createFamilyBTN").disabled = false;
			}
		}else{
			document.getElementById("familyNameInput").style.border = '2px solid red';
			document.getElementById("createFamilyBTN").disabled = true;
		}
	}else{
		document.getElementById("familyNameInput").style.border = '2px solid red';
		document.getElementById("createFamilyBTN").disabled = true;
	}

}
