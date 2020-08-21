<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


check_register();

?>


<title>Admins</title>
  </head>
  <body dir="rtl">
  
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  
  
  
  <div class="pl-auto">
  <div class="jumbotron mr-auto" >
    <div class="container">
  <h1 class="display-4"> 
    <?php
    $time = date('H');
    if($time >= 11 &&  $time <= 16){
      echo "نهارك مبروك!! أيها الادمين";
    }elseif($time >= 16 && $time <= 20){
      echo "عشية مبروكة!! أيها الادمين";
    }elseif(($time >= 20 && $time <=23) || ($time <= 0 &&  $time <= 6)){
      echo "مساؤك مبروك!! أيها الادمين";
    }else{
      echo "صباح الخير!! أيها الادمين";
    }
 
   ?>
    <?php echo isset($_SESSION['admin_login'])?$_SESSION['admin_login']:$_COOKIE['admin_login'] ?></h1>
  
  <div class=" mt-5">
   <a class="btn btn-info btn-lg m-1 "  href="manage_content.php" role="button">ادارة المحتوى</a>
    <a class="btn btn-info btn-lg  m-1" href="admins.php" role="button">المدراء </a>
   <a class="btn btn-info btn-lg  m-1 "  href="logout.php" role="button">تسجيل الخروج</a>
  </div>
 
</div>
 </div>
  </div>
 
  

  
  
  
  
  
      
<?php 
include_once '../includes/layout/footer.php';
?>
    