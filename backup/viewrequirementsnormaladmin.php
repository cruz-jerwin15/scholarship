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
  input[type='checkbox'] {
    -webkit-appearance:none;
    width:30px;
    height:30px;
    background:white;
    border-radius:5px;
    border:2px solid #555;
}
input[type='checkbox']:checked {
    background: #abd;
}

</style>
 <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
         if(isset($_POST["submit"])){
            $applicationForm = $_POST['applicationForm'];
            $birthCertificate = $_POST['birthCertificate'];
            $gradeReport = $_POST['gradeReport'];
            $schoolClearance = $_POST['schoolClearance'];
            $parentsVoters = $_POST['parentsVoters'];
            $studentRegistration = $_POST['studentRegistration'];
            $map = $_POST['map'];
            $brgyClearance = $_POST['brgyClearance'];
            $idPic = $_POST['idPic'];
            $incomeTax = $_POST['incomeTax'];
            $indigency = $_POST['indigency'];
            $entranceExam = $_POST['entranceExam'];


            $sql = "UPDATE tbl_requirements SET applicationForm = '$applicationForm', birthCertificate = '$birthCertificate', gradeReport = '$gradeReport', schoolClearance = '$schoolClearance', parentsVoters = '$parentsVoters', studentRegistration = '$studentRegistration', map = '$map', brgyClearance ='$brgyClearance', idPic = '$idPic', incomeTax = '$incomeTax', indigency = '$indigency', entranceExam = '$entranceExam'  WHERE user_id = '$id'";

            if(mysqli_query($conn, $sql))
              {
              echo '<script language="javascript">';
              echo 'alert("USER SUCCESSFULLY UPDATED!")';
              echo '</script>';
              header("location: normaladminapprove.php");
              }
            else{
              echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          }
          if(isset($_POST["submit2"])){
            $applicationForm = $_POST['applicationForm'];
            $birthCertificate = $_POST['birthCertificate'];
            $gradeReport = $_POST['gradeReport'];
            $schoolClearance = $_POST['schoolClearance'];
            $parentsVoters = $_POST['parentsVoters'];
            $studentRegistration = $_POST['studentRegistration'];
            $map = $_POST['map'];
            $brgyClearance = $_POST['brgyClearance'];
            $idPic = $_POST['idPic'];
            $incomeTax = $_POST['incomeTax'];
            $indigency = $_POST['indigency'];
            $entranceExam = $_POST['entranceExam'];


            $sql = "INSERT INTO tbl_requirements (applicationForm,birthCertificate,gradeReport,schoolClearance,parentsVoters,studentRegistration,map,brgyClearance,idPic,incomeTax,indigency,entranceExam) VALUES ('$applicationForm','$birthCertificate','$gradeReport','$schoolClearance','$parentsVoters','$studentRegistration','$map','$brgyClearance','$idPic','$incomeTax','$indigency','$entranceExam')  WHERE user_id = '$id'";

            if(mysqli_query($conn, $sql))
              {
              echo '<script language="javascript">';
              echo 'alert("USER SUCCESSFULLY UPDATED!")';
              echo '</script>';
              header("location: normaladminapprove.php");
              }
            else{
              echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          }
  ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Hello Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladmin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Dashboard </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladminapprove.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Approve Applicant's Request </span>
          </a>
        </li>

        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="manageapplicantnormaladmin.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Applicants List</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="manageremovednormaladmin.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Manage Removed Applicants </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="generateReportsNormalAdmin1.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text"> Generate Reports </span>
          </a>
        </li>
  


         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladminaccountsettings.php">
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
          <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active"> View My Applicant list </li>
      </ol>
      <!-- Icon Cards-->
      


      <!-- Area Chart Example-->



<div style="overflow: scroll;">
<form action="" method="post" enctype="multipart/form-data"> 

  <table class='table table-striped' style="width: 100%; table-layout: fixed;" id="tbl-user">
    <?php
      include 'config.php';
      $id = mysqli_real_escape_string($conn, $_GET['id']);
      $sqlStr = "SELECT
  a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    b.applicationForm,
    b.birthCertificate,
    b.gradeReport,
    b.schoolClearance,
    b.parentsVoters,
    b.studentRegistration,
    b.map,
    b.brgyClearance,
    b.idPic,
    b.incomeTax,
    b.indigency,
    b.entranceExam
    
FROM tbl_userinfo a
LEFT JOIN tbl_requirements b
ON a.id = b.user_id

WHERE b.user_id = '$id'";

      $result = $conn->query($sqlStr);

      if ($result->num_rows > 0) {
          $rowCount = 1;
          echo "
          <thead>
            <tr>
              <th style='word-wrap: break-word'' >#</th>
              <th style='word-wrap: break-word'>Name</th>
              <th style='word-wrap: break-word'>Application Form</th>
              <th style='word-wrap: break-word'>Birth Certificate</th>
              <th style='word-wrap: break-word'>Grade Report</th>
              <th style='word-wrap: break-word'>School Clearance</th>
              <th style='word-wrap: break-word'>Parents Voter's ID</th>
              <th style='word-wrap: break-word'>Students Registration Form</th>
              <th style='word-wrap: break-word'>Vicinity Map/House Sketch</th>
              <th style='word-wrap: break-word'>Barangay Clearance</th>
              <th style='word-wrap: break-word'>1x1 ID Picture</th>
              <th style='word-wrap: break-word'>Income Tax Return/COEAC</th>
              <th style='word-wrap: break-word'>Certificate of Unemployment</th>
              <th style='word-wrap: break-word'>Entrance Exam (For College Only)</th>

            </tr>
          </thead>
          ";

          echo "<tbody>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$rowCount."</td>";
                echo "<td style='word-wrap: break-word' >".$row['user_name']."</td>";
              $rowCount += 1;
              ?>

                <td><input type='checkbox' value='1' name='applicationForm' class='form-control input-lg' <?php echo ($row['applicationForm']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='birthCertificate' class='form-control input-lg' <?php echo ($row['birthCertificate']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='gradeReport' class='form-control input-lg' <?php echo ($row['gradeReport']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='schoolClearance' class='form-control input-lg' <?php echo ($row['schoolClearance']==1 ? 'checked' : '');?> ></td>
                <td><input type='checkbox' value='1' name='parentsVoters' class='form-control input-lg'<?php echo ($row['parentsVoters']==1 ? 'checked' : '');?> ></td>
                <td><input type='checkbox' value='1' name='studentRegistration' class='form-control input-lg' <?php echo ($row['studentRegistration']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='map' class='form-control input-lg'<?php echo ($row['map']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='brgyClearance' class='form-control input-lg'<?php echo ($row['brgyClearance']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='idPic' class='form-control input-lg'<?php echo ($row['idPic']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' value='1' name='incomeTax' class='form-control input-lg'<?php echo ($row['incomeTax']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' name='indigency' value='1' class='form-control input-lg'<?php echo ($row['indigency']==1 ? 'checked' : '');?>></td>
                <td><input type='checkbox' name='entranceExam' value='1' class='form-control input-lg'<?php echo ($row['entranceExam']==1 ? 'checked' : '');?>></td>
 <!--                <td style="width:100%;" ><button class='btn btn-success btn-lg text-white' type='Submit' value ='Submit' name = 'submit2'> Insert </button></td> -->
                <td style="width:100%;" ><button class='btn btn-success btn-sm text-white' type='Submit' value ='Submit' name = 'submit'> Update </button></td>
              </tr>
              <?php
                } 
              ?>
              <?php
              }  
              ?>
          </tbody>
  </table>
</form>
</div>

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
          link at the left side "Admin Home" <br><br>

          

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