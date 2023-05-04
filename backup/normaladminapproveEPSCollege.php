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
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladminapprove.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Approve Applicant's Request </span>
          </a>
        </li>


         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="manageapplicantnormaladmin.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"> Manage Applicants List</span>
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

  
  <?php
        $category1 = "EA Senior High";
  $category2 = "EA College";
  $category3 = "EPS College";
  $sql1 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category1' && approve = '0'&& canview = '0'";

$sql2 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category2' && approve = '0'&& canview = '0'";

$sql3 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE Category = '$category3' && approve = '0'&& canview = '0'";

$sql4 = "SELECT COUNT(Category) as Category, approve
FROM tbl_userinfo
WHERE approve = '0'&& canview = '0'";

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
          <a href="#">Super Admin</a>
        </li>
        <li class="breadcrumb-item active"> View My Applicant list </li>
      </ol>
       <!-- Icon Cards-->
       <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5" style="font-size: 120%;">All Applicants</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="normaladminapprove.php">
              <span class="float-left"> <h3 style="font-size: 120%;"> <?php echo $row4['Category']?> </h3></span>
            
            </a>
          </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5" style="font-size: 120%;">EA SHS</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="normaladminapproveEASHS.php">
              <span class="float-left"><h3 style="font-size: 120%"> <?php echo $row1['Category']?> </h3></span>
            </a>
          </div>
        </div>



         <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5" style="font-size: 120%;"> EA College </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="normaladminapproveEACollege.php">
              <span class="float-left"> <h3 style="font-size: 120%;">  <?php echo $row2['Category']?> </h3></span>
            </a>
          </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5" style="font-size: 120%;">EPS College</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="normaladminapproveEPSCollege.php">
              <span class="float-left"> <h3 style="font-size: 120%;">  <?php echo $row3['Category']?></h3></span>
            </a>
          </div>
        </div>
    </div>

        <form class="form-horizontal" action="try1.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend style="padding-left:5%;"> Import CSV</legend>
 
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
  <table class='table table-striped' style="width: 100%;" id="tbl-user">
    <?php
      $sqlStr = "SELECT
  a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    c.course,
    a.approve,
    c.GWA,
    a.Category,
    c.SchoolYear,
    d.yrLvl,
    a.requirements
    
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id
INNER JOIN tbl_grades d
ON a.id = d.user_id

WHERE canview = '0' and approve = '0' and Category = 'EPS College'&& d.id = (SELECT MAX(g2.id) FROM tbl_grades g2 WHERE d.user_id = g2.user_id )";

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
              <th> Requirements</th>
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
                echo "<td>".$row['user_name']."</td>";
                echo "<td>".$row['brgy']."</td>";
                echo "<td>".$row['last_school']."</td>";
                echo "<td>".$row['batch']."</td>";
                echo "<td>".$row['Category']."</td>";
                echo "<td>".$row['SchoolYear']."</td>";
                //echo "<td>".$row['course']."</td>";
                echo "<td>".$row['yrLvl']. '  ' .$row['course']."</td>";
                echo "<td>".$row['GWA']."</td>";
                // echo "<td>".$row['requirements']."</td>";
                echo "<td><a href='viewrequirementsnormaladmin.php?id=".$row['id']."'>View Requirements</a></td>";
                echo "<td><a href='approvenormaladmin.php?id=".$row['id']."'>Approve</a></td>";
                echo "<td><a href='removenormaladmin.php?id=".$row['id']."'> Remove </a></td>";
                echo "<td><a href='viewnormaladmin.php?id=".$row['id']."'>View</a></td>";
          

              echo "</tr>";
              
              $rowCount += 1;
          }
          echo "</tbody>";
      }
    ?>

    <tfoot>
      <tr>
              <th></th>
              <th>Name</th>
              <th>Address</th>
              <th>School</th>
              <th>Batch</th>
              <th>Category</th>
              <th>School Year</th>
              <th> Year & Course</th>
              <th> Gen Weighted Average</th>
              <th> Requirements</th>
      </tr>
    </tfoot>

  </table>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
//       var oTable = $("#tbl-user").dataTable({
//     "bJQueryUI": true,
//     "sPaginationType": "full_numbers",
//     "iDisplayLength": 10,
//     "bSortClasses": false, 
//         //...etc etc
// });

// $("tbl-user tfoot th").keyup(function(event) {
//   Filter on the column (the index) of this element 
//  if (event.keyCode == 13)//only on enter pressed
//  {
//     var colIndex = getColumnIndex(this.id);//this is a custom function I wrote. Ignore it
//     oTable.fnFilter(this.value, colIndex);
//   }
// });
      $(document).ready(function(){
        // Setup - add a text input to each footer cell
        $('#tbl-user tfoot th').each( function (k, v) {
            if(k!=10&&k!=0){

              var title = $(this).text();
              // var val = $.fn.dataTable.util.escapeRegex(
              //               $(this).val()
                        // );
              $(this).html( '<input type="text" placeholder="'+title+'" />' );
            }
        } );

    //     $('#example').dataTable( {
    //   paging: false,
    //     searching: false
    // } );

         var table = $('#tbl-user').DataTable();
        //Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    // that
                    //     .search( this.value )
                    //     .draw();
                }
                table.search( this.value ).draw();
            } );
        } );
      });
//       $(document).ready(function() {
//     $("#tbl-user tbody td").DataTable( {
//         initComplete: function () {
//             this.api().columns().every( function () {
//                 var column = this;
//                 var select = $('<select><option value=""></option></select>')
//                     .appendTo( $(column.footer()).empty() )
//                     .on( 'change', function () {
//                         var val = $.fn.dataTable.util.escapeRegex(
//                             $(this).val()
//                         );
 
//                         column
//                             .search( val ? '^'+val+'$' : '', true, false )
//                             .draw();
//                     } );
 
//                 column.data().unique().sort().each( function ( d, j ) {
//                     select.append( '<option value="'+d+'">'+d+'</option>' )
//                 } );
//             } );
//         }
//     } );
// } );
     
        // DataTable
        var table = $('#tbl-user').DataTable({
          stateSave: true,
          autoWidth: true,
          dom: 'lBfrtip',
          buttons: [
            {
              extend: 'pdfHtml5',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              exportOptions:{
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
            },
            {
              extend: 'copyHtml5',
              exportOptions:{
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
            },
            {
              extend: 'csvHtml5',
              exportOptions:{
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
            },
            {
              extend: 'excelHtml5',
              exportOptions:{
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
            }
          ]
        });
     

    </script>






  
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
          
          1.  View Admin Dashboard by clicking the
          link at the left side "Admin Dashboard" <br><br>

          2.  View and approve applicant's request for application by clicking the
          link at the left side "Approve Applicant's Request" <br><br>

          3. View and Update Approved applicants by clicking the
          link at the left side "Manage Applicants List" <br><br>

          4.  View and retrieve removed applicants by clicking the
          link at the left side "Managed Removed Applicants" <br><br>

          5. Change Your Password by clicking the
          link at the left side "Account Settings" <br>

          </div>
          <div class="modal-footer">
            
            <a class="btn btn-primary" href="normaladminapprove.php">Back</a>
          </div>
        </div>
      </div>
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