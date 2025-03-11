<?php
include("database_connect.php");
$course_id=$_POST['c_id'];
$sem_id=$_POST['s_id'];

$qry="select s_id,s_fname,s_mname,s_lname from student where course_id=$course_id and sem_id=$sem_id and approval_status=1 order by s_lname,s_fname,s_mname" ;
$rsstundets=mysqli_query($con,$qry);

$cnt=1;
echo '<table class="table datatable">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Roll. No.</th>
    <th scope="col">Last Name</th>
    <th scope="col">First Name</th>
    <th scope="col">Middle Name</th>
  </tr>
</thead>
<tbody >';
if(mysqli_num_rows($rsstundets)>0)
{
  while($row=mysqli_fetch_row($rsstundets))
  {
           echo "<tr>";
           echo "<td>$cnt</td>";
           echo "<td><input type='text' name=$row[0] value=$cnt /></td>";
           echo "<td>$row[3]</td>";
           echo "<td>$row[1] </td>";
           echo "<td>$row[2] </td>";
           echo "</tr>";
           $cnt=$cnt+1;
           echo "<tr>";
           
  }
  echo "<td colspan='5'><center><input type='submit' class='btn btn-primary' name='btn_submit' id='btn_submit' value='Save'/></center></td></tr>";
}
else
{
  echo "<tr>";
           echo "<td colspan='5'>No Records Found</td></tr>";
}

  echo '</tbody>
</table>';
?>