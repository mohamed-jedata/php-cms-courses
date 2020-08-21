<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();

if(isset($_POST["submit"]) && isset($_GET['course']) ){
    
    $id = secure_url($_GET['course']);
    
    $course_name = mysqli_real_escape_string($conn,$_POST["course_name"]);
    $creator = mysqli_real_escape_string($conn,$_POST["creator"]);
    $descripton = mysqli_real_escape_string($conn,$_POST["descripton"]);
    $course_intro = mysqli_real_escape_string($conn,$_POST["intro_course"]);
    $visible = trim($_POST["visible"]);
    $path_id = trim($_POST["path_id"]);
    
    check_empty_fields(array($course_name,$creator,$descripton,$course_intro));
    check_size($course_name, 3,50 );
    check_size($descripton, 3,500 );
    check_size($creator, 3,50 );
    check_size($course_intro, 3,null ); //null = inlimited
    
    $course_img = saveImage();    
    
    
    $course_name = secure_field($course_name);
    $creator = secure_field($creator);
    $descripton = secure_field($descripton);
    $course_intro = secure_field($course_intro);
    
    if(empty($errors)){
        
       $query = "UPDATE `courses` SET `course_name`='$course_name', `creator`='$creator', ".
"`path_id`='$path_id',`description`='$descripton',`intro_course`='$course_intro',`course_img`='$course_img',`visible`='$visible' WHERE `id`=$id";
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_editCourse();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_editCourse();
            redirect("edit_course.php");
        }
        
    }else {
        $_SESSION["msg"] = display_errors();
        redirect("edit_course.php");
    }
    
    
}else {
    redirect("edit_course.php");
}


/**
 * @param errors
 */


?>




