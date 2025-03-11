<?php
include("database_connect.php");
if(isset($_POST["btn_resiter"]))
{
    $fname=$_POST["txt_fname"];
    $mname=$_POST["txt_mname"];
    $lname=$_POST["txt_lname"];
    $gender=$_POST["rbtn_gender"];
    $dob=$_POST["txt_dob"];
    $gr_no=$_POST["txt_grno"];
    $en_no=$_POST["txt_enno"];
    $contact=$_POST["txt_contact"];
    $email=$_POST["txt_email"];
    $password=$_POST["txt_pwd"];
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    if($_POST["btn_resiter"]=="Add")
    {
        echo $qry="insert into student(s_fname,s_mname,s_lname,gender,dob,gr_no,en_no,contact,email,password,course_id,sem_id) values('".$fname."','".$mname."','".$lname."','".$gender."','".$dob."','".$gr_no."','".$en_no."','".$contact."','".$email."','".$password."',$course_id,$sem_id)";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:student_login.php");
		}
    }
}
?>

