<?php
include("database_connect.php");
$course_id=$_POST['c_id'];
$sem_id=$_POST['s_id'];
$sub_id=$_POST['sub_id'];
$opr=$_POST['opr'];
$e_id=$_POST['eid'];
$counter=0;
$qry="select * from question where course_id=$course_id and sem_id=$sem_id and sub_id=$sub_id" ;
$rsquestions=mysqli_query($con,$qry);
$cnt=1;
$str=",";

echo '<table class="table datatable">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Quation</th>
    <th scope="col">ADD</th>
  </tr>
</thead>
<tbody >';
if(mysqli_num_rows($rsquestions)>0)
{
  if($opr==0)
  {
    while($row=mysqli_fetch_row($rsquestions))
    {
           echo "<tr>";
           echo "<td>$cnt</td>";
           echo "<td>";
           echo "<table>";
           echo "<tr >";
           echo "<td colspan=4>$row[4]</td>";
           echo "</tr>";
           echo "<tr >";
           echo "<td><b>A:</B> $row[5]</td>";
           echo "<td><b>B:</B> $row[6]</td>";
           echo "<td><b>C:</B> $row[7]</td>";
           echo "<td><b>D:</B> $row[8]</td>";
           echo "</tr>";
           echo "</table>";
           echo "</td>";
           echo "<td><div class='btn btn-warning'id='".$row[0]."' onclick=getquestionids(this,'".$row[0]."')>Insert</div></td>";
           echo "</tr>";
           $cnt=$cnt+1;
           $str=$str.$row[0].",";     
    }
    echo "<td colspan='5'><center><input type='submit' class='btn btn-primary' name='btn_submit' id='btn_submit' value='Save'/></center></td></tr>";
  } 
  else
  {
    $qry = "select * from exam where e_id=".$e_id;
    $rsquestionids=mysqli_query($con,$qry);
    $erow=mysqli_fetch_row($rsquestionids);
    $counter=$erow[6];
    $qids=',' . $erow[7] .',';
    //  echo $qids;
   
    while($row=mysqli_fetch_row($rsquestions))
    {
           echo "<tr>";
           echo "<td>$cnt</td>";
           echo "<td>";
           echo "<table>";
           echo "<tr >";
           echo "<td colspan=4>$row[4]</td>";
           echo "</tr>";
           echo "<tr >";
           echo "<td><b>A:</B> $row[5]</td>";
           echo "<td><b>B:</B> $row[6]</td>";
           echo "<td><b>C:</B> $row[7]</td>";
           echo "<td><b>D:</B> $row[8]</td>";
           echo "</tr>";
           echo "</table>";
           echo "</td>";
           echo "<td>";
           $ele=','.$row[0].',';
           if(str_contains($qids,$ele)==FALSE)
           {  
              echo "<div class='btn btn-warning'id='".$row[0]."' onclick=getquestionids(this,'".$row[0]."')>Insert</div>";
              $str=$str.$row[0].",";  
          }
           else
           {
            echo "<div class='btn btn-success'id='".$row[0]."' onclick=getquestionids(this,'".$row[0]."')>Remove</div>";
           }
           
           echo "</td>";
           echo "</tr>";
           $cnt=$cnt+1;
           //$str=$str.$row[0].",";     
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
echo "<input type='hidden' id='txt_que_ids' name='txt_que_ids' value=$str> ";
echo "<input type='hidden' id='cnt' name='cnt' value=$counter> ";
?>