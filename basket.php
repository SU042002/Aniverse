<?php
session_start();

require_once "php/basket functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title> <!--This sets the title of the website.-->
    <link rel="stylesheet" href="css/default.css"> <!--this links to the default style sheet that is needed to style the website.
    This is used throughout the website.-->
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/products%20display.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/basket.css">
    <!--this connection is required to connect to the database. Any page that fetches information dynamically needs
    this file so that the connection can be performed.-->
    <?php require_once "php/database_connection.php"; ?>
</head>

<body>
<?php require "header.php"; ?>

<div class="basket_container">
    <table>
        <tr>
            <th>
                Item
            </th>
            <th>
                Price
            </th>
            <th>
                Quantity
            </th>
            <th>
                Subtotal
            </th>
        </tr>

        <?php
        /*for each key or id grab the information*/
        $total = 0;
        foreach ($_SESSION["basket"] as $key => $quantity) {
            // setting connection to the database
            /*the sql query is stored in a variable and all the user input is searched in the database using the LIKE
            keyword which is built into sql. This returns anything related to the word that was entered by the user*/
            $sql = "SELECT * FROM products WHERE id = '$key';";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
            $row = mysqli_fetch_assoc($res);
            $subTotal = $quantity * $row["product_price"];
            $total += $subTotal;
            echo "
                <tr>
                    <td>{$row["product_name"]}</td>
                    <td>£{$row["product_price"]}</td>
                    <td>$quantity</td>
                    <td>£$subTotal</td>
                </tr>
            ";
        }

        if (empty($_SESSION["basket"])) {
            echo "<tr><td>Your basket is empty.</td></tr>";
        } else {
            echo "
                <tr>
                    <td>Final Total:</td>
                    <td></td>
                    <td></td>
                    <td>£$total</td>
                </tr>
         ";
        }
        ?>
    </table>



    <form action="" method="post">
        <button type="submit" name="clear_basket" class="clear_basket">Clear Cart</button>
    </form>
    <form action="" method="post">
        <button id="purchase" type="Purchase" name="Purchase" class="clear_basket">Purchase</button>
    </form>
</div>



</body>