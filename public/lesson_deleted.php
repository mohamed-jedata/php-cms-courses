<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 

if(isset($_GET["lesson"])  ){
    
    $id = secure_url($_GET["lesson"]);


        
        
        $query = "DELETE  FROM `course_pages` WHERE `id`= $id";
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_deleteLesson();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_deleteLesson();
            redirect("delete_lesson.php");
        }
        
  
    
}else {
    redirect("delete_lesson.php");
}

?>




