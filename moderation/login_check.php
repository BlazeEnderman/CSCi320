<?php
//This page checks if the user inputed valid creds, those sick nasty street creds
//yeah man fire raps hella go off
//i hope im the only one looking at this
require_once '../sqlthings/config.php';


function checkLogin()
{ //first check if there is anything in post
  if (($_POST["user"] == "") || ($_POST["password"] == "")) {
    echo "<!DOCTYPE html>
      <html>
      <head>
      <meta charset='utf-8'>
      <title>Oh no!</title>
      </head>
      <body>
      You must fill in all inputs!<br>;
      <a href='./moderator_page_login.php'>Click me</a>;
      </body>
      </html>";
    return;
  } else {
    echo "cleared empty test";
    try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM users WHERE userName=:user AND password=:pass";
      $user = $_POST["user"];
      $pass = $_POST["password"];
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":user", $user);
      $statement->bindValue(":pass", $pass);
      $statement->execute();

      if (empty($row = $statement->fetch())) {
        echo "<!DOCTYPE html>
          <html>
          <head>
          <meta charset='utf-8'>
          <title>Oh no!</title>
          </head>
          <body>
          There was no user matching those credentials, click the link to go back <br>;
          <a href='./moderator_page_login.php'>Click me</a>
          </body>
          </html>";
        return;
      } else {
        $pdo=null;
        $dest = "mod_page.php?user=" . $row["userName"];
        header("Location:" . $dest);
        die();
      }

    } catch (PDOException $e) {
      die($e->getMessage());
    }

  }
}

checkLogin();
 ?>
