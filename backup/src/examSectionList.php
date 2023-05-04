<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['offset']=1;
$_SESSION['limit']=10;
$exam_id = $_GET['exam_id'];
include 'config.php';
  
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  
    <style >
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  } 
  .card-counter.dark{
    background-color: #6d32a8;
    color: #FFF;
  } 
  .card-counter.light{
    background-color: #32a89e;
    color: #FFF;
  }   

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
  .questchoice{
    font-size:1em;
  }
    </style>
    <script>
      var publish_id=0;

      function setAddExam(){
        window.open("setSection.php","_self");
      }
      function setExamType(){
      
        var selectedVal = $("#examtype option:selected").val();
        if(selectedVal=="TEXT"){
           window.open("setTypeQuestion.php?typequest=1","_self");
        }else{
           window.open("setTypeQuestion.php?typequest=2","_self");
        }
       
      }
      function cancelAdd(){
         window.open("cancelAddSection.php","_self");
      }
      function filterQuestion(){
        var selectedFilter = $("#filter option:selected").val();
       
        if(selectedFilter=="ALL"){
           window.open("setFilterQuestionSection.php?typequest=1","_self");
        }else if(selectedFilter=="TEXT"){
           window.open("setFilterQuestionSection.php?typequest=2","_self");
        }else if(selectedFilter=="IMAGE"){
           window.open("setFilterQuestionSection.php?typequest=3","_self");
        }else if(selectedFilter=="TEXT/IMAGE"){
           window.open("setFilterQuestionSection.php?typequest=4","_self");
        }else{
           window.open("setFilterQuestionSection.php?typequest=5","_self");
        }
      }
      function editText(id){
        window.open("editTextQuestion.php?quest="+id,"_self");
      }
        function editImage(id){
        window.open("editImageQuestion.php?quest="+id,"_self");
      }
      function setEditExam(id){
         window.open("setEditSection.php?id="+id,"_self");
      }
      function getPublishId(id){
        publish_id=id;
       
      }
        function getUnPublishId(id){
        publish_id=id;

       
      }
      function publishExam(){
         window.open("publishExam.php?id="+publish_id,"_self");
      }
       function unpublishExam(){
         window.open("unpublishExam.php?id="+publish_id,"_self");
      }
      function addQuestion(id){  
         window.open("setAddQuestion.php?id="+id,"_self");
      }
       function viewQuestion(id){  
         window.open("setViewQuestion.php?id="+id,"_self");
      }
      function checkQuestion(id){

        var value = document.getElementById('quest'+id).value;
     
        if(value=="0"){
          document.getElementById('quest'+id).value=id;
        }else{
           document.getElementById('quest'+id).value=0;
        }
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(){
            var file = $("#question_image").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
         function previewFileA(){
            var file = $("#choice_a").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImgA").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
         function previewFileB(){
            var file = $("#choice_b").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImgB").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
         function previewFileC(){
            var file = $("#choice_c").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImgC").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
         function previewFileD(){
            var file = $("#choice_d").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImgD").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
         function previewFileE(){
            var file = $("#choice_e").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImgE").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
    </script>
  </head>
  <body onload="getInit()">
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
              <div class="col-12">
                <div class="page-header">
                  <?php
                   $sql4 = "SELECT * FROM tbl_exam WHERE id='$exam_id'";
                    $result4 = $conn->query($sql4);
                     $row4 = $result4->fetch_assoc();

                  
                  echo '<h4 class="page-title"><a href="examList.php">';
                  echo $row4['title'];
                  echo '</a> > List of Section </h4>';
                 ?>
                </div>
              </div>
            
              
             
            </div>
             <div class="row">
              <?php
              
               $sql = "SELECT * FROM tbl_exam_section WHERE exam_id='$exam_id' ORDER BY id DESC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  $s_id = $row['section_id'];
                  $sql1 = "SELECT COUNT(*) as section FROM tbl_section_quest WHERE section_id='$s_id'";
                  $result1 = $conn->query($sql1);
                  $row1 = $result1->fetch_assoc();

                  $sql2 = "SELECT * FROM tbl_section WHERE id='$s_id'";
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_assoc();


                      echo '<div class="col-md-4 col-xs-12" style="margin-top:1em;" >
                        <div class="card" style="border-radius:50px;">
                          <div class="card-body" style="padding:0;">
                            <div class="row">
                               <div class="col-md-2" style="height:200px;background-color:';
                               echo $row2['colors'];
                               echo ';border-radius:50px 0px 0px 50px;">
                               </div>
                               <div class="col-md-9">
                                <div class="row">
                                  <div class="col-md-12" style="padding-top:2em;  ">
                                    <p style="font-size:1em;font-weight:700">Title: <i>';
                                    $len = strlen($row2['title']);

                                    if($len>=31){
                                      echo substr($row2['title'], 0,31)."...";
                                    }else{
                                      echo $row2['title'];
                                    }

                                    echo '</i>
                                    <br>
                                   Date Created: <i>';
                                   echo $row2['date_created'];
                                   echo '</i>
                                    <br>
                                   Number of Question/s: <i>';
                                   echo $row1['section'];
                                   echo '</i>
                                   <br>
                                   Timer: <i>';
                                   echo $row2['timer'];
                                   echo ' minute/s</i>
                                  </p>
                                  </div>
                                  

                                </div>
                                 
                               </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>';
                }
            
               

              ?>

              </div>

           

        
            <!-- Publish Modal -->
            <div class="modal fade" id="modalPublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <p>
             <span style="font-size:1.2em;">Do you want to publish this exam?.</span>
            </p>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" onClick="publishExam()">Publish</button>
      </div>
    </div>
 
  </div>
</div>
           <!-- End Publish Modal -->


   
            <!-- Publish Modal -->
            <div class="modal fade" id="modalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Un-Publish Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <p>
             <span style="font-size:1.2em;">Do you want to un-publish this exam?.</span>
            </p>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" onClick="unpublishExam()">Un-Publish</button>
      </div>
    </div>
 
  </div>
</div>
           <!-- End Publish Modal -->
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php
              include 'footer.php';
         ?>
          <!-- partial -->
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