<?php
    session_start();
    include('config.php');

$errors= array();
$count=0;
      $file_name = $_FILES['question_image']['name'];
      $id=$_SESSION['questid'];

    if(strlen($file_name)>0){
         $file_size =$_FILES['question_image']['size'];
          $file_tmp =$_FILES['question_image']['tmp_name'];
          $file_type=$_FILES['question_image']['type'];
          $file_ext = explode('.',$file_name);
          $file_ext = end($file_ext);
          $file_ext = strtolower($file_ext);

          $file_ext=strtolower(end(explode('.',$file_name)));
          
        $temp = explode(".", $_FILES["question_image"]["name"]);
        $count++;
        $enc = md5($count);
      $newfilename = round(microtime(true)) . $enc .'.' . end($temp);

         $extensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$extensions)=== false){
             $errors[]="The extension of the image of your question is not allowed, please choose a JPEG or PNG file.";
          }       
          if($file_size > 200000){
             $errors[]='The file size of your question image must be equal or less  than 200 KB';
          }
          if(empty($errors)==true){
            $update = "UPDATE tbl_questbank SET question_image='$newfilename' WHERE id='$id' ";
            $conn->query($update);
            move_uploaded_file($file_tmp,"questimage/".$newfilename);
          }else{
            print_r($errors);
          }

    }else{

    }

     
 
// CHOICEA
 	 $file_name_a = $_FILES['choice_a']['name'];

    if(strlen($file_name_a)>0){
          $file_size_a =$_FILES['choice_a']['size'];
      $file_tmp_a =$_FILES['choice_a']['tmp_name'];
      $file_type_a=$_FILES['choice_a']['type'];
      $file_ext_a = explode('.',$file_name_a);
      $file_ext_a = end($file_ext_a);
      $file_ext_a = strtolower($file_ext_a);

      $file_ext_a=strtolower(end(explode('.',$file_name_a)));
      
    $temp_a = explode(".", $_FILES["choice_a"]["name"]);
      $count++;
    $enc = md5($count);
  $newfilename_a = round(microtime(true)) . $enc .'.' . end($temp_a);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext_a,$extensions)=== false){
         $errors[]="The extension of the image of your choice A is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size_a > 200000){
         $errors[]='The file size of your choice A image must be equal or less  than 200 KB';
      }
          if(empty($errors)==true){
            $update1 = "UPDATE tbl_questbank SET choice_image_a='$newfilename_a' WHERE id='$id' ";
            $conn->query($update1);
            move_uploaded_file($file_tmp_a,"questimage/".$newfilename_a);
          }else{
            print_r($errors);
          }

    }else{

    }

    


// CHOICEB
      $file_name_b = $_FILES['choice_b']['name'];
      if(strlen($file_name_b)>0){
      $file_size_b =$_FILES['choice_b']['size'];
      $file_tmp_b =$_FILES['choice_b']['tmp_name'];
      $file_type_b=$_FILES['choice_b']['type'];
      $file_ext_b = explode('.',$file_name_b);
      $file_ext_b = end($file_ext_b);
      $file_ext_b = strtolower($file_ext_b);

      $file_ext_b=strtolower(end(explode('.',$file_name_b)));
      
    $temp_b = explode(".", $_FILES["choice_b"]["name"]);
      $count++;
    $enc = md5($count);
  $newfilename_b = round(microtime(true)) . $enc .'.' . end($temp_b);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext_b,$extensions)=== false){
         $errors[]="The extension of the image of your choice B is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size_b > 200000){
         $errors[]='The file size of your choice B image must be equal or less  than 200 KB';
      }
          if(empty($errors)==true){
            $update2 = "UPDATE tbl_questbank SET choice_image_b='$newfilename_b' WHERE id='$id' ";
            $conn->query($update2);
            move_uploaded_file($file_tmp_b,"questimage/".$newfilename_b);
          }else{
            print_r($errors);
          }

    }else{

    }
      

