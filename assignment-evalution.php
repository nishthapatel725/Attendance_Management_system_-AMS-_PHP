<?php
session_start();
if(!isset($_SESSION["t_id"]))
{
  header("location:login.php");
}
else
{
    $t_id=$_SESSION["t_id"];
}
if(isset($_GET["c_id"]))
{
  $course_id=$_GET["c_id"];
  $sub_id=$_GET["sub_id"];
  $sem_id=$_GET["s_id"];
}
include("database_connect.php");
$selectqry="select a.assign_id,a.course_id,c.course_name,
a.sem_id,s.sem_name,a.sub_id,sb.sub_name,a.assign_date,
a.submi_date,a.assign_topic,
a.t_id,concat(tea.fname ,' ' , tea.mname,' ',tea.lname) as name
from assign a inner join course c
on a.course_id=c.course_id
inner join semester s
on a.sem_id=s.sem_id
inner join subject sb
on a.sub_id=sb.sub_id
inner join teacher tea
on a.t_id=tea.t_id where a.t_id=$t_id order by a.assign_date desc"; 
$rsassign=mysqli_query($con,$selectqry); //record set

$selectqry1="select course_id,course_name from course";
$rscoursecombo=mysqli_query($con,$selectqry1);

$selectqry2="select sem_id,sem_name from semester";
$rssemcombo=mysqli_query($con,$selectqry2);

$selectqry3="select sub_id,sub_name from subject";
$rssubcombo=mysqli_query($con,$selectqry3);

$selectqry4="select t_id,concat(fname ,' ' , mname,' ',lname) as name from teacher";
$rsteacombo=mysqli_query($con,$selectqry4);
if(isset($_GET["medit"]))
{
    $massign_id=$_GET["medit"];
    //$massign_id=$massign_id;
    $sqry="select * from assign where assign_id=".$massign_id;
    $rsedit=mysqli_query($con,$sqry);
    $erow=mysqli_fetch_row($rsedit);
    
    $course_id=$erow[1];
    $sem_id=$erow[2];
    $sub_id=$erow[3];
    $assign_date=$erow[4];
    $submi_date=$erow[5];
    $assign_topic=$erow[6];
    $t_id=$erow[7];

    $qry="select a.as_id,a.sub_date,a.assignment_file,a.marks,concat(s.s_fname ,' ',s.s_mname,' ',s.s_lname) as name,s.roll_no from assignment_submission a inner join student s on a.s_id=s.s_id where a.assign_id=$massign_id";
    $rsmarks=mysqli_query($con,$qry);

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Academic Activity Tracking System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo/logoaaa.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="img/logo/logoaaa.png" alt="">
        <span class="d-none d-lg-block">AMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <i class="ri-account-box-line"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?PHP if(isset($_SESSION["u_name"])) echo $_SESSION["u_name"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?PHP if(isset($_SESSION["u_desig"])) echo $_SESSION["u_desig"]; ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="changepwd.php">
                <i class="bi bi-gear"></i>
                <span>Change Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="signout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="teacher-dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="lecture-information.php">
          <i class="bi bi-file-earmark"></i><span>Lecture Information</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="assignment.php">
          <i class="ri-book-open-fill"></i><span>Manage Assignment</span>
        </a>  
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="assignment-evalution.php">
          <i class="ri-book-open-fill"></i><span>Evaluate Assignment</span>
        </a>  
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="que_bank.php">
          <i class="ri-edit-2-fill"></i><span>Manage Question</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="exam.php">
          <i class="ri-draft-line"></i><span>Manage Exam</span>
        </a>  
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="Reports.php">
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="coursewise-subreport.php">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="semlist-suballot.php">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li> -->
         </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Assignment</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Teacher</a></li>
          <li class="breadcrumb-item">Assignment Evalution</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="database_assignment-evalution.php">
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($massign_id)) echo 'nav-link'; else echo 'nav-link active'?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Assignment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($massign_id)) echo 'nav-link active'; else echo 'nav-link'?>" id="attandance-tab" data-bs-toggle="tab" data-bs-target="#bordered-attandance" type="button" role="tab" aria-controls="attandance" aria-selected="false">Assignment Marks</button>
                    </li>
                </ul>
              <div class="tab-content pt-3" id="borderedTabContent">
              <div class="<?php if(isset($massign_id)) echo 'tab-pane fade'; else echo 'tab-pane fade show active'?>" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Assignment Date</th>
                    <th scope="col">Submission Date</th>
                   
                    <th scope="col">Marks</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                   if(!$rsassign)
                   {
                      echo "<tr><td colspan='10'> no records found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rsassign))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[2]."</td>";
                          echo "<td>".$row[4]."</td>";
                          echo "<td>".$row[6]."</td>";
                          echo "<td>".$row[7]."</td>";
                          echo "<td>".$row[8]."</td>";
                          // echo "<td>".$row[9]."</td>";
                          // echo "<td>".$row[11]."</td>";
                         
                      echo "<td><a class='btn btn-primary' href='assignment-evalution.php?medit=".$row[0]."'><i class='bi-check-lg'></i></a></td>";
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                  
                </tbody>
              </table>  
              </div>

                <div class="<?php if(isset($massign_id)) echo 'tab-pane fade show active'; else echo 'tab-pane fade'?>" id="bordered-attandance" role="tabpanel" aria-labelledby="attandance-tab">
                <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Rollno</th>
                    <th scope="col">Students Name</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">Assigment</th>
                    <th scope="col">Marks</th>
                    <!--<th scope="col">Insert</th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php
                   if(!$rsmarks)
                   {
                      echo "<tr><td colspan='10'> no records found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rsmarks))
                      {
                          echo "<tr>";
                          echo "<td>".$row[5]."</td>";
                          echo "<td>".$row[4]."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td>";
                          echo '<a onClick="openTab(this)" href="#" name="uploads/'.$row[2].'">view</a>';
                          echo "</td>";
                          echo "<td><input type='text' name='txt-$row[0]' value='".$row[3]."'></td>";
                          //echo "<td><input type='submit' class='btn btn-primary' name='btn_mark-$row[0]' id='btn_mark' value='add'></td>";
                          

                          echo "</tr>";
                         
                          
                      }
                   }
                  ?>
                  
                </tbody>
              </table>  

              <div class="row ">
                <center>
                   <div class="col-sm-3">
                    <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Save Marks" />
                  </div>
                  </center>
                </div>
                </div> 
          </div>
      <input type='hidden' id='assign_id' name='assign_id' value='<?PHP if(isset($massign_id)) echo $massign_id?>'>
            </form>
        </div>
        </div>
       </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
            function openTab(th)
            {
                window.open(th.name,'_blank');
            }
        </script>
</body>

</html>