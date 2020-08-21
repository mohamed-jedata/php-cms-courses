<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();

if(isset($_POST["submit"]) && isset($_GET['admin'])){

        
    $first_name = mysqli_real_escape_string($conn,$_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn,$_POST['lastname']);
    $user_name = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    
    check_empty_fields(array($first_name,$last_name,$user_name,$email,$password));
    check_email($email);
    check_size($email, 2, 100);
    check_size($first_name, 2, 25);
    check_size($last_name, 2, 25);
    check_size($user_name, 2, 25);
    check_size($password, 2, 50);
    
    $first_name = secure_field($first_name);
    $last_name = secure_field($last_name);
    $user_name = secure_field($user_name);
    $email = secure_field($email);
    $password = password_hash($password, PASSWORD_BCRYPT) ;
    $password = secure_field($password);
    
    $id = $_GET['admin'] ;
        
        if(empty($errors) ){
        
            
            $query = "UPDATE `admins` SET `first_name`= '$first_name',`last_name`= '$last_name',".
                "`username`='$user_name' ,`email`='$email',`password`='$password' WHERE `id` = ".$id;
            
            $result = mysqli_query($conn, $query);
            
            if($result && mysqli_affected_rows($conn) > 0)
            {
                $_SESSION['msg'] = success_editedAdmin();
                redirect("admins.php");
            }else {
                $_SESSION['msg'] = failed_editedAdmin();
                redirect("admins.php");
            }
            
            
      }else {
            $_SESSION['msg'] = display_errors();
            redirect("admins.php");
      }
        
    
    
    
}else {
    redirect("admins.php");
}

?>






<?php 

include_once '../includes/layout/footer.php';
 




?>