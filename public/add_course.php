<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();

?>




<title>Add Course</title>
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

$query = "SELECT * FROM `courses` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
 ?>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id']?>" aria-expanded="true" aria-controls="collapseOne">
         <?php echo $row['course_name']?>
        </button>
      </h5>
    </div>
   

    
   
   

    <div id="collapse<?php echo $row['id']?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
           
           <table class="table table-borderless">
               <tr>
                 <th scope="row">اسم الكورس</th>
                 <td><?php echo $row['course_name']?></td>
               </tr>
               <tr>
                 <th scope="row">كاتب الكورس</th>
                 <td><?php echo $row['creator']?></td>
               </tr>
               <tr>
               <th scope="row">المسار</th>
                <?php 
                       $query1 = "SELECT * FROM `paths` WHERE `id`=".$row['path_id']." LIMIT 1" ;
                       $result1 = mysqli_query($conn,$query1);
                       if($result1 && mysqli_num_rows($result1) > 0){
                         $row1 = mysqli_fetch_assoc($result1);
                         echo ' <td>'.  $row1['name'].'</td>';
                         mysqli_free_result($result1);
                       }
                ?>
               </tr>
               <tr>
                 <th scope="row">التاريخ</th>
                 <td><?php echo $row['date']?></td>
               </tr>
           </table>
           
       </div>
    </div>
  </div>
  </div>

    <?php 
    }
    mysqli_free_result($result); 
}else{
    echo '<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >';
    echo "<h4>لم تتم اضافة اي كورس بعد !!</h4>";
    echo '</div>';
}
    
    ?>
  



</div>



<div class="col-lg-8 col-12 pt-lg-0 pt-5">




  <div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
  اضافة كورس جديد
</div>
<div class="alert alert-secondary" role="alert" >
  
  
  <form dir="rtl" method="post"  enctype="multipart/form-data"  action="course_added.php">
  <div class="form-group">
    <label > اسم الكورس</label>
    <input type="text" id="course_name" name="course_name" class="form-control" > 
  </div><br>
  <div class="form-group">
    <label > كاتب الكورس</label>
    <input type="text" id="creator" name="creator" class="form-control" > 
  </div>
  <br>

<div class="form-group">
       <label for="exampleFormControlSelect1">المسار</label>
       <select class="form-control" id="path_id"  name="path_id">
    
    <?php 

$query1 = "SELECT * FROM `paths` " ;
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
    <label for="exampleFormControlTextarea1"> وصف قصير </label>
    <textarea class="form-control" name="descripton"  id="descriptionCourse"  placeholder="اكتب وصف قصير للكورس هنا ..." rows="3"></textarea>
    <span class='pt-3' id='count'></span>
  </div><br>
  

 
   <div class="form-group">
    <label for="exampleFormControlTextarea1"> مقدمة عن الكورس</label>
    <textarea class="form-control" name="intro_course"  id="intro_course"  placeholder="اكتب مقدمة عن الكورس هنا ..." rows="7"></textarea>
  </div><br>


<div class="form-group">
    <label for="exampleFormControlSelect1"> صورة للكورس : </label><br>
     <input type='file' name='course_img'>
  </div>
  
  <br>
  <div class="form-group">
    <label> مرئي   </label>
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


