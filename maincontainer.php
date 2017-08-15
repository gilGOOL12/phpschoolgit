<link href="newcss.css" rel="stylesheet" type="text/css"/>
<div class="middle">
            <div class="row">
                <?php 
                $_SESSION['subject']=$_GET['Subject'];
                $x=$_SESSION['subject'];
               
                
                
                echo '<a href="administration.php?Subject=create" style="width :20%;">CREATE STUDENT</a>';
                echo '<a href="administration.php?Subject=delete" style="width :20%;">DELETE STUDENT </a>';
               
                
                  
                         $connection = new mysqli('localhost','root','','school');
                        $result=$connection->query("select name,email,phone from students");
                          
                        function Read($result) { 
                           $rowCount = mysqli_num_rows($result);
                          for ($index = 0;$index < $rowCount ;
                        $index++) 
                        { 
                            
                             
                        echo '<div class="boxrow">'; 
                          
                        $row=$result->fetch_assoc();
                        echo $row['name']."<br>";
                        
                       if (isset($row['email'])) {
                           echo $row['email']."<br>";
                             echo $row['phone']."<br>";
                           echo '<a href="administration.php?Subject='.$row['name'].'" > DETAILS </a>'."<br>";
                       }
                                 else {   
                                     
                                     echo $row['cours_details']."<br>";
                                     echo '<a href="administration.php?Subject=editcourse&oldCourseName='.$row['name'].'&olddetails='.$row['cours_details'].'" > EDIT COURSE</a>'."<br>";
                                  
                                 }
                                 echo '</div>';
                        
                      }}
                      

                     Read($result);
                    ?>
                
            </div>
            <div class="row">
                
                    <?php 
                    if (($_SESSION['role']==="manager")||($_SESSION['role']==="owner")){
                    echo '<a href="administration.php?Subject=createcourse" style="width :20%;">CREATE COURSE</a>';
                    echo '<a href="administration.php?Subject=deletecourse" style="width :20%;">DELETE COURSE </a>';
                    }
                    $result=$connection->query("select name,cours_details from courses");
                    Read($result);
                    ?>
                
            </div>
            <?php 
             if ($_SESSION['role']==="owner"){
                    echo '<div class="row">';
                    echo '<a href="administration.php?Subject=createmanager" style="width :20%;">CREATE MANAGER</a>';
                    echo '<a href="administration.php?Subject=deletemanager" style="width :20%;">DELETE MANAGER</a>';
                    $result=$connection->query("select name,email,phone from manager");
                     Read($result);
                    echo '</div>';
                };?>
    
    
            <div class="maincontainer">
               
              <?php
            
                if ($_SESSION['subject']==="create") {include 'create.php';} 
                   elseif ($_SESSION['subject']==="delete") {include 'delete.php'; }
                        elseif ($_SESSION['subject']==="editstudent") {include 'edit.php'; }
                           elseif ($_SESSION['subject']==="editcourse") {include 'editcourse.php';}
                             elseif ($_SESSION['subject']==="createcourse") {include 'createcourse.php';}
                                elseif ($_SESSION['subject']==="deletecourse") {include 'deletecourse.php';}
                                   elseif ($_SESSION['subject']==="createmanager") {include 'createmanager.php';}
                                      elseif ($_SESSION['subject']==="deletemanager") {    include 'deletemanager.php';}
                                        elseif ($_SESSION['subject']==="editmanager") {    include 'editmanager.php';}
                                        
                                       
                            
                            
                        else {
                              $x=$_SESSION['subject'];
                              $result=$connection->query("select * from students where name='$x'" );
                              $row=$result->fetch_assoc();
                              $flag=0;
                              if (!$row){
                                  $flag=1;
                                 $result=$connection->query("select * from manager where name='$x'" );
                                 $row=$result->fetch_assoc(); 
                              }
                              
                             $name=$row['name'];
                             $phone=$row['phone'];
                             $email=$row['email'];
                              echo '<div class="incontainer">';
                              echo '<div class="boxrow2">'.$row['name']."<br>";
                              echo  $row['phone']."<br>";
                              echo $row['email']."<br>";?>
                             <img src="uploads/<?php echo '1' ?>.jpg" style="height:50px; width:50px"  alt="pic">
                             </div>
                <?php
                            
                             echo '<div class="boxrow2">';
                        if ($flag===0) echo '<a href="administration.php?Subject=editstudent&oldname=' . $name . '&oldphone=' . $phone . '&oldmail=' . $email . '" style="width :20%;">EDIT STUDENT </a>';
                        if ($flag===1) echo '<a href="administration.php?Subject=editmanager&oldname=' . $name . '&oldphone=' . $phone . '&oldmail=' . $email . '" style="width :20%;">EDIT MANAGER </a>';
                             echo '</div>'        ; 
                    
                              
                             
                             
                              
                        }  
                        
                              
                             
                        
                       
                ?>
                
            </div>     
        </div>

                <?php 

