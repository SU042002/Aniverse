<?php
require_once "database_connection.php";

if (isset($_GET["edit"])) {
    $id = $_GET["edit"];


    $result = $connectAniverse->query("SELECT * FROM products WHERE id='$id'");
        $row = $result->fetch_array();
        $name = $row['product_name'];
        $price = $row['product_price'];
}

if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["productName"];
    $price = $_POST["productPrice"];

    $sql = "UPDATE products SET product_name='$name', product_price='$price' WHERE id='$id'";

    mysqli_query($connectAniverse, $sql);

    header("Location: ../admin.php?error=none");
}