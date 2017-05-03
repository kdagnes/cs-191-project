<!--  Code License
Author: Matthew Aycocho
This is a course requirement for CS 192 Software Engineering II under the
supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
Science, College of Engineering, University of the Philippines, Diliman for
the AY 2016-2017.
-->
<!--  Code History
Name of Programmer; Change Date; Change Description
Matthew Aycocho; Mar. 22, 2017; Initial code
Karen Agnes; April 4, 2017; Added Main at menu bar
Matthew Aycocho; May 3, 2017; Changed UI
-->
<!--
File creation date: Mar. 22, 2017
Development Group: The A-Team
Purpose: displays the menu header
-->

<link rel="stylesheet" href="style.css">
<div class='menu'>
  <li style='float:left'><a href='home.php'><img src="book-up-menu-logo.png" alt="Book Up"></a></li>
  <br><br><br>
  <li style='float:right;'><a href='logout.php'>LOG OUT</a></li>
  <li style='float:right'><a href='confirmed_trade.php' id='confirmed_trade' class='menu_tab active'>Ready-to-Trade Books</a></li>
  <li style='float:right'><a href='trade_match.php' id='trade_match' class='menu_tab active'>Trade Matches</a></li>
  <li style='float:right'><a href='trade_request.php' id='trade_request' class='menu_tab active'>Trade Requests</a></li>
  <li style='float:right'><a href='my_book.php' id='my_book' class='menu_tab active'>My Books</a></li>
  <li style='float:right'><a href='home.php' id='main' class='menu_tab active'>Home</a></li>
</div>
<script>
var i,x;
x=document.getElementsByClassName('menu_tab');
for(i=0;i<x.length;i++){
  x[i].className=x[i].className.replace(" active","");
}
</script>
<br><br><br><br><br>
