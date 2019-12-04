<?php
	session_start();
   	$post = "";
	if (isset($_POST["submitted"]) && $_POST["submitted"])
	{
        $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
        $post = trim($_POST["post"]); 
		$user = $_SESSION['uname'];
        if ($db->connect_error)
	    {
		    die ("Connection failed: " . $db->connect_error);
        }
        $q="INSERT INTO UsersPost (postcontent,username) VALUES ('$post','$user')";
        $r = $db->query($q);
        header("Location: publicpage.php");
		$db->close();
		exit();
    }  
?>