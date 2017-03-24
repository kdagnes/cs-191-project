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
Matthew Aycocho; Mar. 3, 2017; Book titles are shown instead of book IDs
-->
<!--
File creation date: Jan. 31, 2017
Development Group: The A-Team
Purpose: manage trade requests of user
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
if(isset($_POST['deleteTradeRequest'])){
  $sql="DELETE FROM `TradeRequests` WHERE `requestID`='".$_POST['deleteTradeRequest']."'";
  $result=$conn->query($sql);
  if(!$result){
    echo "Failed to delete trade request";
  }
  else{
    echo "Successfully deleted trade request";
  }
}
?>
<html>
  <head>
   <link rel="stylesheet" href="style.css">
    <title>Trade Requests</title>
  </head>
<body>
    <?php include "menu.php" ?>
    <script>document.getElementById('trade_request').className+=" active"</script>
  <div>

    <form action='add_trade_request.php'><button class = "button1">Add Trade Request</button></form>
  </div>
  <table>
    <caption>Trade Requests</caption>
    <tr>
      <th>Book To Trade In</th><th>Book To Trade Out</th><th>Delete Trade Request</th>
    </tr>
    <?php
    $sqlGetTradeRequests="SELECT * FROM `TradeRequests` WHERE `user`='".$_SESSION['user']."'";
    $resultGetTradeRequests=$conn->query($sqlGetTradeRequests);
    if($resultGetTradeRequests){
      if($resultGetTradeRequests->num_rows==0){
        echo "<tr><td>No Trade Requests</td></tr>";
      }
      else{
        while($rowGetTradeRequests=$resultGetTradeRequests->fetch_assoc()){
          $bookTradeIn=$rowGetTradeRequests['tradeIn'];
          $bookTradeOut=$rowGetTradeRequests['tradeOut'];
          $sqlGetBookTradeIn="SELECT * FROM `Books` WHERE `bookID`='".$bookTradeIn."'";
          $resultGetBookTradeIn=$conn->query($sqlGetBookTradeIn);
          $rowGetBookTradeIn=$resultGetBookTradeIn->fetch_assoc();
          echo "<tr>";
          $temp="<td>".$rowGetBookTradeIn['title']."</td>";
          echo $temp;
          $sqlGetBookTradeOut="SELECT * FROM `Books` WHERE `bookID`='".$bookTradeOut."'";
          $resultGetBookTradeOut=$conn->query($sqlGetBookTradeOut);
          $rowGetBookTradeOut=$resultGetBookTradeOut->fetch_assoc();
          $temp="<td>".$rowGetBookTradeOut['title']."</td>";
          echo $temp;
          $temp="<td><form method='post'><button type='submit' value='".$rowGetTradeRequests['requestID']."' name='deleteTradeRequest'>&times;</button></form></td>";
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
