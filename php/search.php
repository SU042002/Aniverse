<?php
require_once "database_connection.php";

if(isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-6a-z]#i","",$searchq);

    $sql = "SELECT * FROM products WHERE product_name LIKE '$searchq'";
    $query = mysqli_query($connectAniverse, $sql);

    $count = mysqli_num_rows($query);
    $output = "";

    if($count == 0) {
        $output = "There was no query returned";
    } else {
        while ($row = mysqli_fetch_array($query)) {
            $product = $row["product_name"];
            $id = $row["id"];

            $output .= "<div>".$product."</div>";
        }
    }
}
