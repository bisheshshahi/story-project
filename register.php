<!DOCTYPE html>
<html>
<head>
  <title>Registration Status</title>

  <style>
    body{
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .box{
      background: white;
      padding: 30px 35px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      text-align: center;
      max-width: 420px;
      width: 100%;
    }

    a{
      text-decoration: none;
      font-weight: bold;
    }

    a:hover{
      text-decoration: underline;
    }
  </style>
</head>

<body>

<div class="box">

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
        echo "<br><br>";
        echo '<a href="login.html">Login your account</a>';
    }
    else
        echo "Passwords do not match";
}

?>

</div>

</body>
</html>
