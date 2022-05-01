<?php
/*this is all the information used to connect to the database*/
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "aniverse";

/*this variable is used everywhere to connect to the database, this is done so everything is clean and if the website
where to be moved to a web server.*/
$connectAniverse = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
