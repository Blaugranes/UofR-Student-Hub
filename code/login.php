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
    if($uname != $row["userName"] && $password != $row["password"])
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
        $_SESSION["uname"] = $row["userName"];
        header("Location: publicpage.php");
        $db->close();
        exit();
    }
    else 
    {
        $error = "The username/password combination was incorrect. Login failed.";
        echo "<script type='text/javascript'>alert('$error');</script>";
        $db->close();
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
		
        <script type="text/javascript" src="login.js"> </script>  
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
background-color:white;
  margin-left:2px;
margin-top: 80px;
  margin-bottom:0px;
  height:210px;
  width:800px;
}
#Login
{
background-color:white;
width:70%;
margin:80px;
margin-top: 300px;
border:0px solid black;
border-radius:5px;
padding-left:50px;
padding-bottom: 5px;
opacity:0.9;
}
body
{
	background-image:url(image.jpg);
	background-repeat:no-repeat;
	background-size:cover;
}
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}
.right 
{
  right: 0;
  opacity:0.9;
}
.left 
{
  left: 0;
  background-image: url(loginpage.jpg);
  background-repeat:no-repeat;
  margin:10%;
  opacity:0.9;
}
.centered 
{
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
}
ul 
{
    margin-top: 80px;
    list-style-type: none;
    font-size:24px;
    font-weight:bold;
    color:black;
    opacity:1;
}
ul li
{
    padding-bottom: 50px;
}
.material-icons
{
    font-size:2rem;
    padding-right: 10px;
}
</style>
    <div class="split left">
    <div class="centered">
	
    </div>
    </div>
    <div class="split right">
        <div class="centered">
        <form id="Login" method="post" action ="login.php">
        <input type="hidden" name="submitted" value="1"/>
                
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
        </div>
</div>
	<script type = "text/javascript"  src = "login-r.js" ></script>
</body>

</html>