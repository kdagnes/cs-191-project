<!--
Author: Karen Margaret D. Agnes
“This is a course requirement for CS 192 Software Engineering II under the supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer Science, College of Engineering, University of the Philippines, Diliman for the AY 2015-2016”.
CODE HISTORY
Programmer: Karen Agnes
Change Date: February 2, 2017
Change Description: Code was created.
Karen Agnes; April 4, 2017; Edited button design and column name
-->
<!--
File Creation: February 2, 2017
Development Group: The A-Team
Purpose: Check correct log in input.
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
if(isset($_POST['confirmTradeMatch'])){
	//echo $_SESSION['user'];
	//echo $_POST['user'];
	//echo $_POST['book1'];
	//echo $_POST['book2'];
	//echo $_POST['requestID2'];
	$temp = "";
	//echo $_POST['confirmTradeMatch'];
	$sql="SELECT * FROM `tradematches` WHERE (user1= '".$_SESSION['user']."' AND book1 ='".$_POST['book1']."' AND user2 ='".$_POST['user']."' AND book2 ='".$_POST['book2']."') OR
												(user2='".$_SESSION['user']."' AND book2 ='".$_POST['book1']."' AND user1 ='".$_POST['user']."' AND  book1 ='".$_POST['book2']."')";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		$sql="INSERT INTO `tradematches` ( user1,user2,book1,book2,confirm1,confirm2,matchID) VALUES ('".$_SESSION['user']."','".$_POST['user']."','".$_POST['book1']."','".$_POST['book2']."',1,0,0)";
		if ($conn->query($sql) === TRUE) {
			$temp = "New record created successfully. We'll still wait for the other trader to confirm.";
		} else {
			$temp = "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		while($GetTradeMatch=$result->fetch_assoc()){
				$sql = "UPDATE tradematches SET confirm2 = 1 WHERE matchID = ".$GetTradeMatch['matchID'].";";
				if ($conn->query($sql) === TRUE) {
					$sql = "DELETE FROM traderequests WHERE requestID =".$_POST['confirmTradeMatch']." ";
					if ($conn->query($sql) === TRUE) {
						$temp = "Record updated successfully. Check Ready to trade books.";
					} else {
						$temp = "Error deleting record: " . $conn->error;
					}
					$sql = "DELETE FROM traderequests WHERE requestID =".$_POST['requestID2']." ";
					if ($conn->query($sql) === TRUE) {
						$temp = "Record updated successfully. Check Ready to trade books.";
					} else {
						$temp = "Error deleting record: " . $conn->error;
					}
				}	 else {
					$temp = "Error updating record: " . $conn->error;
				}
		}
	}
	//echo $temp;
	echo "<script>alert('$temp'); window.location.href='trade_match.php'</script>";
}
?>



<?php
if(isset($_POST['cancelTradeMatch'])){
	$sql = "DELETE FROM tradematches WHERE matchID =".$_POST['cancelTradeMatch']." ";
					if ($conn->query($sql) === TRUE) {
						$temp = "Successfully canceled confirmation to trade match.";
					} else {
						$temp = "Error Cancelling" . $conn->error;
					}
	echo "<script>alert('$temp'); window.location.href='trade_match.php'</script>";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
<title>Trade Matches</title>

</head>
<body>
  <?php include "menu.php" ?>
  <script>document.getElementById('trade_match').className+=" active"</script>

<table>
    <caption>Trade Matches</caption>
    <tr>
      <th>Book to Receive</th><th>Book to Give</th><th>Trader</th><th>Confirm</th>
    </tr>
    <?php
    $sqlGetTradeRequests="SELECT * FROM `TradeRequests` WHERE `user`='".$_SESSION['user']."'";
    $resultGetTradeRequests=$conn->query($sqlGetTradeRequests);
    if($resultGetTradeRequests){
      if($resultGetTradeRequests->num_rows==0){
        echo "<tr><td colspan='99'>No trade matches</td></tr>";
      }
      else{
        while($rowGetTradeRequests=$resultGetTradeRequests->fetch_assoc()){
		  $sqlGetTradeMatches = "SELECT B1.title AS first, B2.title AS second, T.user AS user, B1.bookID AS bookid1, B2.bookID AS bookid2, T.requestID AS requestID2  FROM TradeRequests T, books B1, books B2  WHERE T.tradeOut = B1.bookid AND T.tradeIn = B2.bookid AND T.tradeOut=".$rowGetTradeRequests['tradeIn']." AND T.tradeIn =".$rowGetTradeRequests['tradeOut']."";
		  $resultGetTradeMatches=$conn->query($sqlGetTradeMatches);
		   while($rowGetTradeMatches=$resultGetTradeMatches->fetch_assoc()){
          echo "<tr>";
          $temp="<td>".$rowGetTradeMatches['first']."</td><td>".$rowGetTradeMatches['second']."</td><td>".$rowGetTradeMatches['user']."</td>";
          echo $temp;
          $temp="<td><form method='post'><input type='hidden' name='requestID2' value='".$rowGetTradeMatches['requestID2']."'>
										 <input type='hidden' name='user' value='".$rowGetTradeMatches['user']."'>
										 <input type='hidden' name='book1' value='".$rowGetTradeMatches['bookid1']."'>
										 <input type='hidden' name='book2' value='".$rowGetTradeMatches['bookid2']."'>"; echo $temp;
										 $sqlCheckConfirm = "SELECT * FROM `tradematches` WHERE user1 = '".$_SESSION['user']."' AND user2 = '".$rowGetTradeMatches['user']."' AND book1 = ".$rowGetTradeMatches['bookid1']." AND book2 = ".$rowGetTradeMatches['bookid2']."  AND confirm1 = 1;";
										 $resultCheckConfirm = $conn->query($sqlCheckConfirm);
										if($resultCheckConfirm){
											if($resultCheckConfirm->num_rows==0){
											$temp =  "<button class='button confirm' type='submit' value='".$rowGetTradeRequests['requestID']."' name='confirmTradeMatch'>&#10004;</button>
						</form></td>";
										 }
										 else
										 {
											while($rowCheckConfirm=$resultCheckConfirm->fetch_assoc()){
											$temp =  "<form method = 'post'>
											<button class='button cancel'type='submit' value='".$rowCheckConfirm['matchID']."' name='cancelTradeMatch'>Cancel Confirmation</button>
											</form></td>";
											}
										 }
										}
										else{
											echo "Error " . $conn->error;
										}
          echo $temp;
		 // $temp="<td><form method='post'><button type='submit' value='".$rowGetTradeRequests['requestID']."' name='deleteTradeMatch'>&times;</button></form></td>";
         // echo $temp;
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
