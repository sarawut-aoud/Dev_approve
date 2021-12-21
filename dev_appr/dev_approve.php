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
                        <h4 class="page-title">:: Dashboard ::</h4>
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
  <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-user mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">2540</h5>
                                                    <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-plus mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">120</h5>
                                                    <small class="font-light">New Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-cart-plus mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">656</h5>
                                                    <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-tag mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">9540</h5>
                                                    <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-table mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">100</h5>
                                                    <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-globe mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">8540</h5>
                                                    <small class="font-light">Online Orders</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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