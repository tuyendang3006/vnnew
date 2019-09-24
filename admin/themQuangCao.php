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
	$vitri = $_POST["vitri"];
	$MoTa = $_POST['MoTa'];
	$Url = $_POST["Url"];
	$urlHinh = $_POST["urlHinh"];
	$SoLanClick = 0;
	$qr = "INSERT INTO quangcao
	        VALUE(null, '$vitri' , '$MoTa' , '$Url' , '$urlHinh', '$SoLanClick' )
	";
	$con = mysqli_connect("localhost", "root", "", "vnnew");
    mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con, $qr);
	header("location:listQuangCao.php");
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
                    <td colspan="2" align="center">THÊM QUẢNG CÁO</td>
                </tr>
                <tr>
                    <td>vitri</td>
                    <td><label for="vitri"></label>
                    <input type="text" name="vitri" id="vitri" size="50px" /></td>
                </tr>
                <tr>
                    <td>MoTa</td>
                    <td><label for="MoTa"></label>
                    <input type="text" name="MoTa" id="MoTa" size="50px"/></td>
                </tr>
				<tr>
                    <td>Url</td>
                    <td><label for="Url"></label>
                    <input type="text" name="Url" id="Url" size="50px"/></td>
                </tr>
                <tr>
                    <td>urlHinh</td>
                    <td><label for="urlHinh"></label>
                    <input type="text" name="urlHinh" id="urlHinh" />
                    <input onclick="BrowseServer('Images:/','urlHinh')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="btnThem" id="btnThem" value="Thêm" /></td>
                </tr>
            </table>
          </form>
         
    </body>
</html>