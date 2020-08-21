<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


?>

<title>الدورات</title>

  </head>
  <body dir="rtl">
  
 
 <!-- NavBar -->
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  
  
  <?php 
  
  Menus_Pages() ;
  
  ?>
  
  
  
<!--   Header -->
  
  <div class="jumbotron myjump" >
    <div class="container text-white">
      <h1 class="display-4">الدورات :</h1>
      <h3 class="pt-4 lead para">اختر الدورة التي تعجبك وتابع واستسمتع بالحياة.</h3>
 </div>
  </div>
  
  


  <section class="container paths " >
  
  <div class="row "  id="border">
     
  <div class="col-lg-2 col-md-6 col-sm-6" style="margin-left: -80px">
  <h3>المسار :</h3>
  </div>
  <div class="col-lg-5 col-md-6 col-sm-6">
  
    <form>
  <div class="form-row" dir="rtl">

       <select class="form-control" id="selectPath"   name="path_id">
       
         
    <?php 
    
 if(isset($_SESSION['path'])){
 
     echo ' <option value="">عرض الكل</option>';

     $path_id = $_SESSION['path'];
     $_SESSION['path'] = NULL;
     
     $query1 = "SELECT * FROM `paths` WHERE `visible`=1" ;
     $result1 = mysqli_query($conn,$query1);
     if($result1 && mysqli_num_rows($result1) > 0){
         while($row = mysqli_fetch_assoc($result1)){
             ?>
      <option  value="<?php echo $row["id"];?>"   <?php echo $row['id']==$path_id?"selected":"";?> ><?php echo $row["name"]; ?></option>
<?php 
         } 
     mysqli_free_result($result1);
     }//if mySql
     
     
     
     
 }else{
     echo ' <option value="" selected>عرض الكل</option>';
     $query1 = "SELECT * FROM `paths` WHERE `visible`=1" ;
     $result1 = mysqli_query($conn,$query1);
     if($result1 && mysqli_num_rows($result1) > 0){
         while($row = mysqli_fetch_assoc($result1)){
 ?>
      <option  value="<?php echo $row["id"]; ?>" ><?php echo $row["name"]; ?></option>
<?php 
         } 
     mysqli_free_result($result1);
     }//if mySql
}//ifSession
?>

    
        </select>



     </div>
    </form>
  </div>

  </div>

  
  </section>
  
  
  
  
    <section class="container pb-2"  id="showCardsCrs">
    

 <?php 
     if(isset($path_id)){
         $query = "SELECT * FROM `courses` WHERE `visible`=1 AND `path_id`=$path_id" ;
     }else{
         $query = "SELECT * FROM `courses` WHERE `visible`=1" ;
     }
    $result = mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result) > 0){
        $cards = mysqli_num_rows($result);
        $lines = ceil($cards/3);
        $nuCol = 0 ;
        $n=$lines;
       while ($row = mysqli_fetch_assoc($result)) {
           ?>
           
        <?php if($n==$lines){?><div class="row"><?php }?>
        <?php if($nuCol==3){$nuCol = 0 ;?><div class="row"><?php }?>

   <div class="col pt-3">
<?php $nuCol++;?>
<?php 
$ext = imgExt($row['course_img']);

?>
     <div class="card course_card mr-3  h-100"  style="width: 18rem;">
  <img class="card-img-top"   src="pictures/<?php echo $row['course_img'].$ext ;?>" alt="<?php echo $row['course_name'].$ext ;?>">
  <div class="card-body btn-left"  >
    <h5 class="card-title"><?php echo $row['course_name'];?></h5>
    <p class="card-text" ><?php echo $row['description'];?></p>
    <div>
    <a  href="course_intro.php?id=<?php echo secure_url($row['id']);?>&course=<?php echo secure_url($row['course_name']);?>" class="btn btn-primary">متابعة</a>
    </div>
  </div>
</div>

  </div>


  
<?php if($nuCol==3){?></div><?php }?>
<?php if($nuCol!=3 && $cards==0){?></div><?php }?>

           <?php 
           $lines--;
           $cards--;
           
       }
       mysqli_free_result($result);
    }
  ?>
     
    
    
    
    


 
    
    
  </section>
  
  
  
  
  
  
  
  
  
  
  
  
<!--   Footer -->
  <?php 
include_once '../includes/layout/footer.php';

/**
 * @param nuCol
 */



?>
  
  
  
  