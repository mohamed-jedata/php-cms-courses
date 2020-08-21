<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();


if(isset($_GET['course'])){
    
    $id= secure_url($_GET['course']);
    
    
    $query = "SELECT * FROM `courses` WHERE `id` = ".$id;
    $result = mysqli_query($conn,$query);
    
    
    
    if($result && mysqli_num_rows($result) > 0)
    {
       $row = mysqli_fetch_assoc($result);
       ?>
       <div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
       تعديل كورس
       </div>
       <div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >
       
       <br>
       <form dir="rtl" method="post"   enctype="multipart/form-data" action="course_edited.php?course=<?php echo $id ; ?>">
       <div class="form-group">
       <label > اسم الكورس</label>
       <input type="text" value="<?php echo $row['course_name'];?>" id="course_name" name="course_name" class="form-control" >
       </div><br>
       <div class="form-group">
       <label > كاتب الكورس</label>
       <input type="text" id="creator" value="<?php echo $row['creator'];?>" name="creator" class="form-control" >
       </div><br>
      <div class="form-group">
       <label for="exampleFormControlSelect1">المسار</label>
       <select class="form-control" id="path_id"  name="path_id">
    
    <?php 

$query1 = "SELECT * FROM `paths` WHERE 1" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
 ?>
      <option  value="<?php echo $row1["id"]; ?>" <?php echo $row1['id']==$row['path_id']?"selected":"" ; ?>><?php echo $row1["name"]; ?></option>
 <?php 
    } 
    mysqli_free_result($result1);
}//if

?>

    
        </select>
    </div><br>
       <div class="form-group">
       <label for="exampleFormControlTextarea1">وصف قصير</label>
       <textarea class="form-control" name="descripton"    id="descripton"  placeholder="اكتب وصف قصير للكورس هنا ..." rows="3"><?php echo $row['description'];?></textarea>
       </div><br>


       <div class="form-group">
    <label for="exampleFormControlTextarea1"> مقدمة عن الكورس</label>
    <textarea class="form-control" name="intro_course"  id="intro_course"  placeholder="اكتب مقدمة عن الكورس هنا ..." rows="5"><?php echo $row['intro_course'];?></textarea>
     </div>



       <br>
       <?php 
       $ext = imgExt($row['course_img']);
       ?>
       <div>

       <img class="card-img-top"   src="pictures/<?php echo $row['course_img'].$ext ;?>" alt="Card image cap">

       </div>

       <br>
       <div class="form-group">
    <label for="exampleFormControlSelect1"> صورة للكورس : </label><br>
     <input type='file' name='course_img' >
  </div>
       
      
       <br>
       <div class="form-group">
       <label> مرئي   </label>
       <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1" <?php echo $row["visible"]==1?"checked":"";?>>  نعم  </small>
       <small class="pr-3"><input type="radio" name="visible" id="visible" value="0" <?php echo $row["visible"]==0?"checked":"";?>>  لا </small>
       </div>
       
       <br>
       
       <button type="submit" name="submit" class="btn btn-primary">تعديل</button>
       </form>
       
       
       </div>
    <?php 
    }
    
}


?>



 
