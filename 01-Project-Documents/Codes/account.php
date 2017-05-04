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
<link rel="shortcut icon" type="image/x-con" href="book-up-logo.png">
<title>Book Up</title>
</head>
<body >
  <?php include "menu.php" ?>
  <script>document.getElementById('login').className+=" active"</script>

  <div style='height:300px' class='form'>
  <br><a class='form-header'>Log In to Book Up</a><br><br><br>
  <form action="login.php" method="post"><p>
    <input type='text' name='username' placeholder='Username...' class='input' autofocus>
    <input type='password' name='password' placeholder='Password..' class='input'>
    <br><input type='submit' value='Log In' class="button1">
  </form>
  </div>
  <br><div style='text-align:center;'><button style='border:none;background:none' onclick='window.scrollTo(0,6000)'><a style='text-decoration:none' href=''>Don't have an account yet?<br>Create an account</a></button></div>

  <div style='margin-top:300px; margin-bottom:100px' class='form'>
  <form action="createaccount.php" method="post">
    <br><a class='form-header'>Register to Book Up</a><br><br><br>
    <input type='text' name='username' placeholder='Username...' class='input'>
    <input type='password' name='password' placeholder='Password...' class='input'>
    <input type='text' name='name' placeholder='Full name...' class='input'>
    <input type='text' name='email' placeholder='Email...' class='input'>
    <input type='number' name='mobile' placeholder='Mobile number...' class='input'>
    <br><input type='submit' value='Create!' class="button1">
  </form>
  </div>

</body>
</html>
