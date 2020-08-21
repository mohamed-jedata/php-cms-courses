<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 

if(isset($_GET['path'])){
    
    $id = secure_url($_GET['path']);
    
        $query = "DELETE FROM `paths` WHERE `id`=$id LIMIT 1" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_deletePath();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_deletePath();
            redirect("delete_path.php");
        }
        

    
    
}else {
    redirect("delete_path.php");
}

?>




