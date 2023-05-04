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
<div class="container" style="padding-top:3%;">
<div class="container" style="background-color:white;border-radius:10px;">
        <center>

          <div class="col-lg-2"> </div>

          <div class="col-lg-8">

          <h4 style="color:#ED9D58;"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h4>
          <hr>

          </div>


           <div class="row" style="padding-top:2%;"> 

              <div class="col-lg-2"> </div>

            <div class="col-lg-8"> 

                     <div class="container">
                        <h2 style="padding-bottom:1%;"> SUPER ADMIN </h2>
                        <div class="card">
                          <a href="superadmin.php" style="text-decoration: none;"> <div class="card-header"> Add Admin </div> </a>
                          <a href="superadminlist.php" style="text-decoration: none;"><div class="card-body"> View Applicant List </div></a> 
                          <div class="card-footer"> Import CSV Files</div>
                        </div>
                      </div>

                    </div>

                 <?php
         if(isset($_POST["submit"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "eps";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 

 
  $fusername = $_POST['username'];
  $fpassword = $_POST['password'];

            $query=mysqli_query($conn,"select * from `tbl_admin` where username='$fusername'");
            $num_rows=mysqli_num_rows($query);
            $row=mysqli_fetch_array($query);
           
            if ($num_rows>0){
                  echo '<script language="javascript">';
                  echo 'alert("ADMIN ALREADY EXISTING")';
                  echo '</script>';
            }
            else{

            $sql = "INSERT INTO tbl_admin (username,password) VALUES ('".$_POST["username"]."','".$_POST["password"]."')";

            if (mysqli_query($conn, $sql)) {
                  echo '<script language="javascript">';
                  echo 'alert("ADMIN SUCCESSFULLY ADDED")';
                  echo '</script>';
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
            }
      ?>

            



          <div class="row" style="padding-top:3%;">

         </div>


          

          <div class="col-lg-2"></div>

        </center>
    </div>
</div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
