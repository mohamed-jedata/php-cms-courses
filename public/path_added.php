<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 

if(isset($_POST["submit"])  ){
    
    
    $path_name = mysqli_real_escape_string($conn,$_POST["path_name"]);
    $descripton = mysqli_real_escape_string($conn,$_POST["descripton"]);
    $visible = trim($_POST["visible"]);
    
    check_empty_fields(array($path_name,$descripton));
    check_size($path_name, 3,50 );
    check_size($descripton, 3,500 );

    
    $path_name = secure_field($path_name);
    $descripton = secure_field($descripton);
    
    
    if(empty($errors)){
        
        
        $query = "INSERT INTO `paths`(`name`,`description`,`visible`) VALUES".
            "('$path_name','$descripton',$visible)" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_addPath();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_addPath();
            redirect("add_path.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("add_path.php");
    }
    
    
}else {
    redirect("add_path.php");
}

?>




