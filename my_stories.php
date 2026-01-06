<?php
session_start();
require "db_connect.php";

if (!isset($_COOKIE['uname'])) {
  echo "Please log in first";
  exit();
}

$uname = $_COOKIE['uname'];
$checkstory = "SELECT * FROM stories WHERE username = '$uname'";
$result = mysqli_query($con, $checkstory);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Stories</title>
  <style>
    /* Body styling and center page */
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    /* Container box */
    .container {
      background-color: #fff;
      width: 90%;
      max-width: 800px;
      margin: 50px auto;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      box-sizing: border-box;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    /* Topbar with username and buttons */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      flex-wrap: wrap; /* wrap buttons on small screens */
      gap: 10px;
    }

    .left {
      font-weight: bold;
      color: #333;
    }

    .right {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    a.button {
      display: inline-block;
      text-decoration: none;
      background-color: #0984e3;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s;
      max-width: 100%;
      overflow-wrap: break-word;
      text-align: center;
    }

    a.button:hover {
      background-color: #74b9ff;
    }

    /* Page heading */
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    /* Each story box */
    .story {
      border: 1px solid #ccc;
      padding: 15px 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      background-color: #fafafa;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    .story h3 {
      margin: 0 0 10px 0;
      color: #2d3436;
      word-break: break-word;
    }

    .story p {
      color: #555;
      line-height: 1.5;
      word-break: break-word;
    }

    /* Message when no story exists */
    .no-story {
      text-align: center;
      font-size: 18px;
      color: #555;
      background-color: #f8f8f8;
      padding: 20px;
      border-radius: 10px;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    /* Responsive tweaks */
    @media (max-width: 500px){
      .container {
        padding: 20px;
      }

      a.button {
        padding: 8px 14px;
      }
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="topbar">
      <span class="left">👋 <?php echo htmlspecialchars($uname); ?></span>
      <div class="right">
        <a href="story.html" class="button">➕ Add Story</a>
        <a href="logout.php" class="button">Logout</a>
      </div>
    </div>

    <h2>My Stories</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='story'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo 'Author: <span style="color:blue; ">' . htmlspecialchars($row['username']) . '</span>';
        echo "</div>";
      }
    } else {
      echo "<div class='no-story'>You haven't written any stories yet.</div>";
    }
    ?>
  </div>
</body>
</html>
