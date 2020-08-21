<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();

?>




<title>Add Lesson</title>
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

$query = "SELECT `course_name`,`id` FROM `courses` WHERE 1" ;
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

              
                <?php 
                       $query1 = "SELECT `page_index`,`lesson_title` FROM `course_pages` WHERE `course_id`=".$row['id'] ;
                       $result1 = mysqli_query($conn,$query1);
                       if($result1 && mysqli_num_rows($result1) > 0){
                         while($row1 = mysqli_fetch_assoc($result1)){
                           echo ' <th scope="row">الدرس  '.$row1['page_index'].' : </th>';
                           echo ' <td>'.$row1['lesson_title'].'</td>';
                           echo ' </tr>';
                          }
                        mysqli_free_result($result1);
                       }else{
                        echo ' <th scope="row">لم يتم ادخال اي درس بعد !!</th>';
                       }
                ?>
               

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
  اضافة درس جديد
</div>
<div class="alert alert-secondary" role="alert" >
  
  
  <form dir="rtl" method="post"  enctype="multipart/form-data"  action="lesson_added.php">
  <div class="form-group">
    <label > عنوان درس</label>
    <input type="text" id="lesson_title" name="lesson_title" class="form-control" > 
  </div><br>


<div class="form-group">
       <label for="exampleFormControlSelect1">الكورس</label>
       <select class="form-control" id="course_select"  name="course_id">
    
    <?php 

$query1 = "SELECT `id`,`course_name` FROM `courses` WHERE 1" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
    while($row = mysqli_fetch_assoc($result1)){
 ?>
      <option  value="<?php echo $row["id"]; ?>" ><?php echo $row["course_name"]; ?></option>
<?php 
    } 
    mysqli_free_result($result1);
}//if

?>

    
        </select>
    </div>
    



    <div class="form-group" id="showPagesIndex">
       <label for="exampleFormControlSelect1">ترتيب الدرس</label>
       <select class="form-control" id="page_index"  name="page_index">
    
    <?php 
$query = "SELECT `id` FROM `courses` LIMIT 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    mysqli_free_result($result);
}

$query1 = "SELECT `page_index`,`course_id` FROM `course_pages` WHERE `course_id`=$id" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) >= 0){
    $nRow = mysqli_num_rows($result1);
    for($i = 1 ; $i <= $nRow+1 ; $i++)
    {
 ?>
      <option  value="<?php echo $i; ?>" <?php echo $i==$nRow+1?"selected":"";?>><?php echo $i; ?></option>
<?php 
    } 
    mysqli_free_result($result1);
}//if

?>

    
        </select>
    </div>



    <br>
   <div class="form-group">
    <label for="exampleFormControlTextarea1"> محتوى الدرس</label>
    <textarea class="form-control" name="lesson_content"  id="lesson_content"  placeholder="اكتب محتوى  الدرس هنا ..." rows="5"></textarea>
  </div><br>
  
<div class="form-group">
    <label for="exampleFormControlSelect1"> صورة  للدرس : </label><br>
     <input type='file' name='lesson_img'>
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




    
    
   

<!-- Footer -->

<?php 
include_once '../includes/layout/footer.php';
?>


