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
<link rel="stylesheet" href="style.css">
<title> Book UP </title>

</head>
<body >
<nav>

</nav>



<ul>


 <form action="login.php" method="post"><p>
<b> Welcome to Book Up!</b> <br><br>
Username: <br>   <input type='text' name='username' placeholder='Username...'><br>
Password: <br> <input type='password' name='password' placeholder='Password..'><br><br>
<input type='submit' value='Log In' class="button1"> <br> <br></p>
</form>

<form action="createaccount.php" method="post">
<p>
Don't have an account yet?<br>
Fill up to create an account!<br> <br>
Username: <br>  <input type='text' name='username'> <br>
Password:<br>   <input type='password' name='password'> <br>
Name:   <br><input type='text' name='name'> <br>
Email:   <br><input type='text' name='email'> <br>
Mobile:   <br><input type='text' name='mobile'> <br><br>
<input type='submit' value='Create!' class="button1"> <br>
</p>
</form>

</ul>

<article>
<div style="background-color: #F7882F; ">

 <h1>Book Up</h1>
</div>
 <br> <p style="font-color:white;"> 	<br> The A-Team </p>
</article>


</body>
</html>