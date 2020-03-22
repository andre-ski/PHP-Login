<!DOCTYPE html>
<html>
	<head>
		<!--style sheet and header etc-->
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>
			Test Page
		</title>
	</head>
	<body>
		<div class="header">
        <h1>COMPX222 Multiple Choice Tests</h1>
        </div>		
		<div class="left">
		<?php
		//Decide to show eith log in or log out link depending on whether they are logged in already
		session_start();
			if($_SESSION['username'] != null || isset($_COOKIE["auto_login"]))
			{		
			echo"<p><a href='final.php'>Log Out</a></p>";
			}
			else 
			{
			echo"<p><a href='login.php'>Log In</a></p>";
			}
		?>
		<!--link to tests-->
		<p> <a href='test.php?test=1'>Test 1</a></p>
		<p> <a href='test.php?test=2'>Test 2</a></p>
		<p> <a href='test.php?test=3'>Test 3</a></p>
		</div>
		
		<!--Div for the form-->
		<div class="testdiv">
		<form name="form2"  action="processTest.php" method="POST" >
		<?php
			//link to databse
			require_once("database.php");
			//get the test id
			$test_id = $_GET['test'];
			//update the session to latest test id
			$_SESSION['testNum']=$test_id;
			//select query from the database where test id is same
			$query = "SELECT * FROM `questions` WHERE `questionID` in (SELECT `questionID` from test WHERE `testID` = $test_id)";
			$result = mysqli_query($conn, $query);
			//create num value 
			$num=1;
			//while the user is connected
			while($user = mysqli_fetch_assoc($result))
			{
				//Show question
				echo $user['question'];
				echo "<br>";
				echo "<br>";
				//Different buttons for different multichoice answers
				echo "<input type='radio' name='$num' value='a'>";
				echo $user['Answer_a'];
				echo "<br>";
				//Different buttons for different multichoice answers
				echo "<input type='radio' name='$num' value='b'>";
				echo $user['Answer_b'];
				echo "<br>";
				//Different buttons for different multichoice answers
				echo "<input type='radio' name='$num' value='c'>";
				echo $user['Answer_c'];
				echo "<br>";	
				//Different buttons for different multichoice answers	
				echo "<input type='radio' name='$num' value='d'>";
				echo $user['Answer_d'];
				echo "<br>";
				echo "<br>";
				//increment num
				$num++;
				
			}
			//If the user is logged in then show the submit button
				if($_SESSION['username']!=null)
				{
				echo "<input type='submit' id='submitbtn' name='submit' value='SUBMIT' style='display:block' class='submit_button'>";
				}
				else //else do not show the submit button
				{
					echo "<input type='submit' id='submitbtn' name='submit' value='SUBMIT' style='display:none' class='submit_button'>";
				}
				//close connection
				mysqli_close($conn);
		?>	
		</form>
	</body>
</html>