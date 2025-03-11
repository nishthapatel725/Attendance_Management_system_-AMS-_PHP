<?php
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
include("database_connect.php");
$selectqry2="select * from subject where course_id=$course_id and sem_id=$sem_id order by sub_code"; 
$rssubjects=mysqli_query($con,$selectqry2);
if(isset($_GET["edit"]))
{
  $sub_id=$_GET["edit"];
  $sqlattd = "SELECT l.lec_date,l.lec_no,a.p_flag from lec_info l  inner join stud_attend a on l.lec_id = a.lec_id where l.sub_id=$sub_id and a.s_id=$s_id";
  $rsattandance=mysqli_query($con,$sqlattd);
}
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
        <span class="d-none d-lg-block">Academic Activity</span>
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

<!-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>

        </li>
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>


        </li> -->
      

        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <i class="ri-account-box-line"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?PHP if(isset($_SESSION["s_name"])) echo $_SESSION["s_name"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?PHP if(isset($_SESSION["r_no"])) echo " Roll-no ". $_SESSION["r_no"] ; ?></h6>
              
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
              <a class="dropdown-item d-flex align-items-center" href="studentprofile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="student-signout.php">
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
        <a class="nav-link collapsed" href="student-dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="attandance-information.php">
          <i class="bi bi-file-earmark"></i><span>Attandance Information</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="submit-assignment.php">
          <i class="ri-book-open-fill"></i><span>Submit Assignment</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="mcq-exam.php">
          <i class="ri-edit-circle-fill"></i><span>MCQ-Exam</span>
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
      <h1>Attendance-information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Student</a></li>
          <li class="breadcrumb-item">Attendance-information</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
      <div class="card">
          <div class="card-body">
          <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="<?php if(isset($sub_id)) echo 'nav-link'; else echo 'nav-link active'?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Attendace</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="<?php if(isset($sub_id)) echo 'nav-link active'; else echo 'nav-link'?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Subjectwise-Details</button>
              </li>
             
            </ul>
            <div class="tab-content pt-2" id="borderedTabContent">
              <div class="<?php if(isset($sub_id)) echo 'tab-pane fade'; else echo 'tab-pane fade show active'?>" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Total</th> 
                    <th scope="col">Present</th> 
                    <th scope="col">Absent</th>
                    <th scope="col">View</th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                   if(!$rssubjects)
                   {
                      echo "<tr><td colspan='5'> no New assigment found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rssubjects))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[3]."</td>";
                          echo "<td>".$row[4]."</td>";
                          echo "<td>";
                          $sellec="select count(*) from lec_info where course_id=$course_id and sem_id=$sem_id and sub_id=$row[0]"; 
                          $rsnolec=mysqli_query($con,$sellec); 
                          $erow=mysqli_fetch_row($rsnolec);
                          $lec_count=$erow[0];
                          echo $lec_count;
                          echo "</td>";
                          echo "<td>";
                          $rselattdp="select count(*) from stud_attend where s_id=$s_id and p_flag='P' and lec_id in (select lec_id from lec_info where course_id=$course_id and sem_id=$sem_id and sub_id=$row[0])"; 
                          //die(0);
                          $rsnop=mysqli_query($con,$rselattdp); 
                          $erow=mysqli_fetch_row($rsnop);
                          $lec_p=$erow[0];
                          echo $lec_p;
                          echo "</td>";
                          echo "<td>";
                          $ab=$lec_count-$lec_p;
                          echo $ab;
                          echo "</td>";
                          echo "<td><a class='btn btn-primary' href='attandance-information.php?edit=".$row[0]."'><i class='bi-eye-fill'></i></a></td>";
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                </tbody>
              </table> 
              <!-- End Table with stripped rows -->
                </div>
              <div class="<?php if(isset($sub_id)) echo 'tab-pane fade show active'; else echo 'tab-pane fade'?>" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Lecture-no</th>
                    <th scope="col">Status</th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                   if(!$rsattandance)
                   {
                      echo "<tr><td colspan='5'> no Data found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rsattandance))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[0]."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td>".$row[2]."</td>";
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                </tbody>
              </table> 
              </div>
              
            </div><!-- End Bordered Tabs -->
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