<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/add_recipe.css">
    <title>Add recipe</title>
</head>
<body>
    <div class="wrapper">
        <div class="nav_cont">
            <div class="nav-bar">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="backend/logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
        <div class="recipe_form">
        <!-- alert pop up -->
        <?php  include("backend/alert.php"); ?>

            <form action="backend/add_recipe.php" method="POST" enctype="multipart/form-data">
                <div class="poster">
                    <label for="posterImg">Add food image</label><br>
                    <img src="images/placeholder-image.png" alt="poster_image" id="posterDisplay" onclick="setPoster()">
                    <input type="file" name="posterImg" id="posterImg" onchange="displayPoster(this)">
                </div>
                <div class="recipe_title">
                    <label for="recipe_title">Recipe title</label><br>
                    <textarea name="recipe_title" id="recipe_title" cols="100" rows="1" required></textarea>
                </div>
                <div class="small_description">
                    <label for="small_description">Small description</label><br>
                    <textarea name="small_description" id="small_description" cols="100" rows="10" required></textarea>
                </div>
                <div class="ingredients">
                    <label for="ingredients">Ingredients</label><br>
                    <textarea name="ingredients" id="ingredients" cols="100" rows="10" required></textarea>
                </div>
                <div class="instructions">
                    <label for="instructions">Instructions</label><br>
                    <textarea name="instructions" id="instructions" cols="100" rows="10" required></textarea>
                </div>

                <button type="submit" name="btnAdd" class="btnAdd">Add</button>
            </form>
        </div>
    </div>

     <!-- js files -->
     <script src="js/app.js"></script>
     <script src="js/jquery-3.5.1.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>