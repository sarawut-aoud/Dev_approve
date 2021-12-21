<?php
//เกี่ยวกับวันที่
function status($sts){

	if($sts==1){
		echo $message =  '<span class="badge rounded-pill bg-warning">รอพิจารณา</span>';
	}elseif($sts==2){
		echo $message =  '<span class="badge rounded-pill bg-info">อนุมัติ</span>';
	}elseif($sts==3){
		echo $message =  '<span class="badge rounded-pill bg-danger">ไม่อนุมัติ</span>';
	}elseif($sts==4){
		echo $message =  '<span class="badge rounded-pill bg-primary">อยู่ระหว่างพัฒนา</span>';
	}elseif($sts==5){
		echo $message =  '<span class="badge rounded-pill bg-success">เสร็จสิ้น</span>';
	}

}

function getNowDateTh() {
	$yy = date('Y')+543;
	$mm = date('m');
	$dd = date('d');
	return $dd.'-'.$mm.'-'.$yy;
} 

function getNowDateEng() {
	$yy = date('Y');
	$mm = date('m');
	$dd = date('d');
	return $yy.'-'.$mm.'-'.$dd;
}
function getMountname($mount){
	$mount = $mount-1;
	$thaimonth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	for($i=0;$i<=12;$i++)
	{
		if($i==$mount)
			$name = $thaimonth[$i];
	}
	return $name;			
}
function GetShotMountname($mount){
	$mount = $mount-1;
	$thaimonth = array("ม.ก.","กุ.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	for($i=0;$i<=12;$i++)
	{
		if($i==$mount)
			$name = $thaimonth[$i];
	}
	return $name;			
}

//แปลง Date(dd-mm-yyyy)(พ.ศ.) เป็น Date(yyyy-mm-dd)(ค.ศ.) 
function DateThaiToEng ($value){
	$dd = explode("-",$value);	
	$yy = $dd[2]-543;
	$date = $yy."-".$dd[1]."-".$dd[0];
	return $date;
}
		//แปลง Date(yyyy-mm-dd)(ค.ศ.) เป็น Date(dd-mm-yyyy)(พ.ศ.)
function DateEngToThai ($value){
	$date = substr($value,0,10);
	$dd = explode("-",$date);	
	$year = $dd[0]+543;
	$date = $dd[2]." ".GetShotMountname($dd[1])." ".$year;
	return $date;
}
//แปลง Date(dd/mm/yyyy)(ค.ศ.) เป็น Date(yyyy-mm-dd)(ค.ศ.)
function DateEngToEngMMDDYYYY ($value){
	$dd = explode("/",$value);	
	$yy = $dd[2];
	$date = $yy."-".sprintf("%02d",$dd[0])."-".sprintf("%02d",$dd[1]);
	return $date;
}
// เข้ารหัสอักษร
function encodeStr($variable) { 
	$key = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$index = 0;
	$temp="";
	$variable = str_replace("=","?O",$variable);
	for($i=0; $i < strlen($variable); $i++)
	{
		$temp .= $variable{$i}.$key{$index};      
		$index++;
		if($index >= strlen($key)) $index = 0;
	}
	$variable = strrev($temp);
	$variable = base64_encode($variable);
	$variable = utf8_encode($variable);
	$variable = urlencode($variable);
	$variable = str_rot13($variable);
	return $variable;
}
//ถอดรหัสอักษร		
function decodeStr($enVariable) {
	$enVariable = str_rot13($enVariable);
	$enVariable = urldecode($enVariable);
	$enVariable = utf8_decode($enVariable);
	$enVariable = base64_decode($enVariable);
	$enVariable = strrev($enVariable);
	$current = 0;
	$temp="";
	for($i=0; $i < strlen($enVariable); $i++)
	{
		if($current%2==0){
			$temp .= $enVariable{$i};          
		}
		$current++;
	}
	$temp = str_replace("?O","=",$temp);
	parse_str($temp, $variable); 
	return $temp;

}
//แปลง Date(yyyy-mm-dd)(ค.ศ.) เป็น Date(dd-mm-yyyy)(พ.ศ.)
function DateEngToThaiWithTime ($value){
	$date = substr($value,0,10);
	$time = substr($value,11,8);
	$dd = split("-",$date);	
	$x = $dd[0]+543;
	$date = $dd[2]."-".$dd[1]."-".$x;
	return $date.' '.$time;
}
function thai_date($time){  
	$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
	$thai_month_arr=array(  
		"0"=>"",  
		"1"=>"มกราคม",  
		"2"=>"กุมภาพันธ์",  
		"3"=>"มีนาคม",  
		"4"=>"เมษายน",  
		"5"=>"พฤษภาคม",  
		"6"=>"มิถุนายน",   
		"7"=>"กรกฎาคม",  
		"8"=>"สิงหาคม",  
		"9"=>"กันยายน",  
		"10"=>"ตุลาคม",  
		"11"=>"พฤศจิกายน",  
		"12"=>"ธันวาคม"                    
	);  
	$thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
	$thai_date_return.= "ที่ ".date("j",$time);  
	$thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];  
	$thai_date_return.= " พ.ศ.".(date("Y",$time)+543);  
   	// $thai_date_return.= "  ".date("H:i",$time)." น.";  
	return $thai_date_return;  
}
//นับเดือน จาก เดือนปี ถึง เดือนปี

// $month=$_POST['month_start'];
// $next_month=$_POST['month_end'];
// $year=$_POST['year_start'];
// $next_year=$_POST['year_end'];
// $sum_month=$next_month-$month;
// $arr_month=array();

// $time_start = microtime(true);

function utf8_to_tis620($string)
{
	$str = $string;
	$res = "";
	for ($i = 0; $i < strlen($str); $i++) {
		if (ord($str[$i]) == 224) {
			$unicode = ord($str[$i+2]) & 0x3F;
			$unicode |= (ord($str[$i+1]) & 0x3F) << 6;
			$unicode |= (ord($str[$i]) & 0x0F) << 12;
			$res .= chr($unicode-0x0E00+0xA0);
			$i += 2;
		} else {
			$res .= $str[$i];
		}
	}
	return $res;
}
	//แปลงจาก tis620 เป็น utf-8  
function tis620_to_utf8($tis) {
	for( $i=0 ; $i< strlen($tis) ; $i++ ){
		$s = substr($tis, $i, 1);
		$val = ord($s);
		if( $val < 0x80 ){
			$utf8 .= $s;
		} elseif ( ( 0xA1 <= $val and $val <= 0xDA ) or ( 0xDF <= $val and $val <= 0xFB ) ){
			$unicode = 0x0E00 + $val - 0xA0;
			$utf8 .= chr( 0xE0 | ($unicode >> 12) );
			$utf8 .= chr( 0x80 | (($unicode >> 6) & 0x3F) );
			$utf8 .= chr( 0x80 | ($unicode & 0x3F) );
		}
	}
	return $utf8;
}


?>