<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();




if(isset($_GET['page'])){
    
    $id= rawurlencode($_GET['page']);
    
    
    $query2 = "SELECT `content`,`id`,`page_name` FROM `pages` WHERE `id` = ".$id;
    $result2 = mysqli_query($conn,$query2);
    
    
     
     if($result2 && mysqli_num_rows($result2) > 0)
     {
         while($row = mysqli_fetch_assoc($result2)){
             echo '<textarea  class="scrollabletextbox"  readonly name="note">'.$row['content'].'</textarea>';
         }
         mysqli_free_result($result2);
     }
 
     ?>


<?php  } ?>

