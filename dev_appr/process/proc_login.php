<?php 
session_start();
if(isset($_POST['username'])){
  include_once("../class/Cls_ConnectDB.php");
  include_once("../class/Cls_appr.php");

  $Obj_ConnectDB = new Cls_ConnectDB();
  $Obj_Appr = new Cls_Appr();

  $Username = $_POST['username'];
  $Password = $_POST['password'];

  $result = $Obj_Appr->Get_login($Username,$Password);
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);

    $_SESSION["UserID"] = $row["id"];
    $_SESSION["fullname"] = $row["fname"]." ".$row["lname"];
    $_SESSION["User_level"] = $row["status"];


    if($_SESSION["User_level"]==1){
      Header("Location: ../dev_approve.php");
    }else{
      Header("Location: ../dev_approveAll.php");
    }
    


  }else{
    echo "<script>";
    echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
    echo "window.history.back()";
    echo "</script>";
  }

}else{
  Header("Location: ../index.php"); 
}
?>