<html lang="en">
 
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 
</head>
 
<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="try1.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Form Name</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
 
            </div>
            <?php
               get_all_records();
               function get_all_records(){
                require_once 'config.php';
                $Sql = "SELECT * FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id= ui.id LEFT JOIN tbl_school as s on s.id = ui.id";
                $result = mysqli_query($conn, $Sql);  


                if (mysqli_num_rows($result) > 0) {
                 echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                         <thead><tr>
                                      <th>First Name</th>
                                      <th>Middle Name</th>
                                      <th>Last Name</th>
                                      <th>Date Of Birth</th>
                                      <th>Age</th>
                                      <th>Sex</th>
                                      <th>Place Of Birth</th>
                                      <th>Citizenship</th>
                                      <th>Email Address</th>
                                      <th>Street Number</th>
                                      <th>Road Name</th>
                                      <th>Barangay</th>
                                      <th>Postal Code</th>
                                      <th>Town</th>
                                      <th>Province</th>
                                      <th>Country</th>
                                      <th>Year Completed</th>
                                      <th>GWA</th>
                                      <th>School Intended</th>
                                      <th>Last School Attended</th>
                                      <th>Exam Rating</th>
                                      <th>Course</th>
                                      <th>Scholarship</th>
                                    </tr></thead><tbody>";


                 while($row = mysqli_fetch_assoc($result)) {

                     echo "<tr>
                               <td>" . $row['FirstName']."</td>
                               <td>" . $row['MiddleName']."</td>
                               <td>" . $row['LastName']."</td>
                               <td>" . $row['DateOfBirth']."</td>
                               <td>" . $row['Age']."</td>
                               <td>" . $row['Sex']."</td>
                               <td>" . $row['PlaceOfBirth']."</td>
                               <td>" . $row['Citizenship']."</td>
                               <td>" . $row['EmailAddress']."</td>
                               <td>" . $row['StreetNumber']."</td>
                               <td>" . $row['RoadName']."</td>
                               <td>" . $row['Barangay']."</td>
                               <td>" . $row['PostalCode']."</td>
                               <td>" . $row['Town']."</td>
                               <td>" . $row['Province']."</td>
                               <td>" . $row['Country']."</td>
                               <td>" . $row['YearCompleted']."</td>
                               <td>" . $row['GWA']."</td>
                               <td>" . $row['SchoolIntended']."</td>
                               <td>" . $row['LastSchoolAttended']."</td>
                               <td>" . $row['ExamRating']."</td>
                               <td>" . $row['Course']."</td>
                               <td>" . $row['Scholarship']."</td>
                               </tr>";        
                 }
                
                 echo "</tbody></table></div>";
                 
            } else {
                 echo "you have no records";
                 }
            }
            ?>
        </div>
    </div>

</body>
 
</html>