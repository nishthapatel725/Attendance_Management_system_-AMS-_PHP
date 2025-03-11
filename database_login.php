<?php
session_start();
include("database_connect.php");
if(isset($_POST["btn_login"]))
{
    $email=$_POST["username"];
    $password=$_POST["password"];
    
    if($_POST["btn_login"]=="login")
    {
        echo $selectqry="select * from teacher where email='$email' and password='$password'"; 
        $rsteacher=mysqli_query($con,$selectqry); 
        $row=mysqli_fetch_row($rsteacher);
        if($row==null)
        {
            header("location:login.php?s=1");
        }
        else
        {
            
            $t_id=$row[0];
            $u_type=$row[1];
            $u_name=$row[2] . " " . $row[3]. " " . $row[4];
            $des_id=$row[8];
            $qry="select des_name from designation where des_id=$des_id";
            $rsdesig=mysqli_query($con,$qry); 
            $row=mysqli_fetch_row($rsdesig);
            $designation=$row[0];
            if(isset($_SESSION["t_id"])==null)
            {
                $_SESSION["t_id"]=$t_id;
                $_SESSION["u_name"]=$u_name;
                $_SESSION["u_desig"]=$designation;
            }   
            if($u_type == 1)
                header("location:admin-dashboard.php");
            if($u_type == 0)
                // $t_id = $_SESSION["t_id"];
                header("location:teacher-dashboard.php");

        }

    }
}