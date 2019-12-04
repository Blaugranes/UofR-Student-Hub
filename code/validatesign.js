function ValidSignup(event)
{	
	var firstNameInput = document.getElementById("fname").value;
	var lastNameInput = document.getElementById("lname").value;	
	var userNameInput = document.getElementById("uname").value;
	var emailInput = document.getElementById("email").value;
	var emailrInput = document.getElementById("emailr").value;
	var pswdInput = document.getElementById("password").value;
	var pswdrInput = document.getElementById("passwordr").value;
	var deptInput = document.getElementById("department").value;

	

	var firstNameMsg = document.getElementById("fname_msg");
	var lastNameMsg = document.getElementById("lname_msg");
	var userNameMsg = document.getElementById("uname_msg");
	var emailMsg = document.getElementById("email_msg");
	var emailrMsg = document.getElementById("emailr_msg");
	var pswdMsg = document.getElementById("pswd_msg");
	var pswdrMsg = document.getElementById("pswdr_msg");
	var deptMsg = document.getElementById("dept_msg");
	
	
	firstNameMsg.innerHTML = "";
	lastNameMsg.innerHTML = "";
	userNameMsg.innerHTML = "";
	emailMsg.innerHTML = "";
	emailrMsg.innerHTML = "";
	pswdMsg.innerHTML = ""; 
	pswdrMsg.innerHTML = ""; 
	deptMsg.innerHTML = "";
		
	
    var firstNameCheck = /^[a-zA-Z]+$/;
    var lastNameCheck = /^[a-zA-Z]+$/;
    var userNameCheck = /^[a-zA-Z0-9_-]+$/;
    var emailCheck = /^\w+@uregina.ca$/; 
    var pswdCheck = /^(\S*)?\d+(\S*)?$/;
	
	var checkResult = true;

	if(firstNameInput  == null || firstNameInput == "" || !firstNameCheck.test(firstNameInput))
	{
		firstNameMsg.innerHTML = "Empty first name.";
		checkResult = false;
	}
	
	if(lastNameInput  == null || lastNameInput == "" || !lastNameCheck.test(lastNameInput))
	{
		lastNameMsg.innerHTML = "Empty last name.";
		checkResult = false;
	}

	if(userNameInput  == null || userNameInput == "" || !userNameCheck.test(userNameInput))
	{
		userNameMsg.innerHTML = "Username is empty or invalid";
		checkResult = false;

	}
	else if  (userNameInput  .length>40)
	{

       	 userNameMsg.innerHTML="Username too long";
		checkResult = false;        
	}


	if(emailInput == null || emailInput == "" || !emailCheck.test(emailInput))
	{
		emailMsg.innerHTML = "Please enter valid email.";
		checkResult = false;
	}
	
	if(emailrInput == null || emailrInput == "" || emailrInput!=emailInput)
	{
		emailrMsg.innerHTML = "Not matching email.";
		checkResult = false;
	}
	
	if(pswdInput == null || pswdInput == "" || pswdInput.length < 8 || !pswdCheck.test(pswdInput))
	{
		pswdMsg.innerHTML = "Password must be at least 8 characters.";
		checkResult = false;
	}

	if(pswdrInput == null || pswdrInput == "")
	{
		pswdrMsg.innerHTML = "Password must be at least 8 characters.";
		checkResult = false;
	}

	else if(pswdrInput!=pswdInput)
	{
		pswdrMsg.innerHTML = "Not matching password.";
		checkResult = false;
	}

	if (deptInput == null || deptInput == "")
    {
        	deptMsg.innerHTML ="Please select a department";
        	checkResult = false;
    }
	
	if(checkResult == false)
	{
		event.preventDefault();
	}
}
