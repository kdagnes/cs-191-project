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
<title> Book UP </title>

</head>
<body>
<?php
//check if fields are empty
if(empty($_POST['username']) or empty($_POST['password'])){
	echo "Failed to login. Please input your username and password.";

			echo"<p><a href='account.php'>GO BACK</a></p>";
			exit();
	}
//checking if username exists
$sql = "SELECT * FROM accounts WHERE username = '".$_POST['username']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		//check if password matches
		if($row['password'] == $_POST['password']){
			echo "Successfully logged in!";
      $_SESSION['user']=$_POST['username'];
      header("location:trade_request.php");
      die();
		}
		else {
			echo "Wrong password.";
			echo"<p><a href='account.php'>GO BACK</a></p>";
			exit();
		}
		}
	}
	else {
		echo "Wrong username and password."	;
		echo"<p><a href='account.php'>GO BACK</a></p>";
			exit();
	}
?>
</body>
</html>

<?php
$conn->close();
?>
