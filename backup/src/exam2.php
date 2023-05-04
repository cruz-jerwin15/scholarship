<?php session_start();
include 'config.php';
$exam_number=$_SESSION['exam_number'];
$userid=$_SESSION['newid'];
$exam_start="YES";

date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;








$st="OPEN";
$st1="CURRENT";
$sql1 = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

if($exam_start=="NO"){

    $acads=$row1['id'];
    $status1="OPEN";
    $sql = "SELECT * FROM tbl_student_exam WHERE user_id='$userid' AND academic_id='$acads' AND status='$status1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


      $start_date=$row['start_date'];
    $due_date=$row['date_due'];

    $date3 = strtotime($start_date);  
    $date4 = strtotime($dates); 

    $diff = $date3 - $date4;

    $date5 = strtotime($due_date);  
    $date6 = strtotime($dates); 

    $diff2 = $date6 - $date5;
    if(($diff<=0)&&($diff2<=0)){

    }else{
       
    }




    $exam_id=5;
    $_SESSION['exam_id']=$exam_id;

    $sql2 = "SELECT * FROM tbl_exam WHERE id='$exam_id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

      if ($result->num_rows > 0){
            $exam_title=$row2['title'];
            $exam_instruction=$row2['instruction'];

            $sql10 = "SELECT * FROM tbl_exam_section WHERE exam_id='$exam_id'";
            $result10 = $conn->query($sql10);
            $total_time=0;
            while($row10 = $result10->fetch_assoc()){
                $sec_id = $row10['section_id'];
                $sql11 = "SELECT * FROM tbl_section WHERE id='$sec_id'";
                $result11 = $conn->query($sql11);
                $row11 = $result11->fetch_assoc();
                $total_time=$total_time+(int)$row11['timer'];
            }

            $_SESSION['exam_timer']=$total_time*60;
   
            $h = floor(($total_time*60)/3600);
            $h_r = ($total_time*60)%3600;
            $m = floor($h_r/60);
            $m_r = $h_r%60;
            $s = $m_r;
            $time_display="";
            $h_display="";
            $m_display="";
            $s_display="";

            if($h<10){
                $h_display="0".$h;
            }else{
                $h_display=$h;
            }

             if($m<10){
                $m_display="0".$m;
            }else{
                $m_display=$m;
            }

            if($s<10){
                $s_display="0".$s;
            }else{
                $s_display=$s;
            }
            $time_display=$h_display.":".$m_display.":".$s_display;
            $_SESSION['display_time']=$time_display;


      }else{
         echo '<script language="javascript">';
                  echo 'alert("You do not have any scheduled exam.")';
                  echo '</script>';
        echo '<script language="javascript">';
        echo 'window.open("updatestudent.php","_self")';
        echo '</script>';
      }
}else if($exam_start=="YES"){
    


    
}



$exam_id=5;

