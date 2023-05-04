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
  <link rel="icon" href="img/logo.png">
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
            <span class="nav-link-text">Manage Scholars Information</span>
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


         <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
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


        <?php
         $username = $_SESSION['username'];
         if(isset($_POST["submit"])){
         $oldpassword = md5($_POST['oldpassword']);
         //echo "<script> alert ('$oldpassword');</script>";
         $newpassword = md5($_POST['newpassword']);
         $confirmnewpassword = md5($_POST['confirmnewpassword']);

         $sql = "SELECT password FROM tbl_admin WHERE username = '$sessuser'";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($result);
         echo $oldpwDB = $row['password'];

         if($oldpassword == $oldpwDB)
         {
          if($newpassword == $confirmnewpassword)
          {
            $sql2 = "UPDATE tbl_admin SET password = '$newpassword' WHERE username='$sessuser'";
            //$result2 = mysqli_query($conn, $sql2);
            if (mysqli_query($conn, $sql2)){
              echo '<script language="javascript">';
              echo 'alert("Your password has been changed, Please Login")';
              echo '</script>';

               echo "<script> 
                   window.location.href='loginform.php';
                   </script>";

            }

            else{

             echo "<script> 
                     alert('Your password could not be changed, Please try again');
                     </script>";
              echo "<script> 
                   window.location.href='superadminaccountsettings.php';
                   </script>";

            }
          }
         
        //  else echo "<script> 
        //            alert('Password Mismatch');
        //            </script>";

         }
       }
mysqli_close($conn); 
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Super Admin</a>
        </li>
        <li class="breadcrumb-item active"> Account Settings </li>
      </ol>
      <!-- Icon Cards-->
     

      <p></p>


  
    <div class="col-12" style="padding-top:25px;">
            <div class="row">
               
                <div class="col-md-6">
                    <h2> Change Password </h2>
                    <hr>
                </div>
            </div>

            <form action="" method="post"> 

              <div class="row">
           
                <div class="col-md-6">
                    <div class="form-group">
                       
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="oldpassword" class="form-control" id="password"
                                   placeholder="Old Password" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>

            </div>

            <div class="row">
           
                <div class="col-md-6">
                    <div class="form-group">
                       
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="newpassword" class="form-control" id="password"
                                   placeholder="New Password" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>

            </div>

            <div class="row">
           
                <div class="col-md-6">
                    <div class="form-group">
                       
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="confirmnewpassword" class="form-control" id="password"
                                   placeholder="Confirm Password" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>

            </div>

            <div class="row" style="padding-top: 1rem"> 
                
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success" value="submit" name="submit"><i class="fa fa-sign-in"></i> Change Password </button>
                </div>
            </div>
        </form>

      
      </div>

      <div class="col-12" style="padding-top:25px;">
            <div class="row">
               
                <div class="col-md-6">
                    <h2> Change Profile Picture </h2>
                    <hr>
                </div>
            </div>

            <form action="superadminchangeprofile.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="image" id="image">
                <input type="submit" value="Upload Image" name="submit">
            </form>


      
      </div>


      </div>
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

      


      <!-- Area Chart Example-->



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
            responsive: true;
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
          
 1. View statistics of approved applicant's by clicking the link at the left side "Dashboard"<br><br>

          2.  View and approve applicant's request for application by clicking the
          link at the left side "Approve Applicant's Request" <br><br>

          3. View and Update Approved applicants by clicking the
          link at the left side "Manage Applicants List" <br><br>

          4.  View and retrieve removed applicants by clicking the
          link at the left side "Managed Removed Applicants" <br><br>

          5. Add another admin to manage the website by clicking the
          link at the left side "Add Another Admin" <br><br>

          6. Change your own password by clicking the link at the left side "Account Settings"<br>
          

          </div>
          <div class="modal-footer">
            
            <a class="btn btn-primary" href="superadminaccountsettings.php">Back</a>
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