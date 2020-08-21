<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();
?>




<title>Delete Path</title>
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

$query = "SELECT * FROM `paths` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
 ?>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id']?>" aria-expanded="true" aria-controls="collapseOne">
         <?php echo $row['name']?>
        </button>
      </h5>
    </div>
   

    
   
   

    <div id="collapse<?php echo $row['id']?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
           
           <a href="delete_path.php?path=<?php echo $row['id']?>"><?php echo $row['name'] ;?></a>
           <p class="pt-2"><?php echo $row['description'] ;?></p>
           
       </div>
    </div>
  </div>
  </div>

    <?php 
    }
    mysqli_free_result($result); 
}else{
    echo '<div class="alert alert-default" style="border: 1px solid #bdc3c7" role="alert" >';
    echo "<h4>لم تتم اضافة اي مسار بعد !!</h4>";
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
$query = "SELECT * FROM `paths` WHERE 1" ;
$result = mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0){
    echo '<table class="table" >';
    echo '  <tr class="table-borderless">';
    echo '     <th scope="col">اسم المسار </th>';
    echo '     <th scope="col">الاجراء</th>  ';
    echo '  </tr>';
    while($row = mysqli_fetch_assoc($result)){
 ?>
    <tr>
      <td><?php echo $row["name"] ?></td>
      <td><a type="button" onclick="" class="btn btn-danger" href="path_deleted.php?path=<?php echo $row["id"] ?>">حذف</a></td>
    </tr>
<?php 
    }
    echo '</table>';
    mysqli_free_result($result);
}else{
    echo "<h2>لم تتم اضافة اي مسار بعد !!</h2>";
}
?>


 </div>

                





</div>
  






</div>
</div>
  	
  	



    
    
      
<?php 
include_once '../includes/layout/footer.php';
?>


