<?php
require_once "../php/database_connection.php";

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM products WHERE id=$id";
    mysqli_query($connectAniverse, $sql);
}