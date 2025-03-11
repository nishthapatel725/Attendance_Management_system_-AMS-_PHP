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
$selectqry1="select a.assign_id,a.assign_date,a.submi_date,s.sub_name,t.fname,t.lname from assign a 
inner join subject s on a.sub_id = s.sub_id 
inner join teacher t on a.t_id=t.t_id where a.course_id=$course_id and a.sem_id=$sem_id and a.assign_id not in(select assign_id from assignment_submission where s_id=$s_id)";
//die(0);
$rsassignment=mysqli_query($con,$selectqry1); 
if(isset($_GET["edit"]))
{
    $assign_id=$_GET["edit"];
    $sqry="select * from assign where assign_id=".$assign_id;
    $rsedit=mysqli_query($con,$sqry);
    $erow=mysqli_fetch_row($rsedit);
    $assign_date=$erow[4];
    $submi_date=$erow[5];
    $assign_topic=$erow[6];
    //$course_name=$erow[1];
    //$course_type=$erow[2];
    //$course_sem=$erow[3];
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
      <form class="search-form d-flex align-items-center" method="POST" action="#" >
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

            <li>
              <a class="dropdown-item d-flex align-items-center" href="studentprofile.php">
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
      <h1>Submit-Assignment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Student</a></li>
          <li class="breadcrumb-item">Submit-Assignment</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
      <div class="card">
          <div class="card-body">
         <!-- Bordered Tabs -->
         <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="<?php if(isset($assign_id)) echo 'nav-link'; else echo 'nav-link active'?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Assigments</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="<?php if(isset($assign_id)) echo 'nav-link active'; else echo 'nav-link'?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Submit Assignment</button>
              </li>
             
            </ul>
            <div class="tab-content pt-2" id="borderedTabContent">
              <div class="<?php if(isset($assign_id)) echo 'tab-pane fade'; else echo 'tab-pane fade show active'?>" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                
                 <!-- Table with stripped rows -->
                 <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Assignment Date</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">Subject Name</th> 
                    <th scope="col">Faculty Name</th> 
                    <th scope="col">Submit</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   if(!$rsassignment)
                   {
                      echo "<tr><td colspan='6'> no New assigment found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rsassignment))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td>".$row[2]."</td>";
                          echo "<td>".$row[3]."</td>";
                          echo "<td>".$row[4]." ".$row[5] ."</td>";
                          echo "<td><a class='btn btn-primary' href='submit-assignment.php?edit=".$row[0]."'><i class='bi-check-circle'></i></a></td>";
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                </tbody>
              </table> 
              <!-- End Table with stripped rows -->
                </div>
              <div class="<?php if(isset($assign_id)) echo 'tab-pane fade show active'; else echo 'tab-pane fade'?>" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
              <form method="POST" action="database_submit-assignment.php" enctype="multipart/form-data">
                <div class="row mb-4">
                  <label class="col-sm-3 col-form-label">Assignment Date</label>
                  <div class="col-sm-4">
                    <input type="date"  class="form-control" id="txt_adate" name="txt_adate" value="<?php if(isset($assign_date)) echo $assign_date; else echo date("d-m-Y")?>" disabled>
                  </div>
                </div>
                <div class="row mb-4">
                  <label class="col-sm-3 col-form-label">Submission Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="txt_sdate" name="txt_sdate" value="<?php if(isset($submi_date)) echo $submi_date; else echo date("d-m-Y")?>" disabled>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Assignment Topic</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="txt_assigntop" name="txt_assigntop" style="height: 250px; width: 100%;" disabled><?php if(isset($assign_topic)) echo $assign_topic;?></textarea>
                  </div>
                </div>
                  
                <div class="row mb-4">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Upload File</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="file" name="pdf_file" id="pdf_file" required>
                  </div>
                </div>

                <div class="row mb-4">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-3">
                  <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
                  <input type="hidden" name="editid" value="<?php if(isset($assign_id))echo $assign_id;?>">
                </div>
                </div>
              
                
                </form>
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