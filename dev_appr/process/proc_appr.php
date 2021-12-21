<?php
session_start();
include_once("../class/Cls_ConnectDB.php");
include_once("../class/Cls_appr.php");

$Obj_ConnectDB = new Cls_ConnectDB();
$Obj_Appr = new Cls_Appr();

//เรียกใช้ในหน้า form
// $result1 = $Obj_Example->example();
// $row1 = mysql_fetch_array($result1)

if($_REQUEST['method']=='add_approve'){
	$user_add = $_SESSION["UserID"];
	$cate_id = $_POST['cate_id'];
	$sys_id = $_POST['sys_id'];
	$dev_title = $_POST['dev_title'];
	$dev_detail = $_POST['dev_detail'];

	$dev_file = $_FILES['files']['tmp_name'];
	$dev_file_name = $_FILES['files']['name'];

	if($dev_file!= ''){
		copy($dev_file, "../upload/" . $dev_file_name);
		$Obj_Appr->Add_approve($user_add,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file_name);

		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = '../dev_approveAll.php';";
		echo "</script>";

	}else{
		$Obj_Appr->Add_approve($user_add,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file_name='');

		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = '../dev_approveAll.php';";
		echo "</script>";
	}
}else if($_REQUEST['method']=='edit_approve'){
	$id = $_POST['id'];
	$cate_id = $_POST['cate_id'];
	$sys_id = $_POST['sys_id'];
	$dev_title = $_POST['dev_title'];
	$dev_detail = $_POST['dev_detail'];

	$dev_file = $_FILES['files']['tmp_name'];
	$dev_file_name = $_FILES['files']['name'];

	if($dev_file!= ''){
		copy($dev_file, "../upload/" . $dev_file_name);
		$Obj_Appr->edit_approve($id,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file_name);

		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = '../dev_approveAll.php';";
		echo "</script>";

	}else{
		$Obj_Appr->edit_approve($id,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file_name='');

		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = '../dev_approveAll.php';";
		echo "</script>";
	}
}else if($_REQUEST['method']=='del_approve'){
	$id = $_GET['id'];
	$Obj_Appr->del_approve($id);
	echo "<script language=\"javascript\">";
	echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	echo "window.location = '../dev_approveAll.php';";
	echo "</script>";
}

?>