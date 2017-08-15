<link href="newcss.css" rel="stylesheet" type="text/css"/>
<?php 
$name= filter_var($_GET['oldname'],FILTER_SANITIZE_STRING);
$phone=filter_var($_GET['oldphone'],FILTER_SANITIZE_NUMBER_INT);
$mail=filter_var($_GET['oldmail'],FILTER_SANITIZE_EMAIL);

?>
<div class="incontainer">
   <?php 
   echo '<div class="boxrow2">';
   echo $name."<br>";
   echo $phone."<br>";
   echo $mail."<br>";
   echo '</div>';
?>
    <div class="boxrow2">
<form action="api.php" method="POST">
    <input type="submit"  value="submit edit"><br>
    <input type="text" name="name" placeholder="new name" required ><br>
    <input type="number" name="phone" placeholder="new phone" required><br>
    <input type="email" name="mail" placeholder="new mail" required ><br>
                    <input type="hidden" name="oldname" value="<?php echo $name ; ?>" >
                    <input type="hidden" name="oldphone" value="<?php echo $phone ; ?>">
                    <input type="hidden" name="oldmail" value="<?php echo $mail ; ?>">
                    <input type="hidden" name="operation" value="editmanager">
                </form>
    </div>
</div>