if($exam_start=="YES"){
    
        
    $sql5 = "SELECT * FROM tbl_exam_section WHERE exam_id='$exam_id' LIMIT 1 offset 1";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();
    $section_id = $row5['section_id'];

    if ($result5->num_rows > 0){
        $_SESSION['section_id']=$section_id;
            $sql6 = "SELECT * FROM tbl_section WHERE id='$section_id'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();
            $section_title = $row6['title'];
            $section_instruction= $row6['instruction'];

            $sql7 = "SELECT * FROM tbl_section_quest WHERE section_id='$section_id'";
            $result7 = $conn->query($sql7);

            $sql9 = "SELECT * FROM tbl_section_quest WHERE section_id='$section_id'";
            $result9 = $conn->query($sql9);

        // if($_SESSION['start_time']==1){
           
        //     $_SESSION['timer']=$total_time;
        //     $seconds = $row6['timer']*60;
        //     $_SESSION['exam_timer']=(int)$seconds+(int)$_SESSION['exam_time'];
        //     $_SESSION['start_time']=2;
        // }    
           

    }else{
        $sqlb = "SELECT * FROM  tbl_exam_section WHERE exam_id='$exam_id'";
        $resultb = $conn->query($sqlb);
        while($rowb = $resultb->fetch_assoc()){
            $section_id = $rowb['section_id'];
            $sqlc = "SELECT * FROM  tbl_section_quest WHERE section_id='$section_id'";
            $resultc = $conn->query($sqlc);
            while($rowc = $resultc->fetch_assoc()){
                $quest_id=$rowc['quest_id'];

                $sqle = "SELECT * FROM tbl_answer_student WHERE exam_id='$exam_id' AND section_id='$section_id' AND quest_id='$quest_id' AND user_id='$userid'";
                $resulte = $conn->query($sqle);
                 if ($resulte->num_rows > 0){
                    $rowe = $resulte->fetch_assoc();
                    $ans_id=$rowe['id'];
                    $my_answer=$rowe['answer'];

                    $sqld = "SELECT * FROM tbl_questbank WHERE id='$quest_id'";
                    $resultd = $conn->query($sqld);
                    $rowd = $resultd->fetch_assoc();
                    $correct_answer=$rowd['answer'];   
                    if(strcmp($my_answer,$correct_answer)==0){
                        $ans_status="CORRECT";
                        $update_ans="UPDATE tbl_answer_student SET status='$ans_status' WHERE id='$ans_id'";
                        $conn->query($update_ans);
                    }else{
                         $ans_status="WRONG";
                        $update_ans="UPDATE tbl_answer_student SET status='$ans_status' WHERE id='$ans_id'";
                        $conn->query($update_ans);
                    }

                 }else{
                    $ans1="NO TIME";
                    date_default_timezone_set("Asia/Manila");
                    $year =date('Y');
                    $month=date('m');
                    $day=date('d');
                    $status_ans="WRONG";
                    $dates = $year."-".$month."-".$day;
                    $insert2 = "INSERT INTO tbl_answer_student 
                    (user_id,exam_id,section_id,quest_id,answer,dates,status) VALUES ('$userid','$exam_id','$section_id','$quest_id','$ans1','$dates','$status_ans')";
                    $conn->query($insert2);
                 }

                

              
            }

        }
        // $sqlb = "SELECT * FROM  tbl_answer_student WHERE user_id='$userid' AND exam_id='$exam_id'";
        // $resultb = $conn->query($sqlb);
        // while($rowb = $resultb->fetch_assoc()){
        //     $answer = $rowb['answer'];
        //     $questionid=$rowb['quest_id'];
        //     $ans_id= $rowb['id'];
        //     $sqlc = "SELECT * FROM tbl_questbank WHERE id='$questionid'";
        //     $resultc = $conn->query($sqlc);
        //     $rowc = $resultc->fetch_assoc();
        //     $correct = $rowc['answer'];
        //     if(strcmp($answer,$correct)==0){
        //         $ans_status="CORRECT";
        //         $update_ans="UPDATE tbl_answer_student SET status='$ans_status' WHERE id='$ans_id'";
        //         $conn->query($update_ans);
        //     }else{
        //          $ans_status="WRONG";
        //         $update_ans="UPDATE tbl_answer_student SET status='$ans_status' WHERE id='$ans_id'";
        //         $conn->query($update_ans);
        //     }

        // }
        $st="OPEN";
        $st1="CURRENT";
        $sqly = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
        $resulty = $conn->query($sqly);
        $rowy = $resulty->fetch_assoc();

        $acads=$rowy['id'];
        $exam_status="DONE";
        $update1="UPDATE tbl_student_exam SET status='$exam_status' WHERE user_id='$userid' AND academic_id='$acads' AND exam_id='$exam_id'";
        $conn->query($update1);
       $exam_start="YES";
       $_SESSION['exam_start']=$exam_start;



    }

  
    
    

}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Online Exam</title>
    <style>
@media only screen and (min-width: 1200px) {
  /* For large desktop: */
  #nav_head{
    width:25%;
  }
}

