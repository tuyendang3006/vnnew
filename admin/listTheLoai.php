<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]==1 ){
	header("localtion:../index.php");
	}
	
require "../lib/dbCon.php";
require "../lib/quantri.php";
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
                <td colspan="6" align="center">DANH SÁCH THỂ LOẠI</td>
              </tr>
              <tr>
                <td>idTL</td>
                <td>TenTL</td>
                <td>TenTL_KhongDau</td>
                <td>ThuTu</td>
                <td>AnHien</td>
                <td><a href="themTheLoai.php">Thêm</a></td>
              </tr>
          <?php 
			  $theloai = DanhSachTheLoai();
			  while( $row_theloai = mysqli_fetch_array($theloai) ){
				  ob_start();
		  ?>

              <tr>
                <td>{idTL}</td>
                <td>{TenTL}</td>
                <td>{TenTL_KhongDau}</td>
                <td>{ThuTu}</td>
                <td>{AnHien}</td>
                <td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a>- <a onclick="return confirm('Bạn có chắc là muốn xóa không ???')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
              </tr>
              
              <?php 
					$s = ob_get_clean();
					$s = str_replace("{idTL}", $row_theloai["idTL"], $s);
					$s = str_replace("{TenTL}", $row_theloai["TenTL"], $s);
					$s = str_replace("{TenTL_KhongDau}", $row_theloai["TenTL_KhongDau"], $s);
					$s = str_replace("{ThuTu}", $row_theloai["ThuTu"], $s);
					$s = str_replace("{AnHien}", $row_theloai["AnHien"], $s);
					echo $s;
			  }
			  ?>
              
            </table>
          </form>
          <p>&nbsp;</p>
        <p>&nbsp;</p></td>
      </tr>
    </table>
    
    
    </body>
</html>