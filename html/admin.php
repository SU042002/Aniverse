<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>

<?php require "header.php"; ?>

<div class="product_container" id="all_products">
    <form name="addProd" action="../php/product_submission.php" method="post" enctype="multipart/form-data"
          class="addForm"> <!-- created a form -->
        <h1>Add Product</h1> <!-- header so the user knows they can add product -->
        <!-- enctype is needed because there are files that are uploaded, images -->
        <p>All the fields are required to submit!</p>
        <div class="prodInput">
            <input type="text" name="productName" placeholder="Product Name" required autocomplete="off">
        </div> <!-- creating seperate divisions for all the inputs -->
        <!-- auto complete is switched off for everything so history isn't saved -->
        <!-- required tag here so that nothing is left empty before data is sent off -->
        <div class="prodInput">
            <input type="text" name="productPrice" placeholder="Price" required autocomplete="off">
        </div> <!-- input for price -->
        <div class="prodInput">
            <textarea name="productDesc" rows="4" cols="0" autocomplete="off" placeholder="Description" required></textarea>
        </div> <!-- so that the user can write product description -->
        <div class="prodImage">
            <label>
                Upload Image
                <input type="file" name="productImg" placeholder="Add Image" required autocomplete="off"
                       style="visibility: hidden;">
            </label> <!-- label used so it can be customized in css -->
        </div>
        <div class="prodInput">
            <select name="productCat" required>
                <option value="DVD">DVD</option>
                <option value="Manga">Manga</option>
                <option value="Figures">Figures</option>
                <option value="Games">Games</option>
                <option value="Accessories">Accessories</option>
            </select> <!-- drop down menu so that the user can put items into
      different categories -->
        </div>

        <div class="prodInput" id="submit_button">
            <button type="submit" class="add-button" name="submission">Add Product</button>
        </div> <!-- when the user presses the button they will be able to submit the information -->

    </form>

    <?php require "footer.php"; ?>

</body>
</html>