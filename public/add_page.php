<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();

?>



<title>Add Page</title>
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
 اضافة صفحة
</div>
<div class="alert alert-secondary" role="alert" >
  
<br>
  <form method="post"  action="page_added.php">
  <div class="form-group  ">
    <label >اسم الصفحة</label>
 

<input type="text"  id="page_name" name="page_name" class="form-control" >
 
    </div><br>
    
    <div class="form-group">
       <label for="exampleFormControlSelect1">القائمة</label>
       <select class="form-control" id="menu"  onchange="showRanks(this.value)" name="menu">
    
    <?php 

$query1 = "SELECT * FROM `navbar_menu` WHERE 1" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
    while($row = mysqli_fetch_assoc($result1)){
 ?>
      <option  value="<?php echo $row["id"]; ?>" ><?php echo $row["name"]; ?></option>
<?php 
    } 
    mysqli_free_result($result1);
}//if

?>

    
        </select>
    </div>
    
    <br>
    
    <div class="form-group">
       <label for="exampleFormControlSelect1">الترتيب</label>
       <select class="form-control" id="rank_page"  name="rank">
       
       <?php 
       $query2 = "SELECT `rank`,`id` FROM `pages` LIMIT 1 ";
       $result2 = mysqli_query($conn,$query2); 
       
       if($result2 && mysqli_num_rows($result2) >= 0)
       {
           $counRows = mysqli_num_rows($result2) ;
           for ($i = 1; $i <= $counRows+1; $i++) {
       ?>
    
      <option><?php echo $i ;?></option>
 
       <?php 
           }
           mysqli_free_result($result2);
       }
       ?>
    
        </select>
    </div>
  

  <br>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">وصف قصير</label>
    <textarea class="form-control" name="description"  id="description"  placeholder="وصف قصير ..." rows="2"></textarea>
  </div>
  
  <br>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">المحتوى</label>
    <textarea class="form-control" name="content"  id="content"  placeholder="اكتب محتوى الصفحة هنا ..." rows="10"></textarea>
  </div>
  
  
  
    <br>
  <div class="form-group">
      <label >مرئية</label>
         <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1"  checked >  نعم  </small>  
         <small class="pr-3"><input type="radio" name="visible" id="visible" value="0"   >  لا </small>  
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