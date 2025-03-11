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

// $lec_id=0;
if(isset($_GET["edit"]))
{
    $assign_id=$_GET["edit"];
    $assign_id=$assign_id;
    $sqry="select * from assign where assign_id=".$assign_id;
    $rsedit=mysqli_query($con,$sqry);
    $erow=mysqli_fetch_row($rsedit);
    
    $course_id=$erow[1];
    $sem_id=$erow[2];
    $sub_id=$erow[3];
    $assign_date=$erow[4];
    $submi_date=$erow[5];
    $assign_topic=$erow[6];
    $t_id=$erow[7];
    
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
          <li class="breadcrumb-item">Assignment</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="database_assign.php">
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($assign_id)) echo 'nav-link'; else echo 'nav-link active'?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Assignment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($assign_id)) echo 'nav-link active'; else echo 'nav-link'?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">New</button>
                    </li>
                    
                </ul>
              <div class="tab-content pt-3" id="borderedTabContent">
              <div class="<?php if(isset($assign_id)) echo 'tab-pane fade'; else echo 'tab-pane fade show active'?>" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Assignment Date</th>
                    <th scope="col">Submission Date</th>
                    <!--<th scope="col">Assignment Topic</th>-->
                    <!-- <th scope="col">Teacher</th> -->
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    
                   
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
                          echo "<td><a class='btn btn-primary' href='assignment.php?edit=".$row[0]."'><i class='ri-edit-fill'></i></a></td>";
                          echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#smallModal$row[0]'>
                          <i class='ri-delete-bin-fill'></i>
                        </button></td>";
                        echo "<div class='modal fade' id='smallModal$row[0]' tabindex='-1'>
                        <div class='modal-dialog modal-sm'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title'>Delete Record</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                              Are You Sure to Delete?
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                              <a class='btn btn-secondary' href='database_assign.php?del=".$row[0]."'>Yes</a>
                            </div>
                          </div>
                        </div>
                      </div>";
                   
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                  
                </tbody>
              </table>  
              </div>

              <div class="<?php if(isset($assign_id)) echo 'tab-pane fade show active'; else echo 'tab-pane fade'?>" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
               
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Course</label>
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" name="cmb_course" id="cmb_course">
                      <option value='0'>Select Course</option>
                      <?php
                      while($row=mysqli_fetch_row($rscoursecombo))
                      {
                          if(isset($course_id))
                          {
                             if($course_id==$row[0])
                              echo "<option value='$row[0]' selected>$row[1]</option>";
                             else
                              echo "<option value='$row[0]'>$row[1]</option>";
                          }
                          else
                            echo "<option value='$row[0]'>$row[1]</option>";
                      }
                      ?> 
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Semester</label>
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" name="cmb_sem" id="cmb_sem">
                      <option value='0'>Select Semester</option>
                      <?php
                      while($row=mysqli_fetch_row($rssemcombo))
                      {
                        if(isset($sem_id))
                          {
                             if($sem_id==$row[0])
                              echo "<option value='$row[0]' selected>$row[1]</option>";
                             else
                              echo "<option value='$row[0]'>$row[1]</option>";
                          }
                          else
                            echo "<option value='$row[0]'>$row[1]</option>";  
                      }
                      ?>                     
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Subject</label>
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" name="cmb_sub" id="cmb_sub">
                      <option value='0'>Select Subject</option>
                      <?php
                      while($row=mysqli_fetch_row($rssubcombo))
                      {
                        if(isset($sub_id))
                          {
                             if($sub_id==$row[0])
                              echo "<option value='$row[0]' selected>$row[1]</option>";
                             else
                              echo "<option value='$row[0]'>$row[1]</option>";
                          }
                          else
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                      ?> 
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Assignment Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="txt_adate" name="txt_adate" value="<?php if(isset($assign_date)) echo $assign_date; else echo date("d-m-Y")?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submission Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="txt_sdate" name="txt_sdate" value="<?php if(isset($submi_date)) echo $submi_date; else echo date("d-m-Y")?>" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Assignment Topic</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="txt_assigntop" name="txt_assigntop"  style="height: 150px; width: 70%;" required><?php if(isset($assign_topic)) echo $assign_topic;?></textarea>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Teacher</label>
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" name="cmb_tea" id="cmb_tea">
                      <option value='0'>Select Teacher</option>
                      <?php
                      while($row=mysqli_fetch_row($rsteacombo))
                      {
                        if(isset($t_id))
                          {
                             if($t_id==$row[0])
                              echo "<option value='$row[0]' selected>$row[1]</option>";
                             else
                              echo "<option value='$row[0]'>$row[1]</option>";
                          }
                          else
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-3">
                    
                    <!-- <input type="button"  class="btn btn-primary"  value="" onclick="fillstudents(this);" /> -->
                    <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="<?php if(isset($assign_id)) echo 'update'; else echo 'Add' ?>" />
                  <input type="hidden" name="editid" value="<?php if(isset($assign_id))echo $assign_id;?>">
                  </div>
                </div>
            
              </div>

             
      <!-- <input type='hidden' id='assign_id' name='assign_id' value=' '> -->
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

</body>

</html>