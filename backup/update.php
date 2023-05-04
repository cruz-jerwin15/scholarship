<?php
    session_start();
    include('config.php');

    if(isset($_SESSION['username']))
    {
        $sessuser=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EPS</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="DataTables/datatables.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
<link rel="icon" href="img/logo.png">

  <style>
    
          #tbl-user_wrapper .dt-buttons{
          float: left!important;
        }

        #tbl-user_wrapper .dataTables_length{
          text-align: left!important;
        }

        #tbl-user_wrapper .row:nth-child(3) .col-sm-12:nth-child(1){
          text-align: left!important;
        }

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

        tfoot {
            display: table-header-group;
        }


</style>
 <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
         if(isset($_POST["submit"])){
            $brgy = $_POST['brgy'];
            $last_school = $_POST['last_school'];
            $yrlvl = $_POST['year_level'];
            $course = $_POST['course'];
            $batch = $_POST['batch'];
            //$Category = $_POST['Category'];
            //$SchoolYear = $_POST['SchoolYear'];
            $f_semester_grade = $_POST['f_semester_grade'];
            $s_semester_grade = $_POST['s_semester_grade'];
            $semester = $_POST['semester'];
            $gwaNow = $_POST['GWA'];
            $remarks = $_POST['remarks'];
            $with_failing_grade = $_POST [ 'with_failing_grade'];
            $assessment = $_POST['assessment'];
            $schoolYr = $_POST['SchoolYear'];
            $Category = $_POST['Category'];


            $sql = "UPDATE tbl_userinfo, tbl_useraddress, tbl_school SET tbl_useraddress.barangay = '$brgy', tbl_school.SchoolIntended = '$last_school', tbl_userinfo.batch = '$batch', tbl_school.Course = '$course', tbl_userinfo.remarks = '$remarks',  tbl_userinfo.assessment = '$assessment', tbl_school.SchoolYear = '$schoolYr', tbl_userinfo.Category = '$Category'  WHERE tbl_userinfo.id = tbl_useraddress.user_id AND tbl_userinfo.id = tbl_school.user_id AND tbl_userinfo.id = '$id'";

            $sql1 = "INSERT INTO tbl_grades(user_id,GWA, f_semester_grade, s_semester_grade, yrLvl, semester, with_failing_grade) VALUES ('$id','$gwaNow', '$f_semester_grade', '$s_semester_grade', '$yrlvl', '$semester', '$with_failing_grade')";
            if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1))
              {
              echo '<script language="javascript">';
              echo 'alert("USER SUCCESSFULLY UPDATED!")';
              echo '</script>';
              header("location: superadminhomepage.php");
              }
            else{
              echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          }
  ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <!--  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Hello Super Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> -->
        <?php
      include "greetings.php";

    ?>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <div class="row">
            <div class="col-md-12">
             <?php
                  include "profile.php";

             ?>
            </div>
             <div class="col-md-12" style="height:20px;">

            </div>
          </div>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="superadmindashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Dashboard </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="superadminapprove.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Approve Applicant's Request </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="superadminhomepage.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Applicants List</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="manageapplicant.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Manage Removed Applicants </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="generateReports.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text"> Generate Reports </span>
          </a>
        </li>
  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link" href="superadminaddadmin.php">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Add Another Admin</span>
          </a>


         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="superadminaccountsettings.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Account Settings </span>
          </a>
        </li>

        
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link"  data-toggle="modal" data-target="#usermanual">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> User Manual Guide </span>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

      
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>




  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Super Admin</a>
        </li>
        <li class="breadcrumb-item active"> View My Applicant list </li>
      </ol>
      <!-- Icon Cards-->
      


      <!-- Area Chart Example-->




<form action="" method="post" enctype="multipart/form-data"> 
<div style="overflow: scroll;">
  <table class='table table-striped' id="tbl-user">
    <?php
      include 'config.php';
      $id = mysqli_real_escape_string($conn, $_GET['id']);
      $sqlStr = "SELECT
  a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.batch,
    b.Barangay AS brgy,
    c.SchoolIntended AS last_school,
    a.assessment,
    d.yrLvl,
    c.course,
    a.remarks,
    d.GWA,
    c.SchoolYear,
    a.Category,
    d.f_semester_grade,
    d.s_semester_grade,
    d.semester,
    d.id,
    d.with_failing_grade
    
FROM tbl_userinfo a
LEFT JOIN tbl_useraddress b
ON a.id = b.user_id
LEFT JOIN tbl_school c
ON a.id = c.user_id
LEFT JOIN tbl_grades d
on a.id = d.user_id

