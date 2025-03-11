<?php
include("database_connect.php");
$course_id=$_POST['c_id'];
$sem_id=$_POST['s_id'];
$opr=$_POST['opr'];
$lec_id=$_POST['l_id'];
$qry="select s_id,s_fname,s_mname,s_lname,roll_no from student where course_id=$course_id and sem_id=$sem_id and approval_status=1  order by roll_no asc" ;
$rsstundets=mysqli_query($con,$qry);

$cnt=1;
$str=",";
echo '<table class="table datatable">
<thead>
  <tr>
    <th scope="col">Roll.No.</th>
    <th scope="col">Last Name</th>
    <th scope="col">First Name</th>
    <th scope="col">Middle Name</th>
    <th scope="col">Status</th>
  </tr>
</thead>
<tbody >';
if(mysqli_num_rows($rsstundets)>0)
{
  if($opr==0)
  {
    while($row=mysqli_fetch_row($rsstundets))
    {
           echo "<tr>";
           echo "<td>$row[4]</td>";
           echo "<td>$row[3]</td>";
           echo "<td>$row[1]</td>";
           echo "<td>$row[2]</td>";
           echo "<td><div class='btn btn-primary'id='".$row[0]."' onclick=getabsentids(this,'".$row[0]."')>Present</div></td>";
           echo "</tr>";
           $cnt=$cnt+1;
           $str=$str.$row[0].",";
           
    }
    echo "<td colspan='5'><center><input type='submit' class='btn btn-primary' name='btn_submit' id='btn_submit' value='Save'/></center></td></tr>";
  }
  else
  {
    $qry = "select s_id from stud_attend where p_flag='A' and lec_id=".$lec_id;
    $rsabstundets=mysqli_query($con,$qry);
    $abno=',';
    if(mysqli_num_rows($rsabstundets)>0)
    {
      while($arow=mysqli_fetch_row($rsabstundets))
            $abno=$abno . $arow[0].",";
    }
    //echo $abno;
    while($row=mysqli_fetch_row($rsstundets))
    {
           echo "<tr>";
           echo "<td>$row[4]</td>";
           echo "<td>$row[3]</td>";
           echo "<td>$row[1]</td>";
           echo "<td>$row[2]</td>";
           $ele=','.$row[0].',';
           if(str_contains($abno,$ele)==FALSE)
           {   
              echo "<td><div class='btn btn-primary' id='".$row[0]."' onclick=getabsentids(this,'".$row[0]."')>Present</div></td>";
              $str=$str.$row[0].",";
            }
           else
           {
            echo "<td><div class='btn btn-danger' id='".$row[0]."' onclick=getabsentids(this,'".$row[0]."')>Absent</div></td>";
           }
              echo "</tr>";
           $cnt=$cnt+1;
     }
     echo "<td colspan='5'><center><input type='submit' class='btn btn-primary' name='btn_submit' id='btn_submit' value='Update'/></center></td></tr>";
  }
  
}
else
{
  echo "<tr>";
           echo "<td colspan='5'>No Records Found</td></tr>";
}
echo '</tbody>
</table>';
echo "<input type='hidden' id='txt_abno' name='txt_abno' value=$str> ";

?>