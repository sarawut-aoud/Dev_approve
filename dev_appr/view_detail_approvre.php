<?php
include_once("class/Cls_ConnectDB.php");
include_once("class/Cls_appr.php");
include_once("function/function.php");
include_once('include_style.php');

$Obj_ConnectDB = new Cls_ConnectDB();
$Obj_Appr = new Cls_Appr();
$id = $_GET['id'];
$result = $Obj_Appr->Get_editapprove($id);
$row = mysqli_fetch_array($result);
$date_add = $row['dev_dateadd'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
<h5>:: รายละเอียดคำร้องขอพัฒนาระบบ ::</h5>

					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>หมวดหมู่ : </b></div>
						<div class="col-sm-6">
							<label id="cate_name"><?=$row['cate_name']?> </label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>ชื่อระบบ : </b></div>
						<div class="col-sm-6">
							<label id="sys_name"><?=$row['sys_name']?> </label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>หัวข้อ : </b></div>
						<div class="col-sm-6">
							<label id="dev_title"><?=$row['dev_title']?> </label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>ความต้องการ : </b></div>
						<div class="col-sm-6">
							<label id="dev_title"><?=$row['dev_detail']?> </label>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>เอกสารแนบ : </b></div>
						<div class="col-sm-6">
							<?php  if($row['dev_file']!=''){ ?>
							<a href="upload/<?=$row['dev_file']?>" target="_blank" ><i class="fas fa-file-alt"></i> เปิดไฟล์</a>
							<?php } ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>วันที่ร้องขอ : <?=$row['date_add']?></b></div>
						<div class="col-sm-6">
							<label id="date_add"> <?=DateEngToThai($date_add)?></label>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-4 text-end"><b>สถานะ : </b></div>
						<div class="col-sm-6">
							<label id="dev_sts"><?=status($row['dev_sts'])?> </label>
						</div>
					</div>

					<?php 
					if($row['dev_sts']!=1 && $row['dev_sts']!=3){ 


						if($row['date_appr']=='' && $row['date_appr']==NULL){
							$date_appr = DateEngToThai($row['date_appr']);
						}else{
							$date_appr = ' - ';
						}

						if($row['date_receive']=='' && $row['date_receive']==NULL){
							$date_receive = DateEngToThai($row['date_receive']);
						}else{
							$date_receive = ' - ';
						}

						if($row['date_end']=='' && $row['date_end']==NULL){
							$date_end = DateEngToThai($row['date_end']);
						}else{
							$date_end = ' - ';
						}

						?>
						<div class="form-group row">
							<div class="col-sm-4 text-end"><b>วันที่อนุมัติ : </b></div>
							<div class="col-sm-6">
								<label id="date_appr"><?=$date_appr?> </label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 text-end"><b>วันที่เริ่มพัฒนา : </b></div>
							<div class="col-sm-6">
								<label id="date_receive"><?=$date_receive?> </label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 text-end"><b>วันที่เสร็จสิ้น : </b></div>
							<div class="col-sm-6">
								<label id="date_end"><?=$date_end?> </label>
							</div>
						</div>
					<?php } ?>

					<?php if($row['dev_sts']==3){ ?>
						<div class="form-group row">
							<div class="col-sm-4 text-end"><b>สาเหตุที่ไม่อนุมัติ : </b></div>
							<div class="col-sm-6">
								<label id="dev_note"><?=$row['dev_note']?> </label>
							</div>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>
</div>






<?php include_once('include_js.php'); ?>