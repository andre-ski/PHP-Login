<?php
//Check if cookie for logged in or auto loged in is active
session_start();
if(isset($_COOKIE["logged_in"]))
   {
   	//Take to index page if logged in already (cannot log in twice)
       header('location: index.php');
   }
if(isset($_COOKIE["auto_login"]))
{
	   	//Take to index page if logged in already (cannot log in twice)
    setcookie("logged_in", "true");
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<!--style sheet and header etc-->
		<meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <div class="header">
        <h1>COMPX222 Multiple Choice Tests</h1>
        </div>
	</head>
	<body>
<div class="left">		
<h3> Log In page</h3>
<!--link to tests-->
<p> <a href='test.php?test=1'>Test 1</a></p>
<p> <a href='test.php?test=2'>Test 2</a></p>
<p> <a href='test.php?test=3'>Test 3</a></p>
</div>
<!--Form for entering log in details-->
		<div class='div1'>
		<form name='form1'  action='processLogin.php' method='POST' >
            Username <input type='text' name='uname'> <br><br>
            Password <input type='text' name='pwd'> <br><br>
            <input type='checkbox' name='remember' value='check'> Remember me <br><br>
            <input type='submit' value='submit form'> 
            <input type='submit' value='reset form'> 
		</form>
        </div>
	</body>
</html>

	