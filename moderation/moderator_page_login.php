<?php
//this is the stuff that makes the things happen yall hell yeah
require_once 'mod_config.php';
function getComments()
{
  try {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM comments WHERE checked=0";
      $result = $pdo->query($sql);
      $jArray = "[";
      while ($row = $result->fetch()) {
        $jArray .= "{first:" . $row['firstName'] . "," . "last:". $row['lastName'] . "," . "comment:" . $row['userComment'] . "},"
      }
      substr($jArray, -1);
      $jArray .= "]";
      $pdo=null;
      return $jArray;
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Moderation</title>
    <link rel="stylesheet" href="/modPageStyles.css">
    <script type="text/javascript">
      var comments = <?php getComments() ?>;

      function outputFetchComments() {

      }
    </script>
  </head>
  <body>
    <header id="header">
      <h1>As im sure a wise man once said, Everthing in moderation</h1>
      <p>This is the moderator page, if you are here, you are either supposed to be here or not. If not, leave.</p>
    </header>
    <section class="mainStuff">
      <table id=>

      </table>

    </section>
  </body>
</html>
