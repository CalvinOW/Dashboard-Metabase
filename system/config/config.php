<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test";

    $db = mysqli_connect($host,$username,$password,$database);

    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
      
    
?>