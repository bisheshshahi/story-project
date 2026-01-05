<!DOCTYPE html>
<html>
<head>
  <title>Story Status</title>

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
      max-width: 450px;
      width: 100%;
    }

    a{
      display: inline-block;
      margin-top: 14px;
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
  session_start();
  require "db_connect.php";
  
  if(!isset($_COOKIE['uname'])){
    echo "Please login first";
    exit();
  }

  $uname = $_COOKIE['uname'];

  if(isset($_POST['submit'])) {
    
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['para']);

    if(empty($title) || empty($content)){
      echo "Please fill in both Title and Story content!";
    } else {
      $insert = "INSERT INTO stories (username, title, content) VALUES ('$uname', '$title', '$content')";
      mysqli_query($con, $insert) or die("Error saving story");
      echo "Your story has been saved successfully!";
    }
  }
?>

<br>
<a href="my_stories.php">View the stories</a>

</div>

</body>
</html>
