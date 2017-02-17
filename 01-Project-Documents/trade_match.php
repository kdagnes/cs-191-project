<!--
Author: Karen Margaret D. Agnes
“This is a course requirement for CS 192 Software Engineering II under the supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer Science, College of Engineering, University of the Philippines, Diliman for the AY 2015-2016”.

CODE HISTORY
Programmer: Karen Agnes
Change Date: February 2, 2017
Change Description: Code was created.
-->
<!--
File Creation: February 2, 2017
Development Group: The A-Team
Purpose: Check correct log in input.
-->
<?php
session_start();
$conn=new mysqli("localhost","root","Karen_02","bookup");
if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}
?>




<html>
<head>
<title> Book UP </title>

</head>
<body>
  <div>
    <form action='main.php'><button>Menu</button></form>
    <form action='add_trade_request.php'><button>Add Trade Request</button></form>
    <form action='logout.php'><button>Log Out</button></form>
  </div>

  
<table>
    <caption>Trade Matches</caption>
    <tr>
      <th>Book To Trade In</th><th>Book To Trade Out</th><th>Username</th><th>Confirm Trade Match</th><th>Cancel Trade Match</th>
    </tr>
    <?php
    $sqlGetTradeRequests="SELECT * FROM `TradeRequests` WHERE `user`='".$_SESSION['user']."'";
    $resultGetTradeRequests=$conn->query($sqlGetTradeRequests);
    if($resultGetTradeRequests){
      if($resultGetTradeRequests->num_rows==0){
        echo "<tr><td>No Trade Matches</td></tr>";
      }
      else{
        while($rowGetTradeRequests=$resultGetTradeRequests->fetch_assoc()){
		  $sqlGetTradeMatches = "SELECT * FROM TradeRequests WHERE tradeOut=".$rowGetTradeRequests['tradeIn']." AND tradeIn =".$rowGetTradeRequests['tradeOut']."";	
		  $resultGetTradeMatches=$conn->query($sqlGetTradeMatches);
		   while($rowGetTradeMatches=$resultGetTradeMatches->fetch_assoc()){
		  
		  
		
          echo "<tr>";
          $temp="<td>".$rowGetTradeRequests['tradeIn']."</td><td>".$rowGetTradeRequests['tradeOut']."</td><td>".$rowGetTradeMatches['user']."</td>";
          echo $temp;
          $temp="<td><form method='post' action='confirm_trade_match.php'><button type='submit' value='".$rowGetTradeRequests['requestID']."' name='confirmTradeMatch'>&#10004;</button></form></td>";
          echo $temp;
		  $temp="<td><form method='post' action='confirm_trade_match.php'><button type='submit' value='".$rowGetTradeRequests['requestID']."' name='cancelTradeMatch'>&times;</button></form></td>";
          echo $temp;
          echo "</tr>";
		   }
        }
      }
    }
    ?>
  </table>


</body>
</html>

<?php
$conn->close();
?>
