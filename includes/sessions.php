<?php
session_start();



function showMessage() {
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = NULL;
    }
}

 


?>

