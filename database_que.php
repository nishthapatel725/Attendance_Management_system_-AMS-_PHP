<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $sub_id=$_POST["cmb_sub"];
    $que=$_POST["txt_que"];
    $oa=$_POST["txt_oa"];
    $ob=$_POST["txt_ob"];
    $oc=$_POST["txt_oc"];
    $od=$_POST["txt_od"];
    $ans=$_POST["txt_ans"];
    $t_id=$_POST["cmb_tea"];
    
    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into question(course_id,sem_id,sub_id,que,oa,ob,oc,od,ans,t_id)values('".$course_id."','".$sem_id."','".$sub_id."','".$que."','".$oa."','".$ob."','".$oc."','".$od."','".$ans."','".$t_id."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:que_bank.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $que_id=$_POST["editid"];
        echo $qry="update question set course_id='".$course_id."',sem_id='".$sem_id."',sub_id='".$sub_id."',que='".$que."',oa='".$oa."',ob='".$ob."',oc='".$oc."',od='".$od."',ans='".$ans."',t_id='".$t_id."' where que_id=".$que_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:que_bank.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $que_id=$_GET["del"];
    echo $qry="delete from question where que_id=".$que_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:que_bank.php");
	}
}

?>
