<?php
	$validate = true;
	$error = "";
	$reg_fName = "/^[a-zA-Z]+$/";
    $reg_lName = "/^[a-zA-Z]+$/";
    $reg_uName = "/^[a-zA-Z0-9_-]+$/";
	$reg_Email = "/^\w+@uregina.ca$/";
    $reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
    $reg_Department = "/^\w$/";
	$reg_profilePic = "/^([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.gif)$/";
	
	$fname = "";
	$lname = "";
	$uname = "";
	$email = "";
    $dept = "";


	if (isset($_POST["submitted"]) && $_POST["submitted"])
	 {
		$fname = trim($_POST["fname"]);
		$lname = trim($_POST["lname"]);
		$uname = trim($_POST["uname"]);
        $email = trim($_POST["email"]);
	    $pswd = trim($_POST["password"]);
        $dept = trim($_POST["department"]);

        $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
	    if ($db->connect_error)
	    {
		    die ("Connection failed: " . $db->connect_error);
        }
	    
	    $q1 = "SELECT * FROM User WHERE email = '$email'";
	    $r1 = $db->query($q1);
 
	    if($r1->num_rows > 0)
	    {
		$validate = false;
        }
        /*
	    else
	    {
            echo $validate;
			$fnameMatch = preg_match($reg_fName, $fname);
			if($fname == null|| $fname == "" || $fnameMatch == false)
			{
				$validate = false;
            }	
            
			$lnameMatch = preg_match($reg_lName, $lname);
			if($lname == null|| $lname == ""|| $lnameMatch == false)
			{
				$validate = false;
			}
			$unameMatch = preg_match($reg_uName, $uname);
			if($uname == null|| $uname == ""|| $unameMatch == false)
			{
				$validate = false;
            }
			$emailMatch = preg_match($reg_Email, $email);
			if($email == null || $email == "" || $emailMatch == false)
			{
		    	$validate = false;
			}
			$pswdLen = strlen($password);
			$pswdMatch = preg_match($reg_Pswd, $pswd);
			if($pswd == null || $pswd == "" || $pswdLen< 8 || $pswdMatch == false)
			{
		  	  $validate = false;
			}
            $deptMatch = preg_match($reg_Department, $dept);
			if($dept == null || $dept == "" || $deptMatch == false)
			{
		  	  $validate = false;
            }
        }
        */
	    if($validate == true)
	    {
        $q2="INSERT INTO User (firstName,lastName,userName, email, password, department) VALUES ('$fname','$lname','$uname', '$email', '$pswd','$dept')";
		$r2 = $db->query($q2);
		    if ($r2 === true)
		    {
		        header("Location: login.php");
		        $db->close();
		        exit();
            }
        }
	    else
	    {
            $error = "This email address already has a user. Signup failed.";
            echo $error;
		    $db->close();
        } 
    }   
    /*      
        <tr><td></td><td><label id="profilepic_msg" class="err_msg"></label></td></tr> 
        <tr><td>Upload Profile Picture:</td><td> <input type="file" name="profilepic" placeholder="Photo" /></td></tr>
    */
?>

<!DOCTYPE html>
<html>
<head>
        <Title> SignUp Page </Title>
<script type="text/javascript" src="validatesign.js"> </script>  


</head>
<body>
<style>
        .err_msg
        {
            color:red;
            font-size:12px;
        }
        #logo
        {
          margin-left:65px;
          margin-top:20px;
          height:180px;
          width:250px;
        }
        body
        {
            background-image: url(newbackground.jpeg);
            background-repeat:no-repeat;
            background-size:100%;
            opacity:1;
            filter:alpha (opacity=100);
        }
	#studenthub
	{
	margin-left:100px;
	}
        #SignUp
        {
	    float:right;
            background-color:white;
            width:28%;
            margin:80px;
            border:0x solid black;
            border-radius:5px;
            padding-left:20px;
            padding-bottom: 20px;
            opacity:0.9;
        }
</style>
<h1 id ="studenthub">Student Hub</h1>
<form id="SignUp" method="post" action ="signup.php">
<input type="hidden" name="submitted" value="1"/>
    <table>
    <tr><td><img id = "logo" src = "logo.jpg"></td><td></td></tr>
    </table>
     <h2>Sign Up</h2>
            <table>
            <tr><td></td><td><label id="fname_msg" class="err_msg"></label></td></tr>
            <tr><td>First Name: </td><td> <input type="text" id = "fname" name="fname" size="30" placeholder="Enter first name" /></td></tr>

            <tr><td></td><td><label id="lname_msg" class="err_msg"></label></td></tr>
            <tr><td>Last Name: </td><td> <input type="text" id = "lname" name="lname" size="30" placeholder="Enter last name"/></td> </tr>

            <tr><td></td><td><label id="uname_msg" class="err_msg"></label></td></tr>          
            <tr><td>Username: </td><td> <input type="text" id = "uname" name="uname" size="30" placeholder="Enter username"/></td></tr>
           
            <tr><td></td><td><label id="email_msg" class="err_msg"></label></td></tr>
            <tr><td>Email: </td><td> <input type="email" id = "email" name="email" size="30" placeholder="abc@uregina.ca"/></td> </tr>

            <tr><td></td><td><label id="emailr_msg" class="err_msg"></label></td></tr>            
            <tr><td>Confirm Email: </td><td> <input type="email" id = "emailr" name="emailr" size="30" placeholder="abc@uregina.ca" /></td></tr>
           
            <tr><td></td><td><label id="pswd_msg" class="err_msg"></label></td></tr>
            <tr><td>Password: </td><td> <input type="password" id = "password" name="password" size="30" placeholder="********"/></td></tr>
            
             
            <tr><td></td><td><label id="pswdr_msg" class="err_msg"></label></td></tr>            
            <tr><td>Confirm Password: </td><td> <input type="password" id = "passwordr" name="pwdr" size="30" placeholder="********" /></td></tr>
            <tr><td></td><td><label id="dept_msg" class="err_msg"></label></td></tr>    
            <tr><td>Select Department:</td>
            <td>
                <select name = "department" id = "department">
                    <option value = ""></option>
                    <option value = "Engineering">Department of Engineering</option>
                    <option value = "Computer Science">Department of Computer Science</option>
                </select>
            </td>
            </tr>
            </table>
            <input type="submit" value="Sign up" />
            <p><a href = "login.php">Already have an account?</a>
</form><script type = "text/javascript"  src = "signup-r.js" ></script>
</body>


</html>
