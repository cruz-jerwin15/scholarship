<?php
  include('config.php');
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
         

          </div>



  <table class='table table-striped' id="tbl-user">
    <?php
      $sqlStr = "CALL sp_get_users();";

      $result = $conn->query($sqlStr);

      if ($result->num_rows > 0) {
          $rowCount = 1;
          echo "
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Education</th>
              <th>Year Level</th>
              <th>Batch</th>
              <th>Brgy</th>
              <th>Last School Attended</th>
              <th>Status</th>
              <th>Assessment</th>
              <th></th>
            </tr>
          </thead>
          ";

          echo "<tbody>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$rowCount."</td>";
                echo "<td nowrap>".$row['user_name']."</td>";
                echo "<td>".$row['educ']."</td>";
                echo "<td>".$row['year_level']."</td>";
                echo "<td>".$row['batch']."</td>";
                echo "<td>".$row['brgy']."</td>";
                echo "<td>".$row['last_school']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td>".$row['assessment']."</td>";
                echo "<td><a href='view.php?id=".$row['id']."'>View</a></td>";
              echo "</tr>";
              
              $rowCount += 1;
          }
          echo "</tbody>";
      }
    ?>

    <tfoot>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Education</th>
        <th>Year Level</th>
        <th>Batch</th>
        <th>Brgy</th>
        <th>Last School Attended</th>
        <th>Status</th>
        <th>Assessment</th>
        <th></th>
      </tr>
    </tfoot>

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
        // $("#tbl-user").DataTable();
        // Setup - add a text input to each footer cell
        $('#tbl-user tfoot th').each( function (k, v) {
            if(k!=9&&k!=0){

              var title = $(this).text();
              $(this).html( '<input type="text" placeholder="'+title+'" />' );
            }
        } );
     
        // DataTable
        var table = $('#tbl-user').DataTable({
          dom: 'lBfrtip',
          buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
          ],
        });
     
        // Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
      });

    </script>

  </body>

</html>
