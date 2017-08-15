<link href="newcss.css" rel="stylesheet" type="text/css"/> 
       
        <div class="incontainer">
          
            <form action="secure.php" method="POST" >
            <span>enter manager name : <input type="text" name="managerName" placeholder="manager name" required=""></span><br>
            <span>enter manager phone:<input type="number" name="managerPhone" placeholder="manager phone" required=""></span><br>
            
            <input type="hidden" name="operation" value="deletemanager">
            <input type="submit" name="submit" >
           
            
         </form>
       </div>
