<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['offset']=1;
$_SESSION['limit']=10;
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
        window.open("setExam.php","_self");
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
         window.open("cancelAddExam.php","_self");
      }
      function filterQuestion(){
        var selectedFilter = $("#filter option:selected").val();
       
        if(selectedFilter=="ALL"){
           window.open("setFilterQuestion.php?typequest=1","_self");
        }else if(selectedFilter=="TEXT"){
           window.open("setFilterQuestion.php?typequest=2","_self");
        }else{
           window.open("setFilterQuestion.php?typequest=3","_self");
        }
      }
      function editText(id){
        window.open("editTextQuestion.php?quest="+id,"_self");
      }
        function editImage(id){
        window.open("editImageQuestion.php?quest="+id,"_self");
      }
      function setEditExam(id){
         window.open("setEditExam.php?id="+id,"_self");
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
      function addSection(id){
         window.open("setExamId.php?id="+id,"_self");
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
                  <h4 class="page-title">Manage Exam > <a href="cancelAddSectionExam.php">List of Exam</a></h4>
                 
                </div>
              </div>
             <?php
                if($_SESSION['exam']=="NULL"){
                  echo '<div class="col-md-12">
                      <button type="button" onClick="setAddExam()" class="btn btn-primary btn-fw">
                        <i class="mdi mdi-plus"></i>Add Exam
                      </button>
                    </div>';



                }else{
                    
                }
              ?>
              
             
            </div>
             <div class="row">
              <?php
            if($_SESSION['exam']=="NULL"){
               $sql = "SELECT * FROM tbl_exam ORDER BY id DESC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  $examid = $row['id'];
                     $sql3 = "SELECT COUNT(*) as exam FROM tbl_exam_section WHERE exam_id='$examid'";
                      $result3 = $conn->query($sql3);
                      $row3 = $result3->fetch_assoc();


                      echo '<div class="col-md-4 col-xs-12" style="margin-top:1em;" >
                        <div class="card" style="border-radius:50px;">
                          <div class="card-body" style="padding:0;">
                            <div class="row">
                               <div class="col-md-2" style="height:225px;background-color:';
                               echo $row['colors'];
                               echo ';border-radius:50px 0px 0px 50px;">
                               </div>
                               <div class="col-md-9">
                                <div class="row">
                                  <div class="col-md-12" style="padding-top:2em;  ">
                                    <p style="font-size:1em;font-weight:700">Title: <i>';
                                    $len = strlen($row['title']);

                                    if($len>=31){
                                      echo substr($row['title'], 0,31)."...";
                                    }else{
                                      echo $row['title'];
                                    }

                                    echo '</i>
                                    <br>
                                   Date Created: <i>';
                                   echo $row['date_created'];
                                   echo '</i>
                                     <br>
                                   Number of Section: <i>';
                                   echo $row3['exam'];
                                   echo '</i>
                                    <br>
                                   Status: <i>';
                                   echo $row['status'];
                                   echo '</i>
                                   <br>
                                   Response: <i>';
                                   $stats="DONE";
                                   $sql5 = "SELECT COUNT(*) as exam_num FROM tbl_student_exam WHERE exam_id='$examid' AND status='$stats'";
                                    $result5 = $conn->query($sql5);
                                  $row5 = $result5->fetch_assoc();
                                  echo $row5['exam_num'];

                                   echo '</i>
                                  </p>
                                  </div>
                                  <div class="col-md-12">
                                     <button class="btn btn-danger" id="';
                                     echo $row['id'];
                                    echo '" data-toggle="modal" data-target="#modalDraft" onClick="getUnPublishId(this.id)"><i class="fa fa-times"></i></button>
                                    <button class="btn btn-success" id="';
                                    echo $row['id'];
                                    echo '" onClick="setEditExam(this.id)"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-primary" id="';
                                     echo $row['id'];
                                    echo '" data-toggle="modal" data-target="#modalPublish" onClick="getPublishId(this.id)"><i class="fa fa-check"></i></button>
                                    <a href="examSectionList.php?exam_id=';
                                    echo $row['id'];
                                    echo '" class="btn btn-warning" id="';
                                    echo $row['id'];
                                    echo '" ><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-info" id="';
                                    echo $row['id'];
                                    echo '" onClick="addSection(this.id)"><i class="fa fa-plus"></i></button>
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
            }
               

              ?>


              </div>

           <?php
            if($_SESSION['exam']=="ADD"){
                  echo '<div class="row">
                      <div class="col-md-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                  <form method="POST" action="saveExam.php">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4 class="card-title"> Add Exam </h4>
                                      </div>
                                        
                                       <div class="col-xs-12 col-md-6">
                                           <div class="form-group row">
                                            <label>Exam Title</label>
                                            <input type="text" class="form-control" name="exam_title" id="exam_title" placeholder="Type title of examination here." required>
                                          </div>
                                      </div>
                                        <div class="col-xs-12 col-md-1">
                                      </div>
                                      <div class="col-xs-12 col-md-2">
                                        <div class="form-group row">
                                            <label>Choose Color</label>
                                            <input type="color" class="form-control" name="exam_color" id="exam_color" required>
                                          </div>
                                      </div>
                                      <div class="col-xs-12 col-md-3">
                                      </div>

                                      <div class="col-xs-12 col-md-12">
                                           <div class="form-group row">
                                            <label>Instruction</label>
                                            <textarea class="form-control" name="instruction" id="instruction" cols="40" rows="5" placeholder="Type instruction here." required></textarea>
                                          </div>
                                      </div>

                                       <div class="col-xs-12 col-md-12" style="text-align:right;">
                                       
                                        <input type="submit" class="btn btn-primary" value="SAVE">
                                         </form>
                                          <button class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                                       </div>
                                    
                                    </div>
                                    
                                </div>

                             </div>
                          </div>
                        </div>
                      </div>
                   </div>';
            }

           ?> 
         
            <?php
            if($_SESSION['exam']=="EDIT"){
              $id=$_SESSION['exam_id'];
              $sql1 = "SELECT * FROM tbl_exam WHERE id='$id'";
              $result1 = $conn->query($sql1);
              $row1 = $result1->fetch_assoc();
                  echo '<div class="row">
                      <div class="col-md-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                  <form method="POST" action="saveUpdateExam.php">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4 class="card-title"> Update Exam </h4>
                                      </div>
                                        
                                       <div class="col-xs-12 col-md-6">
                                           <div class="form-group row">
                                            <label>Exam Title</label>
                                            <input type="text" class="form-control" name="exam_title" id="exam_title" value="';
                                            echo $row1['title'];
                                            echo '" placeholder="Type title of examination here." required>
                                          </div>
                                      </div>
                                        <div class="col-xs-12 col-md-1">
                                      </div>
                                      <div class="col-xs-12 col-md-2">
                                        <div class="form-group row">
                                            <label>Choose Color</label>
                                            <input type="color" class="form-control" name="exam_color" id="exam_color" value="';
                                            echo $row1['colors'];
                                            echo '" required>
                                          </div>
                                      </div>
                                      <div class="col-xs-12 col-md-3">
                                      </div>

                                      <div class="col-xs-12 col-md-12">
                                           <div class="form-group row">
                                            <label>Instruction</label>
                                            <textarea class="form-control" name="instruction" id="instruction" cols="40" rows="5" placeholder="Type instruction here." required>';
                                            echo $row1['instruction'];
                                            echo '</textarea>
                                          </div>
                                      </div>

                                       <div class="col-xs-12 col-md-12" style="text-align:right;">
                                         <input type="submit" class="btn btn-primary" value="SAVE">
                                         </form>
                                          <button class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                                       </div>
                                    
                                    </div>
                                   
                                </div>

                             </div>
                          </div>
                        </div>
                      </div>
                   </div>';
            }

           ?> 

               <?php
              


            if($_SESSION['exam']=="ADDSECTION"){
                $id=$_SESSION['exam_id'];
                $sql2 = "SELECT * FROM tbl_exam WHERE id='$id'";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();


                $sql3 = "SELECT COUNT(*) as exam FROM tbl_exam_section WHERE exam_id='$id'";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();



                  echo '<form action="addMultipleSection.php" method="POST"  enctype="multipart/form-data">';
               echo '<div class="row">';
                echo '<div class="col-md-12 col-xs-12" style="margin-top:1em;" >
                        <div class="card" >
                          <div class="card-body">';
                           echo '<div class="row">';
                            echo '<div class="col-md-12">
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
                                   Number of Section: <i>';
                                   echo $row3['exam'];
                                   echo '</i>
                                 
                                  </p>
                                  </div>';
                          echo '</div>';         
                  echo '</div>
                      </div>
                </div>';
               $sql = "SELECT * FROM tbl_section ORDER BY id DESC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  $s_id = $row['id'];
                  $sql1 = "SELECT COUNT(*) as section FROM tbl_section_quest WHERE section_id='$s_id'";
                  $result1 = $conn->query($sql1);
                  $row1 = $result1->fetch_assoc();


                      echo '<div class="col-md-4 col-xs-12" style="margin-top:1em;" >
                        <div class="card" style="border-radius:50px;">
                          <div class="card-body" style="padding:0;">
                            <div class="row">
                               <div class="col-md-2" style="height:200;background-color:';
                               echo $row['colors'];
                               echo ';border-radius:50px 0px 0px 50px;">
                               </div>
                               <div class="col-md-8">
                                <div class="row">
                                  <div class="col-md-12" style="padding-top:2em;  ">
                                    <p style="font-size:1em;font-weight:700">Title: <i>';
                                    $len = strlen($row['title']);

                                    if($len>=29){
                                      echo substr($row['title'], 0,29)."...";
                                    }else{
                                      echo $row['title'];
                                    }

                                    echo '</i>
                                    <br>
                                   Date Created: <i>';
                                   echo $row['date_created'];
                                   echo '</i>
                                    <br>
                                   Number of Question/s: <i>';
                                   echo $row1['section'];
                                   echo '</i>
                                   <br>
                                   Timer: <i>';
                                   echo $row['timer'];
                                   echo ' minute/s</i>
                                  </p>
                                  </div>
                                
                                
                                </div>
                                 
                               </div>
                                <div class="col-md-2" style="padding-top:2em;padding-left:2em">
                                         <input type="checkbox" id="';
                                        echo $row['id'];
                                        echo '"class="form-control" onClick="checkQuestion(this.id)">
                                     
                                    </p>
                                       <input type="hidden" name="section[]" id="quest';
                                        echo $row['id'];
                                        echo '" value="0">
                                 
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>';
                }
                 echo '<div class="col-md-12" style="padding-top:2em;text-align:right;">
                  <input style="font-size:1.2em;" type="submit" class="btn btn-primary" value="SAVE">
                 </div>';
                echo '</div>';
              echo '</form>';
            }
                

              ?>
         
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