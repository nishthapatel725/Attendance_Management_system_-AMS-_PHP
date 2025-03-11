<?php
include("database_connect.php");
if(isset($_POST["btn_submit"]))
{
    if($_POST["btn_submit"]=="Update")
    {
        $lec_id=$_POST['lec_id'];
        
        echo $qry="delete from stud_attend where lec_id=".$lec_id;
		$res=mysqli_query($con,$qry);

        echo $qry="delete  from lec_info where lec_id=".$lec_id;
		$res2=mysqli_query($con,$qry);
    }
    $lec_date=$_POST["txt_date"];
    $course_id=$_POST["cmb_course"];
    $sem_id=$_POST["cmb_sem"];
    $lec_no=$_POST["txt_lecno"];
    $proxy_status=$_POST["rbtn_ps"];
    $sub_id=$_POST["cmb_sub"];
    $t_id=$_POST["cmb_tea"];
    $lect_topic=$_POST["txt_lectop"];
    $lect_method=$_POST["txt_lecmeth"];
    $pno = $_POST["txt_abno"];
    //if($_POST["btn_submit"]=="Save")
    {
        echo $qry="insert into lec_info(lec_date,course_id,sem_id,lec_no,proxy_status,sub_id,t_id,lect_topic,lect_method)values('".$lec_date."',".$course_id.",".$sem_id.",".$lec_no.",'".$proxy_status."',".$sub_id.",".$t_id.",'".$lect_topic."','".$lect_method."')";
		$res=mysqli_query($con,$qry);
        
        $qry2="select max(lec_id) from lec_info";
        $rslec=mysqli_query($con,$qry2); 
        if(!$res)
		{
			echo "problem in insert";
		}
        else
        {
            $row=mysqli_fetch_row($rslec);
            echo $lec_id=$row[0];
            if($lec_id>0)
		    {
            $qry = "select s_id from student where approval_status=1 and course_id=".$course_id." and sem_id=".$sem_id ;
            $rsstudents=mysqli_query($con,$qry);
            while($row=mysqli_fetch_row($rsstudents))
            {
                echo $sql="insert into stud_attend(lec_id,s_id,p_flag)values($lec_id,$row[0],'P')";
                $rsattn=mysqli_query($con,$sql); 
            }
            $pno=substr($pno,1,-1);
            echo $sql="update stud_attend set p_flag='A' where s_id not in($pno) and lec_id=".$lec_id;
			$rsattn=mysqli_query($con,$sql);
            header("location:lecture-information.php");
		    }
        }
    }
}

?>
