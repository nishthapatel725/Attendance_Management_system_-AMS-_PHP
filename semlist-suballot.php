<?php
session_start();
if(!isset($_SESSION["t_id"]))
{
  header("location:login.php");
}

include("database_connect.php");
$selectqry1="select course_id,course_name from course";
$rscoursecombo=mysqli_query($con,$selectqry1);
$selectqry2="select sem_id,sem_name from semester";
$rssemcombo=mysqli_query($con,$selectqry2);
if(isset($_POST["btn_submit"]))
{
    $course_id=$_POST["cmb_course"];
    $selectqry="select course_name from course where course_id=$course_id"; 
    $rscname=mysqli_query($con,$selectqry);
    $crow=mysqli_fetch_row($rscname);
    $course_name=$crow[0];

    $sem_id=$_POST["cmb_sem"];
    $selectqry="select sem_name from semester where sem_id=$sem_id"; 
    $rssname=mysqli_query($con,$selectqry);
    $srow=mysqli_fetch_row($rssname);
    $sem_name=$srow[0];


    $acadamic_year=$_POST["txt_ayear"];
    
    $selectqry="select a.course_id,a.sem_id,a.sub_id,a.t_id,s.sub_name,concat(t.fname ,' ' , t.mname,' ',t.lname) as name from
    sub_allot a inner join subject s on a.sub_id=s.sub_id
    inner join teacher t on a.t_id=t.t_id where a.academic_year='$acadamic_year' and a.course_id=".$course_id ." and a.sem_id=".$sem_id; 
    $rssuballot=mysqli_query($con,$selectqry);

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

<!--<style>
  .dropdown
  {
    width:33%;
    height:29px;
  }
</style>-->
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
      <h1>Semester Wise List Subject Allotment</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Report</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      <div class="card">
      <div class="card-header"></div>
            <div class="card-body">
            <form method="POST" action="#">
            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Course</label>
                  <div class="col-sm-3">
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
                  <div class="col-sm-3">
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
                  <label  class="col-sm-2 col-form-label" >Academic Year</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="txt_ayear" name="txt_ayear" value="<?php if(isset($acadamic_year)) echo $acadamic_year;?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-3">
                  <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Generate" />
                  
                </div>
                </div>
            </div>
                    </form>
            <div class="card-footer">
            <div id="dpdf">
                <?php
                
                if(isset($course_id))
                {
                    echo '<div class="card">
                            <div class="card-body">
                            <h5 class="card-title">';
                            echo "Couse : ";
                            if(isset($course_name)) echo $course_name;
                            echo "<br>";
                            echo "Semester : ";
                            if(isset($sem_name)) echo $sem_name;
                            echo "<br>";
                            echo "Acadamic Year : ";
                            if(isset($acadamic_year)) echo $acadamic_year;
                    echo '</h5>
                            <!-- Bordered Table -->
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Teacher</th>
                                </tr>
                                </thead>
                                <tbody>';
                                if(!$rssuballot)
                                {
                                    echo "<tr><td colspan='3'> no records found...</td></tr>";
                                }
                                else
                                {
                                    $cnt=1;
                                    while($row=mysqli_fetch_row($rssuballot))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$cnt."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "</tr>";
                                        $cnt=$cnt+1;
                                        
                                    }
                                }
                                echo ' </tbody>
                                </table>';
                
                            }
                            
                    ?>
                    
            </div>
            <!-- <div class="col-sm-3">
              <input type="button" class="btn btn-primary" name="btn_pdf" id="btn_pdf" value="Generate-pdf" onclick="downloadPdf()" />
                        </div> -->
              <!-- End Bordered Table -->
                        
              <script type="text/javascript">
                function downloadPdf()
                {
                    var doc = new jsPDF();
                    const element= document.getElementById("dpdf");
                    var options={
                                    format:'a4',
                                    orientation:'portrait'
                                };
                    doc.fromHTML(element,15,15,options,function(){doc.save('report.pdf');});
                }
                </script>
              <!-- End Primary Color Bordered Table -->

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
  <script src="assets/js/jspdf.umd.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>