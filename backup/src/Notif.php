<link rel="stylesheet" href="newtemplate.css">
<div class="navbar-menu-wrapper d-flex align-items-center">
<script>
  function logout(){

     var txt;
      var r = confirm("Do you want to logout?");
      if (r == true) {
        window.open("logout.php","_self");
      } else {

      }
  }


</script>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="profile/<?php echo $_SESSION['image'] ?>" alt="Profile image">  <?php

                if(($_SESSION['usertype']!="shs")&&($_SESSION['usertype']!="college")){
                   require 'config.php';
                     $notifnum=0;
                     $status="NEWAPPLICANT";
                     $shs ="shs";
                     $college = "college";
                     $typecollege = "collegerecipient";
                     $typecollege1 = "fullscholar";

                     $sql1 = "SELECT COUNT(*) as shs FROM tbl_admin WHERE usertype='$college' AND typescholar='$typecollege' AND status='$status'";
                      $result1 = $conn->query($sql1);
                      $row1 = $result1->fetch_assoc();

                      $sql2 = "SELECT COUNT(*) as shs FROM tbl_admin WHERE usertype='$college' AND typescholar='$typecollege1' AND status='$status'";
                      $result2 = $conn->query($sql2);
                      $row2 = $result2->fetch_assoc();

                      $sql = "SELECT COUNT(*) as shs FROM tbl_admin WHERE usertype='$shs' AND status='$status'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();

                      $notifnum = $row1['shs']+$row['shs']+$row2['shs'];
                      if($notifnum<=0){

                      }else{
                         echo '<span class="badge badge-pill badge-danger">';
                         echo $notifnum;
                         echo '</span>';
                      }
                }


                ?> </a>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown"  aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="profile/<?php echo $_SESSION['image'] ?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">
                    <?php echo $_SESSION["firstname"].' '.$_SESSION["lastname"];
                    ?>
                  </p>
                  <p class="font-weight-light text-muted mb-0">
                    <?php
                    if($_SESSION['usertype']=="superadmin"){
                        echo 'Super Admin';
                    }else if($_SESSION['usertype']=="admin"){
                        echo 'Admin';
                    }else if($_SESSION['usertype']=="shs"){
                        echo 'SHS Student';
                    }else if($_SESSION['usertype']=="college"){
                        echo 'College Student';
                    }
                    ?>
                  </p>
                </div>
                <?php
                  if(($_SESSION['usertype']=="superadmin")||($_SESSION['usertype']=="admin")){
                       echo '<a href="newCollegeFullScholar.php" class="dropdown-item">College Scholarship Applicant ';

                      if($row2['shs']<=0){

                      }else{
                        echo '<span class="badge badge-pill badge-danger">';
                        echo $row2['shs'];
                        echo '</span><i class="dropdown-item-icon ti-dashboard"></i></a>';
                      }

                     echo '<a href="newCollegeRecipient.php" class="dropdown-item">College EA Applicant ';

                      if($row1['shs']<=0){

                      }else{
                        echo '<span class="badge badge-pill badge-danger">';
                        echo $row1['shs'];
                        echo '</span><i class="dropdown-item-icon ti-dashboard"></i></a>';
                      }



                    echo '<a href="newSHS.php" class="dropdown-item">Senior High EA Applicant ';

                      if($row['shs']<=0){

                      }else{
                         echo '<span class="badge badge-pill badge-danger">';
                        echo $row['shs'];
                        echo '</span><i class="dropdown-item-icon ti-dashboard"></i></a>';
                      }

                  }
                ?>
                <hr>

                 <hr>
                <!-- <a href="personalprofile.php" class="dropdown-item">View/Edit Profile </a> -->
                <a href="#" onClick="logout()" class="dropdown-item">Log Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
             <!-- Notif -->

          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
