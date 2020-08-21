<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';


check_register();


if(isset($_GET['course'])){

$id = secure_url($_GET['course']);

?>
<label for="exampleFormControlSelect1">ترتيب الدرس</label>
<select class="form-control" id="page_index"  name="page_index">

<?php 

$query1 = "SELECT `page_index`  FROM `course_pages` WHERE `course_id`=$id" ;
$result1 = mysqli_query($conn,$query1);
if($result1 && mysqli_num_rows($result1) >= 0){
$nRow = mysqli_num_rows($result1);
for($i = 1 ; $i <= $nRow+1 ; $i++)
{
?>
<option  value="<?php echo $i; ?>" <?php echo $i==$nRow+1?"selected":"";?>><?php echo $i; ?></option>
<?php 
} 
mysqli_free_result($result1);
}//if

?>


 </select>


<?php } ?>