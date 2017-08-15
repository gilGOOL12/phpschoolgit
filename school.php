<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
           <title>SCHOOL</title>
    </head>
    <body>
       
        <?php 
        
                if (!isset($_SESSION)) session_start();
                if (isset($_SESSION['username'])){
                $_SESSION['subject']=$_GET['Subject'];
                
                
               include 'header.php';
              
                }
                ?> 
        <div class="middle">
           
        <div class="incontainer">
             <?php $connection = new mysqli('localhost','root','','school');
                   $result=$connection->query("select name from students");
                  $rowCount = mysqli_num_rows($result);
                  echo "Total number of students : ".$rowCount."<br>";
                  $result=$connection->query("select name from courses");
                  $rowCount = mysqli_num_rows($result);
                  echo "Total number of courses :".$rowCount."<br>";
                  $result=$connection->query("select name from manager");
                  $rowCount = mysqli_num_rows($result);
                  echo "Total number of managers : ".$rowCount."<br>";
                  if ($_SESSION['subject']==="error"){
                      echo 'name or phone or email or course name are too short or to long'."<br>"
                      . ' so the data not been updated';
                    
                }elseif (($_SESSION['subject'])==="updated") {
                    echo 'information has been updated';
}elseif ($_SESSION['subject']==="error2") {
    echo 'The course or name  is not registerd on system so it hasnt been deleted';
}elseif ($_SESSION['subject']==="error3") {
    echo 'the course or name is already registered in the system';
    
}
                  ?>
        </div>
                
        </div>    
        <?php  echo '</main>'; ?>
    </body>
</html>
