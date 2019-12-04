<?php
	session_start();
   	$reply = "";
	if (isset($_POST["submitted"]) && $_POST["submitted"])
	{
        $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
        $reply = trim($_POST["reply"]); 
		$user = $_SESSION['uname'];
        if ($db->connect_error)
	    {
		    die ("Connection failed: " . $db->connect_error);
        }
        $q="INSERT INTO Replies (replycontent,replyusername) VALUES ('$reply','$user')";
        $r = $db->query($q);
        header("Location: publicpage.php");
		$db->close();
		exit();
    }  
?>