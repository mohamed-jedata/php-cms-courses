<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 

if(isset($_POST["submit"])){
    
     
    $menu_name = mysqli_real_escape_string($conn,$_POST["menu_name"]);
    $rank = trim($_POST["rank"]);
    $visible = trim($_POST["visible"]);
    
    check_empty_fields(array($menu_name));
    check_size($menu_name, 3,25 );
    
    $menu_name = secure_field($menu_name);
    
    
   if(empty($errors)){
    
    
        $query = "INSERT INTO `navbar_menu`(`name`, `rank`, `visible`) VALUES".
            "('$menu_name',$rank,$visible)" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){          
               $_SESSION['msg'] = success_addMenu();
                redirect("manage_content.php");       
       }else{
           $_SESSION['msg'] = failed_addMenu();
                redirect("add_menu.php");
       }
       
       }else {
           $_SESSION["msg"] = display_errors();
           redirect("add_menu.php"); 
       }
        
    
}else {
    redirect("add_menu.php");
}

?>






<?php 

include_once '../includes/layout/footer.php';
 




?>