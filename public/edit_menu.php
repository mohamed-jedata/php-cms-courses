<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


check_register();
?>



<title>Edit Menu</title>
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
if(mysqli_num_rows($result) > 0){
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
 تعديل قائمة
</div>
<div class="alert alert-secondary" role="alert" >
  
  <?php
  
        if(isset($_GET['menu']) ){
            $menu = secure_url($_GET['menu']);
            $query = "SELECT `name`,`rank`,`visible`  FROM `navbar_menu` WHERE id=". $menu ;
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
  
  ?>
  
  <form method="post"  action="menu_edited.php?menu=<?php echo  $menu?>">
  <div class="form-group">
    <label >اسم القائمة</label>
    <?php  //not this one
//            echo '<input type="text" value='.$row['item_name'].' id="menu_name" name="menu_name" class="form-control" >' ;
//     ?>
 
<!--  but this one -->
<input type="text" value="<?php echo $row['name'];?>" id="menu_name" name="menu_name" class="form-control" >
 
    </div><br>
    
    <div class="form-group">
       <label for="exampleFormControlSelect1">الترتيب</label>
       <select class="form-control" id="rank"  name="rank">
    
    <?php 

$query1 = "SELECT `rank` FROM `navbar_menu` WHERE 1" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
    for($i=1 ; $i <= mysqli_num_rows($result1) ; $i++){
 ?>
      <option  value="<?php echo $i; ?>" <?php echo $row['rank']==$i ?'selected':'' ?>><?php echo $i; ?></option>
<?php 
    } 
}//if
mysqli_free_result($result1);
?>

    
        </select>
    </div>
  
  
    <br>
  <div class="form-group">
      <label >مرئية</label>
         <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1" <?php echo $row['visible']==1 ? "checked":""  ?> >  نعم  </small>  
         <small class="pr-3"><input type="radio" name="visible" id="visible" value="0" <?php echo $row['visible']==0 ? "checked":""  ?>>  لا </small>  
  </div>

  
  <br>
  <button type="submit" name="submit" class="btn btn-primary">تحديث</button>
</form>
  
  <?php 
           }
            }
            mysqli_free_result($result);
        }else{
            echo "<h5> اضغط على القائمة التي ترغب في تحديثها !!</h5>";
        }
  ?>
  
  
</div>


</div>
</div>
</div>








   
   
   
<?php 


include_once '../includes/layout/footer.php';
 
?>