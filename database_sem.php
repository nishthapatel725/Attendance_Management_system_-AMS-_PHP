<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
	$sem_name=$_POST["txt_semname"];
    if($_POST["btn_submit"]=="Add")
    {      
        echo $qry="insert into semester(sem_name)values('".$sem_name."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:semester.php");
		}
    }
	if($_POST["btn_submit"]=="update")
    {
        $sem_id=$_POST["editid"];
        echo $qry="update semester set sem_name='".$sem_name."' where sem_id=".$sem_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:semester.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $sem_id=$_GET["del"];
    echo $qry="delete from semester where sem_id=".$sem_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:semester.php");
	}
}


?>
