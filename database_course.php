<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_name=$_POST["txt_coursename"];
    $course_type=$_POST["rbtn_coursetype"];
    $no_sem=$_POST["txt_nosem"];

    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into course(course_name,course_type,course_sem)values('".$course_name."','".$course_type."',".$no_sem.")";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:course.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $course_id=$_POST["editid"];
        echo $qry="update course set course_name='".$course_name."',course_type='".$course_type."',course_sem=".$no_sem." where course_id=".$course_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:course.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $course_id=$_GET["del"];
    echo $qry="delete from course where course_id=".$course_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:course.php");
	}
}

?>
