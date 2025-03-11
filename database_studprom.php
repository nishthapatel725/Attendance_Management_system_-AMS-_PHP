<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST['cmb_course'];
    $sem_id=$_POST['cmb_sem'];
    $sem_to=$_POST['cmb_semto'];
    echo $pno = $_POST["txt_abno"];
    
    $pno=substr($pno,1,-1);
    echo $sql="update student set sem_id=$sem_to where s_id in($pno)";
    $rs=mysqli_query($con,$sql);
    //die(0);
    
    header("location:student_promot.php");
}
?>