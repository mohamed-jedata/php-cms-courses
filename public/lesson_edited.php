<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';



check_register(); 



if(isset($_GET["lesson"])  ){
    
    $id = secure_url($_GET["lesson"]);
    
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
        
        
        $query = "UPDATE  `course_pages` SET `course_id`='$course_id', `lesson_title`='$lesson_title', `lesson_img`='$lesson_img',`lesson_content`='$lesson_content',`page_index`='$page_index',`visible`=$visible WHERE `id`=$id";
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_editedLesson();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_editedLesson();
            redirect("edit_lesson.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("edit_lesson.php");
    }
    
    
}else {
    redirect("edit_lesson.php");
}

?>




