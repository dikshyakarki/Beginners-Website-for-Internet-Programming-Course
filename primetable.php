<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Tibetan Handicrafts and Bead Store</title>
			<style type="text/css" media="screen">
				@import url(project.css);	
			</style>
	</head>

<body class="homePage">
	<header>
		<div class= "intro">
			<h1> Tibetan Handicrafts and Bead Store </h1>
			<h3> Every decade needs its own manual of handicraft.</h3>
		</div>
	</header>

	<div class="menu">
	<ul>
  		<li><h3><a href="http://sand.truman.edu/~ns7442/project-website/index.html">Home Page</a></h3></li>
  		<li><h3><a href="http://sand.truman.edu/~ns7442/project-website/prime.php">Become our Prime Member</a></h3></li>
  		<li><h3><a href="http://sand.truman.edu/~ns7442/project-website/primetable.php">Our Prime Members</a></h3></li>

 		<li><h3><a href="http://sand.truman.edu/~ns7442/project-website/contact.php">Contact Us</a></h3></li>
 		<li><h3><a href="http://sand.truman.edu/~ns7442/project-website/return.html">Return Policy</a></h3></li>
	</ul>
    </div>

<?php

// A function with definitions.
function doGetAll() 
{
    //Initializing the conneciton to SQL server
    $conn = new PDO("mysql:host=mysql.truman.edu;dbname=ns7442CS315", "ns7442", "chohghot");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //SN is just an auto-increment ID.
    $stmt = $conn->prepare("SELECT name, phone, email, primemember, country FROM member");

    $stmt->execute();

    echo <<<END

    <h2>Congratulations on being our Prime Member</h2>

    <table border=\"1\">
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Prime Membership</th>
    <th>Country</th>

END;
   
	while ( $row = $stmt->Fetch(PDO::FETCH_ASSOC))
    {
          // This magically sets $xyz to the value of the column named
          // xyz in the current query.
          // extract($row);
          // If extract is not used, achieve the same effect by doing
          //  $row["xyz"]
          // Also, mysql_fetch_row returns a regular positional array
          // instead of an associative array.

      print "<tr><td>{$row['name']}</td><td>{$row['phone']}</td><td>{$row['email']}</td><td>{$row['primemember']}</td><td>{$row['country']}</td></tr>";
    }
    print "</table>";
}

doGetAll();

