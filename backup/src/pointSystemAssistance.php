<?php session_start();

if($_SESSION['notif']=="0"){
    echo '<script language="javascript">';
    echo 'alert("Barangay is already existing")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="1"){
    echo '<script language="javascript">';
    echo 'alert("Successfully add new barangay")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="2"){
    echo '<script language="javascript">';
    echo 'alert("Successfully remove user")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else{

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YDO</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assetss/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assetss/vendors/css/vendor.bundle.addons.css">

    <link rel="stylesheet" href="../assetss/vendors/iconfonts/font-awesome/css/font-awesome.min.css" /> 
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assetss/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assetss/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../assetss/images/favicon.png" />

  </script>
  <script>
    var ids;

    function getRemoveId(id){
        ids = id;
    }
    function removeUser(){
      window.open("removeUser.php?id="+ids,"_self");
    }
    function removeSMSid(id){

      document.getElementById('smsid').value=id;
    }
  </script>
  </head>
  <body >
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
       <?php
            include 'logo.php';
       ?>
        <?php
            include 'Notif.php';
        ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
            include 'sidepanel.php';
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-8">
                <div class="page-header">
                  <h4 class="page-title">Settings / Point System (Educational Assistance)</h4>
                  
                </div>
              </div>
              <div class="col-4">
                <div class="page-header">
                  <a href="Criteria_PDF_as_of_June_7_2021_Assistance.pdf" target="_blank"class="btn btn-success">Download Criteria</a>
                  
                </div>
              </div>
              <div class="col-md-12">
                <!-- <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addUser">
                  <i class="mdi mdi-plus"></i>Add Message
                </button> -->
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                 <!-- Income Indicator -->
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Income Indicators</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:10%;">#</th>
                          <th style="width:30%;">Range</th>
                          <th style="width:30%;">Points</th>
                          <th style="width:30%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="APPROVED";
                          $usertype="admin";
                          $sql = "SELECT * FROM tbl_income_indicator_a ORDER BY points DESC";
                          $result = $conn->query($sql);
                          $count=1;
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $count;
                                echo '</td>';
                                echo '<td>';
                                echo $row['label'];
                                echo '</td>';
                                 echo '<td>';
                                echo number_format($row['points'],2);
                                echo '</td>';
                                echo '<td>';
                                 echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-success"  data-toggle="modal" data-target="#editIncome';
                                 echo $row['id'];
                                echo '">
                                  <i class="fa fa-pencil"></i></button>&nbsp';
                                //     echo '<button id="';
                                // echo $row['id'];
                                // echo '" type="button" onClick="removeSMSid(this.id)" class="btn btn-icons btn-rounded btn-danger"  data-toggle="modal" data-target="#removeUser">
                                //   <i class="fa fa-times"></i></button>&nbsp';
                                echo '</td>';
                                echo '</tr>'; 

                                $count=$count+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             
              <!-- Grade Indicator -->
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Grade Indicators</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:10%;">#</th>
                          <th style="width:30%;">Range</th>
                          <th style="width:30%;">Points</th>
                          <th style="width:30%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="APPROVED";
                          $usertype="admin";
                          $sql = "SELECT * FROM tbl_grade_indicator_a ORDER BY points DESC";
                          $result = $conn->query($sql);
                          $count=1;
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $count;
                                echo '</td>';
                                echo '<td>';
                                echo $row['label'];
                                echo '</td>';
                                 echo '<td>';
                                echo number_format($row['points'],2);
                                echo '</td>';
                                echo '<td>';
                                 echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-success"  data-toggle="modal" data-target="#editGrade';
                                 echo $row['id'];
                                echo '">
                                  <i class="fa fa-pencil"></i></button>&nbsp';
                                //     echo '<button id="';
                                // echo $row['id'];
                                // echo '" type="button" onClick="removeSMSid(this.id)" class="btn btn-icons btn-rounded btn-danger"  data-toggle="modal" data-target="#removeUser">
                                //   <i class="fa fa-times"></i></button>&nbsp';
                                echo '</td>';
                                echo '</tr>'; 

                                $count=$count+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            

              <!-- Residency Indicator -->
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Residency Indicators</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:10%;">#</th>
                          <th style="width:30%;">Range</th>
                          <th style="width:30%;">Points</th>
                          <th style="width:30%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="APPROVED";
                          $usertype="admin";
                          $sql = "SELECT * FROM tbl_residency_indicator_a ORDER BY points DESC";
                          $result = $conn->query($sql);
                          $count=1;
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $count;
                                echo '</td>';
                                echo '<td>';
                                echo $row['label'];
                                echo '</td>';
                                 echo '<td>';
                                echo number_format($row['points'],2);
                                echo '</td>';
                                echo '<td>';
                                 echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-success"  data-toggle="modal" data-target="#editResidency';
                                 echo $row['id'];
                                echo '">
                                  <i class="fa fa-pencil"></i></button>&nbsp';
                                //     echo '<button id="';
                                // echo $row['id'];
                                // echo '" type="button" onClick="removeSMSid(this.id)" class="btn btn-icons btn-rounded btn-danger"  data-toggle="modal" data-target="#removeUser">
                                //   <i class="fa fa-times"></i></button>&nbsp';
                                echo '</td>';
                                echo '</tr>'; 

                                $count=$count+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

               <!-- Others Indicator -->
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Others Indicators</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:10%;">#</th>
                          <th style="width:30%;">Label</th>
                          <th style="width:30%;">Points</th>
                          <th style="width:30%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="APPROVED";
                          $usertype="admin";
                          $sql = "SELECT * FROM tbl_other_indicator_a ORDER BY points DESC";
                          $result = $conn->query($sql);
                          $count=1;
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $count;
                                echo '</td>';
                                echo '<td>';
                                echo $row['label'];
                                echo '</td>';
                                 echo '<td>';
                                echo number_format($row['points'],2);
                                echo '</td>';
                                echo '<td>';
                                 echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-success"  data-toggle="modal" data-target="#editOther';
                                 echo $row['id'];
                                echo '">
                                  <i class="fa fa-pencil"></i></button>&nbsp';
                                //     echo '<button id="';
                                // echo $row['id'];
                                // echo '" type="button" onClick="removeSMSid(this.id)" class="btn btn-icons btn-rounded btn-danger"  data-toggle="modal" data-target="#removeUser">
                                //   <i class="fa fa-times"></i></button>&nbsp';
                                echo '</td>';
                                echo '</tr>'; 

                                $count=$count+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


            </div>
            
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php
              include 'footer.php';
         ?>
          <!-- partial -->
        </div>


    <!-- Modal -->

<div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="removeSMS.php" method="POST">
      <div class="modal-body">
        Press [Yes] if you want to remove this message.
        <input type="hidden" name="smsid" id="smsid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Yes</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="addSMS.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <label>Title</label>
              <input type="text" name="title" class="form-control">
            </div>
             
          </div>
          <div class="col-sm-12">
            <div class="form-group row">
              <label>Message</label>
               <textarea class="form-control" name="message"></textarea>
            </div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>

<!-- End Modal -->

 <?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_exam_indicator ORDER BY points DESC";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editExam';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="EXAM">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Label</label>
               <input type="text" class="form-control" name="label" value="';
               echo $row1['label'];
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Minimum Value</label>
               <input type="number" step=".01" class="form-control" name="min" value="';
               echo number_format($row1['min'],2);
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Maximum Value</label>
               <input type="number" step=".01" class="form-control" name="max" value="';
               echo number_format($row1['max'],2);
               echo '">';
              
            echo '</div>
             
          </div>
          <div class="col-md-12">
            <div class="form-group">
               <label>Points</label>
               <input type="number" step=".01" class="form-control" name="points" value="';
               echo number_format($row1['points'],2);
               echo '">';
              
            echo '</div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>

<?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_grade_indicator_a ORDER BY points DESC";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editGrade';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="GRADE">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Label</label>
               <input type="text" class="form-control" name="label" value="';
               echo $row1['label'];
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Minimum Value</label>
               <input type="number" step=".01" class="form-control" name="min" value="';
               echo number_format($row1['min'],2);
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Maximum Value</label>
               <input type="number" step=".01" class="form-control" name="max" value="';
               echo number_format($row1['max'],2);
               echo '">';
              
            echo '</div>
             
          </div>
          <div class="col-md-12">
            <div class="form-group">
               <label>Points</label>
               <input type="number" step=".01" class="form-control" name="points" value="';
               echo number_format($row1['points'],2);
               echo '">';
              
            echo '</div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>


<?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_income_indicator_a ORDER BY points DESC";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editIncome';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="INCOME">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Label</label>
               <input type="text" class="form-control" name="label" value="';
               echo $row1['label'];
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Minimum Value</label>
               <input type="number" class="form-control" name="min" value="';
               echo $row1['min'];
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Maximum Value</label>
               <input type="number" class="form-control" name="max" value="';
               echo $row1['max'];
               echo '">';
              
            echo '</div>
             
          </div>
          <div class="col-md-12">
            <div class="form-group">
               <label>Points</label>
               <input type="number" step=".01" class="form-control" name="points" value="';
               echo number_format($row1['points'],2);
               echo '">';
              
            echo '</div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>
<?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_residency_indicator_a ORDER BY points DESC";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editResidency';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="RESIDENCY">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Label</label>
               <input type="text" class="form-control" name="label" value="';
               echo $row1['label'];
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Minimum Value</label>
               <input type="number" step=".01" class="form-control" name="min" value="';
               echo number_format($row1['min'],0);
               echo '">';
              
            echo '</div>
             
          </div>
           <div class="col-md-12">
            <div class="form-group">
               <label>Maximum Value</label>
               <input type="number" step=".01" class="form-control" name="max" value="';
               echo number_format($row1['max'],0);
               echo '">';
              
            echo '</div>
             
          </div>
          <div class="col-md-12">
            <div class="form-group">
               <label>Points</label>
               <input type="number" step=".01" class="form-control" name="points" value="';
               echo number_format($row1['points'],2);
               echo '">';
              
            echo '</div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>

<?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_other_indicator_a ORDER BY points DESC";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editOther';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="OTHER">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Label</label>
               <input type="text" class="form-control" name="label" value="';
               echo $row1['label'];
               echo '" disabled>';
              
            echo '</div>
             
          </div>
          
          
          <div class="col-md-12">
            <div class="form-group">
               <label>Points</label>
               <input type="number" step=".01" class="form-control" name="points" value="';
               echo number_format($row1['points'],2);
               echo '">';
              
            echo '</div>
             
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>

<?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_point_system";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editPoint';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Range/Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updatePointSystemA.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="process" value="POINT">
              <input type="hidden" name="id" value="';
              echo $row1['id'];
              echo '">
               <label>Point System</label>';
               echo '<select class="form-control" name="point_system">';
                if($row1['point_system']=="POINT SYSTEM A"){
                  echo '<option selected="selected" value="POINT SYSTEM A">POINT SYSTEM A</option>';
                  echo '<option value="POINT SYSTEM B">POINT SYSTEM B</option>';
                }else{
                   echo '<option selected="selected" value="POINT SYSTEM B">POINT SYSTEM B</option>';
                  echo '<option value="POINT SYSTEM A">POINT SYSTEM A</option>';
                }
               echo '</select>';
              
            echo '</div>
             
          </div>
          
          
         
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>';

}
}
?>
<!-- End Modal -->

          <!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to log out your account.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="logout.php" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assetss/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assetss/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../assetss/js/shared/off-canvas.js"></script>
    <script src="../assetss/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assetss/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>