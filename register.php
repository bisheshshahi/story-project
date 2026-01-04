<?php

// Database con, table creation for author
	require "db_connect.php";
	$tbl = "create table if not exists author(username varchar(30), password varchar(30))";
	mysqli_query($con, $tbl) or die("Table creation error");
	
	if (isset($_POST["submit"])){
		$uname = $_POST["uname"];
		$pwd = $_POST["pwd"];
		$cpwd = $_POST["cpwd"];
		
		if($pwd===$cpwd){
			$user = "insert into author(username, password) values('$uname', '$pwd')";
			mysqli_query($con, $user);
			echo "Registration successfull";
      echo "<br>";
      echo '<a href="login.html">Login</a>';
		}
		else
			echo "Passwords do not match";
	}
	
	?>