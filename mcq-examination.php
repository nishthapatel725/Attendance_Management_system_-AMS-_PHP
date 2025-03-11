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
if(isset($_GET['eid']))
{
   
    $cnt=-1;
    $_SESSION['cnt']=$cnt;
    $e_id=$_GET['eid'];
    $selectqry="select * from exam where e_id=$e_id"; 
    $rsexam=mysqli_query($con,$selectqry);
    $row=mysqli_fetch_row($rsexam);
    $examtitle=$row[5];
    $noq=$row[6];
    $qids=$row[7];
    $_SESSION['E-title']=$examtitle;
    $_SESSION['noq']=$noq;
    $_SESSION['examid']=$e_id;
    if(!isset($_SESSION['mcq']))
    {
        
        $qry2="select * from question where que_id in($qids)";
        $rsquestions=mysqli_query($con,$qry2);
        $questions = [];
        //$cnt=1;
        while($qrow=mysqli_fetch_row($rsquestions))
        {
            $q=['q_id'=>$qrow[0] , 'question'=>$qrow[4], 'a'=>$qrow[5],'b'=>$qrow[6],'c'=>$qrow[7],'d'=>$qrow[8],'ans'=>$qrow[9],'cans'=>0];
            array_push( $questions,$q);
        }
        $_SESSION['mcq']=$questions;
        
        
    }
    //print_r($questions);
    //echo $questions[0]['question'];
    //die(0);
}
else
    {
        $noq=$_SESSION['noq'];   
        $cnt=$_SESSION['cnt'];
        $cnt=$cnt+1;
        $_SESSION['cnt']=$cnt;
        //echo $cnt;
        $questions = $_SESSION['mcq'];
        $examtitle=$_SESSION['E-title'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / exam - student</title>
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
      <!-- <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"> -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="img/logo/logoaaa.png" alt="">
                  <span class="d-none d-lg-block">Academic Activity</span>
                </a>
              </div><!-- End Logo -->

              <div class="card">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4"><?PHP echo $examtitle;?></h5>
                  </div>
                 
                  <form class="row g-4 needs-validation" novalidate action="database_mcq-examination.php" method="POST">
                    <div class="col-md-6">
                      <label for="yourName" class="form-label">Students Name</label>
                      <input type="text" name="txt_fname" class="form-control" id="txt_fname" value="<?PHP if(isset($_SESSION["s_name"])) echo $_SESSION["s_name"]; ?>" readonly> 
                    </div>

                    <div class="col-md-4">
                      <label for="yourName" class="form-label">Roll no</label>
                      <input type="text" name="txt_mname" class="form-control" id="txt_mname" value="<?PHP if(isset($_SESSION["r_no"])) echo $_SESSION["r_no"] ; ?>" readonly>
                      
                    </div>

                   <div class="col-md-12">
                    <center>
                    <div class="col-md-4">
                      <input class="btn btn-primary w-100" type="submit" name="btn_submit" value="<?php if($cnt==-1) echo 'Start';elseif(($cnt>-1)&&($cnt<$noq)) echo 'Next';else echo 'Finish';?>"/>
                    </div>
                    </center>
                    </div>
                    <div class="col-md-12" id='question-table'>
                      <?php
                        if(($cnt<$noq)&&($cnt>-1))
                        {
                        echo '<table>
                            <tr>
                                <td>
                                    <h4>';
                                    if($cnt>-1) echo $questions[$cnt]['question'];
                        echo '</h4>
                                </td> 
                            </tr>  
                            <tr>
                                <td>
                                <div class="form-check">
                                      <input class="form-check-input" type="radio" name="opt" value="a" checked>
                                      <label class="form-check-label" for="gridRadios1">';
                                      if($cnt>-1) echo $questions[$cnt]['a'];
                          echo '</label>
                                    </div>
                                 
                                </td></tr><tr>
                                <td>
                                <div class="form-check">
                                      <input class="form-check-input" type="radio" name="opt"  value="b" >
                                      <label class="form-check-label" for="gridRadios1">';
                                    if($cnt>-1) echo $questions[$cnt]['b'];
                                echo '</label>
                                    </div>
                                </td></tr><tr>
                                <td>
                                <div class="form-check">
                                      <input class="form-check-input" type="radio" name="opt"  value="c" >
                                      <label class="form-check-label" for="gridRadios1">';
                                      if($cnt>-1) echo $questions[$cnt]['c'];
                                echo '</label>
                                    </div>
                                </td></tr><tr>
                                <td>
                                <div class="form-check">
                                      <input class="form-check-input" type="radio" name="opt" value="d" >
                                      <label class="form-check-label" for="gridRadios1">';
                                      if($cnt>-1) echo $questions[$cnt]['d'];
                                echo '</label>
                                    </div>
                                </td>
                            </tr>           
                            <table>';
                        }
                            ?>
                      <div>
                      <div>
                    </div>
                    <input type="hidden" id="exmaid" name="exmaid" value="<?php if(isset($e_id)) echo $e_id; ?>"/>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </section> -->
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