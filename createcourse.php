<link href="newcss.css" rel="stylesheet" type="text/css"/>

<div class="incontainer">
    <div class="boxrow2">
       <form action="api.php" method="POST">
            <input type="submit"  value="create course"><br>
            <input type="text" name="CourseName" placeholder="CourseName" required ><br>
            <input type="text" name="CourseDetails" placeholder="CourseDetails" required ><br>
            <input type="hidden" name="operation" value="createcourse">
       </form>
    </div>
</div>