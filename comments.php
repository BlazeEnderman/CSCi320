<?php

//GET 10 LATEST comments
require_once('sqlthings/config.php');
function outputComments()
{
  try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM comments WHERE approved=1";
      $result = $pdo->query($sql);
      while ($row = $result->fetch()) {
        outputSingleComment($row);
      }
      $pdo=null;
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

function outputSingleComment($row)
{
  echo "<h2>What " . $row['firstName'] . " " . $row['lastName'] . " says about PUBG: </h2>" .
      "<p>" . $row['userComment'] . "</p>";
}


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="finalProject/stylez.css" />
    <title>Comments</title>
  </head>
  <body>
    <main>
      <a href="moderation\moderator_page_login.php">Moderator Login</a>
      <div id= "navBars">
        <header>
        <img src="PUBG_Header.png" alt="HeaderIMG">
        <p> <ul>
          <li> <a href="finalProject\finalDesign.php">Home</a> </li>
          <li> <a href="contact.php">Leave Comment</a> </li>
          <li> <a href="about.php">About Us</a> </li>
          <li> <a href="faq.php">FAQ</a></li>
          <li> <a href="comments.php">Comments</a> </li>
        </ul> </p>
      </header>
    </div>

      <section>
        <h1>What people are saying about PUBG</h1>
        <br>
        <?php outputComments() ?>
      </section>

    </main>
  </body>
</html>