@media only screen and (max-width: 600px) {
  /* For mobile phones: */
  #nav_head{
    width:100%;
  }
}



        body {
    background-color: #eee
}

label.radio {
    cursor: pointer
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 4px 0px;
    border: 1px solid red;
    display: inline-block;
    color: red;
    width: 100px;
    text-align: center;
    border-radius: 3px;
    margin-top: 7px;
    text-transform: uppercase
}

label.radio input:checked+span {
    border-color: red;
    background-color: red;
    color: #fff
}

.ans {
    margin-left: 36px !important
}

.btn:focus {
    outline: 0 !important;
    box-shadow: none !important
}

.btn:active {
    outline: 0 !important;
    box-shadow: none !important
}
    </style>
    <script type="text/javascript">
        function getAnswer(id){
            var answer = document.getElementById(id).value;
            var newid;
          
            if(id.includes("choiceA")){
                newid = id.replace("choiceA", "");
                document.getElementById(id).classList.remove('btn-warning');
                document.getElementById(id).classList.add('btn-danger');

                document.getElementById("choiceB"+newid).classList.remove('btn-danger');
                document.getElementById("choiceB"+newid).classList.add('btn-warning');

                document.getElementById("choiceC"+newid).classList.remove('btn-danger');
                document.getElementById("choiceC"+newid).classList.add('btn-warning');

                document.getElementById("choiceD"+newid).classList.remove('btn-danger');
                document.getElementById("choiceD"+newid).classList.add('btn-warning');

                document.getElementById("choiceE"+newid).classList.remove('btn-danger');
                document.getElementById("choiceE"+newid).classList.add('btn-warning');
              
            }else if(id.includes("choiceB")){
                newid = id.replace("choiceB", "");
                document.getElementById(id).classList.remove('btn-warning');
                document.getElementById(id).classList.add('btn-danger');

                document.getElementById("choiceA"+newid).classList.remove('btn-danger');
                document.getElementById("choiceA"+newid).classList.add('btn-warning');

                document.getElementById("choiceC"+newid).classList.remove('btn-danger');
                document.getElementById("choiceC"+newid).classList.add('btn-warning');

                document.getElementById("choiceD"+newid).classList.remove('btn-danger');
                document.getElementById("choiceD"+newid).classList.add('btn-warning');

                document.getElementById("choiceE"+newid).classList.remove('btn-danger');
                document.getElementById("choiceE"+newid).classList.add('btn-warning');
            }else if(id.includes("choiceC")){
                newid = id.replace("choiceC", "");
                document.getElementById(id).classList.remove('btn-warning');
                document.getElementById(id).classList.add('btn-danger');

                document.getElementById("choiceB"+newid).classList.remove('btn-danger');
                document.getElementById("choiceB"+newid).classList.add('btn-warning');

                document.getElementById("choiceA"+newid).classList.remove('btn-danger');
                document.getElementById("choiceA"+newid).classList.add('btn-warning');

                document.getElementById("choiceD"+newid).classList.remove('btn-danger');
                document.getElementById("choiceD"+newid).classList.add('btn-warning');

                document.getElementById("choiceE"+newid).classList.remove('btn-danger');
                document.getElementById("choiceE"+newid).classList.add('btn-warning');
            }else if(id.includes("choiceD")){
                newid = id.replace("choiceD", "");
                document.getElementById(id).classList.remove('btn-warning');
                document.getElementById(id).classList.add('btn-danger');

                document.getElementById("choiceB"+newid).classList.remove('btn-danger');
                document.getElementById("choiceB"+newid).classList.add('btn-warning');

                document.getElementById("choiceC"+newid).classList.remove('btn-danger');
                document.getElementById("choiceC"+newid).classList.add('btn-warning');

                document.getElementById("choiceA"+newid).classList.remove('btn-danger');
                document.getElementById("choiceA"+newid).classList.add('btn-warning');

                document.getElementById("choiceE"+newid).classList.remove('btn-danger');
                document.getElementById("choiceE"+newid).classList.add('btn-warning');
            }else if(id.includes("choiceE")){
                newid = id.replace("choiceE", "");
                document.getElementById(id).classList.remove('btn-warning');
                document.getElementById(id).classList.add('btn-danger');

                document.getElementById("choiceB"+newid).classList.remove('btn-danger');
                document.getElementById("choiceB"+newid).classList.add('btn-warning');

                document.getElementById("choiceC"+newid).classList.remove('btn-danger');
                document.getElementById("choiceC"+newid).classList.add('btn-warning');

                document.getElementById("choiceD"+newid).classList.remove('btn-danger');
                document.getElementById("choiceD"+newid).classList.add('btn-warning');

                document.getElementById("choiceA"+newid).classList.remove('btn-danger');
                document.getElementById("choiceA"+newid).classList.add('btn-warning');
            }

            document.getElementById(newid).value=answer;
        }
         function getAnswer2(id){
           var answers = document.getElementById(id).src;
           var answer = answers.replace("http://ydocityofstotomas-scholarship.org.ph/src/questimage/","");
           
            var newid;
             if(id.includes("choiceA")){
                newid = id.replace("choiceA", "");
                document.getElementById("choiceA"+newid).style.border="0px";
                document.getElementById("choiceA"+newid).style.border="5px solid #ff0000";

                document.getElementById("choiceB"+newid).style.border="0px";
                document.getElementById("choiceC"+newid).style.border="0px";
                document.getElementById("choiceD"+newid).style.border="0px";
                document.getElementById("choiceE"+newid).style.border="0px";
             }else if(id.includes("choiceB")){
                newid = id.replace("choiceB", "");
                document.getElementById("choiceB"+newid).style.border="0px";
                document.getElementById("choiceB"+newid).style.border="5px solid #ff0000";

                document.getElementById("choiceA"+newid).style.border="0px";
                document.getElementById("choiceC"+newid).style.border="0px";
                document.getElementById("choiceD"+newid).style.border="0px";
                document.getElementById("choiceE"+newid).style.border="0px";
             }else if(id.includes("choiceC")){
                newid = id.replace("choiceC", "");
                document.getElementById("choiceC"+newid).style.border="0px";
                document.getElementById("choiceC"+newid).style.border="5px solid #ff0000";

                document.getElementById("choiceA"+newid).style.border="0px";
                document.getElementById("choiceB"+newid).style.border="0px";
                document.getElementById("choiceD"+newid).style.border="0px";
                document.getElementById("choiceE"+newid).style.border="0px";
             }else if(id.includes("choiceD")){
                newid = id.replace("choiceD", "");
                document.getElementById("choiceD"+newid).style.border="0px";
                document.getElementById("choiceD"+newid).style.border="5px solid #ff0000";

                document.getElementById("choiceA"+newid).style.border="0px";
                document.getElementById("choiceC"+newid).style.border="0px";
                document.getElementById("choiceB"+newid).style.border="0px";
                document.getElementById("choiceE"+newid).style.border="0px";
             }else if(id.includes("choiceE")){
                newid = id.replace("choiceE", "");
                document.getElementById("choiceE"+newid).style.border="0px";
                document.getElementById("choiceE"+newid).style.border="5px solid #ff0000";

                document.getElementById("choiceA"+newid).style.border="0px";
                document.getElementById("choiceC"+newid).style.border="0px";
                document.getElementById("choiceB"+newid).style.border="0px";
                document.getElementById("choiceD"+newid).style.border="0px";
             }
       
            document.getElementById(newid).value=answer;
        }
        // setTimeout(startTimer, 3000);
        var times=0;
        var timer_seconds;
        function getTime(){
            if(localStorage.getItem('timer')=="NULL"){
                 timer_seconds = document.getElementById('exam_timer').value;
                 localStorage.setItem('timer',timer_seconds);
            }else{
                timer_seconds=localStorage.getItem('timer');
            }
           

             setTimeout(startTimer, 1000);
        }
        function startTimer(){
            var hour_display;
            var minutes_display;
            var seconds_display;
           
            

            var hours = Math.floor((parseInt(timer_seconds)/3600),0);
            var hour_rem = (parseInt(timer_seconds)%3600);
            var minutes = Math.floor((parseInt(hour_rem)/60),0);
            var minutes_rem = (parseInt(hour_rem)%60);
            var seconds = minutes_rem;
            var display_time;

            if(hours<10){
                hour_display="0"+hours;
            }else{
                hour_display=hours;
            }

            if(minutes<10){
                minutes_display="0"+minutes;
            }else{
                minutes_display=minutes;
            }

            if(seconds<10){
                seconds_display="0"+seconds;
            }else{
                seconds_display=seconds;
            }

            if(timer_seconds){

            }
            timer_seconds--;
            if(timer_seconds<=0){
                // alert("TEST");
                document.getElementById("myForm").submit();
            }

            localStorage.setItem('timer',timer_seconds);

            display_time=hour_display+":"+minutes_display+":"+seconds_display;
            document.getElementById("display_time").innerHTML = "Remaining Time: "+display_time;
             document.getElementById("exam_timer").value = timer_seconds;
             setTimeout(startTimer, 1000);
        }

    </script>
  </head>
  <body >
   
 <?php
    if($exam_start=="NO"){
    echo '<div class="navbar navbar navbar-fixed-top container bg-primary" >
        <div class="navbar-header">
            <h2 class="navbar-brand" style="color:#fff;">
              Time: ';
              echo $_SESSION['display_time'];
            echo '</h2>
        </div>
        </div>';
        echo '<div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h4>';
                                echo $exam_title;
                                echo '</h4>
                            </div>
                        </div>
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h5 class="mt-1 ml-2" style="text-align:justify">';
                                echo $exam_instruction;
                                echo '</h5>
                            </div>
                           
                         
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="btn btn-primary d-flex align-items-center btn-danger" type="button"><i class="fa fa-angle-left mt-1 mr-1"></i>Cancel</button>

                        <button class="btn btn-primary border-success align-items-center btn-success" type="button" data-toggle="modal" data-target="#modalStart">Start<i class="fa fa-angle-right ml-2" ></i></button></div>
                    </div>
                </div>
            </div>
        </div>';
    }
 ?>

   <?php
    if($exam_start=="YES"){
        echo '<div class="navbar navbar navbar-fixed-top container bg-primary" id="nav_head" style="position:fixed;top:0;z-index:1;" >
        <div class="navbar-header ">
            <h2 class="navbar-brand" id="display_time" style="color:#fff;">
              </h2>
        </div>
        </div>';
         echo '<div class="container mt-5 style="margin-top:120px;">';
         echo '<div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>';
                            echo $section_title;
                            echo '</h4>';
                           
                           
                        echo '</div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <div class="row">
                                <div class="col-md-12">
                                  <h3 class="text-danger">Instruction: </h3>
                                </div>
                                 <div class="col-md-12">
                                   <h5 class="mt-1 ml-2">';
                                    echo $section_instruction;
                                    echo '</h5>
                                </div>
                            </div>
                          
                          
                        </div>
                       
                     
                    </div>';

                    
                    $count=0;
                    while($row7 = $result7->fetch_assoc()){
                        $quest_id =$row7['quest_id']; 
                        $sql8 = "SELECT * FROM tbl_questbank WHERE id='$quest_id'";
                        $result8 = $conn->query($sql8);
                        $row8 = $result8->fetch_assoc();
                        $questtype = $row8['quest_type'];

                        if($questtype=="TEXT"){
                            $count++;
                            $question=$row8['question_text'];
                            $choice_a=$row8['choice_text_a'];
                            $choice_b=$row8['choice_text_b'];
                            $choice_c=$row8['choice_text_c'];
                            $choice_d=$row8['choice_text_d'];
                            $choice_e=$row8['choice_text_e'];
                             echo '<div class="question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row align-items-center question-title">
                                     <div class="row">
                                        <div class="col-md-12">
                                           <h3 class="text-danger">Q. ';
                                    echo $count;
                                    echo '</h3>';
                                   
                                        echo '</div>
                                         <div class="col-md-12">';
                                           echo '<h5 class="mt-1 ml-2">';
                                    echo $question;
                                    echo '</h5>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                           <div class="col-md-12">
                                                    <button id="choiceA';
                                                    echo $row8['id'];
                                                    echo '" value="';
                                                     echo $choice_a;
                                                    echo '" onClick="getAnswer(this.id)" style="width:100%;text-align:left;height:auto;min-height:2em;" class="btn btn-warning">A. ';
                                                    echo $choice_a;
                                                    echo '</button>
                                            </div>
                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                              <div class="col-md-12">
                                                  <button id="choiceB';
                                                    echo $row8['id'];
                                                    echo '" value="';
                                                     echo $choice_b;
                                                    echo '" onClick="getAnswer(this.id)" style="width:100%;text-align:left;height:auto;min-height:2em;" class="btn btn-warning">B. ';
                                                    echo $choice_b;
                                                    echo '</button>
                                            </div>
                                            <div class="col-md-12" style="height:1em;">
                                            </div> 


                                              <div class="col-md-12">
                                                   <button id="choiceC';
                                                    echo $row8['id'];
                                                    echo '" value="';
                                                     echo $choice_c;
                                                    echo '" onClick="getAnswer(this.id)" style="width:100%;text-align:left;height:auto;min-height:2em;" class="btn btn-warning">C. ';
                                                    echo $choice_c;
                                                    echo '</button>
                                            </div>
                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                              <div class="col-md-12">
                                                   <button id="choiceD';
                                                    echo $row8['id'];
                                                    echo '" value="';
                                                     echo $choice_d;
                                                    echo '" onClick="getAnswer(this.id)" style="width:100%;text-align:left;height:auto;min-height:2em;" class="btn btn-warning">D. ';
                                                    echo $choice_d;
                                                    echo '</button>
                                            </div>
                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                              <div class="col-md-12">
                                                   <button id="choiceE';
                                                    echo $row8['id'];
                                                    echo '" value="';
                                                     echo $choice_e;
                                                    echo '" onClick="getAnswer(this.id)" style="width:100%;text-align:left;height:auto;min-height:2em;" class="btn btn-warning">E. ';
                                                    echo $choice_e;
                                                    echo '</button>
                                            </div>
                                            <div class="col-md-12" style="height:1em;">
                                            </div>   
                                          
                                    </div>
                                </div>
                             
                            </div>';
                        }else if($questtype=="IMAGE"){
                             $count++;
                            $question=$row8['question_image'];
                            $choice_a=$row8['choice_image_a'];
                            $choice_b=$row8['choice_image_b'];
                            $choice_c=$row8['choice_image_c'];
                            $choice_d=$row8['choice_image_d'];
                            $choice_e=$row8['choice_image_e'];
                             echo '<div class="question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row align-items-center question-title">';
                                  echo '<div class="row">';
                                      echo '<div class="col-md-12 col-xs-12" style="border:1px 0px 1px 1px solid;">';
                                           echo '<h3 class="text-danger">Q. ';
                                        echo $count;
                                        echo '</h3>';
                                      echo '</div>';
                                      echo '<div class="col-md-12 col-xs-12" style="text-align:left;">';
                                      echo '<img style="width:100%;" src="questimage/';
                                      echo $question;
                                      echo '">';
                                      echo '</div>';
                                  echo '</div>';
                             
                                echo '</div>
                                <div class="col-md-12" style="margin-top:1em;">
                                    <div class="row">
                                           <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>A.<img id="choiceA';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_a;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                             <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>B.<img id="choiceB';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_b;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                             <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>C.<img id="choiceC';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_c;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                            <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>D.<img id="choiceD';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_d;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                              <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>E.<img id="choiceE';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_e;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div>   
                                          
                                    </div>
                                </div>
                             
                            </div>';
                        }else{
                             $count++;
                           $question=$row8['question_text'];
                            $choice_a=$row8['choice_image_a'];
                            $choice_b=$row8['choice_image_b'];
                            $choice_c=$row8['choice_image_c'];
                            $choice_d=$row8['choice_image_d'];
                            $choice_e=$row8['choice_image_e'];
                             echo '<div class="question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row align-items-center question-title">';
                                 echo '<div class="row">
                                        <div class="col-md-12">
                                           <h3 class="text-danger">Q. ';
                                    echo $count;
                                    echo '</h3>';
                                   
                                        echo '</div>
                                         <div class="col-md-12">';
                                           echo '<h5 class="mt-1 ml-2">';
                                    echo $question;
                                    echo '</h5>
                                        </div>
                                    </div>';
                             
                                echo '</div>
                                <div class="col-md-12">
                                    <div class="row">
                                           <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>A.<img id="choiceA';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_a;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                             <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>B.<img id="choiceB';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_b;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                             <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>C.<img id="choiceC';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_c;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                            <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>D.<img id="choiceD';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_d;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div> 

                                              <div class="col-md-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-12">';
                                                     echo '<p>E.<img id="choiceE';
                                                     echo $row8['id'];
                                                     echo '" onClick="getAnswer2(this.id)" style="height:75px;" src="questimage/';
                                                      echo $choice_e;
                                                      echo '"></p>';
                                                    echo '</div>';
                                                   
                                                echo '</div>';
                                            echo '</div>

                                            <div class="col-md-12" style="height:1em;">
                                            </div>   
                                          
                                    </div>
                                </div>
                             
                            </div>';
                        }

                        
                    }
                   

                     echo '<input type="hidden" id="exam_timer" value="';
                            echo $_SESSION['exam_timer'];
                            echo '" name="exam_timer">';
                    while($row9 = $result9->fetch_assoc()){
                        $quest_ids =$row9['quest_id']; 
                        $sql10 = "SELECT * FROM tbl_questbank WHERE id='$quest_ids'";
                        $result10 = $conn->query($sql10);
                        $row10 = $result10->fetch_assoc();
                        echo '<input type="hidden" name="answerid[]" value="';
                        echo $row10['id'];
                        echo '">';
                        echo '<input type="hidden" name="answer[]" id="';
                        echo $row10['id'];
                        echo '">';
                    }

                    echo '<div class="d-flex flex-row justify-content-between p-3 bg-white" style="text-align:right;"><a class="btn btn-primary border-success align-items-center btn-success" id="submit_answer" href="sendExam1.php"><i class="fa fa-angle-right ml-2"></i></a></div>
                   
                </div>
            </div>
        </div>
    </div>';
     echo '</div>';
    }


   ?>
<?php
    if($exam_start=="DONE"){
        echo '<div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">
                       
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h5 class="mt-1 ml-2" style="text-align:justify">';
                                echo "Thank you for answer those questions. Please standy and wait for our announcement.";
                                echo '</h5>
                            </div>
                           
                         
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                       
                        <a href="updatestudent.php" class="btn btn-primary border-success align-items-center btn-success" type="button">Finish<i class="fa fa-angle-right ml-2" ></i></a></div>
                    </div>
                </div>
            </div>
        </div>';
    }
 ?>


<div class="modal fade" id="modalStart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Start Exam?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">

         <div class="col-md-12">
            <p>
                Do you want to start the Exam?
            <br>
              Note:<span style="color:red;">You cannot undo this action after you press [Yes] button.</span>
            </p>
            <input type="hidden" name="users" id="removeid" value="">
         </div>
         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="startExam.php" class="btn btn-primary" >Yes</a>
      </div>
    </div>
  
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>