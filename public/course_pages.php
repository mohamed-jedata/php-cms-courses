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
  if(isset($_GET['id']) && isset($_GET['course'])  && isset($_GET['lesson'])){

$course_id =secure_url($_GET['id']);

$query1 = "SELECT * FROM `courses` WHERE `id`='$course_id' AND `visible`=1 LIMIT 1" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) > 0){
      $row = mysqli_fetch_assoc($result1);
    
      $course_name = $row["course_name"] ;

      //Format date to YY-MM-DD
      $timestamp = strtotime($row["date"]);
      $newDate = date('d-m-Y', $timestamp); 

      //Get Path of course
      $path_id = $row["path_id"];
      $query = "SELECT `name` FROM `paths` WHERE `id`='$path_id' LIMIT 1" ;
      $result = mysqli_query($conn,$query);
      if($result && mysqli_num_rows($result) > 0){
        $row2 = mysqli_fetch_assoc($result);
        $path = $row2['name'] ;
        mysqli_free_result($result);
      }

    mysqli_free_result($result1);
}else {
  redirect("courses.php");
}
}else {
redirect("courses.php");
}
?>


<!-- Fetch lessons -->


<?php 

$page_index = secure_url($_GET['lesson']);

$query = "SELECT * FROM `course_pages` WHERE `visible`=1 AND `course_id`='$course_id' AND `page_index`=$page_index LIMIT 1" ;
$result = mysqli_query($conn,$query);
if($result1 && mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $lesson_title = $row['lesson_title'];
    $lesson_content = nl2br($row['lesson_content']);

    $extlesson = imgExt($row['lesson_img']);
    $lesson_img = "pictures/".$row['lesson_img'].$extlesson ;

    mysqli_free_result($result);
}else{
  redirect("course_intro.php?id=".$course_id."&course=".$course_name);
}

?>




<title>  <?php echo $course_name;?> : <?php echo $lesson_title;?> </title>
  </head>
  <body dir="rtl">
  

  
 <!-- NavBar -->
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  


  
  <!--   Header -->
  
  <div class="intro_info"  style="background-color: #1D248F">
    <div class="container text-white">
      <h2 class=" pb-2 pb-sm-3"  >   الكورس : <?php echo  $course_name ; ?> </h1>
      <h2 class=" pb-2 pb-sm-3" style="line-height: 1.6">المسار : <?php echo $path ;?>   </h1>
      <h2 class="pb-2 pb-sm-3" style="line-height: 1.6">الدرس : <?php echo $lesson_title ;?>   </h1>
   
<!--       <h3 class="pt-4 lead">اختر الدورة التي تعجبك وتابع واستسمتع بالحياة.</h3> -->
   <div class="text-left pb-2" >
   تاريخ الانشاء : <?php echo $newDate ;?>
      </div>
    
   </div>
  </div>
  


<!-- Lesson Content -->
  
<!-- fetch lesson content -->





  <section class="container  pt-5"  >
  
  <div class="row text-center" >
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
     <div class="col-lg-6 col-md-6 col-sm-10">

<!-- image -->

<h2 class="pt-4 pb-2"><?php echo $lesson_title;?></h2>


<img src=" <?php echo $lesson_img;?>" class= "img-fluid" alt="Responsive image">


     </div>
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
</div>


  <div class="row pt-4 text-center" >
     <div class="col-lg-3 col-md-1 col-sm-1">
     </div>
     <div class="col-lg-6 col-md-10 col-sm-10">
          <article class="text-justify   page_content " >
          <p >
<!--           description -->

<?php echo $lesson_content ;?>
              
         </p> 
          </article>
    
    <div class="row">
      <!-- //next button -->

     <?php

     $query = "SELECT `page_index` FROM `course_pages` WHERE `visible`=1 AND `course_id`='$course_id' AND `page_index`>$page_index LIMIT 1" ;
     $result = mysqli_query($conn,$query);
     if($result && mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_assoc($result);
     $page_next = $row['page_index'];
      echo' <div class="col text-right" >';
      echo'  <a type="button" href="course_pages.php?id='.$course_id.'&course='.$course_name.'&lesson='.$page_next.'" class="btn btn-primary btn-lg mt-3 w-100"> <i class="fas fa-arrow-right pl-2 "></i> التالي</a> '; 
      echo' </div>';

     mysqli_free_result($result);
      }
   
   ?>
   
      <!-- //back button -->

      <?php
        $query = "SELECT `page_index` FROM `course_pages` WHERE `visible`=1 AND `course_id`='$course_id' AND `page_index`<$page_index LIMIT 1" ;
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $page_pre = $row['page_index'];
           echo' <div class="col text-left ">';
           echo'  <a type="button" href="course_pages.php?id='.$course_id.'&course='.$course_name.'&lesson='.$page_pre.'" class="btn btn-primary btn-lg mt-3 w-100"> <i class="fas fa-arrow-left pr-2 "></i> السابق</a> '; 
           echo' </div>';
     
          mysqli_free_result($result);
        }       
     ?>

    </div>

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
$lesson_content=null;
$lesson_img =null;
?>  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
    
  
  
<!--   Footer -->
  <?php 
include_once '../includes/layout/footer.php';

/**
 * @param nuCol
 */



?>
 
  
  
  
  