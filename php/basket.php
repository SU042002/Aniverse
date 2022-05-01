<?php

if (!(isset($_SESSION["basket"]))) {
    /*if the shopping basket does not exist then make one*/
    /*creates an array for basket items*/
    $_SESSION["basket"]=array();
}

/*if the submit button for add to basket has been pressed*/
if(isset($_GET["prodID"])) {
    $id = $_GET["prodID"];
    $quantity = $_GET["prodQuantity"];

    if(isset($_SESSION["basket"][$id])){
        /*if the item exists in the basket then increment the item quantity*/
        $_SESSION["basket"][$id] += $quantity;
    } else {
        /*if one of the item exists then the quantity will be 1*/
        $_SESSION["basket"][$id] = $quantity;
    }
}

/*used to print array of basket*/
/*pre tag adds line break to everything */
echo "<pre>";
print_r($_SESSION["basket"]);
echo "</pre>";