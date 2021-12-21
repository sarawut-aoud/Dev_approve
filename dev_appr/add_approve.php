<?php
session_start();
if (!$_SESSION["UserID"]){  //check session
  Header("Location: index.php"); 
}else{

    include_once("class/Cls_ConnectDB.php");
    include_once("class/Cls_appr.php");

    $Obj_ConnectDB = new Cls_ConnectDB();
    $Obj_Appr = new Cls_Appr();

// $result1 = $Obj_Appr->Get_user();
// $row1 = mysqli_fetch_array($result1);
// echo $row1['username'];
    $page = 'dev_all.php';
    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
        <!-- Favicon icon -->
        <?php include_once('include_style.php'); ?>

    </head>

    <body>

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php 
        include_once('header.php');
        include_once('menu.php'); 
        ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">:: เพิ่มคำร้องขอพัฒนาระบบ ::</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                              <!--   <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">index</li>
                                </ol> -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <?php //print_r($_SESSION); ?>

                        <div class="card">
                           <form class="form-horizontal" method="post" action="process/proc_appr.php" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="cate_id" class="col-sm-2 text-end control-label col-form-label">หมวดหมู่ : </label>
                                    <div class="col-sm-6">
                                      <select id="cate_id" name="cate_id" class="form-select" required>
                                       <option value="">-- โปรดเลือกชื่อระบบ --</option>
                                       <?php
                                       $result1 = $Obj_Appr->Get_category();
                                       while ($row1 = mysqli_fetch_array($result1)) {
                                        echo '<option value="'.$row1['cate_id'].'">'.$row1['cate_name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sys_id" class="col-sm-2 text-end control-label col-form-label">ชื่อระบบ : </label>
                            <div class="col-sm-6">
                              <select id="sys_id" name="sys_id" class="form-select" required>
                                  <option value="">-- โปรดเลือกชื่อระบบ --</option>
                                  <?php
                                  $result1 = $Obj_Appr->Get_System();
                                  while ($row1 = mysqli_fetch_array($result1)) {
                                     echo '<option value="'.$row1['sys_id'].'">'.$row1['sys_name'].'</option>';
                                 }
                                 ?>
                             </select>
                         </div>
                     </div>

                     <div class="form-group row">
                        <label for="dev_title" class="col-sm-2 text-end control-label col-form-label">หัวเรื่อง : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dev_title" name="dev_title" placeholder="ระบุหัวเรื่อง" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1"
                        class="col-sm-2 text-end control-label col-form-label">ผู้ขออนุมัติ : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" readonly value="<?=$_SESSION["fullname"]?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dev_detail" class="col-sm-2 text-end control-label col-form-label">รายละเอียด : </label>
                        <div class="col-sm-9">
                            <textarea name="dev_detail" class="form-control"  placeholder="ระบุรายละเอียด/ความต้องการ" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1"
                        class="col-sm-2 text-end control-label col-form-label">ไฟล์แนบ : </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="cono1" name="files" placeholder="ไฟล์แนบ">
                        </div>
                    </div>
                    <input type="hidden" name="method" value="add_approve">
                </div>
              <!--   <div class="border-top"> -->
                    <div class="card-body">
                       
                        <div class="text-center">
                            <button type="submit" class="btn btn-success text-white">บันทึก</button>
                             <button type="reset" class="btn btn-danger text-white">ยกเลิก</button>
                        </div>
                    </div>

              <!--   </div> -->

            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php include_once('include_js.php'); ?>
</body>
<script>
    $('#table').DataTable();
</script>
</html>
<?php } ?>