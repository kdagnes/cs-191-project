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
Purpose: This file is used to manage trade requests of user
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
  $sql="SELECT * FROM `<table>` WHERE `<user column>`='".$_SESSION['user']."' AND `<book column>`='".$_POST['addBook']."' ";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    $temp="Book already exists";
  }
  else{
    $sql="INSERT INTO `<table>` (`<user column>`,`<book column>`) VALUES ('".$_SESSION['user']."','".$_POST['addBook']."')";
    $result=$conn->query($sql);
    if($result){
      $temp="Successfully added book";
    }
    else{
      $temp="Failed to add book";
    }
  }
  echo "<script>alert('$temp'); window.location.href='my_book.php'</script>";
}
?>
<html>
  <head>
    <title>My Books</title>
  </head>
<body>
  <div>
    <form action='main.php'><button>Back</button></form>
  </div>
  <table>
    <caption>Select book</caption>
    <tr>
      <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Publisher</th><th>Genre</th><th>Subject</th><th>Select</th>
    </tr>
    <?php
    $sqlGetBooks="SELECT * FROM `Books`";
    $resultGetBooks=$conn->query($sqlGetBooks);
    if($resultGetBooks){
      if($resultGetBooks->num_rows==0){
        echo "<tr><td>No Books</td></tr>";
      }
      else{
        while($rowGetBooks=$resultGetBooks->fetch_assoc()){
          echo "<tr>";
          $temp="<td>".$rowGetBooks['bookID']."</td><td>".$rowGetBooks['title']."</td><td>".$rowGetBooks['author']."</td><td>".$rowGetBooks['year']."</td><td>".$rowGetBooks['publisher']."</td><td>".$rowGetBooks['genre']."</td><td>".$rowGetBooks['subject']."</td>";
          echo $temp;
          $temp="<td><form method='post'><button type='submit' name='addBook' value='".$rowGetBooks['bookID']."'>&plus;</button></form></td>";
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
