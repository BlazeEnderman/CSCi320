<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="finalProject/stylez.css" />
  </head>
  <body>
    <div id= "navBar">
      <img src="PUBG_Header.png" alt="HeaderIMG">
      <ul>
      <li><a href="finalProject/finalDesign.php">Home</a></li>
      <li><a href="contact.php">Comment Form</a></li>
      <li><a href="about.php">Game Spec</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li> <a href="comments.php">Comments</a> </li>
      </ul>
    </div>
<br>
    <div class="container">
      <form action="action_page.php" method="post">

        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <br>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <br>
        <label for="subject">Comment</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <br>
        <input id="contactButton" type="submit" value="Submit">

      </form>
    </div>
  </body>
</html>
