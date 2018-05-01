<?php
require_once('sqlthings/config.php');
function checkForm(){
  if (($_POST["firstname"] == "") || ($_POST["lastname"] == "") || ($_POST["subject"] == "")) {
    echo "<!DOCTYPE html>
      <html>
      <head>
      <meta charset='utf-8'>
      <title>Oh no!</title>
      </head>
      <body>
      You must fill in all inputs!<br>
      <a href='./contact.php'>Click me</a>
      </body>
      </html>";
    return;
  } else {
    try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $firstName = $_POST['firstname'];
      if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        echo "<!DOCTYPE html>
          <html>
          <head>
          <meta charset='utf-8'>
          <title>OH NO!</title>
          </head>
          <body>
          Only letters and white space allowed!<br>
          <a href='./contact.php'>Click me</a>
          </body>
          </html>";
          exit(0);
        }
      $lastName = $_POST['lastname'];
      if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        echo "<!DOCTYPE html>
          <html>
          <head>
          <meta charset='utf-8'>
          <title>OH NO!</title>
          </head>
          <body>
          Only letters and white space allowed!<br>
          <a href='./contact.php'>Click me</a>
          </body>
          </html>";
          exit(0);
        }
      $comment = $_POST['subject'];
      if (!preg_match("/^[a-zA-Z0-9.,?! ]*$/",$comment)) {
        echo "<!DOCTYPE html>
          <html>
          <head>
          <meta charset='utf-8'>
          <title>OH NO!</title>
          </head>
          <body>
          Only letters, numbers and white space allowed!<br>
          <a href='./contact.php'>Click me</a>
          </body>
          </html>";
          exit(0);
        }
      $sql = "INSERT INTO comments (firstName, lastName, userComment, approved, checked, id) VALUES (:first, :last, :comm, 0, 0, NULL)";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":first", $firstName);
      $statement->bindValue(":last", $lastName);
      $statement->bindValue(":comm", $comment);
      $statement->execute();

      $pdo=null;
  } catch (PDOException $e) {
    die($e->getMessage());
  }
  echo "<!DOCTYPE html>
    <html>
    <head>
    <meta charset='utf-8'>
    <title>Thank You!</title>
    </head>
    <body>
    Comment submitted<br>
    <a href='./contact.php'>Click me</a>
    </body>
    </html>";
}
}
checkForm();
 ?>
