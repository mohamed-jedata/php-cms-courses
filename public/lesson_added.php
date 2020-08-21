<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';



check_register(); 


if(isset($_POST["submit"])  ){
    
    
    $lesson_title = mysqli_real_escape_string($conn,$_POST["lesson_title"]);
    $lesson_content = mysqli_real_escape_string($conn,$_POST["lesson_content"]);
    $visible = trim($_POST["visible"]);
    $course_id = trim($_POST["course_id"]);
    $page_index = trim($_POST["page_index"]);

    check_empty_fields(array($lesson_title,$lesson_content ));
  
    check_size($lesson_title, 3,50 );
    check_size($lesson_content, 3,null );
    
    $lesson_img = saveImageLesson();
    
    
    $lesson_title = secure_field($lesson_title);
    $lesson_content = secure_field($lesson_content);

        
    if(empty($errors)){
        
        
        $query = "INSERT INTO `course_pages`(`course_id`, `lesson_title`, `lesson_img`,`lesson_content`,`page_index`,`visible`) VALUES".
            "('$course_id','$lesson_title','$lesson_img','$lesson_content','$page_index',$visible)" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_addLesson();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_addLesson();
            redirect("add_lesson.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("add_lesson.php");
    }
    
    
}else {
    redirect("add_lesson.php");
}

?>




