<!--  Code License
Author: Matthew Aycocho
This is a course requirement for CS 192 Software Engineering II under the
supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
Science, College of Engineering, University of the Philippines, Diliman for
the AY 2016-2017.
-->
<!--  Code History
Name of Programmer; Change Date; Change Description
Matthew Aycocho; Feb. 1, 2017; Initial code
Matthew Aycocho; Feb. 16, 2017; Added session for user
Matthew Aycocho; Mar. 2, 2017; Added book ownership restriction
Matthew Aycocho; Mar. 4, 2017; Removed book ID from display
-->
<!--
File creation date: Feb. 1, 2017
Development Group: The A-Team
Purpose: add a trade request for user
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
if(isset($_POST['tradeOut'])){
  $sql="SELECT * FROM `TradeRequests` WHERE `user`='".$_SESSION['user']."' AND `tradeIn`='".$_POST['hidden']."' AND `tradeOut`='".$_POST['tradeOut']."'";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    $temp="Trade request already exists";
  }
  else{
    $sql="INSERT INTO `TradeRequests` (`user`,`tradeIn`,`tradeOut`) VALUES ('".$_SESSION['user']."','".$_POST['hidden']."','".$_POST['tradeOut']."')";
    $result=$conn->query($sql);
    if($result){
      $temp="Successfully added trade request";
    }
    else{
      $temp="Failed to add trade request";
    }
  }
  echo "<script>alert('$temp'); window.location.href='trade_request.php'</script>";
}
?>
<html>
  <head>
    <title>Add Trade Request</title>
  </head>
<body>
  <div>
    <form action='trade_request.php'><button>Back</button></form>
  </div>
  <?php if(!isset($_POST['tradeIn'])){ ?>
    <table>
      <caption>Select book to trade in</caption>
      <tr>
        <th>Title</th><th>Author</th><th>Year</th><th>Publisher</th><th>Genre</th><th>Subject</th><th>Select</th>
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
            $temp="<td>".$rowGetBooks['title']."</td><td>".$rowGetBooks['author']."</td><td>".$rowGetBooks['year']."</td><td>".$rowGetBooks['publisher']."</td><td>".$rowGetBooks['genre']."</td><td>".$rowGetBooks['subject']."</td>";
            echo $temp;
            $temp="<td><form method='post'><button type='submit' name='tradeIn' value='".$rowGetBooks['bookID']."'>&plus;</button></form></td>";
            echo $temp;
            echo "</tr>";
          }
        }
      }
      ?>
    </table>
  <?php } ?>
  <?php if(isset($_POST['tradeIn'])){ ?>
  <table>
    <caption>Select book to trade out</caption>
    <tr>
      <th>Title</th><th>Author</th><th>Year</th><th>Publisher</th><th>Genre</th><th>Subject</th><th>Select</th>
    </tr>
    <?php
    $sqlGetBooks="SELECT * FROM `Books` WHERE `bookID` IN (SELECT `bookID` FROM `MyBooks` WHERE `user`='".$_SESSION['user']."') AND NOT(`bookID`='".$_POST['tradeIn']."')";
    $resultGetBooks=$conn->query($sqlGetBooks);
    if($resultGetBooks){
      if($resultGetBooks->num_rows==0){
        echo "<tr><td>No Books</td></tr>";
      }
      else{
        while($rowGetBooks=$resultGetBooks->fetch_assoc()){
          echo "<tr>";
          $temp="<td>".$rowGetBooks['title']."</td><td>".$rowGetBooks['author']."</td><td>".$rowGetBooks['year']."</td><td>".$rowGetBooks['publisher']."</td><td>".$rowGetBooks['genre']."</td><td>".$rowGetBooks['subject']."</td>";
          echo $temp;
          $temp="<td><form method='post'><input type='hidden' name='hidden' value='".$_POST['tradeIn']."'><button type='submit' name='tradeOut' value='".$rowGetBooks['bookID']."'>&plus;</button></form></td>";
          echo $temp;
          echo "</tr>";
        }
      }
    }
    ?>
  </table>
  <?php } ?>
</body>
</html>
<?php $conn->close(); ?>
