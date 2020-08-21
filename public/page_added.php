<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 

if(isset($_POST["submit"])){
    
    
    $page_name= mysqli_real_escape_string($conn,$_POST["page_name"]);
    $menu_id = mysqli_real_escape_string($conn,$_POST["menu"]);
    $content = mysqli_real_escape_string($conn,$_POST["content"]);
    $description = mysqli_real_escape_string($conn,$_POST["description"]);
    $rank = trim($_POST["rank"]);
    $visible = trim($_POST["visible"]);
    
    check_empty_fields(array($menu_id,$page_name,$content,$description));
    
    check_size($description, 3,null );   // null = max undefined
    check_size($content, 10,null );
    check_size($page_name, 3,25 );

    $menu_id = secure_field($menu_id);
    $page_name = secure_field($page_name);
    $content = secure_field($content);
    $description = secure_field($description);
    
    
    if(empty($errors)){
        
        
        $query = "INSERT INTO `pages`( `menu_id`, `page_name`, `content`, `description`, `rank`, `visible`)".
                        "VALUES ($menu_id,'$page_name','$content','$description',$rank,$visible)" ;
        
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_affected_rows($conn) > 0){
            $_SESSION['msg'] = success_addPage();
            redirect("manage_content.php");
        }else{
            $_SESSION['msg'] = failed_addPage();
            redirect("add_page.php");
        }
        
        
   }else {
        $_SESSION["msg"] = display_errors();
        redirect("add_page.php");
   }
    
    
    
    
    
}else {
    redirect("add_page.php");
}

?>






<?php 

include_once '../includes/layout/footer.php';
 




?>