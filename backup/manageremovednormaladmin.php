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
  <link rel="icon" href="img/logo.png">
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

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
      include "greetings.php";

    ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
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
         <?php
          include "sidepanel.php";

        ?>
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

      <?php
        $category1 = "EA Senior High";
  $category2 = "EA College";
  $category3 = "EPS College";
  $sql1 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category1' && canview = '1'and approve = '1'";

$sql2 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category2' && canview = '1'and approve = '1'";

$sql3 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category3' && canview = '1'and approve = '1'";

$sql4 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE canview = '1'and approve = '1'";

$result4 = mysqli_query($conn, $sql4);
if (!$result4) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row4 = mysqli_fetch_array($result4);

$result1 = mysqli_query($conn, $sql1);
if (!$result1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row1 = mysqli_fetch_array($result1);

$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row2 = mysqli_fetch_array($result2);

$result3 = mysqli_query($conn, $sql3);
if (!$result3) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row3 = mysqli_fetch_array($result3);

// echo "<script> 
//                    alert($result);
//                    </script>";
?>


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active"> Manage Removed Applicants </li>
      </ol>
     <!-- Icon Cards-->
     <div class="row">
        
       



       

        
    </div>
      <!-- <form action="try1.php" method="post" name="upload_excel" enctype="multipart/form-data">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="form-group">
                              <div class="mr-5">Select File</div>
                              <div class="col-md-4">
                                  <input type="file" name="file" id="file" class="input-large">
                              </div>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Import CSV</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
              <div class="card-footer text-white clearfix small z-1">
                <button type="submit" id="submit" name="Import" data-loading-text="Loading...">Import</button>
              </div>

            </div>
          </div>
        </form> -->

        <form class="form-horizontal" action="try1.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Import CSV</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
      </div>


      <!-- Area Chart Example-->




<div style="overflow: scroll;">
  <table class='table table-striped' id="tbl-user">
    <?php
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
    d.with_failing_grade
    
FROM tbl_userinfo a
LEFT JOIN tbl_useraddress b
ON a.id = b.user_id
LEFT JOIN tbl_school c
ON a.id = c.user_id
LEFT JOIN tbl_grades d
on a.id = d.user_id

WHERE canview = '1' and approve = '1'";

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
              <th> Year & Course</th>
              <th> Gen Weighted Average</th>
              <th> REMARKS </th>
              <th> Final Assessment </th>
              <th></th>
              <th></th>

             
          
            </tr>
          </thead>
          ";

          echo "<tbody>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$rowCount."</td>";
                echo "<td>".$row['user_name']."</td>";
                echo "<td>".$row['brgy']."</td>";
                echo "<td>".$row['last_school']."</td>";
                echo "<td>".$row['batch']."</td>";
                echo "<td>".$row['Category']."</td>";
                echo "<td>".$row['SchoolYear']."</td>";
                echo "<td>".$row['yrLvl']. '  ' .$row['course']."</td>";
                echo "<td>".$row['GWA']."</td>";
                echo "<td>".$row['remarks']."</td>";
                echo "<td>".$row['assessment']."</td>";
                  echo "<td><a href='#' id='";
                echo $row['id'];
                echo "' onClick='getRetrieve(this.id)' data-toggle='modal' data-target='#retrieveStudent'> Retrieve </a></td>";
                // echo "<td><a href='retrievenormaladmin.php?id=".$row['id']."'>Retrieve</a></td>";
                echo "<td><a href='viewnormaladmin.php?id=".$row['id']."'>View</a></td>";
                // echo "<td><a href='delete.php?id=".$row['id']."'>Delete Permanently</a></td>";
         

              echo "</tr>";
              
              $rowCount += 1;
          }
          echo "</tbody>";
      }
    ?>
    <script >
      var ids;
      function getRetrieve(id){
        ids=id;
      }
      function retrieveStudent(){
        window.open("retrievenormaladmin.php?id="+ids,"_self");
      }
    </script>
    <tfoot>
      <tr>
              <!-- <th></th>
              <th>Name</th>
              <th>Address</th>
              <th>School</th>
              <th>Batch</th>
              <th>Category</th>
              <th>School Year</th>
              <th> Year & Course</th>
              <th> Gen Weighted Average</th>
              <th> REMARKS </th>
              <th> Final Assessment </th> -->
      </tr>
    </tfoot>

  </table>
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
            if(k!=11&&k!=0){

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
                // if ( that.search() !== this.value ) {
                //     that
                //         .search( this.value )
                //         .draw();
                // }
                table.search( this.value ).draw();
            } );
        } );
      });

    </script>
      <div class="modal fade" id="retrieveStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          
            <h5 class="modal-title" id="exampleModalLabel">RetrieveStudent?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Yes" below if you are ready to retrieve this student.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="#" onClick="retrieveStudent()">Yes</a>
          </div>
        </div>
      </div>
    </div>
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
          link at the left side "Manage Applicants List" <br><br>

          4. Add another admin to manage the website by clicking the
          link at the left side "Add Another Admin" <br>
          

          </div>
          <div class="modal-footer">
            
            <a class="btn btn-primary" href="manageremovednormaladmin.php">Back</a>
          </div>
        </div>
      </div>
    </div>




  
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  
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

</html>
<?php
    }
    else
    {
        session_destroy();
        header("Location: index.php");
    }
?>