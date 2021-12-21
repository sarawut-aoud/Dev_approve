<?php

class Cls_Appr{
	var $dbm;
	var $sql;
	/* Edit attribute */

	/*************/
	function Cls_Appr(){
		$this->dbm = new Cls_ConnectDB();
	}
	/*************/
	function Get_user(){
		$this->sql = "SELECT * FROM user";
		return $this->dbm->SetQuery($this->sql);
	}
	function Get_login($Username,$Password){
		$this->sql = "SELECT * FROM User Where username='".$Username."' and password='".$Password."'";
		return $this->dbm->SetQuery($this->sql);
	}

	function Get_Department(){
		$this->sql = "SELECT * FROM department";
		return $this->dbm->SetQuery($this->sql);
	}

	function Get_System(){
		$this->sql = "SELECT * FROM system";
		return $this->dbm->SetQuery($this->sql);
	}
	function Get_category(){
		$this->sql = "SELECT * FROM category";
		return $this->dbm->SetQuery($this->sql);
	}
	function Add_approve($user_add,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file){

		$this->sql = "INSERT INTO dev_appr 
		(
		dev_title,
		user_add,
		cate_id,
		sys_id,
		dev_detail,
		dev_sts,
		dev_file,
		date_add
		) 
		VALUE 
		(
		'$dev_title',
		'$user_add',
		'$cate_id',
		'$sys_id',
		'$dev_detail',
		'1',
		'$dev_file',
		NOW()
	)";
	return $this->dbm->SetQuery($this->sql);
}
function edit_approve($id,$cate_id,$sys_id,$dev_title,$dev_detail,$dev_file){

	$this->sql = "UPDATE dev_appr SET
	dev_title = '$dev_title',
	cate_id = '$cate_id',
	sys_id = '$sys_id',
	dev_detail = '$dev_detail',";
	if($dev_file!=''){ $this->sql .= "dev_file = '$dev_file',"; }
	$this->sql .= "date_last = NOW() WHERE dev_id = '$id'";
	return $this->dbm->SetQuery($this->sql);
}
function del_approve($id){
	$this->sql = "DELETE FROM dev_appr WHERE dev_id = '$id'";
	return $this->dbm->SetQuery($this->sql);
}
function Get_approveById($user){
	$this->sql = "SELECT * 
	FROM dev_appr 
	WHERE user_add = '$user'
	ORDER BY dev_id DESC ";	
	return $this->dbm->SetQuery($this->sql);
}

function Get_approveBysts($dev_sts){
	$this->sql = "SELECT * 
	FROM dev_appr ";

	if($dev_sts=='' || $dev_sts == 'all'){

	}else{
		$this->sql .= " WHERE dev_sts = '$dev_sts'";
	}
	

	 $this->sql .= " ORDER BY dev_id DESC ";	
	return $this->dbm->SetQuery($this->sql);
}
function Get_approveByDev($user){
	$this->sql = "SELECT * 
	FROM dev_appr 
	WHERE user_dev = '$user'
	ORDER BY dev_id DESC ";		
	return $this->dbm->SetQuery($this->sql);
}


function Get_editapprove($id){
	$this->sql = "SELECT *,dev_appr.date_add AS dev_dateadd
	FROM dev_appr 
	INNER JOIN user ON dev_appr.user_add = user.id
	INNER JOIN system ON dev_appr.sys_id = system.sys_id
	INNER JOIN category ON dev_appr.cate_id = category.cate_id
	INNER JOIN department ON user.dep_id = department.dep_id
	WHERE dev_id = '$id' ";
	return $this->dbm->SetQuery($this->sql);
}
}
?> 