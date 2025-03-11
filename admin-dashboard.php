<?php
session_start();
if(!isset($_SESSION["t_id"]))
{
  header("location:login.php");
}

include("database_connect.php");
$selectqry="select count(*) from course"; 
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
$tea_count=$row[0];

$selectqry3="select count(*) from student where approval_status=0"; 
$rsstudent=mysqli_query($con,$selectqry3); 
$row=mysqli_fetch_row($rsstudent);
$student_count=$row[0];

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

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
  

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

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="changepwd.php">
                <i class="bi bi-gear"></i>
                <span>Change Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            
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
        <a class="nav-link collapsed" href="admin-dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="course.php">
          <i class="bi bi-menu-button-wide"></i><span>Course</span>
        </a>  
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="semester.php">
          <i class="bi bi-journal-text"></i><span>Semester</span>
        </a>  
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="subjects.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Subjects</span>
        </a>  
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="teacher.php">
          <i class="bi bi-person"></i><span>Teachers</span>
        </a>  
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="allocate-subject.php">
          <i class="bi bi-file-earmark"></i><span>Allocate Subject</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="Generate-rollno.php">
          <i class="bi bi-list-ol"></i><span>Generate Roll. No.</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="student_promot.php">
          <i class="bi bi-box-arrow-right"></i><span>Student Promoted</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="Reports.php">
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="coursewise-subreport.php">
              <i class="bi bi-circle"></i><span>Course Wise Subject Reports</span>
            </a>
          </li>
          <li>
            <a href="semlist-suballot.php">
              <i class="bi bi-circle"></i><span>Semester Wise List Subject Allotment</span>
            </a>
          </li>
          <li>
          <a href="semwise-studentdetail.php">
              <i class="bi bi-circle"></i><span>Course and Semester Wise Students</span>
            </a>
          </li>
        </ul>
      </li>

         </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashbord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- course -->
        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><a href="course.php">Course</a></h5>
                  <div class="d-flex align-items-center">
                    <div class="icon rounded-circle justify-content-center">
                      <i class="bi bi-menu-button-wide"></i>
                    </div>
                    <div class="ps-3">
                      <h2><?PHP echo $course_count; ?></h2>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End course -->

            <!-- Semester -->
        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><a href="semester.php">Semester</a></h5>
                  <div class="d-flex align-items-center">
                    <div class="icon rounded-circle justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h2><?PHP echo $sem_count; ?></h2>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Semester -->

              <!-- Teacher -->
        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><a href="teacher.php">Teacher</a></h5>
                  <div class="d-flex align-items-center">
                    <div class="icon rounded-circle justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h2><?PHP echo $tea_count; ?></h2>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Teacher -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"><a href="students-approval.php">New Students</a></h5>
                  <div class="d-flex align-items-center">
                    <div class="icon rounded-circle justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                    
                      <h2><?PHP echo $student_count; ?></h2>
                    </div>
                  </div>
                </div>

              </div>
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

</body>

</html>