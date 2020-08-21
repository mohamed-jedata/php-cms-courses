<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';



check_register(); 

?>


<title>Manage content</title>
  </head>
  <body dir="rtl">
  
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  
  
  
    
  <div class="container" style="padding-top:100px;padding-bottom:100px">

    <div class="pb-3 pt-2 pl-5"" >
   <?php 
   showMessage() ;
   ?>
  </div>

<div class="row">

<div class="col-lg-5">




  <div>
  <h2 class="pt-2 ">ادارة المحتوى</h2>
  </div>
  

   
  <div class=" pt-4 pr-5" >

  <div class="">
  
  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#menu" aria-expanded="true" aria-controls="collapseOne">
            <h4>القوائم</h4>
        </button>
      </h2>
    </div>

    <div id="menu" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
           <a  type="button" class="btn btn-warning" href="add_menu.php">اضافة قائمة</a>
           <a  type="button" class="btn btn-warning" href="edit_menu.php">تعديل قائمة</a>
           <a  type="button" class="btn btn-warning" href="delete_menu_page.php">حذف قائمة</a>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#pages" aria-expanded="true" aria-controls="collapseOne">
            <h4>الصفحات</h4>
        </button>
      </h2>
    </div>

    <div id="pages" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <a type="button" href="add_page.php" class="btn btn-success">اضافة صحفة</a>
           <a type="button"  href="edit_page.php"  class="btn btn-success">تعديل صفحة</a>
           <a type="button"  href="delete_menu_page.php"  class="btn btn-success">حذف صفحة</a>
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#paths" aria-expanded="true" aria-controls="collapseOne">
            <h4>المسارات</h4>
        </button>
      </h2>
    </div>

    <div id="paths" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <a type="button" href="add_path.php" class="btn btn-primary">اضافة مسار</a>
           <a type="button"  href="edit_path.php"  class="btn btn-primary">تعديل مسار</a>
           <a type="button"  href="delete_path.php"  class="btn btn-primary">حذف مسار</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#courses" aria-expanded="true" aria-controls="collapseOne">
            <h4>الكورسات</h4>
        </button>
      </h2>
    </div>

    <div id="courses" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <a type="button"  href="add_course.php" class="btn btn-danger">اضافة كورس</a>
           <a type="button" href="edit_course.php" class="btn btn-danger">تعديل كورس</a>
           <a type="button" href="delete_course.php" class="btn btn-danger">حذف كورس</a>
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#courses_pages" aria-expanded="true" aria-controls="collapseOne">
            <h4>الدروس</h4>
        </button>
      </h2>
    </div>

    <div id="courses_pages" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <a type="button"  href="add_lesson.php" class="btn btn-secondary"> اضافة درس</a>
            <a type="button" href="edit_lesson.php" class="btn btn-secondary">تعديل درس</a>
            <a type="button" href="delete_lesson.php" class="btn btn-secondary">حذف درس</a>
      </div>
    </div>
  </div>
  
 
</div>
</div>


</div>
</div>
<div class="col-lg-6 pt-lg-2 pt-4 pr-5">

  
  <form>
  <div class="form-row" dir="rtl">
    <div class="col">
      
  <select name="customers"  class="custom-select"  onchange="showPages(this.value)">

    <option value="" selected>اسم القائمة</option>
      <?php 
    
    $query = "SELECT * FROM `navbar_menu` ";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
         }
    }
 ?>


  </select>
      
      
    </div>
    <div class="col">
   
<div id="txtHint">

 <select id="page" class="custom-select">
<option selected>اسم الصفحة</option> 
 </select> 

</div>

   
    </div>

    
    
  </div>
</form>

<div class=" pr-1" style="padding-top: 36px">

<div id="content">
<textarea  class="scrollabletextbox" readonly name="note">سيتم عرض معلومات الصفحة هنا ...</textarea>
</div>


</div>



</div>







</div>

      

  
  </div>
  



 
  
      
<?php 
include_once '../includes/layout/footer.php';
?>
    