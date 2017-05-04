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
Matthew Aycocho; May 3, 2017; changed file name from main.php to home.php
Karen Agnes; May 5, 2017; Made buttons with description
-->
<!--
File creation date: Feb. 16, 2017
Development Group: The A-Team
Purpose: home page
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
    <link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
    <title>Book Up</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('main').className+=" active"</script>
  <div style="background-color: white; width:90%; margin:auto; border:3px solid white; padding:10px; text-align: center;">
		<a  href="my_book.php"><button class="bigbutton bigbutton1"><span class="span1">MY BOOKS</span><br>
											<span class="span2">Share the books you have right now!</span></button></a>
        <a href="trade_request.php"><button class="bigbutton bigbutton1"><span class="span1">TRADE REQUESTS</span><br>
											<span class="span2">Search for the books you want!</span></button></a>
		<a href="trade_match.php"><button class="bigbutton bigbutton1"><span class="span1">TRADE MATCHES</span><br>
											<span class="span2">See and confirm potential trades!</span></button></a>
		<a href="confirmed_trade.php"><button class="bigbutton bigbutton1"><span class="span1">READY-TO-TRADE BOOKS</span><br>
											<span class="span2">Look through your final trades!</span></button></a>
  </div>

</body>
</html>
<?php $conn->close(); ?>
