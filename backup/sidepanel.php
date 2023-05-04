 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladmin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normaladminapprove.php">
            <i class="fa fa-fw fa-user"></i>

            <?php
              include('config.php');
              $app =0;
               $query=mysqli_query($conn,"SELECT COUNT(*) as counts FROM tbl_userinfo WHERE approve = '$app'");
                $num_rows=mysqli_num_rows($query);
                $row=mysqli_fetch_array($query);
               if($row['counts']>0){
                  echo ' <span class="nav-link-text" style="color:red;"> Approve Applicant Request </span>';
               }else{
                   echo ' <span class="nav-link-text"> Approve Applicant Request </span>';
               }

            ?>

           
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