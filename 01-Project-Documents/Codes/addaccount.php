<?php

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
Username:   <input type='text' name='username'>
Password:   <input type='password' name='password'>
Name:   <input type='text' name='name'>
Email:   <input type='text' name='email'>
Mobile:   <input type='text' name='mobile'>

</body>
</html>

<?php
$conn->close();
?>