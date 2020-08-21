<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register(); 

if($_GET['menu_id']){
 
    $id= rawurlencode($_GET['menu_id']);
    
    
    $query2 = "SELECT `rank`,`id` FROM `pages` WHERE `menu_id` = ".$id;
    $result2 = mysqli_query($conn,$query2);
    

     if($result2 && mysqli_num_rows($result2) >= 0)
     {
         $counRows = mysqli_num_rows($result2) ;
         for ($i = 1; $i <= $counRows+1; $i++) {
          ?>
             <option  value="<?php echo $i ; ?>"  <?php echo $i==$counRows+1 ? "selected":"" ; ?> ><?php echo $i ; ?></option>
             <?php
         }
        
         mysqli_free_result($result2);
     }
 
     ?>


<?php  } ?>


    