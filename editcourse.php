<link href="newcss.css" rel="stylesheet" type="text/css"/>
<?php 
$name= filter_var($_GET['oldCourseName'],FILTER_SANITIZE_STRING);
$details=filter_var($_GET['olddetails'],FILTER_SANITIZE_STRING);


?>
<div class="incontainer">
   <?php 
    echo '<div class="boxrow2">';
   echo $name."<br>";
   echo $details."<br>";
   echo '</div>';
?>
    <div class="boxrow2">
<form action="api.php" method="POST">
    <input type="submit"  value="edit course"><br>
    <input type="text" name="CourseName" placeholder="new course name"required ><br>
    <input type="text" name="CourseDetails" placeholder="new course details" required ><br>
                    <input type="hidden" name="oldCourseName" value="<?php echo $name ; ?>" >
                    <input type="hidden" name="oldCourseDetails" value="<?php echo $details ; ?>">
                    <input type="hidden" name="operation" value="editcourse">
                </form>
    </div>
</div>
