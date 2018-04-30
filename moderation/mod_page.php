<?php
session_start();

$_SESSION['user'] = $_GET['user'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Moderation</title>
    <link rel="stylesheet" href="modPageStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    var z ={};

      $('document').ready(function () {
        $('request').click(function () {
          z.getQuote();
        });
        $('sub').click(function () {
          z.submitMod();
        })
      });


      z.getQuote = function () {
        var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               var text = this.responseText;
               $('#first').html(text[0]);
               $('#last').html(text[1]);
               $('#comment').html(text[2]);
               $('#number').html(text[3]);
           }
       };
       xmlhttp.open("GET", "getfile.php?function=1", true);
       xmlhttp.send();
      }

      z.submitMod = function () {
        var checked = $("approve").attr("checked");
        var id = $("#number");

        var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
             var text = this.responseText;
             $('.response').html(text);
           }
       };
       xmlhttp.open("GET", "getfile.php?function=2&state=" + checked + "&id=" + id, true);
       xmlhttp.send();
      }

    </script>
  </head>
  <body>
    <header id="header">
      <h2>Welcome <?php echo $_SESSION['user']; ?></h2>
      <p>As i'm sure you are aware, this is for SERIOUS WORK ONLY</p>
    </header>
    <main class="mainStuff">
      <div id="container">
        <span id="first"></span>
        <span id="last"></span>
        <span id='number'></span>
        <div id="comment">

        </div>

        <input type="radio" name="approve">approve this content?<br>
        <button type="button" name="request">Get Next Comment</button>
        <button type="button" name="sub">Submit</button>
      </div>
      <div class="response">

      </div>

    </main>

  </body>
</html>
