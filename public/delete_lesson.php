<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();
?>




<title>Remove Lesson</title>
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
 حذف مسار
</div>
<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >
<?php 
$query = "SELECT * FROM `courses` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){
        $query1 = "SELECT * FROM `course_pages` WHERE `course_id`=".$row['id'] ;
        $result1 = mysqli_query($conn,$query1);
        if($result1 && mysqli_num_rows($result1) > 0){
            echo '<table class="table" >';
            echo ' <tr class="table-borderless">';
            echo '     <th scope="col">اسم الكورس </th>';
            echo '     <th scope="col">اسم الدرس </th>';
            echo '     <th scope="col">الاجراء</th>  ';
            echo '  </tr>';
            while($row1 = mysqli_fetch_assoc($result1)){
                echo ' <tr>';
                echo '<td>'. $row["course_name"] .'</td>';

                echo '<td>'.$row1["page_index"].' - '. $row1["lesson_title"] .'</td>';
                echo '<td><a type="button" onclick="" class="btn btn-danger" href="lesson_deleted.php?lesson='. $row1["id"].'">حذف</a></td>';
                echo '</tr>';
            }
            echo '</table>';
            mysqli_free_result($result1);
        }

?>


<?php 
    }
    mysqli_free_result($result);
}else{
    echo "<h2>لم تتم اضافة اي كورس بعد !!</h2>";
}
?>


 </div>

                





</div>
  






</div>
</div>
  	
  	



    
    
      
<?php 
include_once '../includes/layout/footer.php';
?>


