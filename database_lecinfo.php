<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $lec_date=$_POST["txt_date"];
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $lec_no=$_POST["txt_lecno"];
    $proxy_status=$_POST["rbtn_ps"];
    $sub_id=$_POST["cmb_sub"];
    $t_id=$_POST["cmb_tea"];
    $lect_topic=$_POST["txt_lectop"];
    $lect_method=$_POST["txt_lecmeth"];
    
    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into lec_info(lec_date,course_id,sem_id,lec_no,proxy_status,sub_id,t_id,lect_topic,lect_method)values('".$lec_date."','".$course_id."','".$sem_id."','".$lec_no."','".$proxy_status."','".$sub_id."','".$t_id."','".$lect_topic."','".$lect_method."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:lec_info.php");
		}
    }
}

?>
