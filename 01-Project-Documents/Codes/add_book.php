<!--  Code License
Author: Matthew Aycocho
This is a course requirement for CS 192 Software Engineering II under the
supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
Science, College of Engineering, University of the Philippines, Diliman for
the AY 2016-2017.
-->
<!--  Code History
Name of Programmer; Change Date; Change Description
Matthew Aycocho; Mar. 2, 2017; Initial code
-->
<!--
File creation date: Feb. 16, 2017
Development Group: The A-Team
Purpose: add books that the user own
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
if(isset($_POST['addBook'])){
  $sql="SELECT * FROM `MyBooks` WHERE `user`='".$_SESSION['user']."' AND `bookID`='".$_POST['addBook']."' ";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    $temp="Book already exists";
  }
  else{
    $sql="INSERT INTO `MyBooks` (`user`,`bookID`) VALUES ('".$_SESSION['user']."','".$_POST['addBook']."')";
    $result=$conn->query($sql);
    if($result){
      //$temp="Successfully added book";
    }
    else{
      $temp="Failed to add book";
      echo "<script>alert('$temp'); window.location.href='my_book.php'</script>";
    }
  }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
    <title>Add Book</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('my_book').className+=" active"</script>
  <div>
    <form action='my_book.php'><button class = "button1">Back</button></form>
    <form action='add_new_book.php'><button class = "button1">Add New Book</button></form>
  </div>
  <table>
    <caption>Select book</caption>
    <tr>
      <th>Select</th><th>Title</th><th>Author</th><th>Year</th><th>Publisher</th><th>Genre</th><th>Subject</th>
    </tr>
    <?php
    $sqlGetBooks="SELECT * FROM `Books` WHERE `bookID` NOT IN (SELECT `bookID` FROM `MyBooks` WHERE `user`='".$_SESSION['user']."')";
    $resultGetBooks=$conn->query($sqlGetBooks);
    if($resultGetBooks){
      if($resultGetBooks->num_rows==0){
        echo "<tr><td>No Books</td></tr>";
      }
      else{
        while($rowGetBooks=$resultGetBooks->fetch_assoc()){
          echo "<tr>";
          $temp="<td><form method='post'><button class ='button' type='submit' name='addBook' value='".$rowGetBooks['bookID']."'>&plus;</button></form></td>";
          echo $temp;
          $temp="<td>".$rowGetBooks['title']."</td><td>".$rowGetBooks['author']."</td><td>".$rowGetBooks['year']."</td><td>".$rowGetBooks['publisher']."</td><td>".$rowGetBooks['genre']."</td><td>".$rowGetBooks['subject']."</td>";
          echo $temp;
          echo "</tr>";
        }
      }
    }
    ?>
  </table>
</body>
</html>
<?php $conn->close(); ?>
