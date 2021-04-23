<?php

function Register($username,$password,$repassword){
     $con = createDBConnection();
     
       if( $password != $repassword ){
            header("location:demo.php"); // sửa
       }
       $sql = "SELECT * FROM users WHERE username = ' $username ' ";
       $result = $con->query($sql);
     
       if( $result->num_rows > 0){
            header('location:demo.php');
       }
       $sql = sprintf("INSERT INTO users
                    VALUES ('%s', '%s')", $username , $password);
       $con->query($sql);
      
     }


?>