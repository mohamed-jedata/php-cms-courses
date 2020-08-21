<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';

check_register();


if(isset($_GET['admin'])){
    
    $id = secure_url($_GET['admin']) ;
    
    
    
    $query = "DELETE FROM `admins` WHERE `id`= $id LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_affected_rows($conn) > 0)
    {
        $_SESSION['msg'] = success_deletedAdmin();
        redirect("admins.php");
    }else {
        $_SESSION['msg'] = failed_deletedAdmin();
        redirect("admins.php");
    }
    
    
    
}else {
    redirect("admins.php");
}

?>






<?php 

include_once '../includes/layout/footer.php';
 




?>