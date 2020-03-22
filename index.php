<!DOCTYPE html>
<html>	
    <head>
    	<!--style sheet and header etc-->
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	
    	<div class="header">
        <h1>COMPX222 Multiple Choice Tests</h1>
        </div>    
        

<?php
session_start();
//Check if they are logged in already with session or auto login cookie
if($_SESSION['username'] != null || isset($_COOKIE["auto_login"]))
{
	//Displays the you can take tests if they are logged in
	echo "<div class='centerH3'>";
	echo "<h3> You can now view and take tests </h3>";
	echo "</div>";
	//display log out link
	echo"<p><a href='final.php'>Log Out</a></p>";
}
else 
	{
		//else they are not logged in and display log in link
		echo "<div class='centerH3'>";
		echo "<h3> You can view tests but not take them until you log in </h3>";
		echo "</div>";
		echo"<p><a href='login.php'>Log In</a></p>";
	}
?>
<!--link to tests-->
<p> <a href='test.php?test=1'>Test 1</a></p>
<p> <a href='test.php?test=2'>Test 2</a></p>
<p> <a href='test.php?test=3'>Test 3</a></p>
</html>
</body>