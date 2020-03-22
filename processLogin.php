<?php
session_start();
//Link to the database
require_once("database.php");
$username = $_POST["uname"];
$password = $_POST["pwd"];
//Query to get people details for logging in
$query = "SELECT * FROM `PEOPLE` WHERE `userName` = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result); 

//If the userpassword matches database password
if($user ['userPassWord'] === $password)
{
	//Adding a username variable to the session
	$_SESSION['username'] = $username;	
	$_COOKIE['username']=$username;
	//Setting cookie to logged in as true
	setcookie("logged_in", "true");
	setcookie("username", $username);
	//If they click remember me
    if(isset($_POST["remember"]))
    {
    	//Set the auto login cookie to remember their details for one month
        setcookie("auto_login", "true", time() + (7*24*60*60)*4);   
    }
	//Take back to index page
    header("location: index.php" );
}
else
{
	//Else keep them on the login page until correct details entered on submit
    header("location: login.php" );
}
?>