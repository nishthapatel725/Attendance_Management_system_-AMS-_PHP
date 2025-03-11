<?php
include("database_connect.php");
session_start();
if(!isset($_SESSION["t_id"]))
{
  header("location:login.php");
}
else
{
    $t_id=$_SESSION["t_id"];
}
if(isset($_POST["btn_submit"]))
{
    if($_POST["btn_submit"]=="Update")
    {
        $e_id=$_POST['e_id'];
        echo $qry="delete  from exam where e_id=".$e_id;
		$res2=mysqli_query($con,$qry);
    }
    //if($_POST["btn_submit"]=="Save")
    {
        $course_id=$_POST["cmb_course"];
        $sem_id=$_POST["cmb_sem"];
        $sub_id=$_POST["cmb_sub"];
        $exam_date=$_POST["txt_date"];
        $exam_title=$_POST["txt_examtitle"];
        $no_q=$_POST["txt_qno"];
        $que_ids=$_POST["txt_que_ids"];

        echo "que_ids =".$que_ids ;
        $que_ids=substr($que_ids,1,strlen($que_ids)-2);
        $qry = "select que_id from question where que_id not in($que_ids)";
        $rsquestion=mysqli_query($con,$qry);
        $examquestion="";
        while($row=mysqli_fetch_row($rsquestion))
        {
                $examquestion=$examquestion . $row[0] .",";
        }
        echo "examquestion = ". $examquestion;
        $examquestion = substr($examquestion,0,strlen($examquestion)-1);
        echo " after examquestion = ". $examquestion;
        echo $qry="insert into exam(course_id,sem_id,sub_id,exam_date,exam_title,no_question,que_ids,t_id)values($course_id,$sem_id,$sub_id,'".$exam_date."','".$exam_title."',$no_q,'".$examquestion."',$t_id)";
        //die(0);
		$res=mysqli_query($con,$qry);
        if(!$res)
        {
            echo "problem in Insert";
        }
        else
        {
            header("location:exam.php");
        }
        
    }
}
if(isset($_GET['del']))
{
    $e_id=$_GET['del'];
    echo $qry="delete  from exam where e_id=".$e_id;
	$res=mysqli_query($con,$qry);
    if(!$res)
    {
        echo "problem in Delete";
    }
    else
    {
        header("location:exam.php");
    }
}
?>
