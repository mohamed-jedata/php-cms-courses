

<nav class="navbar  mynavbar navbar-expand-lg navbar-dark  "   >

   <a class="navbar-brand" href="index.php"> كوروس </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class=" navbar-collapse pl-lg-5 pl-md-0 collapse  justify-content-end"  id="navbarNavDropdown">

    <ul class="navbar-nav ml-2" >
    
    <?php 
    
    $query = "SELECT * FROM `navbar_menu` WHERE `visible` = 1";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){
            
            $query2 = "SELECT * FROM `pages` WHERE `menu_id` = ".$row['id'];
            $result2 = mysqli_query($conn,$query2);
    
            if(mysqli_num_rows($result2) > 0){
              echo '<li class="nav-item dropdown "> ';
              echo '<a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
              echo $row['name'] ;
              echo '</a>';
              echo '<div class="dropdown-menu text-right" aria-labelledby="navbarDropdownMenuLink">';
              while($row2 = mysqli_fetch_assoc($result2)){
                  echo '<a class="dropdown-item" href="'.$_SERVER["PHP_SELF"]."?page=".$row2['id'].'">'.$row2['page_name'].'</a>';
              }
              echo '</div>';
            }else {
                echo ' <li class="nav-item active" style="float:left">';
                echo '<a class="nav-link" href="'.$_SERVER["PHP_SELF"]."?menu=".$row['id'].'">'.$row['name'] .'</a>';
                echo '</li>';
            }
        }
    }
    mysqli_free_result($result);    
    mysqli_free_result($result2);    
    
    ?>
     
     </ul>
    
    <!-- <form method="get"  action="<?php echo secure_field($_SERVER["PHP_SELF"]); ?>?search=<?php echo secure_field($_GET['search']);?>" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search"  name="search" placeholder="اسم الدورة" aria-label="Search">
      <button   class="btn btn-info mr-2 search_btn" type="submit">بحث</button>
    </form> -->
    
  </div>

  
</nav>