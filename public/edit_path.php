<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/layout/header.php';

check_register();
?>




<title>Edit Path</title>
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
           
           <a href="edit_path.php?path=<?php echo $row['id']?>"><?php echo $row['name'] ;?></a>
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
 تعديل مسار
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
      <td><a type="button" onclick="" class="btn btn-primary" href="edit_path.php?path=<?php echo $row["id"] ?>">تعديل</a></td>
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

<?php 
if(isset($_GET['path'])){
    $id = secure_url($_GET['path']);
    $query = "SELECT * FROM `paths` WHERE `id`='$id'" ;
    $result = mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        ?>
        
        <div class="alert alert-primary"  role="alert" >
        <form dir="rtl" method="post"  enctype="multipart/form-data"  action="path_edited.php?path=<?php echo  $id;?>">
  <div class="form-group">
    <label > اسم المسار</label>
    <input type="text" id="path_name"  value="<?php echo $row['name'];?>" name="path_name" class="form-control" > 
  </div><br>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">وصف قصير</label>
    <textarea class="form-control" name="descripton"  id="descripton"  placeholder="اكتب وصف قصير للمسار هنا ..." rows="3"> <?php echo $row['description'];?></textarea>
  </div><br>

    <br>
  <div class="form-group">
      <label >مرئية</label>
         <small class="pr-4"><input type="radio" name="visible" id="visible"  value="1"  <?php echo $row['visible']==1?"checked":""; ?>  >  نعم  </small>  
         <small class="pr-3"><input type="radio" name="visible" id="visible" value="0" <?php echo $row['visible']==0?"checked":""; ?>   >  لا </small>  
  </div>
  
  <br>

  <button type="submit" name="submit" class="btn btn-primary">تعديل</button>
</form>
        </div>
        
        
       <?php  
        mysqli_free_result($result);
    }
}

?>




</div>
  






</div>
</div>
  	
  	



    
    
      
<?php 
include_once '../includes/layout/footer.php';
?>


