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
Purpose: Creation of account.
-->
<?php

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
<?php
/*check if fields are empty*/
if(empty($_POST['username']) or empty($_POST['password']) or empty($_POST['name']) or empty($_POST['email']) or empty($_POST['mobile']) or 	!is_numeric($_POST['mobile'])){
	$temp = "Failed to create an account. Please properly fill up all details";
	echo "<script>alert('$temp'); window.location.href='account.php'</script>";
			exit();
}

/*inserting values to accounts*/
$sql = "INSERT INTO accounts (username, password, name,email,mobile)
VALUES ('".$_POST['username']."', '".$_POST['password']."','".$_POST['name']."','".$_POST['email']."','".$_POST['mobile']."')";
if ($conn->query($sql) === TRUE) {
    $temp = "New record created successfully! Please log in using your new account.";
	echo "<script>alert('$temp'); window.location.href='account.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>

</body>
</html>

<?php
$conn->close();
?>
