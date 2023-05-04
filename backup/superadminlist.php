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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EPS</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" href="img/logo.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <style>
        body {
      background: url('img/background.jpg')  no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }

   </style>


  </head>

  <body>

    <!-- Page Content -->
<div class="container" style="padding-top:10%;">
<div class="container" style="background-color:white;border-radius:10px;">
        <center>

          <div class="col-lg-2"> </div>

          <div class="col-lg-8">

          <h4 style="color:#ED9D58;"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h4>
          <hr>

          
         <h5 style="color:#ED9D58;padding-top:2%;padding-bottom:2%;"> List of Applicants </h5>
         



<?php
// define variables and set to empty values
$Message = $ErrorUname = $ErrorPass = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $checker = "admin"; //checker if you are a superadmin or not a superadmin
    $username = check_input($_POST["username"]);
 
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
      $ErrorUname = "Space and special characters not allowed but you can use underscore(_)."; 
    }
  else{
    $fusername=$username;
  }
 
  $fpassword = check_input($_POST["password"]);
 
  if ($ErrorUname!=""){
  $Message = "Login failed! Errors found";
  }
  else{

  $query=mysqli_query($conn,"select * from `tbl_admin` where username='$fusername' && password='$fpassword'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
 
  if ($num_rows>0){
    if($fusername==$checker){
    header("Location: superadminlist.php");
    }
    else{
    header("Location: index.php");
    }
  }
  else{
  echo '<script language="javascript">';
  echo 'alert("WRONG PASSWORD/USERNAME")';
  echo '</script>';
  }
 
  }
}
 
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

          </div>



  <table class='table table-sm' id="tbl-user">
    <?php
      $sqlStr = "SELECT * FROM tbl_userinfo;";

      $result = $conn->query($sqlStr);

      if ($result->num_rows > 0) {

          echo "
          <thead>
            <tr>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>View Applicant's Details</th>
            </tr>
          </thead>
          ";

          echo "<tbody>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" 
              . $row["FirstName"]. "</td><td>" 
                      . $row["MiddleName"]. "</td><td>" 
                      . $row["LastName"]. "</td>" 
                      . "<td> <a href='view.php?id={$row["id"]}'>View</a>" //for view
                      . "</td></tr>";
          }
          echo "</tbody>";
      }
    ?>
  </table>

    <?php
  if ($Message=="Login Successful!"){
  }
  else{
  }
 
?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#tbl-user").DataTable();
      });

    </script>
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