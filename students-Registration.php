<?php
include("database_connect.php");
$selectqry1="select course_id,course_name from course";
$rscoursecombo=mysqli_query($con,$selectqry1);
$selectqry2="select sem_id,sem_name from semester";
$rssemcombo=mysqli_query($con,$selectqry2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - student</title>
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

  <main>
    <div class="container">

      <!-- <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"> -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="img/logo/logoaaa.png" alt="">
                  <span class="d-none d-lg-block">Academic Activity</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Student Registration</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="database_student.php" method="POST">
                    <div class="col-md-4">
                      <label for="yourName" class="form-label">First Name</label>
                      <input type="text" name="txt_fname" class="form-control" id="txt_fname" required>
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">Middel Name</label>
                      <input type="text" name="txt_mname" class="form-control" id="txt_mname" required>
                      <div class="invalid-feedback">Please, enter your middel name!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">Last Name</label>
                      <input type="text" name="txt_lname" class="form-control" id="txt_lname" required>
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">Gender</label>
                      <div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbtn_gender" id="rbtn_male" value="Male">
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                      
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="rbtn_gender" id="rbtn_female" value="Female">
                      <label class="form-check-label" for="gridRadios1">
                        Female
                      </label>
                    </div>
                </div>
                      <div class="invalid-feedback">Please, enter your gender!</div>
                    </div>

                    
               
                    <div class="col-md-4">
                      <label for="yourUsername" class="form-label">Date Of Birth</label>
                      
                        <input type="date" name="txt_dob" class="form-control" id="txt_dob" required>
                        <div class="invalid-feedback">Please enter your birth date.</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">Contact</label>
                      <input type="text" name="txt_contact" class="form-control" id="txt_contact" required>
                      <div class="invalid-feedback">Please, enter your contact!</div>
                    </div>

                   
                    <div class="col-md-4">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="txt_email" class="form-control" id="txt_email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    

                    <div class="col-md-4">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="txt_pwd" class="form-control" id="txt_pwd" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="txt_cpwd" class="form-control" id="txt_cpwd" required>
                      <div class="invalid-feedback">Please enter your confirm password!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">GR No.</label>
                      <input type="text" name="txt_grno" class="form-control" id="txt_grno" required>
                      <div class="invalid-feedback">Please, enter your gr no!</div>
                    </div>

                    <div class="col-md-4">
                      <label for="yourEmail" class="form-label">Enrollment No.</label>
                      <input type="text" name="txt_enno" class="form-control" id="txt_enno" required>
                      <div class="invalid-feedback">Please enter your Enrollment number!</div>
                    </div>


                  <div class="col-md-4">
                  <label class="form-label">Course</label>
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

                 <div class="col-md-4">
                  <label class="form-label">Semester</label>
                  
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
                   <div class="col-md-12">
                    <center>
                    <div class="col-md-4">
                      <button class="btn btn-primary w-100" type="submit" name="btn_resiter" value="Add">Create Account</button>
                    </div>
                    </center>
                    </div>
                    
                    <div class="col-md-12">
                    <center>
                    <div class="col-md-4">
                      <p class="small mb-0">Already have an account? <a href="student_login.php">Log in</a></p>
                    </div>
                    </div>
                    </center>
                  </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      <!-- </section> -->

    </div>
  </main><!-- End #main -->
  
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