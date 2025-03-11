<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    if($_POST["btn_submit"]=="Save Marks")
    {
        echo $assign_id=$_POST['assign_id'];
        echo $qry="select a.as_id,a.assign_id,a.sub_date,a.assignment_file,a.marks,s.s_id,concat(s.s_fname ,' ',s.s_mname,' ',s.s_lname) as name,s.roll_no from assignment_submission a inner join student s on a.s_id=s.s_id where a.assign_id=$assign_id";
        $rsmarks=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($rsmarks))
        {
            $marks=$_POST["txt-$row[0]"];
            $qry="update assignment_submission set marks=$marks where s_id=$row[5] and assign_id=$row[1]";
            $res=mysqli_query($con,$qry);
        }
        header("location:assignment-evalution.php");
    }
}
?>