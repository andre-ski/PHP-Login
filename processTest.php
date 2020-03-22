<!DOCTYPE html>
<html>
	<head>
		<!--style sheet and header etc-->
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>
			Results page
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
	<!--Test div-->
<div class="testdiv">
<?php
//Start the session
session_start();
//link to database
require_once("database.php");
//update test id to current session test num selected
$test_id=$_SESSION['testNum'];
//query to get the question that matches up with the test ids
$query = "SELECT * FROM `questions` WHERE `questionID` in (SELECT `questionID` from test WHERE `testID` = $test_id)";
$result = mysqli_query($conn, $query);
//Variables
$int =0;
$num =1;
//while the user is connected
while($user = mysqli_fetch_assoc($result))
			{
				//DIsplay the question bold
				echo "<strong>"; 
				echo $user['question'];
				echo "</strong>";
				echo "<br>";
				//Find what the user checked
				$checked=$_POST[$num];
				//get the correct answer from database
				$correctAns=$user['correct'];
				echo "<br>";
				echo "You answered: ";
				if($checked=='a')
					{
						echo $user['Answer_a']; //show the answer to a 
					}
					else if ($checked=='b')
					{
						echo $user['Answer_b'];//show the answer to b
					}
					else if($checked=='c')
					{
						echo $user['Answer_c'];//show the answer to c
					}
					else if($checked=='d')
					{
						echo $user['Answer_d'];//show the answer to d
					}	
				if($checked==$correctAns)
				{
						echo "<br>";
					echo "You answered correct"; //if correct answer then show you are correct
					$int++; //add one to points
						echo "<br>";
							echo "<br>";

				}
				else 
				{
						echo "<br>";
					echo "You answered incorrect"; //otherwise you answered incorrect
						echo "<br>";
							echo "<br>";
				}
			$num++; //incremement num so that the name of the radio button changes
			
			}
			echo "Your got " . $int . " correct answers"; //show the number of correct answers
?>
</div>
</body>
</html>
