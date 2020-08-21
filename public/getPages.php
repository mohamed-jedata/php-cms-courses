 <?php
 include_once '../includes/sessions.php';
 include_once '../includes/dbconnection.php';
 include_once '../includes/functions.php';

 check_register();  
 
 

 if(isset($_GET['q'])){
     
     $id= rawurlencode($_GET['q']);

 
 $query2 = "SELECT `page_name`,`id` FROM `pages` WHERE `menu_id` = ".$id;
 $result2 = mysqli_query($conn,$query2);
 

     ?>
     <select class="custom-select"  onchange="showPageContent(this.value)" >
     
     <option value=""  selected >اسم الصفحة</option>
     <?php

     
     if($result2 && mysqli_num_rows($result2) > 0)
     {
         while($row = mysqli_fetch_assoc($result2)){
             echo '<option  value="'.$row['id'].'">'.$row['page_name'].'</option>';
         }
         mysqli_free_result($result2);
     }
 
     ?>


  </select>

<?php  } ?>


