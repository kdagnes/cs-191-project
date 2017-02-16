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
-->
<!--
File creation date: Jan. 31, 2017
Development Group: The A-Team
Purpose: This file is used to manage trade requests of user
-->
<?php
session_start();
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
    <title>Trade Requests</title>
  </head>
<body>
  <div>
    <form action='add_trade_request.php'><button type='submit'>Add Trade Request</button></form>
  </div>
  <table>
    <caption>Trade Requests</caption>
    <tr>
      <th>Book To Trade In</th><th>Book To Trade Out</th><th>Delete Trade Request</th>
    </tr>
    <?php
    $sqlGetTradeRequests="SELECT * FROM `TradeRequests` WHERE `user`='1'";
    $resultGetTradeRequests=$conn->query($sqlGetTradeRequests);
    if($resultGetTradeRequests){
      if($resultGetTradeRequests->num_rows==0){
        echo "<tr><td>No Trade Requests</td></tr>";
      }
      else{
        while($rowGetTradeRequests=$resultGetTradeRequests->fetch_assoc()){
          echo "<tr>";
          $temp="<td>".$rowGetTradeRequests['tradeIn']."</td><td>".$rowGetTradeRequests['tradeOut']."</td>";
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
