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
    <title>Book UP</title>
  </head>
<body>
  <div>
    <form action='trade_request.php'><button>Trade Requests</button></form>
    <form action='logout.php'><button>Log Out</button></form>
  </div>
</body>
</html>
<?php $conn->close(); ?>
