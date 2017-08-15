<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
                if (!isset($_SESSION)) session_start();
                if (isset($_SESSION['username'])){
                $_SESSION['subject']=$_GET['Subject'];
              
                
               include 'header.php';
               include 'maincontainer.php';
       
                echo '</main>';} ?> 
        
    </body>
</html>
