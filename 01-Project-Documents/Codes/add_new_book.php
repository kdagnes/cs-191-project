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
    <link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
    <title>Add New Book</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('my_book').className+=" active"</script>
  <div>
    <form action='add_book.php'><button class="button1">Back</button></form>
  </div>

  <div style='margin-left:25%;width:50%' class='form'>
    <form method='post'>
      <br><a class='form-header'>Input the book details</a><br><br><br>
      <input type='text' name='title' placeholder='Title...' class='input' required></input>
      <input type='text' name='author' placeholder='Author...' class='input' required></input>
      <input type='number' name='year' min='0' placeholder='Year...' class='input' required></input>
      <input type='text' name='publisher' placeholder='Publisher...' class='input' required></input>
      <input type='text' name='genre' placeholder='Genre...' class='input'></input>
      <input type='text' name='subject' placeholder='Subject...' class='input'></input>
		  <br><button type='submit' name='addNewBook' class='button1'>Add Book</button>
    </div>

  </form>
</body>
</html>
<?php $conn->close(); ?>
