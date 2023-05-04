<?php
session_start();
include 'config.php';
$student_id = $_POST['userid'];
$user_id = $_SESSION['userid'];
$process = "NEW REQUIREMENTS";

date_default_timezone_set("Asia/Manila");
$year = date('Y');
$month = date('m');
$day = date('d');
$hour = date('H');
$minute = date('i');
$seconds = date('s');

$datess = $year . "-" . $month . "-" . $day;
$timesss = $hour . ":" . $minute . ":" . $seconds;
$date_time = $datess . " " . $timesss;


$applicationform = $_POST['applicationform'];
$birthcertificate = $_POST['birthcertificate'];
$schoolclearance = $_POST['schoolclearance'];
$gradereport = $_POST['gradereport'];
$housesketch = $_POST['housesketch'];
$barangayclearance = $_POST['barangayclearance'];
$parentvotersid = $_POST['parentvotersid'];
$indigency = $_POST['indigency'];

$itr = $_POST['itr'];
$picture = $_POST['picture'];




$sqlz = "SELECT * FROM tbl_college_requirements WHERE user_id='$student_id'";
$resultz = $conn->query($sqlz);
$rowz = $resultz->fetch_assoc();

$birth_1 = $rowz['birthcertificate'];
$school_1 = $rowz['schoolclearance'];

$applicationform_1 = $rowz['applicationform'];

$gradereport_1 = $rowz['gradereport'];
$housesketch_1 = $rowz['housesketch'];
$barangayclearance_1 = $rowz['barangayclearance'];
$parentvotersid_1 = $rowz['parentvotersid'];
$indigency_1 = $rowz['indigency'];

$itr_1 = $rowz['itr'];
$picture_1 = $rowz['picture'];

if ($_SESSION['studenttype'] == "shscholar") {
	$yourvotersid = "";
} else {

	$yourvotersid = $_POST['yourvotersid'];
	$yourvotersid_1 = $rowz['yourvotersid'];
}


//Birth
if ($birthcertificate == 1) {
	$remarks = "Approved birth certificate";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id' ";
	$result = $conn->query($query);

	if ($birth_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($birthcertificate == 0) {
	$remarks = "Disapproved birth certificate";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);

	if ($birth_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//School Clearance
if ($schoolclearance == 1) {
	$remarks = "Approved school clearance";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id' AND process='$process'";
	$result = $conn->query($query);

	if ($school_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($schoolclearance == 0) {
	$remarks = "Disapproved school clearance";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
	$result = $conn->query($query);
	if ($school_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//Grade Report
if ($gradereport == 1) {
	$remarks = "Approved grade report";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
	$result = $conn->query($query);
	if ($gradereport_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($gradereport == 0) {
	$remarks = "Disapproved grade report";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
	$result = $conn->query($query);
	if ($gradereport_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$housesketch = $_POST['housesketch'];
if ($housesketch == 1) {
	$remarks = "Approved house sketch";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($housesketch_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($housesketch == 0) {
	$remarks = "Disapproved house sketch";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($housesketch_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$barangayclearance = $_POST['barangayclearance'];
if ($barangayclearance == 1) {
	$remarks = "Approved barangay clearance";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($barangayclearance_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($barangayclearance == 0) {
	$remarks = "Disapproved barangay clearance";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($barangayclearance_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$parentvotersid = $_POST['parentvotersid'];
if ($parentvotersid == 1) {
	$remarks = "Approved parent voters id";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($parentvotersid_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($parentvotersid == 0) {
	$remarks = "Disapproved parent voters id";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($parentvotersid_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$indigency = $_POST['indigency'];
if ($indigency == 1) {
	$remarks = "Approved indigency";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($indigency_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($indigency == 0) {
	$remarks = "Disapproved indigency";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($indigency_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}

//$itr = $_POST['itr'];
if ($itr == 1) {
	$remarks = "Approved income tax return";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($itr_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($itr == 0) {
	$remarks = "Disapproved income tax return";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($itr_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$picture = $_POST['picture'];
if ($picture == 1) {
	$remarks = "Approved 2 x 2 picture";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($picture_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($picture == 0) {
	$remarks = "Disapproved 2 x 2 picture";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	$result = $conn->query($query);
	if ($picture_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}
//$applicationform = $_POST['applicationform'];
if ($applicationform == 1) {
	$remarks = "Approved application form";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
	$result = $conn->query($query);
	if ($applicationform_1 != 1) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
} else if ($applicationform == 0) {
	$remarks = "Disapproved application form";
	$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
	$result = $conn->query($query);
	if ($applicationform_1 != 0) {
		$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	}
}

if ($_SESSION['studenttype'] == "shscholar") {
	$yourvotersid = "";
} else {

	$yourvotersid = $_POST['yourvotersid'];
	$yourvotersid_1 = $rowz['yourvotersid'];
	//$applicationform = $_POST['applicationform'];
	if ($yourvotersid == 1) {
		$remarks = "Approved student voters id";
		$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
		$result = $conn->query($query);
		if ($yourvotersid_1 != 1) {
			$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		}
	} else if ($yourvotersid == 0) {
		$remarks = "Disapproved student voters id";
		$query = "SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'  AND process='$process'";
		$result = $conn->query($query);
		if ($yourvotersid_1 != 0) {
			$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		}
	}
}

$sql = "UPDATE tbl_college_requirements SET applicationform='$applicationform',birthcertificate='$birthcertificate',gradereport='$gradereport',schoolclearance='$schoolclearance',parentvotersid='$parentvotersid',yourvotersid='$yourvotersid',housesketch='$housesketch',barangayclearance='$barangayclearance',itr='$itr',indigency='$indigency',picture='$picture' WHERE user_id='$student_id'";
$conn->query($sql);

$studenttype = $_SESSION['studenttype'];

echo '<script language="javascript">';
echo 'alert("Successfully update requirements")';
echo '</script>';
echo '<script language="javascript">';
// echo 'localStorage.setItem("notif","1")';
if ($_SESSION['studenttype'] == "collegerecipient") {
	echo 'window.open("newCollegeRecipient.php","_self")';
} else if ($_SESSION['studenttype'] == "shscholar") {
	echo 'window.open("newSHS.php","_self")';
} else if ($_SESSION['studenttype'] == "fullscholar") {
	echo 'window.open("newCollegeFullScholar.php","_self")';
}

echo '</script>';
