<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();



if(isset($_GET['course'])  ){
    
    $course = secure_url($_GET['course']);

        $query = "DELETE FROM `courses` WHERE `id`=$course" ;
        $result = mysqli_query($conn,$query);

            if ($result && mysqli_affected_rows($conn) > 0) 
            {
                $_SESSION['msg'] =  success_deleteCourse();
                redirect("manage_content.php");
            }
            else
          {
                $_SESSION['msg'] =  failed_deleteCourse() ;
                redirect("delete_course.php");
            }

    
    
    
    
    
}else {
    redirect("delete_course.php");
}

?>





