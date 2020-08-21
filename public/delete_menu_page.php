<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();
?>

<title>Delete Menu - Page</title>
  </head>
  <body dir="rtl">
  
  
  
  
    <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  



  
  
  
<div class="container" style="padding-top:100px">


<div class="pb-4">
<?php 
   echo showMessage();
?>
</div>

<div class="row">
<div class="col-lg-4 col-12">
 



 <?php 

$query = "SELECT `name`,`id`  FROM `navbar_menu` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
 ?>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn text-dark  btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapse<?php  echo htmlentities($row['id']) ; ?>" aria-expanded="true" aria-controls="collapseOne">
           <?php  echo mysqli_real_escape_string($conn,$row['name']) ; ?>     
        </button>
      </h2>
    </div>
 
      <div id="collapse<?php  echo htmlentities($row['id']) ; ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
       <div class="card-body">
         <?php  
         echo ' <a  href="'.$_SERVER["PHP_SELF"]."?menu=".htmlentities($row['id']).'">'.mysqli_real_escape_string($conn,$row['name'])  .'</a>';
          ?>     
        </div>
       </div>


    <?php 
    
    $query2 = "SELECT `menu_id`,`page_name`,`id` FROM `pages` WHERE `menu_id`= ".htmlentities($row['id']);
    $result2 = mysqli_query($conn,$query2);
    
    if(mysqli_num_rows($result2) > 0){
    
    ?>
    <div id="collapse<?php  echo htmlentities($row['id']) ; ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
  
        <ul>
        <?php 
             while($row2 = mysqli_fetch_assoc($result2)){
        ?>      
        <li>
        <?php 
        echo ' <a  href="'.$_SERVER["PHP_SELF"]."?page=".htmlentities($row2['id']).'">'.mysqli_real_escape_string($conn,$row2['page_name'])   .'</a>';
        ?>
       </li>
         <?php }?>
        </ul>     
       
      </div>
    </div>
  
    <?php }?>
  
  </div>
  </div>
 <?php

          }      
       }
    mysqli_free_result($result);
    mysqli_free_result($result2); 
    ?>
  
  
  







</div>



<div class="col-lg-8 col-12 pt-lg-0 pt-5">



<div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
  حذف صفحة أو قائمة
</div>
<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >
  
  <?php
  
        if(isset($_GET['menu']) || isset($_GET['page']) ){
            $menu = null;
            if(isset($_GET['page'])){
                $pag = secure_url($_GET['page']);
                $quer = "SELECT `menu_id` FROM `pages` WHERE `id`=".$pag;
                $resul = mysqli_query($conn,$quer);
                if($resul && mysqli_num_rows($resul) > 0){
                    $row = mysqli_fetch_assoc($resul);
                    $menu = $row['menu_id'];
                    
                    mysqli_free_result($resul);
                 }
            }else{
                $menu = $_GET['menu'] ;
             }
           
             $query = "SELECT `name`,`id`  FROM `navbar_menu` WHERE id=".$menu ;
             $result = mysqli_query($conn,$query);

             if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
  
  ?>


<table class="table" >
  
    <tr class="table-borderless">
      <th scope="col">اسم القائمة </th>
      <th scope="col">الاجراء</th>    
    </tr>
  
 
    <tr>
      <td><?php echo $row["name"] ?></td>
      <td><a type="button" class="btn btn-danger" href="menu_page_deleted.php?menu=<?php echo $row["id"] ?>">حذف</a></td>
    </tr>
    
    <?php 
    $query2 = "SELECT `page_name`,`id` FROM `pages` WHERE `menu_id` = ".$row["id"] ;
    $result2 = mysqli_query($conn,$query2);
    if($result2 && mysqli_num_rows($result2) > 0){
        
        echo '<tr>';
        echo '<th scope="col">	اسم الصفحة </th>';
        echo '<th scope="col">الاجراء</th>';
        echo '</tr>';
        
        while($row2 = mysqli_fetch_assoc($result2)){
    ?>


    <tr>
       <td><?php echo '<h6>'.$row2["page_name"].'</h6>' ?></td>
        <td><a type="button" class="btn btn-danger" href="menu_page_deleted.php?page=<?php echo $row2["id"] ; ?>">حذف</a></td>
     </tr>
  <?php  }
    mysqli_free_result($result2);
    }
  ?>
</table>



  <?php 
          
           }
           mysqli_free_result($result);
            }
        }else{
            echo "<h5> اضغط على القائمة او الصفحة التي ترغب في حذفها  !!</h5>";
        }
  ?>
  
  
</div>


</div>
</div>
</div>








   
   
   
<?php 


include_once '../includes/layout/footer.php';
 
?>