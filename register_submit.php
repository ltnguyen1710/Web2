<?php

function Register($username,$password,$repassword,$sdt,$hoten){
     $con = createDBConnection();
     
       if( $password != $repassword ){
            header("location:index.php"); // sửa
       }
       $sql = "SELECT * FROM khachhang WHERE userKH = ' $username ' ";
       $result = $con->query($sql);
     
       if( $result->num_rows > 0){
            header('location:index.php');
       }
       $sql = sprintf("INSERT INTO khachhang
                    VALUES ('%s', '%s', '%s', '%s')", $username , $password,$sdt,$hoten);
       $con->query($sql);
      
     }


?>