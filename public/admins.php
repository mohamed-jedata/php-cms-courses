<?php
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';
include_once '../includes/sessions.php';
include_once '../includes/layout/header.php';

check_register();
?>


<title>Admins</title>
  </head>
  <body dir="rtl">
  
  <?php 
  include_once '../includes/layout/navbar.php';
  ?>
  


  
  
  <div class="container" style="padding-top:100px;padding-bottom:100px">
  
  <div>
  <h2 class="pt-2 ">ادارة المدراء</h2>
  </div>
    <div class="pt-3 pb-2">
   <?php 
   showMessage() ;
   ?>
  </div>
 
  
  <div class="row pt-5">

  <div class="col-lg-3 col-12">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#admins" role="tab" aria-controls="v-pills-home" aria-selected="true">المدراء</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#addAdmin" role="tab" aria-controls="v-pills-profile" aria-selected="false">اضافة ادمين</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#editAdmin" role="tab" aria-controls="v-pills-messages" aria-selected="false">تعديل معلومات الادمين</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#deleteAdmin" role="tab" aria-controls="v-pills-settings" aria-selected="false">حذف ادمين</a>
    </div>
  </div>
  <div class="col-lg-9 col-12 pt-lg-0 pt-5 pr-lg-5 pr-0">
    <div class="tab-content" id="v-pills-tabContent">
      <div  class="tab-pane fade show active table-responsive" id="admins" role="tabpanel" aria-labelledby="v-pills-home-tab">
      
      
      <table class="table table-bordered" dir="ltr">
  <thead class="text-center">
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody class="text-center">
  
    <?php 
  $query = "SELECT  `first_name`, `last_name`, `username`, `email`,`date` FROM `admins`  ";
  $result = mysqli_query($conn, $query);
 
  if($result && mysqli_num_rows($result) > 0)
  {
       while($row = mysqli_fetch_assoc($result)){
          echo ' <tr>';
          echo '<td >'.$row['first_name'] .'</td>';
          echo '<td >'.$row['last_name'] .'</td>';
          echo '<td >'.$row['username'] .'</td>';
          echo '<td >'.$row['email'] .'</td>';
          echo '<td >'.$row['date'] .'</td>';
          echo ' </tr> ';
      }
      
  }
  mysqli_free_result($result);
  ?>
  
  
  </tbody>
</table>
      

      
      </div>
      <div class="tab-pane fade" id="addAdmin" role="tabpanel" aria-labelledby="v-pills-profile-tab">


      
      <form dir="ltr"  method="post" action="admin_added.php" class="text-left pb-5 pl-5">
  <div class="form-group">
    <label >First Name</label>
    <input type="text" name="firstname" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Last Name</label>
    <input type="text" name="lastname" class="form-control"  >
  </div>
  <div class="form-group">
    <label >User Name</label>
    <input type="text" name="username" class="form-control"  >
  </div>
  <div class="form-group">
    <label >E - Mail</label>
    <input type="email" name="email" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="text"  name="password" class="form-control"  >
  </div>
  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>


      
      
      </div>
      <div class="tab-pane fade" id="editAdmin" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      
      
          <?php 
  $query = "SELECT  `username`,`id`  FROM `admins`  ";
  $result = mysqli_query($conn, $query);
 
  if($result && mysqli_num_rows($result) > 0)
  {
      echo "<div class='text-center pl-5 pb-5'>";
      echo '<div dir= class="text-left  list-group" >';
       while($row = mysqli_fetch_assoc($result)){
           
           echo '<a href="admins.php?admin='.$row['id'].'" class="mb-1 list-group-item list-group-item-action ">'.$row['username'].'</a>';
         
       }
       echo '</div>';
       echo "</div>";
       mysqli_free_result($result);
  }
      ?>
      
      <?php 
      if(isset($_GET['admin'])){
          $id = secure_url($_GET['admin']);
          $query = "SELECT *  FROM `admins`WHERE  `id`= $id";
          $result = mysqli_query($conn, $query);
          
          if($result && mysqli_num_rows($result) > 0)
          {
              $row = mysqli_fetch_assoc($result);
       ?>
             <form dir="ltr"  method="post" action="admin_edited.php?admin=<?php echo $id;?>" class="text-left pb-5 pl-5">
  <div class="form-group">
    <label >First Name</label>
    <input type="text" name="firstname" value="<?php echo $row['first_name'];?>" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Last Name</label>
    <input type="text" name="lastname"  value="<?php echo $row['last_name'];?>" class="form-control"  >
  </div>
  <div class="form-group">
    <label >User Name</label>
    <input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control"  >
  </div>
  <div class="form-group">
    <label >E - Mail</label>
    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="text"  name="password"  value="<?php echo $row['password'];?>" class="form-control"  >
  </div>
  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
       <?php
       mysqli_free_result($result);
          }
      }
      ?>
      

      
      
      </div>
      <div class="tab-pane fade table-responsive" id="deleteAdmin" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      
      
      
       <table class="table table-bordered" dir="ltr">
  <thead class="text-center">
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
  
  
  
      <?php 
  $query = "SELECT  `id`,`first_name`, `last_name`, `username`, `email`,`date` FROM `admins`  ";
  $result = mysqli_query($conn, $query);
 
  if($result && mysqli_num_rows($result) > 0)
  {
       while($row = mysqli_fetch_assoc($result)){
          echo ' <tr>';
          echo '<td >'.$row['first_name'] .'</td>';
          echo '<td >'.$row['last_name'] .'</td>';
          echo '<td >'.$row['username'] .'</td>';
          echo '<td >'.$row['email'] .'</td>';
          echo '<td >  <a type="button" href="admin_deleted.php?admin='.$row['id'].'" class="btn btn-danger">Delete</a>  </td>';
          echo ' </tr> ';
      }
      
  }
  mysqli_free_result($result);
  ?>
  
  
  
   </tbody>
</table>
      
      
      
      </div>
    </div>
  </div>
</div>
  
  
  </div>
  
  
  
  
  
      
<?php 
include_once '../includes/layout/footer.php';
?>
    