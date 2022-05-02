<?php
/*this is used to start a session on every page. This is done
so that users can create an account and save what ever they are doing.
Sessions also allow us to check for admin privileges. They allow
us to use other super globals that we can use to make each user session
personal.*/
session_start();
require_once "php/basket_functions.php";

/*This check is used to see if the user accessing the page is an admin, if they are not then they are kicked out
with an error code saying notAdmin*/
if (isset($_SESSION["userType"])) {
    if ($_SESSION["userType"] == "User") {
        header("location: index.php?error=notAdmin");
    } else if ($_SESSION["userType"] == "Admin") {
    }
} else {
    header("location: index.php?error=notAdmin");
}

/*These are variables used for editing the items in the database*/
$id = 0;
$name = "";
$price = "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <!--These files are used to connect to the database and used to delete and edit products-->
    <?php require_once "php/database_connection.php"; ?>
    <?php require_once "php/product_delete.php"; ?>
    <?php require_once "php/product_edit.php"; ?>
</head>
<body>
<!--this stores all the components of the header in a php file. This is done so the same code can be reused throughout
the website-->
<?php require "header.php"; ?>

<div id="container">
    <div id="main">

        <!--This creates a table that contains all the other stuff in cells required for the user to submit products they
        want to add to the website.-->
        <h2>All the fields must be filled in for this to work! This also means uploading an image. Please avoid using
            apostrophes and speech marks as this will return a sql error!</h2>

        <!--this form collects information and performs the action using the product_submission file.-->
        <form name="addProd" action="php/product_submission.php" method="post" enctype="multipart/form-data"
              class="addForm">
            <table>
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Upload Image</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tr>
                    <td>
                        <div class="prodInput">
                            <input class="input_box" type="text" name="productName" placeholder="Product Name" required
                                   autocomplete="off">
                        </div>
                    </td>
                    <td>
                        <div class="prodInput">
                            <input class="input_box" type="text" name="productPrice" placeholder="Price" required
                                   autocomplete="off">
                        </div>
                    </td>
                    <td>
                        <div class="prodInput">
                              <textarea name="productDesc" rows="4" cols="0" autocomplete="off" placeholder="Description"
                              required></textarea>
                        </div> <!-- so that the user can write product description -->
                    </td>
                    <td>
                        <div class="prodImage">
                            <label>
                                Upload Image
                                <input type="file" name="productImg" placeholder="Add Image" required autocomplete="off"
                                       style="visibility: hidden;">
                            </label> <!-- label used so it can be customized in css -->
                        </div>
                    </td>
                    <td>
                        <div class="prodInput" id="select_options">
                            <select name="productCat" required>
                                <option value="DVD">DVD</option>
                                <option value="Manga">Manga</option>
                                <option value="Figures">Figures</option>
                                <option value="Games">Games</option>
                                <option value="Accessories">Accessories</option>
                            </select> <!-- drop down menu so that the user can put items into
      different categories -->
                        </div>
                    </td>
                    <td>
                        <div class="prodInput" id="submit_button">
                            <button type="submit" class="add-button" name="submission">Add Product</button>
                        </div> <!-- when the user presses the button they will be able to submit the information -->
                    </td>
                </tr>
            </table>
        </form>

        <h2>To update a product, click edit and the two fields will be updated with the product you want to edit. You
        are then free to edit the product, remember to press update product!</h2>

        <!--This form is used to update information. It works by finding the id of the product that was clicked. This id
        is stored in a variable. When the user updates wants to update the information this id is used in the sql statement
        to update the information with the new user input which are also stored in variables.-->
        <form name="addProd" action="php/product_edit.php" method="post" enctype="multipart/form-data"
              class="addForm">
            <table>
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <tr>
                    <td>
                        <div class="prodInput">
                            <input class="input_box" type="text" name="productName" placeholder="Product Name" required
                                   autocomplete="off" value="<?php echo $name; ?>">
                        </div>
                    </td>
                    <td>
                        <div class="prodInput">
                            <input class="input_box" type="text" value="<?php echo $price; ?>" name="productPrice" placeholder="Price" required
                                   autocomplete="off">
                        </div>
                    </td>
                    <td>
                        <div class="prodInput" id="submit_button">
                            <button type="submit" class="add-button" name="update">Update Product</button>
                        </div> <!-- when the user presses the button they will be able to submit the information -->
                    </td>
                </tr>
            </table>
        </form>

        <div>
            <table>
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
                </thead>
                <!--This php code with the while loop is used to show all the products of the database with their own edit
                button and delete button similar to the index method.-->
                <?php
                // setting connection to the database
                $sql = "SELECT * FROM products;";
                $res = mysqli_query($connectAniverse, $sql);
                // fetches all rows
                while ($row = mysqli_fetch_array($res)) // if row is fetched while code is executed
                {
                    ?>
                    <tr>
                        <td><?php echo $row["product_name"] ?>
                        </td>
                        <td><?php echo $row["product_price"] ?></td>
                        <td>
                            <!--When each of the buttons are pressed they change the url to the id of the specific button,
                            this data is used to perform the actions on the correct record in the database-->
                            <a class="edit_button" href="admin.php?edit=<?php echo $row["id"]; ?>">Edit</a>
                        </td>
                        <td>
                            <!--all the products will have this button with their own unique id number that is fetched
                            from the array-->
                            <a class="delete_button" href="admin.php?delete=<?php echo $row["id"]; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </div>
    <!--This is included in most of the pages and is the footer of the webpage, it is in a separate file because it is a
    piece of code that is reused often-->
    <?php require "footer.php"; ?>

</body>
</html>