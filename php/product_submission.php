<?php
/* if statement is placed here so that if the user presses the submit button the data can be sent across
to the data table */
if(isset($_POST["submit1"]))
{
    require_once "database_connection.php";

    $random_number = rand();
    $hash = md5($random_number);

    $uploaded_file = $_FILES["pimage"]["name"]; /* this changes the image file names */
    $destination = "../img/product_image/".$hash.$uploaded_file;


    $sql = "INSERT INTO products (product_name, product_price, product_desc, product_image, product_category) VALUES ('$_POST[pnm]', '$_POST[pprice]', '$_POST[pdesc]', '$destination', '$_POST[pcategory]')";
    move_uploaded_file($_FILES["pimage"]["tmp_name"],$destination); /* the image that is uploaded is also moved to the file directory, tmp_name is automatically generated by php
    so that there is a copy of it on the file explorer in my project folder */
    mysqli_query($connectAniverse, $sql);
    // this is all the columns that the data is inserted into in order
    header("Location: products.php?productAdded");
    /* header is changed so that there is not a double post problem and resubmission problem if
    the user refreshes the page for whatever reason */
}