<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


?>

  
      
<!-- Redirect to select page or select menu   -->
  <?php 
  Menus_Pages() ;
  ?>



<?php

    
if(isset($_GET['id']) && isset($_GET['course'])){

  $course_id =secure_url($_GET['id']);

  $query1 = "SELECT * FROM `courses` WHERE `visible`=1 AND `id`='$course_id' LIMIT 1" ;
  $result1 = mysqli_query($conn,$query1);
  if($result1 && mysqli_num_rows($result1) > 0){
      while($row = mysqli_fetch_assoc($result1)){
  
        //Get Path of course
        $path_id = $row["path_id"];
        $query = "SELECT `name` FROM `paths` WHERE `id`='$path_id' LIMIT 1" ;
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0){
          $row2 = mysqli_fetch_assoc($result);
          $path = $row2['name'] ;
          mysqli_free_result($result);
        }

        $course_name = $row["course_name"] ;
      
        //Format date to YY-MM-DD
        $timestamp = strtotime($row["date"]);
        $newDate = date('d-m-Y', $timestamp); 

        $intro_course = nl2br($row["intro_course"]) ;
        $ext = imgExt($row['course_img']);
        $img = "pictures/".$row['course_img'].$ext ;
      }
      mysqli_free_result($result1);
  }else {
    redirect("courses.php");
  }
}else {
  redirect("courses.php");
}
?>








  

<title>  مقدمة عن <?php echo $course_name;?> </title>
  </head>
  <body dir="rtl">
  

  
 <!-- NavBar -->
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  





  
  <!--   Header -->
  
  <div class="intro_info"  style="background-color: #1D248F">
    <div class="container text-white">
      <h2 class=""  >   الكورس : <?php echo  $course_name ; ?> </h1>

      <br>
      <h2 class=" pb-4 pb-sm-5" style="line-height: 1.6">المسار : <?php echo $path ;?>   </h1>
   
<!--       <h3 class="pt-4 lead">اختر الدورة التي تعجبك وتابع واستسمتع بالحياة.</h3> -->
   <div class="text-left pb-2" >
   تاريخ الانشاء : <?php echo $newDate ;?>
      </div>
    
   </div>
  </div>
  
  
  
<!--   Course Introductino -->
 
  
  <section class="container  pt-5"  >
  
  <div class="row text-center" >
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
     <div class="col-lg-6 col-md-6 col-sm-10">

<!-- image -->



<img src="<?php echo $img;?>" class= "img-fluid" alt="<?php echo $course_name;?>">



     </div>
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
</div>


  <div class="row pt-4 text-center" >
     <div class="col-lg-3 col-md-1 col-sm-1">
     </div>
     <div class="col-lg-6 col-md-10 col-sm-10">
          <article class="text-justify  page_content" >
          <p >
<!--           description -->

<?php echo $intro_course ; ?>

   
         </p> 
          </article>
          
          <a  href="course_pages.php?id=<?php echo $course_id;?>&course=<?php echo $course_name;?>&lesson=1" class="btn btn-primary btn-lg mt-3">بدأ الدورة</a>
          
          
     </div>
     <div class="col-lg-3 col-md-1 col-sm-1">
     </div>
</div>

  
  </section>

  

 <!-- Free Recources  -->
<?php

$timestamp = null;
$path = null;
$course_name = null ;
$newDate = null;
$intro_course = null ;
$ext = null;
$img = null ;

?>  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
  
  
<!--   Footer -->
  <?php 
include_once '../includes/layout/footer.php';

/**
 * @param nuCol
 */



?>
 
  
  
  
  