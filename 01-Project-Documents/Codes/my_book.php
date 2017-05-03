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
Matthew Aycocho; Mar. 3, 2017; Book titles are shown instead of book IDs
-->
<!--
File creation date: Feb. 16, 2017
Development Group: The A-Team
Purpose: manage books of user
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
if(isset($_POST['removeBook'])){
  $sql="DELETE FROM `MyBooks` WHERE `ownID`='".$_POST['removeBook']."'";
  $result=$conn->query($sql);
  if(!$result){
    echo "Failed to remove book";
  }
  else{
    echo "Successfully removed book";
  }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
    <title>My Books</title>
  </head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('my_book').className+=" active"</script>
  <div>
    <form action='add_book.php'><button class="button1">Add Book</button></form>
  </div>
  <table>
    <caption>My Books</caption>
    <tr>
      <th><p>Title</p></th><th>Remove</th> </p>
    </tr>
    <?php
    $sqlGetMyBooks="SELECT * FROM `MyBooks` WHERE `user`='".$_SESSION['user']."'";
    $resultGetMyBooks=$conn->query($sqlGetMyBooks);
    if($resultGetMyBooks){
      if($resultGetMyBooks->num_rows==0){
        echo "<tr><td colspan='99'>Books</td></tr>";
      }
      else{
        while($rowGetMyBooks=$resultGetMyBooks->fetch_assoc()){
          $myBook=$rowGetMyBooks['bookID'];
          $sqlGetMyBook="SELECT * FROM `Books` WHERE `bookID`='".$myBook."'";
          $resultGetMyBook=$conn->query($sqlGetMyBook);
          $rowGetMyBook=$resultGetMyBook->fetch_assoc();
          echo "<tr>";
          $temp="<td><p>".$rowGetMyBook['title']."</p></td>";
          echo $temp;
          $temp="<td><form method='post'><button class='button' type='submit' value='".$rowGetMyBooks['ownID']."' name='removeBook'>&times;</button></form></td>";
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
