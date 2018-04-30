<?php
require 'mod_config.php';

$funct = $_REQUEST['function'];

if ($funct == 1) {
 try{
  $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM comments WHERE approved=0 AND checked=0 LIMIT 1";
  $result = $pdo->query($sql);
  if ($row = $result->fetch()) {
    echo  $row['firstName'] . "|" . $row['lastName'] . "|" . $row['userComment'] . "|" . $row['id'];
  }

  $pdo = null;
 }catch (PDOException $e) {
  die($e->getMessage());
 }

} else if ($funct == 2) {
  $approved = $_REQUEST['state'];
  $id = $_REQUEST['id'];
  if ($approved == true) {
    try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE comments SET approved=1, checked=1 WHERE id=:id";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  } elseif ($approved == false) {
    try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE comments SET approved=1,checked=1 WHERE id=:id;";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
      echo "Comment M O D E R A T E D";
      $pdo = null;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
} else {
  echo "['not', 'working', 'yet', 000]";
}
?>
