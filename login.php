<?php 
session_start();
session_destroy();
session_start();

 $x=$_POST['userName'];
 $y= $_POST['passWord'];
 $login=FALSE;


if (isset($x)&&isset($y)){
    
     $_SESSION['username']= $x;
     $_SESSION['password']=$y;
     if (!$login){
     $connection=new mysqli('localhost','root','','school');
     $result=$connection->query("select name,password from owner where name='$x' and password='$y';");
     $row=$result->fetch_assoc();
         if ($row){
             $login=TRUE;
             $_SESSION['role']="owner";
               }else{
             $result=$connection->query("select name,password from manager where name='$x' and password='$y';");
             $row=$result->fetch_assoc();
              if ($row){
                  $login=TRUE;
                  $_SESSION['role']="manager";
                  
              } }
                             
          if (!$row){
              $result=$connection->query("select name,password from sales where name='$x' and password='$y';");
             $row=$result->fetch_assoc();
             if ($row){
                 $_SESSION['role']="sales";
                 $login=TRUE;
             } else {
                 echo 'user not found';
                 
             }
          }
     
     
     }

if ($login){
     $_SESSION['username']=$row['name'];
     
     header("location:header.php");
}}  
 else {
    header("location:login.html");    
}