<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EPS</title>
    <link rel="icon" href="img/logo.png">
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
<div class="container" style="padding-top:3%;">
<div class="container" style="background-color:white;border-radius:10px;">
        <center>

          <div class="col-lg-2"> </div>

          <div class="col-lg-8">

          <h4 style="color:#ED9D58;"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h4>
          <hr>

          </div>

          <div class="row" style="padding-bottom:5%;">

            <div class="col-lg-3"> </div>

            <div class="col-lg-6"> 

            <h5 style="color:#ED9D58;"> HELLO SUPPER ADMIN! </h5>

            </div>

          </div>

          <div class="row" >

            <div class="col-lg-3"> </div>

            <div class="col-lg-6" style="background-color:#ED9D58;border-radius:5px;"> 

            <h5 style="color:white;"> add another admin </h5>

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

            </div>

          </div>


          <div class="row" style="padding-top:3%;">

            <div class="col-lg-3"> </div>

            <div class="col-lg-6"> 


            <form action="" method="post"> 
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" required>
            </div>

            </div>

          </div>

           <div class="row">

            <div class="col-lg-3"> </div>

            <div class="col-lg-6"> 

            <div class="form-group">
              <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
            </div>

            </div>

          </div>


          <div class="row">

            <div class="col-lg-12"> 

               <button class="btn btn-warning btn-lg" type="submit" value="Submit" name="submit" style="color:white;"> Add </button>
               <!--<input type = "submit" value ="Submit" name = "submit"/>-->

            </div>

          </div>
         </form>


          

          <div class="col-lg-2"></div>

        </center>
    </div>
</div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
