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
                    <td colspan="5" align="center">DANH SÁCH TIN</td>
                </tr>
                <tr>
                    <td width="52">idTin</td>
                    <td width="534">&nbsp;</td>
                    <td width="63">&nbsp;</td>
                    <td width="84">&nbsp;</td>
                    <td width="55"><a href="themTin.php">Thêm</a></td>
                </tr>
              
                <?php
			    $tin = DanhSachTin();
			    while ($row_tin = mysqli_fetch_array($tin)){
				    ob_start();
			    ?>
                <tr>
                    <td><p>  {idTin}<br />
                             {Ngay}</p></td>
                    <td><a href="suaTin.php?idTin={idTin}">{TieuDe}</a><br />                  
                    <img style="float:left; margin-right:5px" src="../upload/tintuc/{urlHinh}" width="142" height="96" />{TomTat}<br /></td>
                    <td>{TenTL}<br />
                        -<br/>
                    {Ten}</td>
                    <td><p>Số lần xem: {SoLanXem}<br />
                    {TinNoiBat} -{AnHien}</p></td>
                    <td><a href="suaTin.php?idTin={idTin}">Sửa</a> - <a onclick="return confirm('Bạn có chắc là muốn xóa không ???')" href="xoaTin.php?idTin={idTin}">Xóa</a></td>
                </tr>
              
                <?php
					$s = ob_get_clean();
					$s = str_replace("{idTin}", $row_tin["idTin"], $s);
					$s = str_replace("{Ngay}", $row_tin["Ngay"], $s);
					$s = str_replace("{TieuDe}", $row_tin["TieuDe"], $s);
					$s = str_replace("{TomTat}", $row_tin["TomTat"], $s);
					$s = str_replace("{urlHinh}", $row_tin["urlHinh"], $s);
					$s = str_replace("{TenTL}", $row_tin["TenTL"], $s);
					$s = str_replace("{Ten}", $row_tin["Ten"], $s);
					$s = str_replace("{SoLanXem}", $row_tin["SoLanXem"], $s);
					$s = str_replace("{TinNoiBat}", $row_tin["TinNoiBat"], $s);
					$s = str_replace("{AnHien}", $row_tin["AnHien"], $s);
					
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