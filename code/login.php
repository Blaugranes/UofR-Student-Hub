<?php

$validate = true;
$reg_uName = "/^[a-zA-Z0-9_-]+$/";
$reg_Pswd = "/^[(\S*)?\d+(\S*)?]{8,}$/";

$uname= "";
$error = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $uname= trim($_POST["uname"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = "SELECT * FROM User WHERE userName = '$uname' AND password = '$password'";

    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($uname != $row["uname"] && $password != $row["password"])
    {
        $validate = false;  
    }
    
    else
    {
        $unameMatch = preg_match($reg_uName, $uname);
        if($uname == null || $uname == "" || $unameMatch == false)
        {
            $validate = false;
        }
        
        $pswdLen = strlen($password);
        $passwordMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $passwordMatch == false)
        {
            $validate = false;
        }
    }
    if($validate == true)
    {

        session_start();
        $_SESSION["uname"] = $row["uname"];
        header("Location: publicpage.html");
        $db->close();
        exit();
    }
    else 
    {
        $error = "The username/password combination was incorrect. Login failed.";
        echo $error;
        $db->close();
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <script type="text/javascript" src="login.js"> </script>  
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
  margin-left:35px;
  margin-top:20px;
  height:180px;
  width:260px;
}
body
{
    background-image: url(newbackground.jpeg);
    background-repeat: no-repeat;
    background-size:cover;
    opacity:1;
}
#studenthub
{
margin-left:100px;
}
#Login
{
float:right;
background-color:white;
width:25%;
margin:80px;
border:0px solid black;
border-radius:5px;
padding-left:20px;
padding-bottom: 5px;
opacity:0.9;
}
</style>
	<h1 id ="studenthub">Student Hub</h1>
        <form id="Login" method="post" action ="login.php">
        <input type="hidden" name="submitted" value="1"/>
                <table>
                        <tr><td><img id = "logo" src = "logo.jpg"></td><td></td></tr>
                </table>
                <h1>Login</h1>  
                <table>
                <tr><td></td><td><label id="uname_msg" class="err_msg"></label></td></tr>
                <tr><td>Username: </td><td> <input type="text" id = "uname" name="uname" size="30" placeholder="Enter you username"/></td></tr>
                
                <tr><td></td><td><label id="pswd_msg" class="err_msg"></label></td></tr>
                <tr><td>Password: </td><td> <input type="password" id = "password" name="password" size="30"placeholder="********"/></td></tr>
                </table>
                <input type="submit" value="Login" />
                <p><a href = "signup.php">Make an Account</a></p>
        </form>
	<script type = "text/javascript"  src = "login-r.js" ></script>
</body>

</html>