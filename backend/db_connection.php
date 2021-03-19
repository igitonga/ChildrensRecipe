<?php

define("HOST", "127.0.0.1");
define("USER", "root");
define("PASSWORD", NULL);
define("DATABASE", "childrens_recipe");

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if(!$connection){

    echo "Server down " .mysqli_connect_error();
}


?>