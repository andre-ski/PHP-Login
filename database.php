<?php
	//The following code connects to the tables on my database on mysql
    $sql_server = "mysql.cms.waikato.ac.nz";
    $db_username = "ajo20";
    $db_password = "my10916879sql"; //my details etc
    $db_name = "ajo20";  
    $conn = mysqli_connect($sql_server, $db_username, $db_password, $db_name);
    if($conn == FALSE) 
	//If it doesn't connect show error
        die("Error connecting to mysql server :". mysqli_connect_error());
?>