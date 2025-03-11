<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST['cmb_course'];
    $sem_id=$_POST['cmb_sem'];

    $qry="select s_id,s_fname,s_mname,s_lname from student where course_id=$course_id and sem_id=$sem_id and approval_status=1 order by s_lname,s_fname,s_mname" ;
    $rsstundets=mysqli_query($con,$qry);
    if(mysqli_num_rows($rsstundets)>0)
    {
        while($row=mysqli_fetch_row($rsstundets))
        {
           //echo 'id = '. $row[0] .'value = ' . $_rollno = $_POST[$row[0]];
           $s_id=$row[0];
           $roll_no=$_POST[$row[0]];
           echo $qry="update student set roll_no=$roll_no where s_id=".$s_id;
           $res=mysqli_query($con,$qry);
        }
    }
    header("location:Generate-rollno.php");
}
?>