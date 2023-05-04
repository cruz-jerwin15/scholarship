<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="jquery.js" type="text/javascript"> </script>
    <script type="text/javascript">
      function displaydata(){
        $.post("GetID.php",{},function(data){

          var myData = data.split(" $ ");
          sessionStorage.setItem("data", myData);
          window.location.href = "generated_application_form.php";

        });
      }

     </script>

    <title>EPS</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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


          
          <div class="col-lg-9">
          
         <h5 style="color:#ED9D58;padding-top:2%;padding-bottom:2%;"> THANK YOU FOR SUBMMITTING YOUR APPLICATION 


          <?php

        require_once 'config.php';
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sqlStr = "SELECT * FROM tbl_userinfo  where id = '".$id."' ";

        $result = $conn->query($sqlStr);

        if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

          echo $row["LastName"];
          echo '!';
         }
         }
          ?>


          <div class="col-lg-12" style="padding-top:5%;"> 

               <a class="btn btn-primary pull-right" onclick="displaydata()" "><i class="glyphicon glyphicon-download"></i> Download PDF </a>
             

          </div>


         </h5>
          
          </div>




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
  include('config.php');

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





    <?php
  if ($Message=="Login Successful!"){
  }
  else{
  }
 
?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
