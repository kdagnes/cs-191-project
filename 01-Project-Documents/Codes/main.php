<!--  Code License
Author: Matthew Aycocho
This is a course requirement for CS 192 Software Engineering II under the
supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
Science, College of Engineering, University of the Philippines, Diliman for
the AY 2016-2017.
-->
<!--  Code History
Name of Programmer; Change Date; Change Description
Matthew Aycocho; Feb. 16, 2017; Initial code
Karen Agnes; April 4, 2017; States tutorial
-->
<!--
File creation date: Feb. 16, 2017
Development Group: The A-Team
Purpose: main page
-->
<?php
session_start();
if(!isset($_SESSION['user'])){header("location:account.php");die();}
$conn=new mysqli("localhost","root","Karen_02","bookup");
if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Book UP</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('main').className+=" active"</script>
  <div style="background-color: #f2f2f2; width:90%; margin:auto; border:3px solid #6B7A8F; padding:10px; text-align: center;">
  <h2>Book UP is a book sharing app where book owners can easily find other book owners to exchange books and meet with other fellow book lovers. <br> <br>
  </h2> <p>
  To start of, you may click the <button class="button1">My books</button> option at the menu bar. It contains all your current books which you can trade. You can either add or remove books. <br><br>
  The <button class="button1">Trade Requests</button> option brings you to where you can request for a trade. You can choose whichever books that are available and request for a trade with the corresponding book you will give in return. <br><br>
  When you click the <button class="button1">Trade Matches</button> option, you can see if someone wants to trade with you. In here, you can confirm the trade match which means you are fully committed to trade with a fellow trader.<br><br>
  Lastly, the <button class="button1">Ready to Trade</button> option shows you the final trades you are involved in.<br><br><br>
  And at the farther right of the menu bar, you can click the <button class="button1">Log Out</button> when you are done doing trades.<br>
  </p>
  </div>
  
</body>
</html>
<?php $conn->close(); ?>