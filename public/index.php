<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';


?>



<title> موقع كوروس : كورسات مجانية</title>
  </head> 
  <body dir="rtl">
  
  
    
<!-- Redirect to select page or select menu   -->
  <?php 
  Menus_Pages() ;
  ?>
  
  
 
 <!-- NavBar -->
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  


  <!-- Complement things -->
  <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>  -->
  
  <div id="thankForContact">

   <?php echo showMessage(); ?>


  </div>






<!-- Why programming section -->

<div class="jumbotron jumbotron-fluid welecomPage ">

  


  <div class="container px-lg-5 px-sm-0 ">
    <h1 class=" px-lg-5   px-sm-0 welecomTitle" >تعلم البرمجة واستمتع مجانا وشق طريقك نحو النجاح </h1>
    </div>
</div>

<div class="container whyPro">

  <h2>لماذا علي تعلم البرمجة ؟</h2>


  <div class="row">
  
    <div class="col-lg-4 col-md-12">
      
      
      
      <div class="px-lg-4">
  
      <div class="card-body text-center">
        <i class="fas fa-graduation-cap iconWhyPro"></i>
        <h5 class="card-title ">سهلة التعلم</h5>
        <p class="card-text">لا تحتاج لخبرة مسبقة لتعلم البرمجة  فمادام لديك الرغبة الكافية فلن يقف في طريقك في اي شئ</p>
      </div>
    </div>
      
      
      
      
    </div>
    <div class="col-lg-4 col-md-12 ">
    
    
          
      
      <div class=" px-lg-4 ">
  
      <div class="card-body text-center">
      <i class="fas fa-globe-africa iconWhyPro"></i>
        <h5 class="card-title">من أي مكان</h5>
        <p class="card-text">لاتحتاج البرمجة لمكان معين و لموقع محدد لتعلمها كل ما تحتاجه هو حاسوب متصل بالانترنيت و  ابدأ مسيرتك</p>
      </div>
    </div>
      
    
    
    
    </div>
    <div class="col-lg-4 col-md-12">
    
    
          
      
      <div class=" px-lg-4">
  
      <div class="card-body text-center">
      <i class="fas fa-sort-amount-up-alt iconWhyPro"></i>
        <h5 class="card-title ">طلب متزايد</h5>
        <p class="card-text"> اصبح هناك ارتفاع في وظائف البرمجة في السنوات الاخيرة مع ارتفاع مداخيل الطلب عليها</p>
      </div>
    </div>
      
    
    
    </div>
    
    
  </div>
</div>







<section class="redyToStart">
<div class="container ">


<div class="col text-center " >



<!-- <h2 id="redStrt">هل أنت مستعد لبدأ التعلم ؟</h2> -->
<h2 id="redStrt">إنه الوقت المناسب لبدإ التعلم ماذا تنتظر ؟</h2>

<p class="pt-3 pb-1 para">تعلم البرمجة سيكون افضل شيء تقوم به لاستغلال وقتك وجهدك الثمين . </p>

<a href="courses.php" type="button" class="mt-3 btn btnStart" style="font-size:23px;">إبدا الان</a>


</div>



</div>
</section>


<section id="contactMe">
<div class="layer">
<div class="container">

<div class="row"> 

<div class="col-lg-4 pr-md-0">

<h1 style="line-height: 1.7;font-weight:bolder ;color:#1d248f">يسعدنا سماع أرائك و افكارك.</h1>


<form class="pt-4" method="POST" action="add_contact.php">
  <div class="form-group">
    <input type="email" name="email" style="width: 90%;"  placeholder="البريد الالكتروني" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="form-group pt-2">
    <textarea class="form-control " name="comment" style="width: 90%;"  placeholder="رسالتك ..." id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" name="submit"  class="btn btn-primary mt-2">إرسال</button>
</form>




</div>



</div>

</div>

</div>
</section>


  
  
  
  

  
  
  
  
        
<?php 
include_once '../includes/layout/footer.php';
?>
  
  
  