<link href="newcss.css" rel="stylesheet" type="text/css"/> 
       
        <div class="incontainer">
          
        <form action="api.php" method="POST" enctype="multipart/form-data" >
            <span>enter manager name : <input type="text" name="managerName" placeholder="manager name" required=""></span><br>
            <span>enter manager phone:<input type="number" name="managerPhone" placeholder="manager phone" required=""></span><br>
            <span>enter manager mail  :<input type="email" name="managerEmail" placeholder="manager mail" required=""></span><br>
            <span>enter manager password:<input type="text" name="managerPassword" placeholder="manager password" required=""></span><br>
            <input type="file" name="image" accept="image/*" >
            <input type="hidden" name="operation" value="createmanager">
            <input type="submit" name="submit" >
           
            
         </form>
       </div>
