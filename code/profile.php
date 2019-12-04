<!DOCTYPE html>
<html>
<head>

    <title>Home Page</title>
 </head>
<body>
    <style>
	header
	{
	background-color: #ffc82e;
	border-bottom:10px solid #004f2e;
	}
	body
	{
	margin:0px;
	}
        #logo
        {
          margin:10px;
          height:150px;
          width:300px;
        }
        .active
        {
            background-color: green;
            color: white;
        }
        nav
        {
            margin-top:10px;
            overflow: hidden;
            background-color: #004f2e;
            float:right;
            margin-right:50px;
            border: 1px solid #ccc;  
        }
        nav a:hover
        {
            background-color: #ddd;
            color: black;
        }
        ul li
        {
            display:inline;
        }
        ul li a
        {
            padding: 24px 16px;
            font-size:16px;
            color:#ffc82e;
            text-decoration:none;
        }
        #search 
        {
            padding:7px;
            margin-right:16px;
            border:none;
            font-size:17px;
        }
	    h1
	    {
	        margin-top:75px;
	        font-family: "Bookman,URW BookmanL,serif";
	        font-style: medium;
	        font-weight:300;
	    }
        section
        {
            margin-left:10%;
            margin-right:50%;
        }
        section table
        {
            margin-top:5%;
            margin-left:10%;
        }
        #profile
	    {
	        width:100px;
	        height:100px;
	    }
        h2
        {
            margin-top:10%;
            margin-left:10%;
        }
        .info
        {
            padding-bottom:1em;
            font-size:20px;
        }
        .userinfo
        {
            padding-left:1em;
            padding-bottom:1em;
            font-size:20px;
        }
    </style>
<header>
        <nav>
                <ul>
                    <li><a href = "publicpage.php">Home</a></li>
                    <li><a href = "facultypage.php">Faculty</a></li>
                    <li><a class = "active" href = "profile.html">Profile</a></li>
                    <input id = "search" type="text" placeholder="Search..">
                    <li><a href='Logout.php'>LOGOUT</a></li>
                </ul>
        </nav>   
    <table>
        <tr><td><img id = "logo" src = "logo2.png"></td><td><h1>STUDENT HUB</h1></td></tr>            
    </table>
</header>
<section>
        <?php

		
        session_start();
        $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
          if ($db->connect_error)
          {
              die ("Connection failed: " . $db->connect_error);
          }
        $user = $_SESSION['uname'];
        $q = "SELECT * FROM User WHERE userName = '$user'";
        $r = $db->query($q);
      
        if($r->num_rows > 0)
        {
        while($row = $r->fetch_assoc())
        {
        $username = $row['userName'];
        $firstname = $row['firstName'];
        $email = $row['email'];
        $lastname = $row['lastName'];
        $faculty = $row['department'];
        }
        }
        ?>
    <table>
        <h2>Account Information</h2>
        <tr>
            <td class = "info"><img id = "profile" src="profile.png"></td>
</form>
        </tr>
        <tr>
            <td class = "info">Username: </td>
            <td class = "userinfo"><?php echo $username ; ?></td>
        </tr>
        <tr>
            <td class = "info">First Name: </td>
            <td class = "userinfo"><?php echo $firstname ; ?></td>
        </tr>
        <tr>
            <td class = "info">Last Name: </td>
            <td class = "userinfo"><?php echo $lastname ; ?></td>
        </tr>
        <tr>
            <td class = "info">Email: </td>
            <td class = "userinfo"><?php echo $email ; ?></td>
        </tr>
        <tr>
            <td class = "info">Faculty: </td>
            <td class = "userinfo"><?php echo $faculty ; ?></td>
        </tr>
    </table>
</section>

</body>
</html>