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
$selectqry="select l.lec_id,l.lec_date,l.sub_id,s.sub_name from lec_info l inner join subject s on l.sub_id=s.sub_id where l.t_id=".$t_id." order by lec_date desc;"; 
$rslecture=mysqli_query($con,$selectqry); //record set

$selectqry1="select course_id,course_name from course";
$rscoursecombo=mysqli_query($con,$selectqry1);

$selectqry2="select sem_id,sem_name from semester";
$rssemcombo=mysqli_query($con,$selectqry2);

$selectqry3="select sub_id,sub_name from subject";
$rssubcombo=mysqli_query($con,$selectqry3);

$selectqry4="select t_id,concat(fname ,' ' , mname,' ',lname) as name from teacher";
$rsteacombo=mysqli_query($con,$selectqry4);

$lec_id=0;
if(isset($_GET["edit"]))
{
    $elec_id=$_GET["edit"];
    $lec_id=$elec_id;
    $sqry="select * from lec_info where lec_id=".$elec_id;
    $rsedit=mysqli_query($con,$sqry);
    $erow=mysqli_fetch_row($rsedit);
    $lec_date=$erow[1];
    $course_id=$erow[2];
    $sem_id=$erow[3];
    $lec_no=$erow[4];
    $proxy_status=$erow[5];
    $sub_id=$erow[6];
    $t_id=$erow[7];
    $lec_topic=$erow[8];
    $lec_method=$erow[9];
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
      <h1>Lecture Information Details</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Teacher</a></li>
          <li class="breadcrumb-item">Lecture Information</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
      <div class="card">
          <div class="card-body">
          <form method="POST" action="database_lecture_information.php">
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($elec_id)) echo 'nav-link'; else echo 'nav-link active'?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Lectures</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="<?php if(isset($elec_id)) echo 'nav-link active'; else echo 'nav-link'?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">New</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="attandance-tab" data-bs-toggle="tab" data-bs-target="#bordered-attandance" type="button" role="tab" aria-controls="attandance" aria-selected="false">Attandance</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="borderedTabContent">
                <div class="<?php if(isset($elec_id)) echo 'tab-pane fade'; else echo 'tab-pane fade show active'?>" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Edit</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                   if(!$rslecture)
                   {
                      echo "<tr><td colspan='5'> no records found...</td></tr>";
                   }
                   else
                   {
                      $cnt=1;
                      while($row=mysqli_fetch_row($rslecture))
                      {
                          echo "<tr>";
                          echo "<td>".$cnt."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td>".$row[3]."</td>";
                          echo "<td><a class='btn btn-primary' href='lecture-information.php?edit=".$row[0]."'><i class='ri-edit-fill'></i></a></td>";
                                     
                          echo "</tr>";
                          $cnt=$cnt+1;
                          
                      }
                   }
                  ?>
                  
                </tbody>
              </table>  
                </div>

                <div class="<?php if(isset($elec_id)) echo 'tab-pane fade show active'; else echo 'tab-pane fade'?>" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Lecture Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="txt_date" name="txt_date" value="<?php if(isset($lec_date)) echo $lec_date; else echo date("d-m-Y")?>">
                  </div>
                </div>

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
                    <select class="form-select" aria-label="Default select example" name="cmb_sem" id="cmb_sem" onChange="fillstudents();">
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
                  <label  class="col-sm-2 col-form-label" >Topic</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txt_lectop" name="txt_lectop" value="<?php if(isset($lec_topic)) echo $lec_topic;?>" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Method</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txt_lecmeth" name="txt_lecmeth" value="<?php if(isset($lec_method)) echo $lec_method;?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label" >Lecture No.</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txt_lecno" name="txt_lecno" value="<?php if(isset($lec_no)) echo $lec_no;?>" required>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-1">Proxy Status</legend>
                  <div class="col-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbtn_ps" id="rbtn_proxy" value="Proxy" <?PHP if(isset($proxy_status)){if($proxy_status=="Proxy") echo 'checked';} ?>>
                      <label class="form-check-label" for="gridRadios1">
                        Proxy
                      </label>
                      
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="rbtn_ps" id="rbtn_own" value="Own" <?PHP if(isset($proxy_status)){if($proxy_status=="Own") echo 'checked';} ?> >
                      <label class="form-check-label" for="gridRadios1">
                        Own
                      </label>
                    </div>
                  </div>
                </fieldset>

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
                    <input type="button"  class="btn btn-primary"  value="<?php if(isset($elec_id)) echo 'view Attandance'; else echo 'Take Attandance'?>" onclick="fillstudents(this);" />
                    </div>
                </div>
            
                </div>

                <div class="tab-pane fade" id="bordered-attandance" role="tabpanel" aria-labelledby="attandance-tab">
                

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Attendance</h5>
              <div class="row" id='table-student'>
                                   
                  
                
                </div>
              <!-- Advanced Form Elements -->
              <!-- End General Form Elements -->

            
          </div>

        </div>
                </div>
</div>
<input type='hidden' id='lec_id' name='lec_id' value='<?PHP echo $lec_id?>'>
            </form>
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
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
                  function fillstudents(val)
                  {
                    //alert("hi");
                    var course_id=document.getElementById("cmb_course").value;
                    var sem_id=document.getElementById("cmb_sem").value;
                    var lec_id=document.getElementById("lec_id").value;
                    //alert("hi" + course_id + "-" + sem_id + val.value);
                    var opt=0;
                    if(val.value=='view Attandance')
                        opt=1;
                    $.ajax({
                        type: 'POST',
                        url: 'fetchstudentsattandace.php', // Create this PHP file to handle the request
                        data: { c_id: course_id,s_id:sem_id,opr:opt,l_id:lec_id},
                        success: function(response) {
                        // Update the dynamic content container with the response
                        //alert(response);
                        var ele = document.getElementById("table-student");
                        if(ele)  
                            ele.innerHTML = response;
                        },
                    error: function() {
                        alert('An error occurred while fetching dynamic content.');
                      }
                      });
                  }					
					</script> 
                    <script type="text/javascript">
                      function getabsentids(a,s_id)
                      {
                         
                          //alert('s_id =' + s_id);
                          var abno = document.getElementById('txt_abno');
                          var nos = abno.getAttribute('value');
                          //alert(nos);
                          if(a.getAttribute('class')=='btn btn-primary')
                          {
                              a.setAttribute('class','btn btn-danger'); 
                              a.textContent='Absent';
                              nos = nos.replace(s_id+',','');    
                                  abno.setAttribute('value',nos);
                             
                          }
                          else
                          {
                              a.setAttribute('class','btn btn-primary');
                              a.textContent='Present';
                              nos = nos.replace(s_id+',','');
                              nos = nos+s_id+',';
                              abno.setAttribute('value',nos);
                          }
                          //alert(nos);
                      }
                           </script>
</body>

</html>