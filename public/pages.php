<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


if(isset($_GET['page']) && isset($_GET['name'])){

   $page_id = secure_url($_GET['page']);
   
    $query = "SELECT * FROM `pages` WHERE `id`='$page_id'  LIMIT 1" ;
    $result = mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result) > 0){
           $row = mysqli_fetch_assoc($result);
           
           $title = $row['page_name'];
           $description = $row['description'];
           $content = $row['content'];
           
          mysqli_free_result($result);
    }else{
        redirect("index.php");
    }
        
}else{
    
    Menus_Pages() ;

}



?>

<title><?php echo $title ; ?> </title>

  </head>
  <body dir="rtl">
  
 
 <!-- NavBar -->
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  
  
  

  
  
  
<!--   Header -->
  
<div class="jumbotron myjump">
    <div class="container text-white">
      <h1 class="display-4 pb-4 "><?php echo $title; ?> :</h1>
 </div>
  </div>
  
  


  
  
  
  <section class="container  pt-4"  >
  
  <div class="row text-center" >
     <div class="col-lg-4 col-md-3 col-sm-1">
     </div>
     <div class="col-lg-4 col-md-6 col-sm-10">
          <h2><?php echo $title; ?></h2>
          <h5 class="pt-3 font-italic " style="line-height: 1.6">
            <?php echo $description ; ?>
         </h5> 
     </div>
     <div class="col-lg-4 col-md-3 col-sm-1">
     </div>
</div>


  <div class="row pt-5 text-center" >
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
     <div class="col-lg-6 col-md-6 col-sm-10">
          <article class="text-justify  page_content" >
          <p >
           <?php echo nl2br($content); ?>
         </p> 
          </article>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-1">
     </div>
</div>

  
  </section>

  
  
  
  
  
  
   

  <?php 
     //FREE RESOURCES
  $title = NULL;
  $description = NULL;
  $content = NULL;
  
  ?>
  
  
  
  
  
  
<!--   Footer -->
  <?php 
include_once '../includes/layout/footer.php';
?>
  
  