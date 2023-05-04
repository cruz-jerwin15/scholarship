<?php



function getReferral(){
date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');
$hour=date('h');
$min=date('i');
$sec=date('s');

$code="";

	if($day=='01'){
		$code.="A";
	}else if($day=='02'){
		$code.="B";
	}else if($day=='03'){
		$code.="C";
	}else if($day=='04'){
		$code.="D";
	}else if($day=='05'){
		$code.="E";
	}else if($day=='06'){
		$code.="F";
	}else if($day=='07'){
		$code.="G";
	}else if($day=='08'){
		$code.="H";
	}else if($day=='09'){
		$code.="I";
	}else if($day=='10'){
		$code.="J";
	}else if($day=='11'){
		$code.="K";
	}else if($day=='12'){
		$code.="L";
	}else if($day=='13'){
		$code.="M";
	}else if($day=='14'){
		$code.="N";
	}else if($day=='15'){
		$code.="O";
	}else if($day=='16'){
		$code.="P";
	}else if($day=='17'){
		$code.="Q";
	}else if($day=='18'){
		$code.="R";
	}else if($day=='19'){
		$code.="S";
	}else if($day=='20'){
		$code.="T";
	}else if($day=='21'){
		$code.="U";
	}else if($day=='22'){
		$code.="V";
	}else if($day=='23'){
		$code.="W";
	}else if($day=='24'){
		$code.="X";
	}else if($day=='25'){
		$code.="Y";
	}else if($day=='26'){
		$code.="Z";
	}else if($day=='27'){
		$code.="1";
	}else if($day=='28'){
		$code.="2";
	}else if($day=='29'){
		$code.="3";
	}else if($day=='30'){
		$code.="4";
	}else{
		$code.="5";
	}

	if($month=='01'){
		$code.="A";
	}else if($month=='02'){
		$code.="B";
	}else if($month=='03'){
		$code.="C";
	}else if($month=='04'){
		$code.="D";
	}else if($month=='05'){
		$code.="E";
	}else if($month=='06'){
		$code.="F";
	}else if($month=='07'){
		$code.="G";
	}else if($month=='08'){
		$code.="H";
	}else if($month=='09'){
		$code.="I";
	}else if($month=='10'){
		$code.="J";
	}else if($month=='11'){
		$code.="K";
	}else if($month=='12'){
		$code.="L";
	}

	if($hour=="01"){
		$code.="A";
	}else if($hour=="02"){
		$code.="B";
	}else if($hour=="03"){
		$code.="C";
	}else if($hour=="04"){
		$code.="D";
	}else if($hour=="05"){
		$code.="E";
	}else if($hour=="06"){
		$code.="F";
	}else if($hour=="07"){
		$code.="J";
	}else if($hour=="08"){
		$code.="H";
	}else if($hour=="09"){
		$code.="I";
	}else if($hour=="10"){
		$code.="J";
	}else if($hour=="11"){
		$code.="K";
	}else if($hour=="12"){
		$code.="L";
	}else if($hour=="13"){
		$code.="M";
	}else if($hour=="14"){
		$code.="N";
	}else if($hour=="15"){
		$code.="O";
	}else if($hour=="16"){
		$code.="P";
	}else if($hour=="17"){
		$code.="Q";
	}else if($hour=="18"){
		$code.="R";
	}else if($hour=="19"){
		$code.="S";
	}else if($hour=="20"){
		$code.="T";
	}else if($hour=="21"){
		$code.="U";
	}else if($hour=="22"){
		$code.="V";
	}else if($hour=="23"){
		$code.="W";
	}else if($hour=="24"){
		$code.="X";
	}else{
		$code.="Y";
	}


	if($year=='2016'){
		$code .="A";
	}else if($year=='2017'){
		$code .="B";
	}else if($year=='2018'){
		$code .="C";
	}else if($year=='2019'){
		$code .="D";
	}else if($year=='2020'){
		$code .="E";
	}

	if($sec=="01"){
		$code.="A";
	}else if($sec=="02"){
		$code.="B";
	}else if($sec=="03"){
		$code.="C";
	}else if($sec=="04"){
		$code.="D";
	}else if($sec=="05"){
		$code.="E";
	}else if($sec=="06"){
		$code.="F";
	}else if($sec=="07"){
		$code.="G";
	}else if($sec=="08"){
		$code.="H";
	}else if($sec=="09"){
		$code.="I";
	}else if($sec=="10"){
		$code.="J";
	}else if($sec=="11"){
		$code.="K";
	}else if($sec=="12"){
		$code.="L";
	}else if($sec=="13"){
		$code.="M";
	}else if($sec=="14"){
		$code.="N";
	}else if($sec=="15"){
		$code.="O";
	}else if($sec=="16"){
		$code.="P";
	}else if($sec=="17"){
		$code.="Q";
	}else if($sec=="18"){
		$code.="R";
	}else if($sec=="19"){
		$code.="S";
	}else if($sec=="20"){
		$code.="T";
	}else if($sec=="21"){
		$code.="U";
	}else if($sec=="22"){
		$code.="V";
	}else if($sec=="23"){
		$code.="W";
	}else if($sec=="24"){
		$code.="X";
	}else if($sec=="25"){
		$code.="Y";
	}else if($sec=="26"){
		$code.="Z";
	}else if($sec=="27"){
		$code.="1";
	}else if($sec=="28"){
		$code.="2";
	}else if($sec=="29"){
		$code.="3";
	}else if($sec=="30"){
		$code.="4";
	}else if($sec=="31"){
		$code.="5";
	}else if($sec=="32"){
		$code.="6";
	}else if($sec=="33"){
		$code.="7";
	}else if($sec=="34"){
		$code.="8";
	}else if($sec=="35"){
		$code.="9";
	}else if($sec=="36"){
		$code.="11";
	}else if($sec=="37"){
		$code.="12";
	}else if($sec=="38"){
		$code.="13";
	}else if($sec=="39"){
		$code.="14";
	}else if($sec=="40"){
		$code.="15";
	}else if($sec=="41"){
		$code.="16";
	}else if($sec=="42"){
		$code.="17";
	}else if($sec=="43"){
		$code.="18";
	}else if($sec=="44"){
		$code.="19";
	}else if($sec=="45"){
		$code.="21";
	}else if($sec=="46"){
		$code.="22";
	}else if($sec=="47"){
		$code.="23";
	}else if($sec=="48"){
		$code.="24";
	}else if($sec=="49"){
		$code.="25";
	}else if($sec=="50"){
		$code.="26";
	}else if($sec=="51"){
		$code.="27";
	}else if($sec=="52"){
		$code.="28";
	}else if($sec=="53"){
		$code.="29";
	}else if($sec=="54"){
		$code.="31";
	}else if($sec=="55"){
		$code.="32";
	}else if($sec=="56"){
		$code.="33";
	}else if($sec=="57"){
		$code.="34";
	}else if($sec=="58"){
		$code.="35";
	}else if($sec=="59"){
		$code.="36";
	}else{
		$code.="37";
	}

if($min=="01"){
		$code.="A";
	}else if($min=="02"){
		$code.="B";
	}else if($min=="03"){
		$code.="C";
	}else if($min=="04"){
		$code.="D";
	}else if($min=="05"){
		$code.="E";
	}else if($min=="06"){
		$code.="F";
	}else if($min=="07"){
		$code.="G";
	}else if($min=="08"){
		$code.="H";
	}else if($min=="09"){
		$code.="I";
	}else if($min=="10"){
		$code.="J";
	}else if($min=="11"){
		$code.="K";
	}else if($min=="12"){
		$code.="L";
	}else if($min=="13"){
		$code.="M";
	}else if($min=="14"){
		$code.="N";
	}else if($min=="15"){
		$code.="O";
	}else if($min=="16"){
		$code.="P";
	}else if($min=="17"){
		$code.="Q";
	}else if($min=="18"){
		$code.="R";
	}else if($min=="19"){
		$code.="S";
	}else if($min=="20"){
		$code.="T";
	}else if($min=="21"){
		$code.="U";
	}else if($min=="22"){
		$code.="V";
	}else if($min=="23"){
		$code.="W";
	}else if($min=="24"){
		$code.="X";
	}else if($min=="25"){
		$code.="Y";
	}else if($min=="26"){
		$code.="Z";
	}else if($min=="27"){
		$code.="1";
	}else if($min=="28"){
		$code.="2";
	}else if($min=="29"){
		$code.="3";
	}else if($min=="30"){
		$code.="4";
	}else if($min=="31"){
		$code.="5";
	}else if($min=="32"){
		$code.="6";
	}else if($min=="33"){
		$code.="7";
	}else if($min=="34"){
		$code.="8";
	}else if($min=="35"){
		$code.="9";
	}else if($min=="36"){
		$code.="11";
	}else if($min=="37"){
		$code.="12";
	}else if($min=="38"){
		$code.="13";
	}else if($min=="39"){
		$code.="14";
	}else if($min=="40"){
		$code.="15";
	}else if($min=="41"){
		$code.="16";
	}else if($min=="42"){
		$code.="17";
	}else if($min=="43"){
		$code.="18";
	}else if($min=="44"){
		$code.="19";
	}else if($min=="45"){
		$code.="21";
	}else if($min=="46"){
		$code.="22";
	}else if($min=="47"){
		$code.="23";
	}else if($min=="48"){
		$code.="24";
	}else if($min=="49"){
		$code.="25";
	}else if($min=="50"){
		$code.="26";
	}else if($min=="51"){
		$code.="27";
	}else if($min=="52"){
		$code.="28";
	}else if($min=="53"){
		$code.="29";
	}else if($min=="54"){
		$code.="31";
	}else if($min=="55"){
		$code.="32";
	}else if($min=="56"){
		$code.="33";
	}else if($min=="57"){
		$code.="34";
	}else if($min=="58"){
		$code.="35";
	}else if($min=="59"){
		$code.="36";
	}else{
		$code.="37";
	}

	return $code;
}


?>