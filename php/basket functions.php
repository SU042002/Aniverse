<?php

if (!(isset($_SESSION["basket"]))) {
    /*if the shopping basket does not exist then make one*/
    /*creates an array for basket items*/
    $_SESSION["basket"]=array();
}

/*if the submit button for add to basket has been pressed*/
if(isset($_GET["prodID"])) {
    /*these variables are set by the button that the user presses, each item has its own unique id*/
    $id = $_GET["prodID"];
    $quantity = $_GET["prodQuantity"];

    if(isset($_SESSION["basket"][$id])){
        /*if the item exists in the basket then increment the item quantity*/
        $_SESSION["basket"][$id] += $quantity;
        /*changes the header so if the user refreshes the item is not added again*/
        if ($_GET["search"]) {
            header("location: ../index.php?success=addedQuantity");
        } else {
            header("location: index.php?success=addedQuantity");
        }
    } else {
        /*if one of the item exists then the quantity will be 1*/
        $_SESSION["basket"][$id] = $quantity;
        if ($_GET["search"]) {
            header("location: ../index.php?success=addedItem");
        }
            /*changes the header so if the user refreshes the item is not added again*/
        header("location: index.php?success=addedItem");
    }
}

/*used to print array of basket*/
/*pre tag adds line break to everything */
echo "<pre>";
print_r($_SESSION["basket"]);
echo "</pre>";

if(isset($_POST ["clear_basket"])) {
    /*the array is instantiated again to "clear" it*/
    $_SESSION["basket"] = array();
    header("location: basket.php?clear=success");

}