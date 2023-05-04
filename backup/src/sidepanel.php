<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="profile/<?php echo $_SESSION['image'] ?>" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <!--  <?php
                // echo '<p class="profile-name">';
                // echo '</p>';
                ?> -->
          <p class="profile-name">
            <?php
            echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
            ?>
          </p>
          <p class="designation">
            <?php
            if ($_SESSION['usertype'] == "superadmin") {
              echo 'Super Admin';
            } else if ($_SESSION['usertype'] == "admin") {
              echo 'Admin';
            } else if ($_SESSION['usertype'] == "shs") {
              echo 'SHS Student';
            } else if ($_SESSION['usertype'] == "college") {
              echo 'College Student';
            } else if ($_SESSION['usertype'] == "committee") {
              echo 'Committee';
            }
            ?>
          </p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>

    <?php
    if ($_SESSION['usertype'] == "superadmin") {
      echo '<li class="nav-item">
              <a class="nav-link" href="dashboards.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#college" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">New Applicant</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="college">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="newCollegeFullScholar.php">College Scholarship </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=New Applicant"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=New Applicant""> College EA (Private) </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="newSHS.php">Senior High EA </a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#interview" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">For Interview</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="interview">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="interviewCollegeFullScholar.php">College Scholarship </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Interview"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Interview""> College EA (Private) </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="interviewSHS.php">Senior High EA</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#assessment" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">For Assessment</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="assessment">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentCollegeFullScholar.php">College Scholarship </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Assessment"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Assessment""> College EA (Private) </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="assessmentSHS.php">Senior High EA</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#removeapplicant" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Removed Applicant</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="removeapplicant">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="removedApplicantFulls.php">College Scholarship </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=RemovedApplicant"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=RemovedApplicant""> College EA (Private) </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="removedApplicantSH.php">Senior High EA</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#senior" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Current Scholars & Recipients</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="senior">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="collegefullscholar.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Current"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Current""> College EA (Private) </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="seniorhigh.php">SHS Recipients</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#assess" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Assessment </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="assess">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="assess_collegefullscholar.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Assess"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Assess""> College EA (Private) </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="assess_seniorhigh.php">SHS Recipients</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renewal" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Renewal </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renewal">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="renew_collegefullscholar.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Renew"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Renew""> College EA (Private) </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="renew_seniorhigh.php">SHS Recipients</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#removescholar" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Removed </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="removescholar">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="removedScholarFulls.php">Scholars </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="removedScholarRecipient.php"> College Recipients </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="removedScholarSH.php">SHS Recipients </a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#oldrecords" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Graduate </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="oldrecords">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="oldCollegeRecordFull.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="oldCollegeRecord.php">College Recipients</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="oldRecordSeniorHigh.php">SHS Recipients</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="newRecord.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Upload Records</span>
              </a>
            </li>';

      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Report Applicants</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="reportsRemovedApplicant.php">Removed Applicants</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="reportAssessment.php">Assessment</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="reportOfficialResult.php">Official Result</a>
                  </li>


                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Report Scholars & Recipients</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="reportCurrentAssessment.php">Assessment</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="transferResult.php">Transfer Report</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="removedReportScholars.php">Removed Scholars & Recipients</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="reportOfficialCurrentResult.php">Official Result</a>
                  </li>
                    <li class="nav-item">
                  <a class="nav-link" href="assessmentRequirementsReport.php">Assessment Requirements</a>
                  </li>
                    <li class="nav-item">
                  <a class="nav-link" href="renewalRequirementsReport.php">Renewal Requirements</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="graduateReport.php">Graduates</a>
                  </li>
                   <li class="nav-item">
                   <a class="nav-link" href="blockReport.php">Blocked SHS Recipients</a>
                  </li>



                </ul>
              </div>
            </li>
           <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#userlist" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="userlist">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="userlist.php">Add/List User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="removedUser.php">Removed User</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="smsSettings.php">SMS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="barangay.php">List of Barangay</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="occupation.php">List of Occupation</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="partner_school.php">List of Partner School</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="assessmentSettings.php">Assessment Settings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Manage Home Page</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="application.php">Manage Application</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="manageAssessment.php">Scholars & Recipients Assessment</a>
                  </li>
                   </li>
                     <li class="nav-item">
                    <a class="nav-link" href="pointSystem.php">Point System (Scholars)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pointSystemAssistance.php">Point System (Assistance)</a>

                    </li>
                     <li class="nav-item">
                    <a class="nav-link" href="managePin.php">Pin</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#exam" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Exam</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="exam">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="examFormula.php">Exam Base</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="questBank.php">Question Bank</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="sectionList.php">List of Section</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="examList.php">List of Exam</a>
                  </li>


                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="requestpassword.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Request Password</span>';

      require "config.php";
      $status = "UNREAD";
      $sql = "SELECT COUNT(*) as counts FROM tbl_password WHERE status='$status'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];
      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo $total;
        echo '</span>';
      } else {
      }

      echo '</a>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renewassess" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Assessment Notif</span>';


      require "config.php";
      $schoolid = 2;
      $reg = 2;
      $sc = 2;
      $grade = 2;

      $renew_status = "CURRENT";
      $sqla = "SELECT * FROM tbl_renew_year WHERE status='$renew_status'";
      $resulta = $conn->query($sqla);
      $rowa = $resulta->fetch_assoc();

      $renew_id = isset($rowa['id']);


      $sql = "SELECT COUNT(*) as counts FROM tbl_assess_req WHERE academic_id='$renew_id' AND (school_id='$schoolid' OR registration_form='$reg' OR school_clearance='$sc' OR  gradereport='$grade')";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];


      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo '!';
        echo '</span>';
      } else {
      }



      echo '<i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renewassess">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_CollegeFull.php">Scholars ';

      echo '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_CollegeRecipient.php">College Recipients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_SHS.php">SHS Recipients</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renew" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Renew Notif</span>';


      require "config.php";
      $schoolid = 2;
      $reg = 2;
      $sc = 2;
      $grade = 2;
      $sql = "SELECT COUNT(*) as counts FROM  tbl_renew WHERE academic_id='$renew_id' AND (school_id='$schoolid' OR registration_form='$reg')";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];


      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo '!';
        echo '</span>';
      } else {
      }



      echo '<i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renew">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                    <a class="nav-link" href="renewNotif_CollegeFull.php">Scholars ';

      echo '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="renewNotif_CollegeRecipient.php">College Recipients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="renewNotif_SHS.php">SHS Recipients</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="personalprofile.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>';
    }
    if ($_SESSION['usertype'] == "admin") {
      echo '<li class="nav-item">
             <a class="nav-link" href="dashboards.php">
               <i class="menu-icon typcn typcn-document-text"></i>
               <span class="menu-title">Dashboard</span>
             </a>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#college" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">New Applicant</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="college">
               <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                   <a class="nav-link" href="newCollegeFullScholar.php">College Scholarship </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=New Applicant"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=New Applicant""> College EA (Private) </a>
                 </li>

                  <li class="nav-item">
                   <a class="nav-link" href="newSHS.php">Senior High EA </a>
                 </li>

               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#interview" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">For Interview</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="interview">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                   <a class="nav-link" href="interviewCollegeFullScholar.php">College Scholarship </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=Interview"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=Interview""> College EA (Private) </a>
                 </li>

                  <li class="nav-item">
                   <a class="nav-link" href="interviewSHS.php">Senior High EA</a>
                 </li>

               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#assessment" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">For Assessment</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="assessment">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                   <a class="nav-link" href="assessmentCollegeFullScholar.php">College Scholarship </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=Assessment"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=Assessment""> College EA (Private) </a>
                 </li>

                  <li class="nav-item">
                   <a class="nav-link" href="assessmentSHS.php">Senior High EA</a>
                 </li>

               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#removeapplicant" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">Removed Applicant</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="removeapplicant">
               <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                   <a class="nav-link" href="removedApplicantFulls.php">College Scholarship </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=RemovedApplicant"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=RemovedApplicant""> College EA (Private) </a>
                 </li>

                  <li class="nav-item">
                   <a class="nav-link" href="removedApplicantSH.php">Senior High EA</a>
                 </li>

               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#senior" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">Current Scholars & Recipients</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="senior">
               <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                   <a class="nav-link" href="collegefullscholar.php">Scholars</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=Current"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=Current""> College EA (Private) </a>
                 </li>

                 <li class="nav-item">
                   <a class="nav-link" href="seniorhigh.php">SHS Recipients</a>
                 </li>

               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#assess" aria-expanded="false" aria-controls="ui-basic">
               <i class="menu-icon typcn typcn-coffee"></i>
               <span class="menu-title">Assessment </span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="assess">
               <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                   <a class="nav-link" href="assess_collegefullscholar.php">Scholars</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Public&process=Assess"> College EA (Public) </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="categoryrecipient.php?category=Private&process=Assess""> College EA (Private) </a>
                 </li>

                 <li class="nav-item">
                   <a class="nav-link" href="assess_seniorhigh.php">SHS Recipients</a>
                 </li>
               </ul>
             </div>
           </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renewal" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Renewal </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renewal">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="renew_collegefullscholar.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Public&process=Renew"> College EA (Public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categoryrecipient.php?category=Private&process=Renew""> College EA (Private) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="renew_seniorhigh.php">SHS Recipients</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#removescholar" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Removed </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="removescholar">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="removedScholarFulls.php">Scholars </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="removedScholarRecipient.php"> College Recipients </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="removedScholarSH.php">SHS Recipients </a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#oldrecords" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Graduate </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="oldrecords">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="oldCollegeRecordFull.php">Scholars</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="oldCollegeRecord.php">College Recipients</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="oldRecordSeniorHigh.php">SHS Recipients</a>
                  </li>

                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="newRecord.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Upload Records</span>
              </a>
            </li>';

      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Report Applicants</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="reportsRemovedApplicant.php">Removed Applicants</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="reportAssessment.php">Assessment</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="reportOfficialResult.php">Official Result</a>
                  </li>


                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Report Scholars & Recipients</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="reportCurrentAssessment.php">Assessment</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="transferResult.php">Transfer Report</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="removedReportScholars.php">Removed Scholars & Recipients</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="reportOfficialCurrentResult.php">Official Result</a>
                  </li>
                    <li class="nav-item">
                  <a class="nav-link" href="assessmentRequirementsReport.php">Assessment Requirements</a>
                  </li>
                    <li class="nav-item">
                  <a class="nav-link" href="renewalRequirementsReport.php">Renewal Requirements</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="graduateReport.php">Graduates</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="blockReport.php">Blocked SHS Recipients</a>
                  </li>


                </ul>
              </div>
            </li>
          ';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="smsSettings.php">SMS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="barangay.php">List of Barangay</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="occupation.php">List of Occupation</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="partner_school.php">List of Partner School</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="assessmentSettings.php">Assessment Settings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Manage Home Page</a>
                  </li>
                    
                     <li class="nav-item">
                    <a class="nav-link" href="manageAssessment.php">Scholars & Recipients Assessment</a>
                  </li>
                   </li>
                     <li class="nav-item">
                    <a class="nav-link" href="pointSystem.php">Point System (Scholars)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pointSystemAssistance.php">Point System (Assistance)</a>

                    </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#exam" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Exam</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="exam">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                    <a class="nav-link" href="examFormula.php">Exam Base</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="questBank.php">Question Bank</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="sectionList.php">List of Section</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="examList.php">List of Exam</a>
                  </li>


                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="requestpassword.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Request Password</span>';

      require "config.php";
      $status = "UNREAD";
      $sql = "SELECT COUNT(*) as counts FROM tbl_password WHERE status='$status'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];
      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo $total;
        echo '</span>';
      } else {
      }

      echo '</a>
            </li>';

      $renew_status = "CURRENT";
      $sqla = "SELECT * FROM tbl_renew_year WHERE status='$renew_status'";
      $resulta = $conn->query($sqla);
      $rowa = $resulta->fetch_assoc();

      $renew_id = isset($rowa['id']);




      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renewassess" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Assessment Notif</span>';


      require "config.php";
      $schoolid = 2;
      $reg = 2;
      $sc = 2;
      $grade = 2;
      $sql = "SELECT COUNT(*) as counts FROM tbl_assess_req WHERE academic_id='$renew_id' AND (school_id='$schoolid' OR registration_form='$reg' OR school_clearance='$sc' OR  gradereport='$grade')";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];


      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo '!';
        echo '</span>';
      } else {
      }



      echo '<i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renewassess">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_CollegeFull.php">Scholars ';

      echo '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_CollegeRecipient.php">College Recipients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="assessmentNotif_SHS.php">SHS Recipients</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#renew" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Renew Notif</span>';


      require "config.php";
      $schoolid = 2;
      $reg = 2;
      $sc = 2;
      $grade = 2;
      $sql = "SELECT COUNT(*) as counts FROM  tbl_renew WHERE academic_id='$renew_id' AND (school_id='$schoolid' OR registration_form='$reg')";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $total = $row['counts'];


      if ($total > 0) {
        echo '<span class="badge badge-pill badge-danger">';
        echo '!';
        echo '</span>';
      } else {
      }



      echo '<i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="renew">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="renewNotif_CollegeFull.php">Scholars ';

      echo '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="renewNotif_CollegeRecipient.php">College Recipients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="renewNotif_SHS.php">SHS Recipients</a>
                  </li>
                </ul>
              </div>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" href="personalprofile.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>';
      // <li class="nav-item">
      //   <a class="nav-link" href="pages/ui-features/dropdowns.html">Approved Applicant</a>
      // </li>
      // <li class="nav-item">
      //   <a class="nav-link" href="pages/ui-features/typography.html">Removed Applicant</a>
      // </li>
    } else if (($_SESSION['usertype'] == "shs") || ($_SESSION['usertype'] == "college")) {

      require "config.php";
      $status = "APPROVED";
      $statuss = "";
      $username = $_SESSION['username'];
      $academic_year = "";
      $academic_id = "";
      $application_no = "";
      $sql5 = "SELECT * FROM tbl_admin WHERE username='$username'";
      $result5 = $conn->query($sql5);
      if ($result5->num_rows > 0) {
        $row5 = $result5->fetch_assoc();
        $statuss = $row5['status'];
        $academic_year = $row5['academic_year'];
        $application_no = $row5['application_no'];
        $user_id = $row5['id'];
      }

      if (($statuss == "NEWAPPLICANT") || ($statuss == "PREAPPLICATION")) {
        if ($statuss == "PREAPPLICATION") {
          echo ' <li class="nav-item">
                        <a class="nav-link" href="updatestudent.php">
                          <i class="menu-icon typcn typcn-document-text"></i>
                          <span class="menu-title">Profile</span>
                        </a>
                        </li>';
        } else {
          echo ' <li class="nav-item">
                        <a class="nav-link" href="updatestudent.php">
                          <i class="menu-icon typcn typcn-document-text"></i>
                          <span class="menu-title">Profile</span>
                        </a>
                        </li>';
          echo ' <li class="nav-item">
                    <a class="nav-link" href="uploadrequirements.php">
                      <i class="menu-icon typcn typcn-document-text"></i>
                      <span class="menu-title">Requirements';
          echo '</span>
                    </a>
                    </li>';
        }
      } else  if (($statuss == "OK") || ($statuss == "RENEW") || ($statuss == "ASSESS")) {
        echo ' <li class="nav-item">
                <a class="nav-link" href="updatestudent.php">
                  <i class="menu-icon typcn typcn-document-text"></i>
                  <span class="menu-title">Profile</span>
                </a>
                </li>';
        $status1 = "OPEN";
        $status2 = "CURRENT";
        $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();
        $academic_id = $rowa['id'];


        $status1 = "OPEN";
        $status2 = "CURRENT";
        $sql6 = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
        $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0) {
          $row6 = $result6->fetch_assoc();
          echo ' <li class="nav-item">
                        <a class="nav-link" href="assessRequirement.php">
                          <i class="menu-icon typcn typcn-document-text"></i>
                          <span class="menu-title">Assessment Requirements';
          echo '</span>
                        </a>
                        </li>';
        }




        $sql7 = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no' AND status='For Renewal'";
        $result7 = $conn->query($sql7);
        if ($result7->num_rows > 0) {
          $row7 = $result7->fetch_assoc();
          echo ' <li class="nav-item">
                        <a class="nav-link" href="renewalRequirements.php">
                          <i class="menu-icon typcn typcn-document-text"></i>
                          <span class="menu-title">Renewal Requirements';
          echo '</span>
                        </a>
                        </li>';
        }
      }
      $st = "OPEN";
      $st1 = "CURRENT";
      $sqly = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
      $resulty = $conn->query($sqly);
      $rowy = $resulty->fetch_assoc();

      date_default_timezone_set("Asia/Manila");
      $year = date('Y');
      $month = date('m');
      $day = date('d');
      $hour = date('G');
      $min = date('i');
      $sec = date('s');

      $dates = $year . "-" . $month . "-" . $day;

      $acads = $rowy['id'];
      $exam_status = "OPEN";
      $sql8 = "SELECT * FROM tbl_student_exam WHERE academic_id='$acads' AND user_id='$user_id' AND status='$exam_status'";
      $result8 = $conn->query($sql8);
      if ($result8->num_rows > 0) {
        $row8 = $result8->fetch_assoc();
        //

        echo ' <li class="nav-item">
                              <a class="nav-link" href="onlineExam.php">
                                <i class="menu-icon typcn typcn-document-text"></i>
                                <span class="menu-title">Online Exam';
        echo '</span>
                              </a>
                              </li>';




        //

      }

      echo '<li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>';
    } else if ($_SESSION['usertype'] == "committee") {
      echo '<li class="nav-item">
              <a class="nav-link" href="committee_dashboard.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>';
      echo '<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#assessment" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">For Assessment</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="assessment">
                <ul class="nav flex-column sub-menu">';
      $typescholar = "collegerecipient";
      $sql = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if ($row['status'] == "OPEN") {
        echo '<li class="nav-item">
                              <a class="nav-link" href="assessmentCollegeRecipient.php"> College Financial Assistance </a>
                            </li>';
      }

      $typescholar = "shscholar";
      $sql = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if ($row['status'] == "OPEN") {
        echo '<li class="nav-item">
                    <a class="nav-link" href="assessmentSHS.php">Senior High </a>
                  </li>';
      }


      echo '</ul>
              </div>
            </li>';
    }
    ?>

  </ul>
</nav>