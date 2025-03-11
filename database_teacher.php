<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $u_type=$_POST["cmb_usertype"];
    $fname=$_POST["txt_tfn"];
    $mname=$_POST["txt_tmn"];
    $lname=$_POST["txt_tln"];
    $gender=$_POST["rbtn_gender"];
    $dob=$_POST["txt_dob"];
    $qulification=$_POST["txt_qul"];
    $designation=$_POST["cmb_des"];
    $doj=$_POST["txt_doj"];
    $contact=$_POST["txt_contact"];
    $email=$_POST["txt_email"];
    $password=$_POST["txt_pwd"];

    if($_POST["btn_submit"]=="Add")
    {
        echo $qry="insert into teacher(u_type,fname,mname,lname,gender,dob,qulification,des_id,doj,contact,email,password)values('".$u_type."','".$fname."','".$mname."','".$lname."','".$gender."','".$dob."','".$qulification."','".$designation."','".$doj."','".$contact."','".$email."','".$password."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:teacher.php");
		}
    }
    if($_POST["btn_submit"]=="update")
    {
        $t_id=$_POST["editid"];
        echo $qry="update teacher set u_type='".$u_type."',fname='".$fname."',mname='".$mname."',lname='".$lname."',gender='".$gender."',dob='".$dob."',qulification='".$qulification."',des_id='".$designation."',doj='".$doj."',contact='".$contact."',email='".$email."',password='".$password."' where t_id=".$t_id;
		
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
			header("location:teacher.php");
		}
    }
}
if(isset($_GET["del"]))
{
    $t_id=$_GET["del"];
    echo $qry="delete from teacher where t_id=".$t_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
	{
		echo "problem in Delete";
	}
	else
	{
		header("location:teacher.php");
	}
}

?>
