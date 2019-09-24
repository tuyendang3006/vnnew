<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]==1 ){
	header("localtion:../index.php");
	}
	
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>


<?php
if(isset($_POST["btnThem"])){
	$TenTL = $_POST["TenTL"];
	$TenTL_KhongDau = changeTitle($TenTL);
	$ThuTu = $_POST["ThuTu"];
		settype($ThuTu, "int");
	$AnHien = $_POST["AnHien"];
		settype($AnHien, "int");
	$qr = "INSERT INTO theloai
	        VALUE(null, '$TenTL' , '$TenTL_KhongDau' , '$ThuTu ' , '$AnHien' )
	";
	$con = mysqli_connect("localhost", "root", "", "vnnew");
    mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con, $qr);
	header("location:listTheLoai.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project vnexpress.net PHP</title>
<link rel="stylesheet" type="text/css" href="layout.css" />
</head>

<body>
    <table width="855" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td id="hangTieuDe">TRANG QUẢN TRỊ
        <div style="width:200px; float:right;">
		    <h3> Hello <?php echo $_SESSION["HoTen"] ?> </h3>
        </div>
        </td>
      </tr>
      <tr>
        <td id="hang2"><?php require "menu.php"; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
          <form id="form1" name="form1" method="post" action="">
            <table width="855" border="1" align="center"  cellspacing="0" cellpadding="0">
              <tr>
              <td colspan="2" align="center">THÊM THỂ LOẠI</td>
            </tr>
            <tr>
              <td>TenTL</td>
              <td><label for="TenTL"></label>
              <input type="text" name="TenTL" id="TenTL" size="50px" /></td>
            </tr>
            <tr>
              <td>ThuTu</td>
              <td><label for="ThuTu"></label>
              <input type="text" name="ThuTu" id="ThuTu" size="50px"/></td>
            </tr>
            <tr>
              <td>AnHien</td>
              <td><p>
                <label>
                  <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" />
                  Hiện</label>
                <br />
                <label>
                  <input type="radio" name="RadioGroup1" value="0" id="RadioGroup1_1" />
                  Ẩn</label>
                <br />
              </p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="btnThem" id="btnThem" value="Thêm" /></td>
            </tr>
            </table>
          </form>
         
    </body>
</html>