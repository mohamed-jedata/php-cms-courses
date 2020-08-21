<?php

include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';






if(isset($_GET['course']))  {

    $course_id  =secure_url($_GET['course']);
    
    if(empty($course_id)){
        $query = "SELECT * FROM `courses` WHERE `visible`=1 " ;
    }else{
        $query = "SELECT * FROM `courses` WHERE `visible`=1 AND `path_id`=$course_id" ;
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
<?php $nuCol++;
$ext = imgExt($row['course_img']);
?>
     <div class="card course_card  h-100"  style="width: 18rem;">
  <img class="card-img-top"   src="pictures/<?php echo $row['course_img'].$ext ;?>" alt="Card image cap">
  <div class="card-body btn-left"  >
    <h5 class="card-title"><?php echo $row['course_name'];?></h5>
    <p class="card-text" ><?php echo $row['description'];?></p>
    <div>
    <a  href="courses.php?c=<?php echo $row['id'];?>" class="btn btn-primary">متابعة</a>
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
     
    
    
    
}

?>



 
