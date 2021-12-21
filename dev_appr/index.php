<!DOCTYPE html>
<html lang="en" hc="a0" hcx="0">

<head>
	
	<?php
	//include "scripthead.php";
	?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="theme-color" content="#ffffff">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
	<?php include_once('include_style.php'); ?>
	<title>login</title>
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Sarabun&display=swap');

	.ribbon {
		position: absolute;
		left: -5px;
		top: 0px;
		z-index: 1;
		overflow: hidden;
		width: 75px;
		height: 75px;
		text-align: right;
	}

	.ribbon span {
		font-size: 10px;
		font-weight: bold;
		color: #FFF;
		text-transform: uppercase;
		text-align: center;
		line-height: 20px;
		transform: rotate(-45deg);
		-webkit-transform: rotate(-45deg);
		width: 100px;
		display: block;
		background: #79A70A;
		background: linear-gradient(#2989D8 0%, #1E5799 100%);
		box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
		position: absolute;
		top: 19px;
		left: -21px;
	}

	body {
		font-family: 'Sarabun', 'noto_sans_thairegular', 'noto_sansregular';
		color: #FEFEFE;
		background: #FEFEFE;
	}

	:root {
		--input-padding-x: .75rem;
		--input-padding-y: .75rem;
	}

	html,
	body {
		height: 100%;
	}

	body {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		background-color: #FEFEFE;
	}

	.form-signin {
		width: 100%;
		max-width: 420px;
		padding: 15px;
		margin: auto;
	}

	.form-label-group {
		position: relative;
		margin-bottom: 1rem;
	}

	.form-label-group>label {
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		margin-bottom: 0;
		line-height: 1.5;
		color: #495057;
		border: 1px solid transparent;
		border-radius: .25rem;
		transition: all .1s ease-in-out;
	}
</style>
</head>

<body>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card" style="background-color: #3e5569;">
					<form id="form-login" class=" login-form was-validated cmxform form-signin " action="process/proc_login.php" method="post" >
						<div class="text-center mb-4">
							<h3 class="h3 mb-3 font-weight-normal">เข้าสู่ระบบ</h3>
							<p>ระบบขออนุมัติ | dev_approve</p>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<input type="text" class="form-control text-center" id="username" placeholder="Enter username" name="username" autocomplete="off" required>
								<div class="valid-feedback">ผ่าน.</div>
								<div class="invalid-feedback">โปรดกรอกฟิลด์นี้.</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-group">      
								<input type="password" class="form-control text-center" id="password" placeholder="Enter password" name="password" autocomplete="off" required>
								<div class="valid-feedback">ผ่าน.</div>
								<div class="invalid-feedback">โปรดกรอกฟิลด์นี้.</div>
							</div>
						</div>


						<div class="mb-3">
							<div class="d-grid gap-2">
							<button class="btn btn-success btn-block text-white " type="submit"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
						</div>
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</div>

	</form>
</body>
</html>