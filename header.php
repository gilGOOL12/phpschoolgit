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
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
        <header>
            <div>
                <?php if (!isset($_SESSION)) session_start();?>
                <span class="boxtop" > <img src="logo.gif" style="height: 20%; width: 20%;"></span>
                <span class="boxtop"><a href="school.php?Subject=1">school  </a></span>
                <span class="boxtop">
                 <?php 
               // if (isset($_SESSION['username'])&&(($_SESSION['role']==="manager")||($_SESSION['role']==="owner")))
                echo '<a href="administration.php?Subject=1" > administration</a> ' ;
                 ?>
                </span>
                <span class="boxtop"><?php echo '<a href="logout.php">logout</a>'?></span>
                <span class="boxtop2"><?php
                echo $_SESSION['username']."   "; 
                echo 'role  :'.$_SESSION['role'];
               
                ?> 
                    <img src="uploads/<?php echo '1' ?>.jpg" style="height:50px; width:50px"  alt="pic">
                </span>
        
            </div>
            
        </header>
      
       
    </body>
</html>
