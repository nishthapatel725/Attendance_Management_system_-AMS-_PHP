<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $sub_id=$_POST["cmb_sub"];
    $assign_date=$_POST["txt_adate"];
    $submi_date=$_POST["txt_sdate"];
    $assign_topic=$_POST["txt_assigntop"];
    $t_id=$_POST["cmb_tea"];
    
    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into assign(course_id,sem_id,sub_id,assign_date,submi_date,assign_topic,t_id)values('".$course_id."','".$sem_id."','".$sub_id."','".$assign_date."','".$submi_date."','".$assign_topic."','".$t_id."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:assignment.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $assign_id=$_POST["editid"];
        echo $qry="update assign set course_id='".$course_id."',sem_id='".$sem_id."',sub_id='".$sub_id."',assign_date='".$assign_date."',submi_date='".$submi_date."',assign_topic='".$assign_topic."',t_id='".$t_id."' where assign_id=".$assign_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:assignment.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $assign_id=$_GET["del"];
    echo $qry="delete from assign where assign_id=".$assign_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:assignment.php");
	}
}

?>
