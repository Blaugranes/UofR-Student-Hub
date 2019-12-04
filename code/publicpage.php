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
		.container
		{
			border:2px solid black;
            border-style:hidden;
            border-radius:5px;
            padding:10px 10px;
            float: left;
            margin-left: 15%;
            margin-top:1%;
            width:680px;
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
		#repbody
        {
            table-layout:fixed;
            width:1500px;
        }
        #repbody td
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
                    <li><a class = "active" href = "publicpage.php">Home</a></li>
                    <li><a href = "facultypage.php">Faculty</a></li>
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
    Public Timeline
</h2>
<section>
<p id = "p">
<i class="material-icons">event_note</i>Upcoming Events: <br />

U of R Choirs Fall 2019 Concert ― Sunday, December 1, 4:00 p.m.<br />

U of R Orchestra Concert ― Monday, December 2, 8:00 p.m.<br />

PD Days: Summer Sports School Days ― Friday, December 6, 7:45 a.m. <br />

Kinesiology Research Seminar Series ― Friday, December 6, 2:30 p.m. <br />

New Music Ensemble Concert ― Friday, December 6, 7:30 p.m. <br />

Why Not Now? ― Thursday, December 12, 5:00 a.m. <br />
</p>
    <form method ="post" action="publicpost.php">
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

	$q = "SELECT * FROM UsersPost ORDER BY timecreated DESC";
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
    $likes = $row['Likes'];
	
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
	    <td><?php echo $postcontent; ?></td>
    </tr>
    </table>
	<button class = "button" type = "submit" name ="like" value = "like"><i class="material-icons">thumb_down</i></button>
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
	<?php
	$q1 = "SELECT * FROM Replies";
	$r1 = $db->query($q1);

	
	if($r1->num_rows > 0)
	{
	while($row1 = $r1->fetch_assoc())
	{
	$reply_id = $row1['reply_id'];
	$replycontent = $row1['replycontent'];
	$replytimecreated = $row1['replytimecreated'];
    $replyusername = $row1['replyusername'];
	?>
	<div class = "container">
	<table id ="rep">
	<tr>
	    <th><img id = "profile" src = "profile.png"></th>
	    <th><?php echo $replyusername ; ?></th>
	    <td><?php echo $replytimecreated; ?></td>
    </tr>
    </table>
    <table id = "repbody">
	<tr>
        <td></td>
	    <td><?php echo $pictures; ?></td>
	</tr>
	<tr>
	    <td><?php echo $replycontent; ?></td>
    </tr>
    </table>
	<button class = "button" type = "submit" name ="like" value = "like"><i class="material-icons">thumb_down</i></button>
	<button class = "button" type = "submit" name ="dislike" value = "dislike"><i class="material-icons">thumb_up</i></button>
	</div>
	 <?php 
    }
    }
    ?>
	
</article>
</body>
</html>
