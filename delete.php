<link href="newcss.css" rel="stylesheet" type="text/css"/> 
       
        <div class="incontainer">
          
            <form action="secure.php" method="POST" >
            <span>enter student name : <input type="text" name="studentName" placeholder="student name" required=""></span><br>
            <span>enter student phone:<input type="number" name="studentPhone" placeholder="student phone" required=""></span><br>
            <input type="hidden" name="operation" value="delete">
            <input type="submit" value="delete">
            
         </form>
       </div>
 