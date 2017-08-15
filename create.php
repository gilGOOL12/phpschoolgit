<link href="newcss.css" rel="stylesheet" type="text/css"/> 
       
        <div class="incontainer">
          
        <form action="api.php" method="POST" enctype="multipart/form-data" >
            <span>enter student name : <input type="text" name="studentName" placeholder="student name" required=""></span><br>
            <span>enter student phone:<input type="number" name="studentPhone" placeholder="student phone" required=""></span><br>
            <span>enter student mail  :<input type="email" name="studentEmail" placeholder="student mail" required=""></span><br>
            <input type="file" name="image" accept="image/*" >
            <input type="hidden" name="operation" value="insert">
            <input type="submit" name="submit" >
           
            
         </form>
       </div>
 
	