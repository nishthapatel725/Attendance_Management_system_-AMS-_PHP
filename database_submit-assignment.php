<?php
session_start();
if(!isset($_SESSION["s_id"]))
{
  header("location:student_login.php");
}
else
{
  $s_id=$_SESSION["s_id"];
}
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    $assign_id=$_POST["editid"];
    
    if (isset($_FILES['pdf_file']['name']))
    {
        echo $file_name = $assign_id."-".$s_id.".pdf";
        echo $file_tmp = $_FILES['pdf_file']['tmp_name'];
        
        move_uploaded_file($file_tmp,"./uploads/".$file_name);
        echo $qry="insert into assignment_submission(assign_id,s_id,sub_date,assignment_file)values(".$assign_id.",".$s_id.",CURRENT_DATE(),'".$file_name."')";
		$res=mysqli_query($con,$qry);
        if(!$res)
		{
			echo "problem in insert";
		}
		else
		{
			header("location:submit-assignment.php");
		}
    }
    else
    {
        ?>
        <div class=
        "alert alert-danger alert-dismissible 
        fade show text-center">
          <a class="close" data-dismiss="alert"
             aria-label="close">×</a>
          <strong>Failed!</strong> 
              File must be uploaded in PDF format!
        </div>
      <?php
    }
}
?>