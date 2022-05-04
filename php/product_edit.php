<?php
require_once "database_connection.php";

if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    /*if the button is fetched the id is fetched from the url*/


    $result = $connectAniverse->query("SELECT * FROM products WHERE id='$id'");
    /*the product with the specific id is fetched*/
    /*the query is started with the sql statement and is stored in a variable called result*/
    /*the fetched query from the query is stored the variable $result*/
        $row = $result->fetch_array();
        /*a new variable is created called row*/
        /*this stores the result grabbed as an associative array so that it can be accessed*/
        $name = $row['product_name'];
        /*the product name is stored in a variable, this information was grabbed from the database*/
        $price = $row['product_price'];
        /*the product price is stored in a variable, this information was grabbed from the database*/
}

if(isset($_POST["update"])) {
    $id = $_POST["id"];
    /*the id is fetched using the super global and stored in id for easy access*/
    $name = $_POST["productName"];
    /*the user input is fetched and stored in the variable*/
    $price = $_POST["productPrice"];
    /*the user input is fetched and stored in the variable*/

    $sql = "UPDATE products SET product_name='$name', product_price='$price' WHERE id='$id'";
    /*a sql statement is created to update the product information using the information from the user*/

    mysqli_query($connectAniverse, $sql);
    /*the query is performed on the database*/

    header("Location: ../admin.php?error=none");
    /*informs the user that no errors occurred*/
}