<?php
/* if statement is placed here so that if the user presses the submit button the data can be sent across
to the data table */
if(isset($_POST["submission"]))
/*if the product submit button is pressed*/
{
    require_once "database_connection.php";
    /*connects to the database*/

    $random_number = rand();
    /*used to generate a random number*/
    $hash = md5($random_number);
    /*hash is used to generate a random string that can be used for the image.*/
    /*this is used so that there are no file name conflicts in the database with images*/
    /*this makes it so all the images have different names*/

    $uploaded_file = $_FILES["productImg"]["name"];
    /* the file that the user uploads */
    $destination = "img/product_image/".$hash.$uploaded_file;
    /* this changes the image file names */
    /*this is also used by the sql statement so that the file destination is also stored in the database.*/


    $sql = "INSERT INTO products (product_name, product_price, product_desc, product_image, product_category) 
    VALUES ('$_POST[productName]', '$_POST[productPrice]', '$_POST[productDesc]', '$destination', '$_POST[productCat]')";
    /*the sql statement is stored in a variable called $sql.*/

    move_uploaded_file($_FILES["productImg"]["tmp_name"],"../".$destination);
    /* the image that is uploaded is also moved to the file directory, tmp_name is automatically generated by php
    so that there is a copy of it on the file explorer in my project folder */

    mysqli_query($connectAniverse, $sql);
    // this is all the columns that the data is inserted into in order

    header("Location: ../admin.php?error=none");
    /* header is changed so that there is not a double post problem and resubmission problem if
    the user refreshes the page for whatever reason */
}