<?php
require_once "database_connection.php";
/*this connection to the database is required to delete contents in the database*/

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    /*the variable is created for ease of access for the id*/
    /*this gets the id of the product from the url*/

    $sql = "DELETE FROM products WHERE id=$id";
    /*the sql statement is made using the id as a variable*/
    mysqli_query($connectAniverse, $sql);
    /*the query is then performed on the database using the connection and the sql statement that is to be executed.*/
}