WHERE a.id = '$id' && d.id = (SELECT MAX(g2.id) FROM tbl_grades g2 WHERE d.user_id = g2.user_id )";

      $result = $conn->query($sqlStr);

      if ($result->num_rows > 0) {
          $rowCount = 1;
          echo "
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Address</th>
              <th>School</th>
              <th>Batch</th>
              <th>Category</th>
              <th>School Year</th>
              <th>Semester</th>
              <th> Year</th>
              <th>Course</th>
              <th>1st Semester Grade</th>
              <th>2nd Semester Grade</th>
              <th> Gen Weighted Average</th>
              <th>With/Without Failing Grade</th>
              <th> REMARKS </th>
              <th> Final Assessment </th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          ";

          echo "<tbody>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$rowCount."</td>";
                echo "<td nowrap>".$row['user_name']."</td>";
                echo "<td><input type='brgy' value='".$row['brgy']."' name='brgy' class='form-control input-lg' placeholder='".$row['brgy']."'></td>";
                echo "<td><input type='last_school' value='".$row['last_school']."' name='last_school' class='form-control input-lg' placeholder='".$row['last_school']."'></td>";
                echo "<td><input type='batch' value='".$row['batch']."' name='batch' class='form-control input-lg' placeholder='".$row['batch']."'></td>";
                echo "<td><input type='Category' value='".$row['Category']."' name='Category' class='form-control input-lg' placeholder='".$row['Category']."'></td>";
                echo "<td><input type='SchoolYear' value='".$row['SchoolYear']."' name='SchoolYear' class='form-control input-lg' placeholder='".$row['SchoolYear']."'></td>";
                echo "<td><input type='semester' value='".$row['semester']."' name='semester' class='form-control input-lg' placeholder='".$row['semester']."'></td>";
                echo "<td><input type='year_level' value='".$row['yrLvl']."' name='yrLvl' class='form-control input-lg' placeholder='".$row['yrLvl']."'></td>";
                echo "<td><input type='course' value='".$row['course']."' name='course' class='form-control input-lg' placeholder='".$row['course']."'></td>";
                 echo "<td><input type='f_semester_grade' value='".$row['f_semester_grade']."' name='f_semester_grade' class='form-control input-lg' placeholder='".$row['f_semester_grade']."'></td>";
                echo "<td><input type='s_semester_grade' value='".$row['s_semester_grade']."' name='s_semester_grade' class='form-control input-lg' placeholder='".$row['s_semester_grade']."'></td>";
                echo "<td><input type='GWA' name='GWA' value='".$row['GWA']."' class='form-control input-lg' placeholder='".$row['GWA']."'></td>";
                if($row['Category']=="EPS College"){
                  echo "<td><select name='with_failing_grade'><option value='0'>No Grade Below 80</option>
                                  <option value='1'>With Grade Below 80</option>
                                  </select></td>";
                }
                else{

                echo "<td><select name='with_failing_grade'><option value='0'>No Failing Grade</option>
                                  <option value='1'>With Failing Grade</option>
                                  </select></td>";
                }
                echo "<td><input type='remarks' name='remarks' value='".$row['remarks']."' class='form-control input-lg' placeholder='".$row['remarks']."'></td>";
                echo "<td><select name='assessment'><option value='0'>Not For Renewal</option>
                                  <option value='1'>For Renewal</option>
                                  </select></td>";
                echo "<td><button class='btn btn-success btn-sm text-white' type='Submit' value ='Submit' name = 'submit'> Update </button></td>";

              echo "</tr>";
              
              $rowCount += 1;
          }
          echo "</tbody>";
      }
    ?>
  </table>
</div>
</form>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
      $(document).ready(function(){
        // $("#tbl-user").DataTable();
        // Setup - add a text input to each footer cell
        $('#tbl-user tfoot th').each( function (k, v) {
            if(k!=9&&k!=0){

              var title = $(this).text();
              $(this).html( '<input type="text" placeholder="'+title+'" />' );
            }
        } );
     
        // DataTable
        var table = $('#tbl-user').DataTable({
          dom: 'lBfrtip',
          buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
          ],
        });
     
        // Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
      });

    </script>






  
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small> EPS Edukasyon Pahalagahan Sagot sa kinabukasan </small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
  </div>
</body>

<div class="modal fade" id="usermanual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> User Guide Manual </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
          1.  View and approve applicant's request for application by clicking the
          link at the left side "Approve Applicant's Request" <br><br>

          2.  View and retrieve removed applicants by clicking the
          link at the left side "Managed Removed Applicants" <br><br>

          3. View and Update Approved applicants by clicking the
          link at the left side "Super Admin Home" <br><br>

          4. Add another admin to manage the website by clicking the
          link at the left side "Add Another Admin" <br>
          

          </div>
          <div class="modal-footer">
            
            <a class="btn btn-primary" href="update.php">Back</a>
          </div>
        </div>
      </div>
    </div>

</html>
<?php
    }
    else
    {
        session_destroy();
        header("Location: index.php");
    }
?>