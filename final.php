<?php
session_start();
//If close connection remove the cookies
setcookie("logged_in", "", time() - 60);
setcookie("auto_login", "", time() - 60);
session_destroy();
//Take back to index instead of logout page
header("location: index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>
			Logout Page
		</title>
	</head>
	<body>
		<!--This was mostly used for testing and does not take you to log out page now-->
	Thank You for visiting the website. You have been logged out
	</body>

</html>

	