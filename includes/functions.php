<?php

$errors = array();

function redirect($url)
{
    header("Location:$url");
}


function check_register(){
    if(!isset($_SESSION['admin_login']) && !isset($_COOKIE['admin_login'])){
      redirect("login_admin.php");
    }
  }
  

function imgExt($img)
{
    if(strrpos($img, ".")){
        $ext = "";
    }else {
        $ext =  '.jpg';
        
    }
    return $ext;
}





function saveImageLesson()
{
    global $errors;
    
    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES["lesson_img"]["name"]);
    
    if (move_uploaded_file($_FILES["lesson_img"]["tmp_name"], $target_file)) {
        //success    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        $errors['img_error'] =  "حدث خطا اثناء رفع الملف !!";
    }
    
    $lesson_img=basename( $_FILES["lesson_img"]["name"],".jpg"); // used to store the filename in a variable
   
   
   return $lesson_img;
}



function saveImage()
{
    global $errors;
    
    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES["course_img"]["name"]);
    
    if (move_uploaded_file($_FILES["course_img"]["tmp_name"], $target_file)) {
        //success    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        $errors['img_error'] =  "حدث خطا اثناء رفع الملف !!";
    }
    
    $course_img=basename( $_FILES["course_img"]["name"],".jpg"); // used to store the filename in a variable
   
   
   return $course_img;
}







function display_errors() {
    global $errors ;
   
    if(!empty($errors)){
    $m = '';
    foreach ($errors as $key => $value) {
        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>خطأ !! </strong>'.$value;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
    }
  
    return $m;
    }
}





function username_deja_exict(){
 
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>خطأ !! </strong>اسم المستعمل يوجد مسبقا ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function menu_contain_pages(){
 
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>خطأ !! </strong>القائمة تحتوي على صفحات  ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_addAdmin(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة الادمين بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_addLesson(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_addPage(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editedAdmin(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تعديل معلومات الادمين بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editedLesson(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تعديل الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editedMenu(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تعديل معلومات القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editedPage(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تعديل معلومات الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}


function success_deletedAdmin(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف الادمين بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_deletePage(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_deleteMenu(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_deleteLesson(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_deleteCourse(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف الكورس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_deletePath(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم حذف المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}

function success_addMenu(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_addCourse(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة الكورس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_addPath(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم اضافة المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editCourse(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تحديث الكورس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function success_editPath(){

    $m = '';

        $m .= '<div class="alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>تم تحديث المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}

function failed_addAdmin(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة الادمين </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_addPage(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_addMenu(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}

function incorrect_login(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  'اسم المستخدم أو كلمة السر غير صحيحة !!' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}


function failed_addCourse(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة الكورس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}

function failed_addLesson(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}

function failed_addPath(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم تتم اضافة المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editCourse(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تحديث الكورس بنجاح </strong> '  ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editPath(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تحديث المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editedLesson(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تحديث الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deleteMenu(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم حذف القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deleteCourse(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم حذف الكورس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deleteLesson(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم حذف الدرس بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deletePath(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم حذف المسار بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deletePage(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong> هناك خطا !! لم يتم حذف الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editedAdmin(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تعديل معلومات الادمين بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editedMenu(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تعديل القائمة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_editedPage(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم تعديل الصفحة بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}
function failed_deletedAdmin(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong>  خطا !! لم يتم حذف الادمين بنجاح </strong> ' ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}



function secure_field($field) {
    $field = trim($field);
    $field = htmlentities($field);
    return $field;
}

function secure_url($url) {
    $url = htmlentities($url);
    return rawurlencode($url);
}


function check_size($field, $min, $max)
{
    global $errors ;
    
    $field = trim($field);
    if(strlen($field) < $min){
        $errors['short'] = "اسم قصير  جدا ";
    }elseif ($max!=null && strlen($field) > $max) {
        $errors['long'] = " اسم طويل جدا !! الطول الاقصى المسموح به هو     $max";
    }
}


function check_email($email){
    global $errors ;
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "بريد الكتروني غير مقبول ";
    }
    
}


function check_empty_fields(array $fields){
    global $errors ;
    
    foreach ($fields as $value) {
        if(empty($value)){
            $errors['empty'] = "خانة فارغة ";
            break;
        }
    }
}






function Menus_Pages()
{
    global  $conn;
    
    if(isset($_GET['menu'])){
        $id = secure_url($_GET['menu']);
        $query = "SELECT `name`FROM `navbar_menu` WHERE `id`='$id' " ;
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['name']=='الرئيسية'){
                //home page
                redirect("index.php");
            }elseif($row['name']=='المسارات'){
                //paths
                redirect("paths.php");
            }elseif ($row['name']=='الدورات'){
                //courses
                redirect("courses.php");
            }
            mysqli_free_result($result);
        }
    } elseif (isset($_GET['page'])){
        
        
        $page_id = secure_url($_GET['page']);
        $query = "SELECT `id`,`page_name`FROM `pages` WHERE `id`='$page_id'  LIMIT 1" ;
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            redirect("pages.php?page=".rawurlencode($row['id'])."&name=".rawurlencode($row['page_name']));
            mysqli_free_result($result);
        }
        
    }
    
    
}





function success_addContact(){

    $m = '';

        $m .= ' <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">';
        $m .=  '<div class="toast-header text-right"> ' ;
        $m .= ' <button type="button" class="ml-2 mr-2 mb-1 close" data-dismiss="toast" aria-label="Close">';
        $m .= '  <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '   <strong class="">اغلاق</strong>';
        $m .= '  </div>';
        $m .= '   <div class="toast-body">شكرا لك على رأيك. نسعى دائما لتطوير المحتوى وذالك استماعا لأراء زبنائنا الكرام.</div>';
        $m .= '   </div>';
 
    return $m;
}


function failed_addContact(){

   
    $m = '';

        $m .= '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">';
        $m .=  '<strong> حدث خطأ اثناء ارسالك لتعليقك !! </strong> '  ;
        $m .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $m .= ' <span aria-hidden="true">&times;</span>';
        $m .= '  </button>';
        $m .= '  </div>';
 
    return $m;
}










?>