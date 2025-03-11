<?php
include("database_connect.php");
$course_id=$_GET['course_id'];
$sem_id=$_GET['sem_id'];

echo $qry="select s_id,s_fname,s_mname,s_lname from student where course_id=$course_id and sem_id=$sem_id order by s_lname,s_fname,s_mname" ;
$rsstundets=mysqli_query($con,$qry);

$cnt=1;
while($row=mysqli_fetch_row($rsstundets))
{
           echo "<tr>";
           echo "<td><input type='text' name=$row[0] value=$cnt></td>";
           echo "<td>$row[3]</td>";
           echo "<td>$row[1] </td>";
           echo "<td>$row[2] </td>";
           echo "</tr>";
           $cnt=$cnt+1;
}

?>