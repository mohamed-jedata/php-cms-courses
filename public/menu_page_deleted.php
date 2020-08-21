<?php

include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';




check_register(); 



if(isset($_GET['menu']) || isset($_GET['page'])  ){
    
    if(isset($_GET["page"]) ){
       //Delete Page
        $page_id = secure_url($_GET["page"]);
       
        $query = "DELETE FROM `pages` WHERE `id`= ".$page_id." LIMIT 1"  ;
        $result = mysqli_query($conn, $query);
        
        if ($result && mysqli_affected_rows($conn) > 0) {
            $_SESSION['msg'] =  success_deletePage() ;
            redirect("manage_content.php");
        }
        else
        {
            $_SESSION['msg'] = failed_deletePage() ;
            redirect("delete_menu_page.php");
          }
       
        
    }else{
        //Delete menu
        $menu_id = secure_url($_GET["menu"]);
        $query = "SELECT * FROM `pages` WHERE `menu_id`=$menu_id" ;
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0){
            //menu contain pages
            $_SESSION["msg"] = menu_contain_pages();
            redirect("delete_menu_page.php");
        }else{
            $query2 = "DELETE FROM `navbar_menu` WHERE `id` =  $menu_id  LIMIT 1"   ;
            $result2 = mysqli_query($conn, $query2);
            
            if ($result2 && mysqli_affected_rows($conn) > 0) {
                $_SESSION['msg'] =  success_deleteMenu();
                redirect("manage_content.php");
            }
            else
            {
                $_SESSION['msg'] =  failed_deleteMenu() ;
                redirect("delete_menu_page.php");
            }
            
        }
        
     }
  
   
    

    
    
}else {
    redirect("delete_menu_page.php");
}

?>





