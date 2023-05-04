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
      function setAddQuestion(){
        window.open("setQuestion.php?quest=1","_self");
      }
      function setExamType(){

        var selectedVal = $("#examtype option:selected").val();
        if(selectedVal=="TEXT"){
           window.open("setTypeQuestion.php?typequest=1","_self");
        }else if(selectedVal=="IMAGE"){
           window.open("setTypeQuestion.php?typequest=2","_self");
        }else if(selectedVal=="TEXT/IMAGE"){
           window.open("setTypeQuestion.php?typequest=3","_self");
        }else{
           window.open("setTypeQuestion.php?typequest=4","_self");
        }

      }
      function cancelAdd(){
         window.open("cancelAdd.php","_self");
      }
      function filterQuestion(){
        var selectedFilter = $("#filter option:selected").val();

        if(selectedFilter=="ALL"){
           window.open("setFilterQuestion.php?typequest=1","_self");
        }else if(selectedFilter=="TEXT"){
           window.open("setFilterQuestion.php?typequest=2","_self");
        }else if(selectedFilter=="IMAGE"){
           window.open("setFilterQuestion.php?typequest=3","_self");
        }else{
           window.open("setFilterQuestion.php?typequest=4","_self");
        }
      }
      function editText(id){
        window.open("editTextQuestion.php?quest="+id,"_self");
      }
        function editImage(id){
        window.open("editImageQuestion.php?quest="+id,"_self");
      }
      function editTextImage(id){
        window.open("editTextImageQuestion.php?quest="+id,"_self");
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
                  <h4 class="page-title">Manage Exam > Question Bank</h4>

                </div>
              </div>
              <?php
                if($_SESSION['question']=="NULL"){
                  echo '<div class="col-md-12">
                      <button type="button" onClick="setAddQuestion()" class="btn btn-primary btn-fw">
                        <i class="mdi mdi-plus"></i>Add Question
                      </button>
                    </div>';

                }else{

                }
              ?>

            </div>
            <!-- Page Title Header Ends-->
             <!-- Start Text Question -->
             <?php
            if(($_SESSION['questtype']=="TEXT")&&($_SESSION['question']=="ADD")){
              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="saveQuestionText.php">
                    <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title"> Add Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>

                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-4">
                               <div class="form-group row">
                                <label>Type of Exam</label>
                                <select onChange="setExamType()" class="form-control" name="examtype" id="examtype">';
                                   if($_SESSION['questtype']=="TEXT"){
                                    echo '<option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>';

                                  }else if($_SESSION['questtype']=="IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" selected>IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>';

                                  }else if($_SESSION['questtype']=="TEXT/IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" >IMAGE</option>
                                    <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>';
                                  }


                                echo '</select>

                              </div>
                          </div>
                        </div>

                      </div>
                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Question</label>
                                <textarea class="form-control" name="question_text" id="question_text" cols="40" rows="5" placeholder="Type question here." required></textarea>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice A</label>
                                <input type="text" class="form-control" name="choice_text_a" id="choice_text_a" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice B</label>
                                <input type="text" class="form-control" name="choice_text_b" id="choice_text_b" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice C</label>
                                <input type="text" class="form-control" name="choice_text_c" id="choice_text_c" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice D</label>
                                <input type="text" class="form-control" name="choice_text_d" id="choice_text_d" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice E</label>
                                <input type="text" class="form-control" name="choice_text_e" id="choice_text_e" required>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>


          <!-- End Text Question -->

          <!-- Start Text Edit -->
            <?php
            if(($_SESSION['questtype']=="TEXT")&&($_SESSION['question']=="EDIT")){
              $id = $_SESSION['questid'];
              $sql_edit = "SELECT * FROM tbl_questbank WHERE id='$id'";
              $result_edit = $conn->query($sql_edit);
               $row_edit = $result_edit->fetch_assoc();

              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="updateQuestionText.php">
                    <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title"> Edit Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>

                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Question</label>
                                <textarea class="form-control" name="question_text" id="question_text" cols="40" rows="5" placeholder="Type question here." required>';
                                echo $row_edit['question_text'];
                                echo '</textarea>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice A</label>
                                <input type="text" value="';
                                echo $row_edit['choice_text_a'];
                                echo '" class="form-control" name="choice_text_a" id="choice_text_a" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice B</label>
                                <input type="text" value="';
                                 echo $row_edit['choice_text_b'];
                                echo '" class="form-control" name="choice_text_b" id="choice_text_b" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice C</label>
                                <input type="text" value="';
                                 echo $row_edit['choice_text_c'];
                                echo '" class="form-control" name="choice_text_c" id="choice_text_c" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice D</label>
                                <input type="text" value="';
                                 echo $row_edit['choice_text_d'];
                                echo '" class="form-control" name="choice_text_d" id="choice_text_d" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice E</label>
                                <input type="text" value="';
                                 echo $row_edit['choice_text_e'];
                                echo '" class="form-control" name="choice_text_e" id="choice_text_e" required>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">';
                                  if($row_edit['answer']==$row_edit['choice_text_a']){
                                    echo '<option value="A" selected>A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_text_b']){
                                    echo '<option value="A">A</option>
                                    <option value="B" selected>B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_text_c']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C" selected>C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_text_d']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D" selected>D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_text_e']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E" selected>E</option>';
                                  }

                                echo '</select>


                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>
          <!-- End TExt edit -->
            <!-- Start Image Question -->
             <?php
            if(($_SESSION['questtype']=="IMAGE")&&($_SESSION['question']=="ADD")){
              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="saveQuestionImage.php" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-6">
                      <h4 class="card-title"> Add Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-4">
                               <div class="form-group row">
                                <label>Type of Exam</label>
                                <select onChange="setExamType()" class="form-control" name="examtype" id="examtype">';
                                   if($_SESSION['questtype']=="TEXT"){
                                    echo '<option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" selected>IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="TEXT/IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" >IMAGE</option>
                                    <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }


                                echo '</select>
                              </div>
                          </div>
                        </div>

                      </div>
                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Question Image</label>
                                <input class="form-control" type="file" name="question_image" id="question_image" onchange="previewFile();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImg" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice A</label>
                                <input class="form-control" type="file" name="choice_a" id="choice_a" onchange="previewFileA();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgA" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice B</label>
                                <input class="form-control" type="file" name="choice_b" id="choice_b" onchange="previewFileB();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgB" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice C</label>
                                <input class="form-control" type="file" name="choice_c" id="choice_c" onchange="previewFileC();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgC" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice D</label>
                                <input class="form-control" type="file" name="choice_d" id="choice_d" onchange="previewFileD();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgD" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice E</label>
                                <input class="form-control" type="file" name="choice_e" id="choice_e" onchange="previewFileE();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgE" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>


          <!-- End Image Question -->

            <!-- Start EDIT Question -->
             <?php
            if(($_SESSION['questtype']=="IMAGE")&&($_SESSION['question']=="EDIT")){
                $id = $_SESSION['questid'];
              $sql_edit = "SELECT * FROM tbl_questbank WHERE id='$id'";
              $result_edit = $conn->query($sql_edit);
               $row_edit = $result_edit->fetch_assoc();

              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="updateQuestionImage.php" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-6">
                      <h4 class="card-title"> Update Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>

                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Question Image</label>
                                <input class="form-control" type="file" name="question_image" id="question_image" onchange="previewFile();">
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImg" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['question_image'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice A</label>
                                <input class="form-control" type="file" name="choice_a" id="choice_a" onchange="previewFileA();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgA" style="height:200px;object-fit: cover;" src="questimage/';
                               echo $row_edit['choice_image_a'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice B</label>
                                <input class="form-control" type="file" name="choice_b" id="choice_b" onchange="previewFileB();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgB" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_b'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice C</label>
                                <input class="form-control" type="file" name="choice_c" id="choice_c" onchange="previewFileC();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgC" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_c'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice D</label>
                                <input class="form-control" type="file" name="choice_d" id="choice_d" onchange="previewFileD();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgD" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_d'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice E</label>
                                <input class="form-control" type="file" name="choice_e" id="choice_e" onchange="previewFileE();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgE" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_e'];
                              echo'" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">';
                                    if($row_edit['answer']==$row_edit['choice_image_a']){
                                    echo '<option value="A" selected>A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_b']){
                                    echo '<option value="A">A</option>
                                    <option value="B" selected>B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_c']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C" selected>C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_d']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D" selected>D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_e']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E" selected>E</option>';
                                  }
                                echo '</select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>


          <!-- End Image EDIT Question -->

          <!-- Text/Image Question Add -->


             <?php
            if(($_SESSION['questtype']=="TEXT/IMAGE")&&($_SESSION['question']=="ADD")){
              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="saveQuestionTextImage.php" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-6">
                      <h4 class="card-title"> Add Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-4">
                               <div class="form-group row">
                                <label>Type of Exam</label>
                                <select onChange="setExamType()" class="form-control" name="examtype" id="examtype">';
                                  if($_SESSION['questtype']=="TEXT"){
                                    echo '<option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" selected>IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="TEXT/IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" >IMAGE</option>
                                    <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }


                                echo '</select>
                              </div>
                          </div>
                        </div>

                      </div>
                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Question</label>
                                <textarea class="form-control" name="question_text" id="question_text" cols="40" rows="5" placeholder="Type question here." required></textarea>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice A</label>
                                <input class="form-control" type="file" name="choice_a" id="choice_a" onchange="previewFileA();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgA" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice B</label>
                                <input class="form-control" type="file" name="choice_b" id="choice_b" onchange="previewFileB();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgB" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice C</label>
                                <input class="form-control" type="file" name="choice_c" id="choice_c" onchange="previewFileC();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgC" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice D</label>
                                <input class="form-control" type="file" name="choice_d" id="choice_d" onchange="previewFileD();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgD" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice E</label>
                                <input class="form-control" type="file" name="choice_e" id="choice_e" onchange="previewFileE();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgE" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>


                <?php
            if(($_SESSION['questtype']=="TEXT/IMAGE")&&($_SESSION['question']=="EDIT")){
               $id = $_SESSION['questid'];
              $sql_edit = "SELECT * FROM tbl_questbank WHERE id='$id'";
              $result_edit = $conn->query($sql_edit);
               $row_edit = $result_edit->fetch_assoc();
              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="updateQuestionTextImage.php" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-6">
                      <h4 class="card-title"> Update Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-4">
                               <div class="form-group row">
                                <label>Type of Exam</label>
                                <select onChange="setExamType()" class="form-control" name="examtype" id="examtype">';
                                  if($_SESSION['questtype']=="TEXT"){
                                    echo '<option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" selected>IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="TEXT/IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" >IMAGE</option>
                                    <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }


                                echo '</select>
                              </div>
                          </div>
                        </div>

                      </div>
                      <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Question</label>
                                <textarea class="form-control" name="question_text" id="question_text" cols="40" rows="5" placeholder="Type question here." required>';
                                echo $row_edit['question_text'];
                                echo '</textarea>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice A</label>
                                <input class="form-control" type="file" name="choice_a" id="choice_a" onchange="previewFileA();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgA" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_a'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice B</label>
                                <input class="form-control" type="file" name="choice_b" id="choice_b" onchange="previewFileB();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgB" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_b'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice C</label>
                                <input class="form-control" type="file" name="choice_c" id="choice_c" onchange="previewFileC();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgC" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_c'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice D</label>
                                <input class="form-control" type="file" name="choice_d" id="choice_d" onchange="previewFileD();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgD" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_d'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="margin-top:1em;">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Choice E</label>
                                <input class="form-control" type="file" name="choice_e" id="choice_e" onchange="previewFileE();" >
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImgE" style="height:200px;object-fit: cover;" src="questimage/';
                              echo $row_edit['choice_image_e'];
                              echo '" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                               <select class="form-control" name="answer" id="answer">';
                                    if($row_edit['answer']==$row_edit['choice_image_a']){
                                    echo '<option value="A" selected>A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_b']){
                                    echo '<option value="A">A</option>
                                    <option value="B" selected>B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_c']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C" selected>C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_d']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D" selected>D</option>
                                    <option value="E">E</option>';
                                  }else if($row_edit['answer']==$row_edit['choice_image_e']){
                                    echo '<option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E" selected>E</option>';
                                  }
                                echo '</select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>
          <!-- Text/Image Question Add end -->

           <!-- Image/Text Question Add -->


             <?php
            if(($_SESSION['questtype']=="IMAGE/TEXT")&&($_SESSION['question']=="ADD")){
              echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="saveQuestionImageText.php" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-6">
                      <h4 class="card-title"> Add Question </h4>
                    </div>
                     <div class="col-md-6" style="text-align:right;">

                    </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-4">
                               <div class="form-group row">
                                <label>Type of Exam</label>
                                <select onChange="setExamType()" class="form-control" name="examtype" id="examtype">';
                                  if($_SESSION['questtype']=="TEXT"){
                                    echo '<option value="TEXT" selected>TEXT</option>
                                    <option value="IMAGE">IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" selected>IMAGE</option>
                                    <option value="TEXT/IMAGE">TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }else if($_SESSION['questtype']=="TEXT/IMAGE"){
                                    echo '<option value="TEXT" >TEXT</option>
                                    <option value="IMAGE" >IMAGE</option>
                                    <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>
                                    <option value="IMAGE/TEXT">IMAGE/TEXT</option>';
                                  }

                                echo '</select>
                              </div>
                          </div>
                        </div>

                      </div>
                       <!-- Question -->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-4 col-md-4">
                               <div class="form-group row">
                                <label>Upload Question Image</label>
                                <input class="form-control" type="file" name="question_image" id="question_image" onchange="previewFile();" required>
                              </div>
                          </div>
                          <div class="col-xs-8 col-md-8">
                              <img id="previewImg" style="height:200px;object-fit: cover;" src="questimage/noimage.jpeg" alt="Placeholder">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice A</label>
                                <input type="text" class="form-control" name="choice_text_a" id="choice_text_a" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice B</label>
                                <input type="text" class="form-control" name="choice_text_b" id="choice_text_b" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice C</label>
                                <input type="text" class="form-control" name="choice_text_c" id="choice_text_c" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice D</label>
                                <input type="text" class="form-control" name="choice_text_d" id="choice_text_d" required>
                              </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-12 col-md-12">
                               <div class="form-group row">
                                <label>Choice E</label>
                                <input type="text" class="form-control" name="choice_text_e" id="choice_text_e" required>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                               <div class="form-group row">
                                <label>Choose Correct Answer</label>
                                <select class="form-control" name="answer" id="answer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>

                              </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-xs-12 col-md-12" style="text-align: right;">
                          <button type="button" class="btn btn-warning" onClick="cancelAdd()">CANCEL</button>
                          <input type="submit" class="btn btn-primary" value="SAVE">

                        </div>

                    <!-- End Question -->

                    </div>
                  </form>

                  </div>
                </div>
              </div>

          </div>';
                }

             ?>

             <!-- EDIT TEXT/IMAGE -->



             <!-- END EDIT TEXT/IMAGE -->

          <!-- Text/Image Question Add end -->



   <!-- Start Image Question -->
          <!-- End Add question -->

          <?php
          if($_SESSION['question']=="NULL"){
             echo '<div class="row">
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                  <div class="col-md-8">
                    <h4 class="card-title questchoice"> List of Questions </h4>
                  </div>
                   <div class="col-md-4">


                       <select class="form-control" name="filter" id="filter" onChange="filterQuestion()">';
                         if($_SESSION['filterquest']=="ALL"){
                           echo '<option value="ALL" selected>ALL</option>
                           <option value="TEXT">TEXT</option>
                           <option value="IMAGE">IMAGE</option>
                            <option value="TEXT/IMAGE">TEXT/IMAGE</option>';
                         }else if($_SESSION['filterquest']=="TEXT"){
                          echo '<option value="ALL">ALL</option>
                           <option value="TEXT" selected>TEXT</option>
                           <option value="IMAGE">IMAGE</option>
                            <option value="TEXT/IMAGE">TEXT/IMAGE</option>';
                         }else if($_SESSION['filterquest']=="IMAGE"){
                          echo '<option value="ALL">ALL</option>
                           <option value="TEXT" >TEXT</option>
                           <option value="IMAGE" selected>IMAGE</option>
                            <option value="TEXT/IMAGE">TEXT/IMAGE</option>';
                         }else{
                              echo '<option value="ALL">ALL</option>
                           <option value="TEXT" >TEXT</option>
                           <option value="IMAGE" >IMAGE</option>
                            <option value="TEXT/IMAGE" selected>TEXT/IMAGE</option>';
                         }
                       echo '</select>

                  </div>
                  <div class="col-md-12" style="height:1em;">
                    <hr>
                  </div>';
                  $page = $_SESSION['filterpage'];
                  $offset = $page * 10;
                  $typequest =$_SESSION['filterquest'];
                      if($_SESSION['filterquest']=="ALL"){
                          $sql = "SELECT * FROM  tbl_questbank WHERE status='OPEN' ORDER BY id DESC LIMIT 10 OFFSET ".$offset;
                           $sql1 = "SELECT COUNT(*) as total FROM  tbl_questbank WHERE status='OPEN'";
                      }else if($_SESSION['filterquest']=="TEXT"){
                          $sql = "SELECT * FROM  tbl_questbank WHERE status='OPEN' AND quest_type='$typequest' LIMIT 10 OFFSET ".$offset;
                            $sql1 = "SELECT COUNT(*) as total FROM  tbl_questbank WHERE status='OPEN' AND quest_type='$typequest'";
                      }else if($_SESSION['filterquest']=="IMAGE"){
                          $sql = "SELECT * FROM  tbl_questbank WHERE status='OPEN'  AND quest_type='$typequest' ORDER BY id DESC  LIMIT 10 OFFSET ".$offset;
                           $sql1 = "SELECT COUNT(*) as total FROM  tbl_questbank WHERE status='OPEN' AND quest_type='$typequest'";
                      }else if($_SESSION['filterquest']=="TEXT/IMAGE"){
                          $sql = "SELECT * FROM  tbl_questbank WHERE status='OPEN'  AND quest_type='$typequest'  ORDER BY id DESC LIMIT 10 OFFSET ".$offset;
                           $sql1 = "SELECT COUNT(*) as total FROM  tbl_questbank WHERE status='OPEN' AND quest_type='$typequest'";
                      }

                          $result = $conn->query($sql);
                          $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total = $row1['total'];
                          $num=$offset;
                          while($row = $result->fetch_assoc()){
                            $num++;

                            if($row['quest_type']=="TEXT"){
                                 echo '<div class="col-md-12" style="margin-top:1em;">
                                  <div class="row">
                                      <div class="col-md-8">
                                        <p  class="questchoice">Question Type: ';
                                        echo $row['quest_type'];
                                        echo '</p>
                                        <p class="questchoice" style="text-align:justify;">Question ';
                                        echo $num;
                                        echo ': ';
                                        echo $row['question_text'];

                                        echo '</p>
                                          <p class="questchoice">
                                            <ol type="A" class="questchoice">';
                                              echo '<li>';
                                              echo $row['choice_text_a'];
                                              echo '</li>';
                                              echo '<li>';
                                              echo $row['choice_text_b'];
                                              echo '</li>';
                                              echo '<li>';
                                              echo $row['choice_text_c'];
                                              echo '</li>';
                                              echo '<li>';
                                              echo $row['choice_text_d'];
                                              echo '</li>';
                                              echo '<li>';
                                              echo $row['choice_text_e'];
                                              echo '</li>';

                                            echo '</ol>
                                          </p>
                                          <p class="questchoice">
                                            Answer: ';
                                            echo $row['answer'];
                                          echo '
                                          </p>
                                          <hr>
                                      </div>
                                      <div class="col-md-4">

                                        <button class="btn btn-primary" id="';
                                        echo $row['id'];
                                        echo '" onClick="editText(this.id)"><i class="fa fa-pencil"></i></button>
                                      </div>
                                  </div>
                                </div>';
                            }else if($row['quest_type']=="IMAGE"){
                               echo '<div class="col-md-12" style="margin-top:1em;">';
                                  echo '<div class="row">';
                                      echo '<div class="col-md-8">
                                        <p  class="questchoice">Question Type: ';
                                        echo $row['quest_type'];
                                        echo '</p>';
                                      echo '</div>';
                                      echo '<div class="col-md-4">

                                          <button class="btn btn-primary" id="';
                                        echo $row['id'];
                                        echo '" onClick="editImage(this.id)"><i class="fa fa-pencil"></i></button>
                                      </div>';
                                       echo '<div class="col-md-8">';

                                        echo '<div class="col-md-12" style="margin-top:1em;">';
                                          echo '<div class="row">';

                                              echo '<div class="col-md-4">';
                                                 echo '<p  class="questchoice">Question ';
                                              echo $num;
                                              echo ': </p>';
                                                echo '<img style="height:200px;" src="questimage/';
                                                echo $row['question_image'];
                                                echo '">';
                                              echo '</div>';

                                               echo '<div class="col-md-8">';
                                                echo '<div class="row">';

                                                      echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">A </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_a'];
                                                        echo '">';
                                                      echo '</div>';

                                                      echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">B </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_b'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">C </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_c'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">D </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_d'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">E </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_e'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">Answer </p>';
                                                       
                                                         echo '<h2>';
                                                        echo $row['answer'];
                                                        echo '</h2>';
                                                      echo '</div>';

                                                echo '</div>';
                                              echo '</div>';

                                          echo '</div>';
                                       echo '</div>';
                                        echo '<hr>';
                                      echo '</div>';
                                      echo '<div class="col-md-4">

                                      </div>';

                                  echo '</div>';
                               echo '</div>';

                            }else if($row['quest_type']=="TEXT/IMAGE"){
                               echo '<div class="col-md-12" style="margin-top:1em;">';

                                  echo '<div class="row">';
                                      echo '<div class="col-md-8">
                                        <p  class="questchoice">Question Type: ';
                                        echo $row['quest_type'];
                                        echo '</p>';
                                      echo '</div>';
                                      echo '<div class="col-md-4">

                                          <button class="btn btn-primary" id="';
                                        echo $row['id'];
                                        echo '" onClick="editTextImage(this.id)"><i class="fa fa-pencil"></i></button>
                                      </div>';
                                       echo '<div class="col-md-12">';

                                        echo '<div class="col-md-12" style="margin-top:1em;">';
                                          echo '<div class="row">';

                                              echo '<div class="col-md-12">';
                                               echo '</p>
                                        <p class="questchoice" style="text-align:justify;">Question ';
                                        echo $num;
                                        echo ': ';
                                        echo $row['question_text'];
                                        echo '</p>';
                                              echo '</div>';

                                               echo '<div class="col-md-8">';
                                                echo '<div class="row">';

                                                      echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">A </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_a'];
                                                        echo '">';
                                                      echo '</div>';

                                                      echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">B </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_b'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4">';
                                                         echo '<p  class="questchoice">C </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_c'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">D </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_d'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">E </p>';
                                                        echo '<img style="height:100px;" src="questimage/';
                                                        echo $row['choice_image_e'];
                                                        echo '">';
                                                      echo '</div>';

                                                       echo '<div class="col-md-4" style="padding-top:1em;">';
                                                         echo '<p  class="questchoice">Answer </p>';
                                                         echo '<h2>';
                                                         echo $row['answer'];
                                                         echo '</h2>';
                                                      echo '</div>';

                                                echo '</div>';
                                              echo '</div>';

                                          echo '</div>';
                                       echo '</div>';
                                        echo '<hr>';
                                      echo '</div>';
                                      echo '<div class="col-md-4">

                                      </div>';

                                  echo '</div>';
                               echo '</div>';

                            }
                          }





                  echo '<div class="col-md-3" style="margin-top:1em;">';

                        if($offset<=1){
                          echo '<button class="btn btn-warning" disabled>Previous</button>';
                        }else{
                           echo '<a href="back_quest.php" class="btn btn-warning" >Previous</a>';
                        }

                      echo ($offset+1)."-".$num.'/'.$total;

                        if($num>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="next_quest.php" class="btn btn-primary">Next</a>';
                        }


                   echo '</div>
                    <div class="col-md-9" style="text-align: right;">
                      (Total searched records: ';
                       echo $total;
                       echo ')

                    </div>

                    </div>
                  </div>
                </div>
              </div>

          </div>';
        }

          ?>



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
