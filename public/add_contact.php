<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';





if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);

  
    check_empty_fields(array($comment,$email));
    check_email($email);

    $email = secure_field($email);
    $comment = secure_field($comment);

    
    if (empty($errors)) {
        
            $query = "INSERT INTO `contact`(`email`, `comment`) VALUES ('$email','$comment')";
            $result = mysqli_query($conn, $query);
            if($result && mysqli_affected_rows($conn) > 0)
            {
                $_SESSION['msg'] = success_addContact();
                redirect("index.php");
            }else {
                $_SESSION['msg'] = failed_addContact();
                redirect("index.php");
            }
            
        
    }else{
        $_SESSION['msg'] = display_errors();
        redirect("index.php");
    }
    
}else {
    redirect("index.php");
}



/**
 * 
 */



?>
