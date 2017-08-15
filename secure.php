<link href="newcss.css" rel="stylesheet" type="text/css"/>
<div class="middle">
    <div class="maincontainer">
        <div class="incontainer">
           <?php 
           $operation=$_POST['operation'];
           if ($operation==="delete"){
               $name=$_POST['studentName'];
               $phone=$_POST['studentPhone'];
              
               echo 'are you shore you want to delete ? '."<BR>";
                echo $name ."<br>";
               echo $phone."<br>";
               echo '<a href="api.php?operation=delete&studentName='.$name.'&studentPhone='.$phone.'">DELETE     </a>';
               echo '<a href="school.php?Subject=1">GO BACK  </a>';
           
              
           }elseif ($operation==="deletemanager"){
               $name=$_POST['managerName'];
               $phone=$_POST['managerPhone'];
               echo 'are you shore you want to delete ? '."<BR>";
               echo $name ."<br>";
               echo $phone."<br>";
                       
               echo '<a href="api.php?operation=deletemanager&managerName='.$name.'&managerPhone='.$phone.'">DELETE    </a>';
               echo '<a href="school.php?Subject=1">   GO BACK  </a>';  
               
           }elseif ($operation==="deletecourse") {
               $name=$_POST['CourseName'];
               
               echo 'are you shore you want to delete ? '."<BR>";
                echo $name ."<br>";
             
               echo '<a href="api.php?operation=deletecourse&CourseName='.$name.'">DELETE     </a>';
               echo '<a href="school.php?Subject=1">GO BACK  </a>';  
           }
           ?>
        </div>
    </div>
</div>

