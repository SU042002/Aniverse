<?php

if (!(isset($_SESSION["basket"]))) {
    /*if the shopping basket does not exist then make one*/
    /*creates an array for basket items*/
    $_SESSION["basket"]=array();
//    index => value
//    item => quantity
}

/*if the submit button for add to basket has been pressed*/
if(isset($_GET["prodID"])) {
    /*these variables are set by the button that the user presses, each item has its own unique id*/
    $id = $_GET["prodID"];
    $quantity = $_GET["prodQuantity"];

    if(isset($_SESSION["basket"][$id])){
        /*if the item exists in the basket then increment the item quantity*/
        $_SESSION["basket"][$id] += $quantity;
        /*changes the header so if the user refreshes the item is not added again using get method*/
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        /*if one of the item exists then the quantity will be 1*/
        $_SESSION["basket"][$id] = $quantity;
        /*changes the header so if the user refreshes the item is not added again using get method*/
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if(isset($_POST ["clear_basket"])) {
    /*the array is instantiated again to "clear" it*/
    $_SESSION["basket"] = array();
    /*the header is changed again to inform the user that the basket has indeed been cleared*/
    /*this could also be used later to output some type of message based on the url*/
    header("location: basket.php?clear=success");
}

//if delete item is pressed
if(isset($_GET["id"])) {
    $id = $_GET["id"];
//    echo $id;
    unset($_SESSION['basket'][$id]);
    /*removes item from the array using key/index as id*/
    header("location: basket.php?clear=deletedItem");
    /*redirects to prevent refreshing*/
}



