<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
	
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head>
<body>
    <style>
	    header
	    {
	    background-color: #ffc82e;
	   
	    }
	    body
	    {
        background-color: #F4F5F4;
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
	        font-family:"Bookman,URW BookmanL,serif";
	        font-style: medium;
	        font-weight:300;
	    }
        h2
        {
            margin:50px;
        }
        section
        {
            float: right;
            width:97%;
        }
        section textarea
        {
            width: 750px;
            height: 100px;
            border: 2px solid black;
            border-radius:5px;
            padding: 5px 10px;
            resize: none;
            outline: none;
            border-style:none;
        }
        #p
     	{
            position:absolute;
            margin-left:57%;
            width: auto;
            height: auto;
            border: 2px solid black;
            border-radius:5px;
            border-style:hidden;
            padding:10px 10px;
            font-size:20px;
            line-height:75px;
            background-color:white;
        }
        aside
        {
            border:2px solid black;
            border-style:hidden;
            border-radius:5px;
            padding:10px 10px;
            float: left;
            margin-left: 3%;
            margin-top:1%;
            width:750px;
            background-color:white;
            opacity:1;
        }
	    #poster
	    { 
	        border-collapse:collapse;
	        text-align:left;
	    }
        th
        {
            width:70px;
            white-space:nowrap;
        }
        #postbody
        {
            table-layout:fixed;
            width:1500px;
        }
        #postbody td
        {
            word-wrap:break-word;
        }
	    #profile
	    {
	        width:50px;
	        height:70px;
	    }
        article
        {
            margin-left:2%;
            width:550px;
        }
		.button
		{
			float:right;
			background-color:white;
			border-style:hidden;
		}

    </style>

<header>
        <nav>
                <ul>
                    <li><a href = "publicpage.php">Home</a></li>
                    <li><a class = "active" href = "facultypage.php">Faculty</a></li>
                    <li><a href = "profile.php">Profile</a></li>
                    <input id = "search" type="text" placeholder="Search..">
                    <li><a href='Logout.php'>LOGOUT</a></li>
                </ul>
        </nav>   
    <table>
        <tr><td><img id = "logo" src = "logo2.png"></td><td><h1>STUDENT HUB</h1></td></tr>            
    </table>
    
</header>
<h2>
    Faculty Timeline
</h2>
<section>
<p id = "p">
    <i class="material-icons">event_note</i>Upcoming Events:<br />

    End of Classes ― Friday, December 6, 12:00 a.m.<br />
    Start of Exam Period ― Monday, December 9, 12:00 a.m.<br />
    End of Exam Period ― Saturday, December 21, 12:00 a.m.<br />
    What is Engineering ― Friday, November 8, 2:45 p.m.<br />
    End of Grade of W Drop Period ― Friday, November 15, 12:00 p.m.<br />
    Iron Ring Ceremony ― Saturday, November 30, 1:00 p.m.<br />
</p>
    <form method ="post" action="facultypost.php">
        <input type="hidden" name="submitted" value="1"/>
        <textarea id = "post" name = "post" placeholder= "Add a post..."></textarea>
        <input type="submit" value="Post"/>
    </form>
        
</section>
<article>
	<?php
	  $db = new mysqli("localhost", "labatetk", "sejeong", "labatetk");
	    if ($db->connect_error)
	    {
		    die ("Connection failed: " . $db->connect_error);
        }

	$q = "SELECT * FROM FacultyPost ORDER BY timecreated DESC";
	$r = $db->query($q);
	
	if($r->num_rows > 0)
	{
	while($row = $r->fetch_assoc())
	{
	$post_id = $row['post_id'];
	$user_id = $row['user_id'];
	$postcontent = $row['postcontent'];
	$pictures = $row['pictures'];
	$timecreated = $row['timecreated'];
    $username = $row['username'];
    ?>
    <aside>
	<table id ="poster">
	<tr>
	    <th><img id = "profile" src = "profile.png"></th>
	    <th><?php echo $username ; ?></th>
	    <td><?php echo $timecreated; ?></td>
    </tr>
    </table>
    <table id = "postbody">
	<tr>
        <td></td>
	    <td><?php echo $pictures; ?></td>
	</tr>
	<tr>
	    <td id = "posted"><?php echo $postcontent; ?></td>
	</tr>
    </table>
	<button class = "button" type = "submit" name ="like" value = "like" onclick = "like.php"><i class="material-icons">thumb_down</i></button>
	<button class = "button" type = "submit" name ="dislike" value = "dislike"><i class="material-icons">thumb_up</i></button>
	
	
	 <form method ="post" action="reply.php">
        <input type="hidden" name="submitted" value="1"/>
        <textarea id = "reply" name = "reply" placeholder= "Add a reply..."></textarea>
        <input type="submit" value="Reply"/>
    </form>   
    </aside>
    <?php 
    }
    }
    ?>


</article>
</body>
</html>
