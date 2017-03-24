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
$conn = new mysqli("localhost", "root", "Karen_02", "bookup");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html>
<head>
 <link rel="stylesheet" href="style.css">
<title> Book UP </title>

</head>
<body>

  <?php include "menu.php" ?>

  <table>
    <caption>Ready to Trade Books</caption>
    <tr>
      <th>The Book You Will Give</th><th>The Book You Will Receive</th><th>The Trader</th>
    </tr>
    <?php
	  $sqlGetTradeMatch = "SELECT B1.title AS book1, B2.title AS book2, T.user1 AS user1, T.user2 AS user2 FROM TradeMatches T, books B1, books B2  WHERE T.book1 = B1.bookid AND T.book2 = B2.bookid AND (`user1`='".$_SESSION['user']."' OR `user2`='".$_SESSION['user']."')";
  //  $sqlGetTradeMatch="SELECT * FROM `tradematches` WHERE `user1`='".$_SESSION['user']."' OR `user2`='".$_SESSION['user']."'";
    $resultGetTradeMatch=$conn->query($sqlGetTradeMatch);
    if($resultGetTradeMatch){
      if($resultGetTradeMatch->num_rows==0){
        echo "<tr><td>No Ready to Trade Books</td></tr>";
      }
      else{
        while($rowGetTradeMatch=$resultGetTradeMatch->fetch_assoc()){
			if($rowGetTradeMatch['user1'] == $_SESSION['user']){
				$bookTradeIn = $rowGetTradeMatch['book1'];
				$bookTradeOut = $rowGetTradeMatch['book2'];
				$bookTrader = $rowGetTradeMatch['user2'];
			}
			else{
				$bookTradeIn = $rowGetTradeMatch['book2'];
				$bookTradeOut = $rowGetTradeMatch['book1'];
				$bookTrader = $rowGetTradeMatch['user1'];
			}
       
			echo "<tr>";
			
			echo "<td>".$bookTradeIn."</td><td>".$bookTradeOut."</td><td>".$bookTrader."</td>";
			echo "</tr>";
        }
      }
    }
	else{
		$temp = "Error updating record: " . $conn->error;
		echo $temp;
	}
    ?>
  </table>


</body>
</html>

<?php
$conn->close();
?>