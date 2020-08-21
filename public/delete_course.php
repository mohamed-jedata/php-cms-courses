<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();

?>




<title>Remove Course</title>
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

$query = "SELECT * FROM `courses` WHERE 1" ;
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
               <tr>
                 <th scope="row">اسم الكورس</th>
                 <td><?php echo $row['course_name']?></td>
               </tr>
               <tr>
                 <th scope="row">كاتب الكورس</th>
                 <td><?php echo $row['creator']?></td>
               </tr>
               <tr>
               <th scope="row">المسار</th>
                <?php 
                       $query1 = "SELECT * FROM `paths` WHERE `id`=".$row['path_id']." LIMIT 1" ;
                       $result1 = mysqli_query($conn,$query1);
                       if($result1 && mysqli_num_rows($result1) > 0){
                         $row1 = mysqli_fetch_assoc($result1);
                         echo ' <td>'.  $row1['name'].'</td>';
                         mysqli_free_result($result1);
                       }
                ?>
               </tr>
               <tr>
                 <th scope="row">التاريخ</th>
                 <td><?php echo $row['date']?></td>
               </tr>
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

<div class="pb-4">



<div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
  حذف كورس
</div>
<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >

<?php 
$query = "SELECT * FROM `courses` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    echo '<table class="table" >';
    echo '  <tr class="table-borderless">';
    echo '     <th scope="col">اسم الكورس </th>';
    echo '     <th scope="col">الاجراء</th>  ';
    echo '  </tr>';
    while($row = mysqli_fetch_assoc($result)){
 ?>
    <tr>
      <td><?php echo $row["course_name"] ?></td>
      <td><a type="button" onclick="" class="btn btn-danger" href="course_deleted.php?course=<?php echo $row["id"] ?>">حذف</a></td>
    </tr>
<?php 
    }
    echo '</table>';
    mysqli_free_result($result);
}else{
    echo "<h2>لم تتم اضافة اي كورس بعد !!</h2>";
}
?>

 </div>


  
</div>





</div>
</div>
</div>

  	
  	



    
    
      
<?php 
include_once '../includes/layout/footer.php';
?>


