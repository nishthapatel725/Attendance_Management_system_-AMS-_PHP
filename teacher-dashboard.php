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
include("database_connect.php");

$qry="select a.sa_id,a.course_id,a.sem_id,a.sub_id,s.sub_name,sm.sem_name from sub_allot a inner join subject s on a.sub_id=s.sub_id inner join semester sm on a.sem_id=sm.sem_id where a.t_id=".$t_id; 

$rsallotsubject=mysqli_query($con,$qry); 


/*$selectqry="select count(*) from course"; 
$rscourse=mysqli_query($con,$selectqry); 
$row=mysqli_fetch_row($rscourse);
$course_count=$row[0];

$selectqry1="select count(*) from semester"; 
$rssem=mysqli_query($con,$selectqry1); 
$row=mysqli_fetch_row($rssem);
$sem_count=$row[0];

$selectqry2="select count(*) from teacher"; 
$rsteacher=mysqli_query($con,$selectqry2); 
$row=mysqli_fetch_row($rsteacher);
$tea_count=$row[0];*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Academic Activity Tracking System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="img/logo/logoaaa.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
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
          <i class="ri-checkbox-line"></i><span>Evaluate Assignment</span>
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

         </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashbord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Teacher</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
      <div class="card">
          <div class="card-body">
          <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Insert</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(!$rsallotsubject)
                  {
                     echo "<tr><td colspan='5'> no records found...</td></tr>";
                  }
                  else
                  {
                    $cnt=1;
                      while($row=mysqli_fetch_row($rsallotsubject))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[5]."</td>";
                          echo "<td>".$row[4]."</td>";
                          echo "<td><a class='btn btn-primary' href='lecture-information.php?c_id=".$row[1]."&s_id=".$row[2]."&sub_id=".$row[3]."'><i class='ri-edit-fill'></i></a></td>";
                          echo "</tr>";
                          $cnt=$cnt+1;
                      }
                  }
                  ?>
                  </tbody>
              </table> 
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
  <script src="assets/js/main.js"></script>

</body>

</html>