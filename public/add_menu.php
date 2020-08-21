<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();
?>

<title>Add Menu</title>
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
  انشاء قائمة جديدة
</div>
<div class="alert alert-secondary" role="alert" >
  
  
  <form dir="rtl" method="post"  action="menu_added.php">
  <div class="form-group">
    <label > اسم القائمة</label>
    <input type="text" id="menu_name" name="menu_name" class="form-control" > 
  </div><br>
  
<div class="form-group">
    <label for="exampleFormControlSelect1"> الترتيب </label>
    <select class="form-control" id="rank"  name="rank">
     <?php 

$query = "SELECT `rank` FROM `navbar_menu` WHERE 1" ;
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
    //while($row = mysqli_fetch_assoc($result)){
    for($i=1 ; $i <= mysqli_num_rows($result)+1 ; $i++){
 ?>
      <option  value="<?php echo $i; ?>" <?php echo $i==mysqli_num_rows($result)+1?'selected':"";?>><?php echo $i; ?></option>
<?php 
    } 
}//if
mysqli_free_result($result);
?>
    </select>
  </div>
  
  <br>
  <div class="form-group">
    <label> مرئية  </label>
       <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1" checked>  نعم  </small>  
       <small class="pr-3"><input type="radio" name="visible" id="visible" value="0">  لا </small>  
  </div>
  
  <br>

  <button type="submit" name="submit" class="btn btn-primary">اضافة</button>
</form>
  
  
</div>


</div>
</div>
</div>

  
  
  
  
  
  	
  	



    
    
      
<?php 
include_once '../includes/layout/footer.php';
?>
    