// CHOICEC
      $file_name_c = $_FILES['choice_c']['name'];
       if(strlen($file_name_c)>0){
        $file_size_c =$_FILES['choice_c']['size'];
      $file_tmp_c =$_FILES['choice_c']['tmp_name'];
      $file_type_c=$_FILES['choice_c']['type'];
      $file_ext_c = explode('.',$file_name_c);
      $file_ext_c = end($file_ext_c);
      $file_ext_c = strtolower($file_ext_c);

      $file_ext_c=strtolower(end(explode('.',$file_name_c)));
      
    $temp_c = explode(".", $_FILES["choice_c"]["name"]);
      $count++;
    $enc = md5($count);
  $newfilename_c = round(microtime(true)) . $enc .'.' . end($temp_c);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext_c,$extensions)=== false){
         $errors[]="The extension of the image of your choice C is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size_c > 200000){
         $errors[]='The file size of your choice C image must be equal or less  than 200 KB';
      }
          if(empty($errors)==true){
            $update3 = "UPDATE tbl_questbank SET choice_image_c='$newfilename_c' WHERE id='$id' ";
            $conn->query($update3);
            move_uploaded_file($file_tmp_c,"questimage/".$newfilename_c);
          }else{
            print_r($errors);
          }

    }else{

    }
    

// CHOICED
      $file_name_d = $_FILES['choice_d']['name'];
        if(strlen($file_name_d)>0){
       $file_size_d =$_FILES['choice_d']['size'];
      $file_tmp_d =$_FILES['choice_d']['tmp_name'];
      $file_type_d=$_FILES['choice_d']['type'];
      $file_ext_d = explode('.',$file_name_d);
      $file_ext_d = end($file_ext_d);
      $file_ext_d = strtolower($file_ext_d);

      $file_ext_d=strtolower(end(explode('.',$file_name_d)));
      
    $temp_d = explode(".", $_FILES["choice_d"]["name"]);
      $count++;
    $enc = md5($count);
  $newfilename_d = round(microtime(true)) . $enc .'.' . end($temp_d);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext_d,$extensions)=== false){
         $errors[]="The extension of the image of your choice D is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size_d > 200000){
         $errors[]='The file size of your choice D image must be equal or less  than 200 KB';
      }
          if(empty($errors)==true){
            $update4 = "UPDATE tbl_questbank SET choice_image_d='$newfilename_d' WHERE id='$id' ";
            $conn->query($update4);
            move_uploaded_file($file_tmp_d,"questimage/".$newfilename_d);
          }else{
            print_r($errors);
          }

    }else{

    }
      

// CHOICEE
      $file_name_e = $_FILES['choice_e']['name'];
      if(strlen($file_name_e)>0){
    $file_size_e =$_FILES['choice_e']['size'];
      $file_tmp_e =$_FILES['choice_e']['tmp_name'];
      $file_type_e=$_FILES['choice_e']['type'];
      $file_ext_e = explode('.',$file_name_e);
      $file_ext_e = end($file_ext_e);
      $file_ext_e = strtolower($file_ext_e);

      $file_ext_e=strtolower(end(explode('.',$file_name_e)));
      
    $temp_e = explode(".", $_FILES["choice_e"]["name"]);
      $count++;
    $enc = md5($count);
  $newfilename_e = round(microtime(true)) . $enc .'.' . end($temp_e);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext_e,$extensions)=== false){
         $errors[]="The extension of the image of your choice E is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size_e > 200000){
         $errors[]='The file size of your choice E image must be equal or less  than 200 KB';
      }
          if(empty($errors)==true){
            $update5 = "UPDATE tbl_questbank SET choice_image_e='$newfilename_e' WHERE id='$id' ";
            $conn->query($update5);
            move_uploaded_file($file_tmp_e,"questimage/".$newfilename_e);
          }else{
            print_r($errors);
          }

    }else{

    }
      

    if(empty($errors)==true){
    $answer = $_POST['answer'];
		
    $sql = "SELECT * FROM tbl_questbank WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

		$correct_answer="";
			if($answer=="A"){
         
				$correct_answer=$row['choice_image_a'];
			}else if($answer=="B"){
				  $correct_answer=$row['choice_image_b'];
			}else if($answer=="C"){
				  $correct_answer=$row['choice_image_c'];
			}else if($answer=="D"){
				  $correct_answer=$row['choice_image_d'];
			}else if($answer=="E"){
				  $correct_answer=$row['choice_image_e'];
			}


		



		 $update6 = "UPDATE tbl_questbank SET answer='$correct_answer' WHERE id='$id' ";
            $conn->query($update6);

	

			echo '<script language="javascript">';
              echo 'alert("You successfully update question")';
              echo '</script>';
			echo '<script language="javascript">';
				// echo 'localStorage.setItem("notif","1")';
		  		echo 'window.open("questBank.php","_self")';
		  		echo '</script>';

      }else{
         print_r($errors);
      }
?>