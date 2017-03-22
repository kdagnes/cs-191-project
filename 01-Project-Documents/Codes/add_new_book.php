<!--  Code License
Author: Matthew Aycocho
This is a course requirement for CS 192 Software Engineering II under the
supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
Science, College of Engineering, University of the Philippines, Diliman for
the AY 2016-2017.
-->
<!--  Code History
Name of Programmer; Change Date; Change Description
Matthew Aycocho; Mar. 4, 2017; Initial code
-->
<!--
File creation date: Mar. 4, 2017
Development Group: The A-Team
Purpose: add new book that is not in the database
-->
<?php
session_start();
if(!isset($_SESSION['user'])){header("location:account.php");die();}
$conn=new mysqli("localhost","root","Karen_02","bookup");
if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}
?>

<?php
if(isset($_POST['addNewBook'])){
  $sqlCheckBook="SELECT * FROM `Books` WHERE `title`='".$_POST['title']."' AND `author`='".$_POST['author']."' AND `year`='".$_POST['year']."'";
  $resultCheckBook=$conn->query($sqlCheckBook);
  if($resultCheckBook->num_rows>0){
    $temp="Book already exists";
  }
  else{
    $sqlInsertNewBook="INSERT INTO `Books` (`title`,`author`,`year`,`publisher`,`genre`,`subject`) VALUES ('".$_POST['title']."','".$_POST['author']."','".$_POST['year']."','".$_POST['publisher']."','".$_POST['genre']."','".$_POST['subject']."')";
    $resultInsertNewBook=$conn->query($sqlInsertNewBook);
    if($resultInsertNewBook){
      $temp="Successfully added new book";
    }
    else{
      $temp="Failed to add new book";
    }
  }
  echo "<script>alert('$temp'); window.location.href='add_new_book.php'</script>";
}
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Add New Book</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <div>
    <form action='add_book.php'><button>Back</button></form>
  </div>
  <form method='post'>
    <div>
      Title: <br><input type='text' name='title' required></input><br>
      Author: <br><input type='text' name='author' required></input><br>
      Year: <br><input type='number' name='year' min='0' required></input><br>
      Publisher: <br><input type='text' name='publisher' required></input><br>
      Genre: <br><input type='text' name='genre'></input><br>
      Subject: <br><input type='text' name='subject'></input><br>
    </div>
    <button type='submit' name='addNewBook'>Add</button>
  </form>
</body>
</html>
<?php $conn->close(); ?>
