<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';



check_register(); 


if(isset($_POST["submit"])  && isset($_GET['path'])){
    
    $id = secure_url($_GET['path']);
    $path_name = mysqli_real_escape_string($conn,$_POST["path_name"]);
    $descripton = mysqli_real_escape_string($conn,$_POST["descripton"]);
    $visible = trim($_POST["visible"]);
    
    check_empty_fields(array($path_name,$descripton));
    check_size($path_name, 3,50 );
    check_size($descripton, 3,500 );
    
    
    $path_name = secure_field($path_name);
    $descripton = secure_field($descripton);
    
    
    if(empty($errors)){
        
        
  $query = "UPDATE `paths`  SET`name`='$path_name',`description`='$descripton',`visible`='$visible'  WHERE `id`=$id LIMIT 1" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_editPath();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_editPath();
            redirect("edit_path.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("edit_path.php");
    }
    
    
}else {
    redirect("edit_path.php");
}

?>




