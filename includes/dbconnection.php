<?php



define("HOSTNAME","localhost");
define("USERNAME","mohamed");
define("PASSWORD","jedata");
define("DB_NAME","courses");

$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB_NAME);

if(!$conn){
    // echo "Connection failed : ".mysqli_connect_error() ;
    // echo "<br>" ;
    // echo  "Error No : ".mysqli_connect_errno() ;
    echo 'Unexpected error was detected, We are trying to solve it.<br> Thank you for waiting.';
   die();
}


?>

