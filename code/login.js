function LoginForm(event){ 
 
    var userNameInput = document.getElementById("uname").value;
    var pswdInput = document.getElementById("password").value;

    var userNameMsg = document.getElementById("uname_msg");
    var pswdMsg = document.getElementById("pswd_msg");
    
    userNameMsg.innerHTML = "";
    pswdMsg.innerHTML = ""; 

    var result = true;    

        if (userNameInput==null || userNameInput=="")
        {  
	        document.getElementById("uname_msg").innerHTML="Username is blank";
	        result = false;
        }

        if (pswdInput==null || pswdInput=="")
        {
            document.getElementById("pswd_msg").innerHTML="Password is blank";
            result = false;
        }
        if(result == false )
        {    
            event.preventDefault();
        }
}