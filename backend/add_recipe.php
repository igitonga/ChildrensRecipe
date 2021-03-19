<?php

include('./login.php');

$active_id =  $_SESSION['active_id'];

if(isset($_POST['btnAdd'])){

    // active user
    $recipe_title = $_POST['recipe_title'];
    $small_description = $_POST['small_description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $file = $_FILES['posterImg'];

    $fileName = $_FILES['posterImg']['name'];
    $fileType = $_FILES['posterImg']['type'];
    $fileTmpName = $_FILES['posterImg']['tmp_name'];
    $fileSize = $_FILES['posterImg']['size'];
    $fileError = $_FILES['posterImg']['error'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $fileTypeAllowed = array('jpg', 'jpeg', 'png', 'svg');

    // checking for the correct image type
    if(in_array($fileActExt, $fileTypeAllowed)){

        // check if the image has an error
        if($fileError === 0){

            // check the image size => should be below 1mb
            if($fileSize < 1000000){

                // add a unique id as the image name instead of the actual name
                $fileNewName = uniqid('', true).".".$fileActExt;

                //path to image storage 
                $store = "../uploaded_images/".$fileNewName;
                
                if(file_exists('db_connection.php')){

                    require_once('db_connection.php');
                    
                    $poster = $fileNewName;

                    $sql = "INSERT INTO `recipe` (`image`, `recipe_title`, `small description`, `ingredients`, `instructions`, `admin_id`, `timestamp`) 
                            VALUES ('$poster', '$recipe_title', '$small_description', '$ingredients', '$instructions', '$active_id', Now())";
                    $exec = mysqli_query($connection, $sql);

                    if($exec){
                         // move poster to the uploaded poster folder
                         move_uploaded_file($fileTmpName, $store); 
                         
                        
                         $_SESSION['success'] = "Recipe added successfully";
                         header('location: ../add_recipe.php');
                        
                    }
                    else{
                        echo mysqli_error($connection);
                    }
                    
                }  
                else{
                   echo "File is not found";
                }
            }
            else{
                 $_SESSION['error'] = "The image size is too big";
                 header('location: ../add_recipe.php');

                 // setting up cookies
                 
            }
        }
        else{
            $_SESSION['error'] = "An error occurred when uploading your image";
            header('location: ../add_recipe.php');

             // setting up cookies
             
        }
    }
    else{
        $_SESSION['error'] = "Cannot upload image of that type.";
        header('location: ../add_recipe.php');

         // setting up cookies
         
    }

   
}
else{
     //echo "Technical difficulty";
}

?>