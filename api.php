<?php
session_start();
$connection = new mysqli('localhost','root','','school');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $operation=$_POST['operation'];
} else {
     $operation=$_GET['operation'];
}
if (!$operation==="edit"){
$name=filter_var($_POST['studentName'],FILTER_SANITIZE_STRING);
$phone= filter_var($_POST['studentPhone'],FILTER_SANITIZE_NUMBER_INT);};


if ($operation==="insert") {
   $name= filter_var($_POST['studentName'],FILTER_SANITIZE_STRING) ;
   $phone=filter_var($_POST['studentPhone'],FILTER_SANITIZE_NUMBER_INT);
   $mail= filter_var($_POST['studentEmail'],FILTER_SANITIZE_EMAIL);
   $pic=filter_var($_POST['studentPhone'],FILTER_SANITIZE_NUMBER_INT);
   
   
            if (((strlen($name))<3)||((strlen($phone))!==10)||((strlen($mail)<4))){
                
            header("location:school.php?Subject=error");}
            else {
                $result=$connection->query("SELECT name from students where name = '$name' and phone='$phone' and email='$mail' ; ");
                $row=$result->fetch_assoc();
                if (isset($row)){
                    header("location:school.php?Subject=error3");
                }else {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $move_uploaded_file = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
             
                $stmt = $connection->prepare("INSERT INTO students(name,phone,email,img) VALUES (?,?,?,?)");
		$stmt->bind_param("sdsd", $name, $phone, $mail,$phone);
		$stmt->execute();
               
                header("location:school.php?Subject=updated");}}}

elseif ($operation==="delete") {
                $name= filter_var($_GET['studentName'],FILTER_SANITIZE_STRING);
                $phone= filter_var($_GET['studentPhone'],FILTER_SANITIZE_EMAIL);
                $result=$connection->query("SELECT name from students where name = '$name' and phone='$phone' ; ");
                $row=$result->fetch_assoc();
                if ((count($row))===0){
                     header("location:school.php?Subject=error2");
                } else {
                    
                
                
                $stmt = $connection->prepare("DELETE from students WHERE name=? AND phone=? ");
		$stmt->bind_param('sd', $name , $phone);
		$stmt->execute();
                
                
               header("location:school.php?Subject=updated");}

}elseif ($operation==="editstudent"){
                $oldphone=$_POST['oldphone'];
                $oldmail=$_POST['oldmail'];
                $oldname=$_POST['oldname'];
                $phone=$_POST['phone'];
                $mail=$_POST['mail'];
                $name=$_POST['name'];
                 if (((strlen($name))<3)||((strlen($phone))<10)||((strlen($mail)<4))){
                
            header("location:school.php?Subject=error");}
            else {
                            
                    $stmt = $connection->prepare("UPDATE students
                    SET name = ? , phone = ? , email = ? 
                    WHERE name = '$oldname' AND phone= '$oldphone' AND email= '$oldmail' ;");
                    $stmt->bind_param('sds', $name , $phone ,$mail);
		    $stmt->execute();
                    
            header("location:administration.php?Subject=updated");}
               
    
}
elseif ($operation==="editcourse"){
    $oldname=filter_var($_POST['oldCourseName'],FILTER_SANITIZE_STRING);
    $olddetails= filter_var($_POST['oldCourseDetails'],FILTER_SANITIZE_STRING);
    $newname=filter_var($_POST['CourseName'],FILTER_SANITIZE_STRING);
    $newdetails=filter_var($_POST['CourseDetails'],FILTER_SANITIZE_STRING);
    
    $stmt = $connection->prepare("UPDATE courses
                    SET name = ? , cours_details = ?  
                    WHERE name = '$oldname'  AND cours_details= '$olddetails' ;");
                    $stmt->bind_param('ss', $newname , $newdetails);
		    $stmt->execute();
                    
                     header("location:administration.php?Subject=123");
}elseif ($operation==="createcourse") {
    $name= filter_var($_POST['CourseName'],FILTER_SANITIZE_STRING);
    $details= filter_var($_POST['CourseDetails'],FILTER_SANITIZE_STRING);
    $result=$connection->query("SELECT name from courses where name = '$name' ");
    $row=$result->fetch_assoc();
    if ((((strlen($name))<5)||((strlen($details))<10))||((count($row))>0)){
        header("location:school.php?Subject=error3") ;
    } else {
         $stmt = $connection->prepare("INSERT INTO courses(name,cours_details) VALUES (?,?)");
		$stmt->bind_param("ss", $name,$details);
		$stmt->execute();
         header("location:school.php?Subject=updated");
    }
}elseif ($operation==="deletecourse") {
    $name= $_GET['CourseName'];
    $result=$connection->query("SELECT name from courses where name = '$name' ");
    $row=$result->fetch_assoc();
    if ((count($row))===1){
                $stmt = $connection->prepare("DELETE from courses WHERE name=? ");
		$stmt->bind_param('s', $name);
		$stmt->execute();
                header("location:school.php?Subject=updated");
        
    }else{
        header("location:school.php?Subject=error2") ;
    }
}elseif ($operation==="createmanager") {
    $name= filter_var($_POST['managerName'],FILTER_SANITIZE_STRING) ;
   $phone=filter_var($_POST['managerPhone'],FILTER_SANITIZE_NUMBER_INT);
   $mail= filter_var($_POST['managerEmail'],FILTER_SANITIZE_EMAIL);
   $password= filter_var($_POST['managerPassword'],FILTER_SANITIZE_STRING);
   
    if (((strlen($name))<3)||((strlen($phone))<10)||((strlen($mail)<4))){
                
            header("location:school.php?Subject=error");}
            else {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $move_uploaded_file = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
             
                $stmt = $connection->prepare("INSERT INTO manager(name,phone,email,password,img) VALUES (?,?,?,?,?)");
		$stmt->bind_param("sdsds", $name, $phone, $mail,$password,$phone);
		$stmt->execute();
               
                header("location:school.php?Subject=updated");}
                
            }elseif ($operation==="deletemanager") {
              $name= filter_var($_GET['managerName'],FILTER_SANITIZE_STRING) ;
              $phone=filter_var($_GET['managerPhone'],FILTER_SANITIZE_NUMBER_INT);  
              $result=$connection->query("SELECT name from manager WHERE name='$name' and phone='$phone'");
              $row=$result->fetch_assoc();
              if ((count($row))===1){
                
                  
                $stmt = $connection->prepare("DELETE from manager WHERE name=? and phone= ?");
		$stmt->bind_param('sd', $name,$phone);
		$stmt->execute();
                header("location:school.php?Subject=updated");  
              }else{
                 header("location:school.php?Subject=error"); 
              }
    
            }elseif ($operation==="editmanager") {
                $oldphone=$_POST['oldphone'];
                $oldmail=$_POST['oldmail'];
                $oldname=$_POST['oldname'];
                $phone=$_POST['phone'];
                $mail=$_POST['mail'];
                $name=$_POST['name'];
                 if (((strlen($name))<3)||((strlen($phone))<10)||((strlen($mail)<4))){
                
            header("location:school.php?Subject=error");}
            else {
                            
                    $stmt = $connection->prepare("UPDATE manager
                    SET name = ? , phone = ? , email = ? 
                    WHERE name = '$oldname' AND phone= '$oldphone' AND email= '$oldmail' ;");
                    $stmt->bind_param('sds', $name , $phone ,$mail);
		    $stmt->execute();
                    
            header("location:administration.php?Subject=updated");}
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

