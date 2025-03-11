<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $sub_id=$_POST["cmb_sub"];
    $t_id=$_POST["cmb_tea"];
    $academic_year=$_POST["txt_ayear"];
    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into sub_allot(course_id,sem_id,sub_id,t_id,academic_year)values('".$course_id."','".$sem_id."','".$sub_id."','".$t_id."','".$academic_year."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:allocate-subject.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $sa_id=$_POST["editid"];
        echo $qry="update sub_allot set course_id='".$course_id."',sem_id='".$sem_id."',sub_id='".$sub_id."',t_id='".$t_id."',academic_year='".$academic_year."' where sa_id=".$sa_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:allocate-subject.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $sa_id=$_GET["del"];
    echo $qry="delete from sub_allot where sa_id=".$sa_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:allocate-subject.php");
	}
}

?>
