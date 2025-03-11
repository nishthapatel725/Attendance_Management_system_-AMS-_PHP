<?php
include("database_connect.php");
session_start();
if(!isset($_SESSION["s_id"]))
{
  header("location:student_login.php");
}
else
{
  $s_id=$_SESSION["s_id"];
  $course_id=$_SESSION["course_id"];
  $sem_id=$_SESSION["sem_id"];
  $r_no=$_SESSION["r_no"];
}
if(isset($_SESSION['mcq']))
{
    $eid=$_SESSION['examid'];
    $questions = $_SESSION['mcq'];
  
    //print_r($questions);
    //echo $_SESSION['cnt'];
    if(isset($_POST['btn_submit']))
    {
      if($_POST['btn_submit']=='Next')
      {
          echo $ans = $_POST["opt"];
          echo $cnt=$_SESSION['cnt'];
          //die(0);
          $questions[$cnt]['cans']=$ans;
          $_SESSION['mcq']=$questions;
          header("location:mcq-examination.php");
      }
      if($_POST['btn_submit']=='Finish')
      {
        //print_r($questions);
        $no=$_SESSION['noq'];
        $score=0;
        $ansopt="";
        for($i=0;$i<$no;$i++)
        {
            $uans=$questions[$i][$questions[$i]['cans']];
            $ansopt=$ansopt .','.$questions[$i]['cans'];
            if($questions[$i]['ans']==$uans)
              $score++;
        }
        echo "score = ". $score;
        echo $qry="insert into exam_submission(e_id,s_id,ans_opt,point)values($eid,$s_id,'$ansopt',$score)";
        $res=mysqli_query($con,$qry);
        if(!$res)
        {
          echo "problem in insert";
        }
        else
        {
          header("location:student_login.php");
        }
        //header("location:student_login.php");
      }
      else
      header("location:mcq-examination.php");
  }
    
}
?>