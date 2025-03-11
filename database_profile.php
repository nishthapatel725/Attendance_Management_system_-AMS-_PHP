<?php
session_start();
include("database_connect.php");
if(isset($_POST["btn_update"]))
{
    $t_id = $_SESSION["t_id"];
    $fname=$_POST["txt_tfn"];
    $mname=$_POST["txt_tmn"];
    $lname=$_POST["txt_tln"];
    $dob=$_POST["txt_dob"];
    $contact=$_POST["txt_contact"];
    $email=$_POST["txt_email"];
    $o_pwd=$_POST["txt_opwd"];
    $password=$_POST["txt_pwd"];
    $c_pwd=$_POST["txt_cpwd"];
    if($_POST["btn_update"] == "Update")
    {
        //echo $selectqry="select * from teacher where password='$n_pwd'";
        // echo $update="update teacher set password='".$n_pwd."' where t_id=".$t_id; 
        // $t_id=$_POST["editid"];
        echo $qry="update teacher set fname='".$fname."',mname='".$mname."',lname='".$lname."',dob='".$dob."',contact='".$contact."',email='".$email."',password='".$password."' where t_id=".$t_id;
        $res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in update";
		}
		else
		{
            $_SESSION['alert_msg'] = 'Profile Updated';
			header("location:profile.php");
		}
    
        // $rsteacher=mysqli_query($con,$update);
        // $row=mysqli_fetch_row($rsteacher);
        // if($row==null)
        // {
        //     header("location:teacher.php?s=1");
        // }
        // else
        // {
            
        //     $t_id=$row[0];
        //     $u_type=$row[1];
        //     $u_name=$row[2] . " " . $row[3]. " " . $row[4];
        //     $des_id=$row[8];
        //     $qry="select des_name from designation where des_id=$des_id";
        //     $rsdesig=mysqli_query($con,$qry); 
        //     $row=mysqli_fetch_row($rsdesig);
        //     $designation=$row[0];
        //     if(isset($_SESSION["t_id"])==null)
        //     {
        //         $_SESSION["t_id"]=$t_id;
        //         $_SESSION["u_name"]=$u_name;
        //         $_SESSION["u_desig"]=$designation;
        //     }   
        //     if($u_type == 1)
        //         header("location:admin-dashboard.php");
        //     if($u_type == 0)
        //         header("location:teacher-dashboard.php");

        // }

    }
}