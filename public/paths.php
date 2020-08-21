<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


if(isset($_GET['path'])){
    $id_Path =  secure_url($_GET['path']);
    $_SESSION['path'] = $id_Path;
    redirect("courses.php");
}



?>

<title>مسارات البرمجة</title>

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
  
<div class="jumbotron myjump"  >
    <div class="container text-white">
      <h1 class="display-4">المسارات :</h1>
      <h3 class="pt-4 lead para">استكشف المسارات الموجودة واختر ما ترغب في تعلمه.</h3>
 </div>
  </div>
  
  


  
  
  
  <section class="container paths"  >
  
        <?php 
    $query = "SELECT * FROM `paths` WHERE `visible`=1" ;
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

  <div class="col-md-6 col-sm-12" style="padding-top: 16px">
<?php $nuCol++;?>
  <div class="path_card  h-100">
  <div class="mycard  ">
    <h2><b><?php echo $row['name'];?></b></h2> 
    <p><?php echo $row['description'];?></p> 
  </div>
  <hr>
  <div  align="center" class="text-white">
  <a type="button" href="paths.php?path=<?php echo $row['id'];?>" class="btn btn-primary">اكتشاف المسار</a>
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

  
  
  
  
  
  
   
<!--   <div class="row"> -->
  
<!--   <div class="col"> -->
  
<!--   <div class="path_card"> -->
<!--   <div class="mycard"> -->
<!--     <h2><b>مسار تطبيقات الهاتف</b></h2>  -->
<!--     <p>مرحبا بك في عالم الاندرويد حيث ستتعلم اساسيات برمجة تطبيقات الهواتف الذكية</p>  -->
<!--   </div> -->
<!--   <hr> -->
<!--   <div align="center" class="text-white"> -->
<!--   <a type="button" href="#" class="btn btn-primary">اكتشاف المسار</a> -->
<!--   </div> -->
<!-- </div> -->
  
  
  
  
  
  
  
  
  
<!--   Footer -->
  <?php 
include_once '../includes/layout/footer.php';
?>
  
  