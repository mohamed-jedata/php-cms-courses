<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


check_register();
?>



<title>Edit page</title>
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
 تعديل صفحة
</div>
<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >
  
  <?php
  
        if(isset($_GET['page']) ){
            $page = secure_url($_GET['page']);
            $query = "SELECT *  FROM `pages` WHERE id=". $page ;
            $result = mysqli_query($conn,$query);
            if($result && mysqli_num_rows($result) > 0){
               $row = mysqli_fetch_assoc($result);
  ?>
  
   <form method="post"  action="page_edited.php?page=<?php echo $page;?>">
  <div class="form-group  ">
    <label >اسم الصفحة</label>
 

<input type="text"  value="<?php echo $row['page_name']; ?>"  id="page_name" name="page_name" class="form-control" >
 
    </div><br>
    
    <div class="form-group">
       <label for="exampleFormControlSelect1">القائمة</label>
       <select class="form-control" id="menu"   name="menu">
    
    <?php 

$query1 = "SELECT * FROM `navbar_menu`" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
 ?>
      <option  value="<?php echo $row1["id"]; ?>" <?php echo $row1['id']==$row['menu_id']?"selected":"" ; ?> ><?php echo $row1["name"]; ?></option>
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
       <select class="form-control" id="rank"  name="rank">
       
       <?php 
       $query2 = "SELECT `rank`,`id` FROM `pages`";
       $result2 = mysqli_query($conn,$query2); 
       
       if($result2 && mysqli_num_rows($result2) > 0)
       {
           $counRows = mysqli_num_rows($result2) ;
           for ($i = 1; $i <= $counRows; $i++) {
       ?>
    
      <option <?php echo $i==$row['rank']?"selected":""; ?>><?php echo $i ;?></option>
 
       <?php 
           }
           mysqli_free_result($result2);
       }
       ?>
    
        </select>
    </div>
  
  <br>
  
  
  <br>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">وصف قصير</label>
    <textarea class="form-control" name="description"  id="description"  placeholder="وصف قصير ..." rows="2"><?php echo $row['description'];?></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">المحتوى</label>
    <textarea class="form-control" name="content"  id="content"  placeholder="اكتب محتوى الصفحة هنا ..." rows="10"><?php echo $row['content'];?></textarea>
  </div>
  
  
  
    <br>
  <div class="form-group">
      <label >مرئية</label>
         <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1"  <?php echo $row['visible']==1?"checked":""; ?>  >  نعم  </small>  
         <small class="pr-3"><input type="radio" name="visible" id="visible" value="0" <?php echo $row['visible']==0?"checked":""; ?>   >  لا </small>  
  </div>

  
  <br>
  <button type="submit" name="submit" class="btn btn-primary">تحديث</button>
</form>
<?php 
           }
            mysqli_free_result($result);
        }else{
            echo "<h5> اضغط على الصفحة التي ترغب في تحديثها !!</h5>";
        }
  ?>
  
  
</div>


</div>
</div>
</div>








   
   
   
<?php 


include_once '../includes/layout/footer.php';
 
?>