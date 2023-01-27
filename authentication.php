<?php      
    require('db.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "SELECT * FROM `User` WHERE `Name` = '$username' AND `PWD` = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            echo "<script> location.href='https://metadata.sdsu.edu/erm/973_all_search.php'; </script>";
            exit();
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  