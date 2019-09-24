<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ){
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
                    <td colspan="7" align="center">DANH SÁCH LOẠI TIN</td>
                </tr>
                <tr>
                    <td>idLT</td>
                    <td>Ten</td>
                    <td>Ten_Khong_Dau</td>
                    <td>ThuTu</td>
                    <td>AnHien</td>
                    <td>idLT</td>
                    <td><a href="themLoaiTin.php">Thêm</a></td>
                </tr>
				
				<?php
			        $loaitin = DanhSachLoaiTin() ;
			        while ($row_loaitin = mysqli_fetch_array($loaitin) ){
				    ob_start();
			    ?>
				
				<tr>
                    <td>{idLT}</td>
                    <td>{Ten}</td>
                    <td>{Ten_KhongDau}</td>
                    <td>{ThuTu}</td>
                    <td>{AnHien}</td>
                    <td>{TenTL}</td>
                    <td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a> -<a onclick="return confirm('Bạn có chắc là muốn xóa không ???')" href="xoaLoaiTin.php?idLT={idLT}"> Xóa</a></td>
                </tr>
				
				<?php
			 		$s = ob_get_clean();
					$s = str_replace("{idLT}", $row_loaitin["idLT"], $s);
					$s = str_replace("{Ten}", $row_loaitin["Ten"], $s);
					$s = str_replace("{Ten_KhongDau}", $row_loaitin["Ten_KhongDau"], $s);
					$s = str_replace("{ThuTu}", $row_loaitin["ThuTu"], $s);
					$s = str_replace("{AnHien}", $row_loaitin["AnHien"], $s);
					$s = str_replace("{TenTL}", $row_loaitin["TenTL"], $s);
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