<?php
session_start();
/*this starts the session to make sure there actually is a session that can be unset and destroyed*/
session_unset();
/*this will help destroy the session variable and frees all session variables*/
session_destroy();
/*this destroys the session and completes the sign-out process*/

header("location: ../index.php");
/*this returns the user back to the index or homepage*/
exit();
