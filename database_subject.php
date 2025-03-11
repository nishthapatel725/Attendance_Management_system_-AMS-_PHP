<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $sub_code=$_POST["txt_subcode"];
    $sub_name=$_POST["txt_subname"];
    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into subject(course_id,sem_id,sub_code,sub_name)values('".$course_id."','".$sem_id."','".$sub_code."','".$sub_name."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:subjects.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $sub_id=$_POST["editid"];
        echo $qry="update subject set course_id='".$course_id."',sem_id='".$sem_id."',sub_code='".$sub_code."',sub_name='".$sub_name."' where sub_id=".$sub_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:subjects.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $sub_id=$_GET["del"];
    echo $qry="delete from subject where sub_id=".$sub_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:subjects.php");
	}
}

?>
