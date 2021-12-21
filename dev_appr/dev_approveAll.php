<?php
session_start();
if (!$_SESSION["UserID"]){  //check session
  Header("Location: index.php"); 
}else{

    include_once("class/Cls_ConnectDB.php");
    include_once("class/Cls_appr.php");
    include_once("function/function.php");

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

      <!--   <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div> -->

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
                        <h4 class="page-title">:: สถานะคำร้องการพัฒนาระบบ ::</h4>
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
                       <!--  <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                  
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="card">
                            <div class="card-body">

                                <?php if($_SESSION["User_level"]=='1'){?>
                                    <form  method="POST">
                                       <div class="form-group row">
                                        <div class="col-sm-3 ">
                                          <select id="dev_sts" name="dev_sts" class="form-select" required>
                                              <option value="">-- สถานะ --</option>
                                              <option value="all" >All - ทั้งหมด </option>
                                              <option value="1" >1 - รอพิจารณา </option>
                                              <option value="2" >2 - อนุมัติ </option>
                                              <option value="3" >3 - ไม่อนุมัติ </option>
                                              <option value="4" >4 - อยู่ระหว่างพัฒนา </option>
                                              <option value="5" >5 - เสร็จสิ้น </option>
                                          </select>
                                      </div>
                                      <div class="col-sm-3"><button type="submit" class="btn btn-success text-white">ค้นหา</button> </div>
                                  </div>
                              </form>
                          <?php } ?>

                          <div class="table-responsive">
                            <table id="table" class="table  table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr class="text-center ">
                                        <th width="5%" class="text-white">ลำดับ</th>
                                        <th width="15%" class="text-white">วันที่ร้องขอ</th>
                                        <th class="text-white">หัวข้อ</th>
                                        <th width="15%" class="text-white">สถานะ</th>
                                        <th width="15%" class="text-white">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;

                                    if(!empty($_POST['dev_sts'])){
                                        $dev_sts = $_POST['dev_sts'];
                                    }else{
                                        $dev_sts = '';
                                    }

                                    if($_SESSION["User_level"]==1){
                                        $result = $Obj_Appr->Get_approveBysts($dev_sts);
                                    }else if($_SESSION["User_level"]==2){
                                      $result = $Obj_Appr->Get_approveByDev($_SESSION["UserID"]);
                                  }else{
                                      $result = $Obj_Appr->Get_approveById($_SESSION["UserID"]);
                                  }



                                  while ($rows = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="text-center"><?=DateEngToThai($rows['date_add'])?></td>
                                        <td class="text-left"><?=$rows['dev_title']?></td>
                                        <td class="text-center"><?=status($rows['dev_sts'])?></td>
                                        <td class="text-center">

                                            <a href="view_detail_approvre.php?id=<?=$rows['dev_id']?>" class="btn btn-sm btn-info" data-fancybox data-type="iframe"  class="fancybox">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="edit_approve.php?id=<?=$rows['dev_id']?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="process/proc_appr.php?id=<?=$rows['dev_id']?>&&method=del_approve" class="btn btn-sm btn-danger text-white" onclick="return confirm('ต้องการลบรายการนี้?')">
                                                <i class="far fa-trash-alt"></i>
                                            </a>



                                        </td>
                                    </tr>
                                    <?php 
                                    $i++;
                                } 
                                ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include_once('include_js.php'); ?>
</body>

<script type="text/javascript">



    $('#table').DataTable();


</script>
</html>
<?php } ?>