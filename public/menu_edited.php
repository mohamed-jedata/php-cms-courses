<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';



check_register(); 


if(isset($_POST["submit"]) && isset($_GET['menu'])  ){
    
    $menu = $_GET['menu'] ;
    $menu_name = mysqli_real_escape_string($conn,$_POST["menu_name"]);
    $rank = trim($_POST["rank"]);
    $visible = trim($_POST["visible"]);
    
    check_empty_fields(array($menu_name));
    check_size($menu_name, 3,25 );
    
    $menu_name = secure_field($menu_name);
    
    
    if(empty($errors)){
        
        
        $query = "UPDATE `navbar_menu` SET `name`='$menu_name', `rank`=$rank, `visible`=$visible  WHERE `id`=$menu" ;        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_editedMenu();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_editedMenu();
            redirect("edit_menu.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("edit_menu.php");
    }
    
    
}else {
    redirect("edit_menu.php");
}

?>






<?php 

include_once '../includes/layout/footer.php';
 




?>