<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




if(isset($_POST["submit"])){

     
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    
    check_empty_fields(array($username,$password));
    check_size($username, 3,50 );
    check_size($password, 3,50 );
  
    $username = secure_field($username);
    $password = secure_field($password);
    
   if(empty($errors)){
    
    
        $query = "SELECT `username` FROM `admins` WHERE `username`='$username' " ;  
        $result = mysqli_query($conn, $query);
        
       if($result && mysqli_num_rows($result) > 0){
           $query1 = "SELECT `password` FROM `admins` WHERE `username`='$username' " ;  
           $result1 = mysqli_query($conn, $query1);
           if($result1 && mysqli_num_rows($result1) > 0){
             $row = mysqli_fetch_assoc($result1);
             if(password_verify($password,$row['password'])){
                 //success register
                 if(isset($_POST['remember'])){
                    // "set cookies" when click on 'remeber me'
                  setcookie('admin_login',$username,time()+(60*60*24*10)); //10 days
                  redirect("admin_panel.php");  
                }else{
                    //set session
                  $_SESSION['admin_login'] = $username ;
                  redirect("admin_panel.php");
                }
             }else{
                 //incorrect password
                $_SESSION['msg'] = incorrect_login();
                redirect("login_admin.php");
             }
           }else{
                //correct username , wrong password
                $_SESSION['msg'] = incorrect_login();
                 redirect("login_admin.php");
           }  
       }else{
           //wrong username
           $_SESSION['msg'] = incorrect_login();
           redirect("login_admin.php");
       }
       
       }else {
           $_SESSION["msg"] = display_errors();
           redirect("login_admin.php"); 
       }
        
    
}else {
    redirect("login_admin.php");
}


 ?>


