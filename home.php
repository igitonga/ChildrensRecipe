<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
        <div class="nav_cont">
            <div class="nav-bar">
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="login.php">ADD RECIPE</a></li>
                    <li><a href="">GET IN TOUCH</a></li>
                </ul>
            </div>
        </div>
        <!-- search bar -->
        <div class="search">
            <form action="home.php" method="POST">
                <input type="text" name="searchBar" id="searchBar" placeholder="Search">
                <button type="submit" id="searchBtn" name="searchBtn"></button>
            </form>
            <i class="fas fa-search" onclick="searchIcon()"></i>
        </div>

        <?php
          include('backend/db_connection.php');

          //php to display current recipes
          $recipe = mysqli_query($connection, "SELECT `id`, `image`,`recipe_title`, `small description` FROM `recipe`");

          echo "<div class='card-deck'>";
          echo "<div class='default-col'>";
              while ($row = mysqli_fetch_array($recipe)) {
              
                  echo "<div class='card'>";
                      echo "<img class='card_image' src='uploaded_images/".$row['image']."' >";
                      echo "<div class='card_col'>";
                      echo "<p class='card_title'>".$row['recipe_title']."</p>";
                      echo "<p class='card_desc'>".$row['small description']."</p>";
                      echo "</div>"; 
                  echo "</div>";

                  //store id
                  $_SESSION['recipe_id'] = $row['id'];
              
              }
          echo "</div>";
          echo "</div>"; 
          
          //search function
          if(isset($_POST['searchBtn'])){
        
            $user_search = $_POST['searchBar'];
            $search = mysqli_real_escape_string($connection, $user_search);

            $search_query = "SELECT * FROM `recipe` WHERE `recipe_title` LIKE '%$user_search%' OR `small description` LIKE '%$user_search%' OR
                             `ingredients` LIKE '%$user_search%' OR `instructions` LIKE '%$user_search%'";
            $exec = mysqli_query($connection, $search_query);
            
            $num_rows = mysqli_num_rows($exec);

            if($num_rows > 0){
                echo "<script type='text/javascript'>
                        document.querySelector('.default-col').style.display='none';
                        </script>";
                echo "<div class='card-deck'>";
                while ($row = mysqli_fetch_array($exec)) {
                
                    echo "<div class='card'>";
                        echo "<img class='card_image' src='uploaded_images/".$row['image']."' >";
                        echo "<div class='card_col'>";
                        echo "<p class='card_title'>".$row['recipe_title']."</p>";
                        echo "<p class='card_desc'>".$row['small description']."</p>";
                        echo "</div>"; 
                    echo "</div>";
                
                }
               echo "</div>"; 
            }
            else{
                echo "<script type='text/javascript'>
                        document.querySelector('.default-col').style.display='none';
                        </script>";
                echo "<h2 style='text-align: center;'>No result found</h2>";
            }
        }
        ?>
    </div>

    <!-- js files -->
    <script src="js/app.js"></script>
</body>
</html>