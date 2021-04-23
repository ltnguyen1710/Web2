<?php

function Register($username,$password,$repassword){
     $con = createDBConnection();
     
       if( $password != $repassword ){
            header("location:demo.php"); // sửa
       }
       $sql = "SELECT * FROM customer WHERE usernameCU = ' $username ' ";
       $result = $con->query($sql);
     
       if( $result->num_rows > 0){
            header('location:demo.php');
       }
       $sql = sprintf("INSERT INTO customer
                    VALUES ('%s', '%s')", $username , $password);
       $con->query($sql);
      
     }


?>