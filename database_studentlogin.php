<?php
session_start();
include("database_connect.php");
if(isset($_POST["btn_login"]))
{
    $email=$_POST["username"];
    $password=$_POST["password"];
    
    if($_POST["btn_login"]=="login")
    {
        echo $selectqry="select * from student where email='$email' and password='$password'"; 
        $rsstudent=mysqli_query($con,$selectqry); 
        $row=mysqli_fetch_row($rsstudent);
        if($row==null)
        {
            header("location:student_login.php?s=1");
        }
        else
        {
            
            $s_id=$row[0];
            $s_en_no=$row[8];
            $s_name=$row[1] . " " . $row[2]. " " . $row[3];
            $course_id=$row[16];
            $sem_id=$row[17];
            $r_no=$row[14];
            if(isset($_SESSION["t_id"])==null)
            {
                $_SESSION["s_id"]=$s_id;
                $_SESSION["s_name"]=$s_name;
                $_SESSION["course_id"]=$course_id;
                $_SESSION["sem_id"]=$sem_id;
                $_SESSION["r_no"]=$r_no;
            }   
            header("location:student-dashboard.php");
        }

    }
}