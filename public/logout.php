<?php
include_once '../includes/sessions.php';
include_once '../includes/functions.php';


if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_login'] = null;
}else{
    setcookie('admin_login',"",time()-(60*60*24*10)); //-10 days
}

redirect("login_admin.php")

?>