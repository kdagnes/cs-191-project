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
Purpose: Display log in and create account.
-->
<html>
<head>
<title> Book UP </title>

</head>
<body>

 <form action="login.php" method="post">
 LOGIN <br><br>
Username: <br>   <input type='text' name='username'><br>
Password: <br> <input type='password' name='password'><br><br>
<input type='submit' value='Log In'> <br> <br>
</form>
<form action="createaccount.php" method="post">

Don't have an account yet?<br>
Fill up to create an account!<br> <br>
Username: <br>  <input type='text' name='username'> <br>
Password:<br>   <input type='password' name='password'> <br>
Name:   <br><input type='text' name='name'> <br>
Email:   <br><input type='text' name='email'> <br>
Mobile:   <br><input type='text' name='mobile'> <br>
<input type='submit' value='Create!'> <br>

</form>
</body>
</html>

